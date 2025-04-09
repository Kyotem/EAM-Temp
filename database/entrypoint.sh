# Entrypoint Bash Script 
# Made by: Finn Panhuijsen
# Not set up efficiently, but fine enough for dev env. (FILENAMES ARE CASE SENSITIVE!!!)

# Location: !/bin/bash

# Path to the database file (Inc. Persistent Storage)
DB_FILE="/var/opt/mssql/data/GreenOfficeCRMM.mdf"

# Start SQL Server in the background
/opt/mssql/bin/sqlservr &

# Wait for SQL Server to initialize
echo "Waiting for SQL Server to initialize..."
until /opt/mssql-tools18/bin/sqlcmd -C -S localhost -U sa -P "$SA_PASSWORD" -Q "SELECT 1" &> /dev/null
do
    sleep 1
    echo "Still waiting for SQL Server..."
done
echo "SQL Server is up and running."

# Check if the database file already exists
if [ -f "$DB_FILE" ]; then
    echo "Database file $DB_FILE already exists. Skipping database setup."
else
    # Run setup.sql first
    if [ -f /var/opt/mssql/scripts/setup.sql ]; then
        echo "Executing setup.sql..."
        /opt/mssql-tools18/bin/sqlcmd -C -S localhost -U sa -P "$SA_PASSWORD" -i "/var/opt/mssql/scripts/setup.sql"
        if [ $? -ne 0 ]; then
            echo "Error executing setup.sql. Exiting."
            exit 1
        fi
    else
        echo "setup.sql not found. Skipping."
    fi
fi

# Execute procedures first (files starting with "Procedure")
for script in /var/opt/mssql/scripts/Procedure*.sql; do
    if [[ -f "$script" ]]; then
        echo "Executing procedure script: $script..."
        /opt/mssql-tools18/bin/sqlcmd -C -S localhost -U sa -P "$SA_PASSWORD" -i "$script"
        if [ $? -ne 0 ]; then
            echo "Error executing $script. Exiting."
            exit 1
        fi
    fi
done

# Execute triggers next (files starting with "Trigger")
for script in /var/opt/mssql/scripts/Trigger*.sql; do
    if [[ -f "$script" ]]; then
        echo "Executing trigger script: $script..."
        /opt/mssql-tools18/bin/sqlcmd -C -S localhost -U sa -P "$SA_PASSWORD" -i "$script"
        if [ $? -ne 0 ]; then
            echo "Error executing $script. Exiting."
            exit 1
        fi
    fi
done

# Execute all other SQL scripts except setup.sql, procedures, and triggers
for script in /var/opt/mssql/scripts/*.sql; do
    if [[ "$script" == "/var/opt/mssql/scripts/setup.sql" ]] || [[ "$script" == "/var/opt/mssql/scripts/Procedure"*.sql ]] || [[ "$script" == "/var/opt/mssql/scripts/Trigger"*.sql ]]; then
        continue
    fi

    echo "Executing other script: $script..."
    /opt/mssql-tools18/bin/sqlcmd -C -S localhost -U sa -P "$SA_PASSWORD" -i "$script"
    if [ $? -ne 0 ]; then
        echo "Error executing $script. Exiting."
        exit 1
    fi
done

# Keep the container running
wait

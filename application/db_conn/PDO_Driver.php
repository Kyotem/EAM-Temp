<?php

// !!! Warning:
// If you are getting the error: "Connection failed: could not find driver"
// Then it DOES NOT mean you are missing a PDO Driver in the PHP Webserver installation.
// Check if the DSN is formatted *correctly* and if the DB was created properly & is running

// Also I'm using a hardcoded env, deal with it.

function getPDOConnection()
{
    $environment = 'dev';  // prod || dev

    // Load the appropriate configuration file based on the hardcoded environment
    switch ($environment) {
        case 'prod': // Production Env
            $config = require __DIR__ . '/config/prod_config.php';
            break;
        case 'dev': // Development Env
            $config = require __DIR__ . '/config/dev_config.php';
            break;
        default:
            die('PDO Driver does not have environment set up correctly');
    }

    try {
        // Construct DSN for PDO
        $dsn = "sqlsrv:Server={$config['serverName']};Database={$config['database']};ConnectionPooling={$config['connectionPooling']};Encrypt={$config['encrypt']};TrustServerCertificate={$config['trustServerCertificate']}";

        // Establish PDO connection
        $conn = new PDO($dsn, $config['username'], $config['password']);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Enables PDO Error Reporting to throw PDOExceptions

        return $conn;

    } catch (PDOException $e) {

        switch ($environment) {
            case 'dev':
                echo "Connection failed: " . $e->getMessage();  // Show detailed error in dev env
                break;
            default:
                echo "Connection failed: Unable to connect to the database.";  // Generic message in other cases
                break;
        }
    }
}

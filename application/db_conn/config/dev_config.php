<?php
// Could use .env but I can't be bothered, this works good enough for now
return [
    'serverName' => 'mssql-database,1433', // Make sure it matches the container name!
    'database' => 'iproject31',
    'username' => 'SA',
    'password' => 'abc123!@#',
    'connectionPooling'  => 0,
    'encrypt' => true,
    'trustServerCertificate' => true
];

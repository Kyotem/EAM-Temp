<?php

require 'PDO_Driver.php'; 


$conn = getPDOConnection();


if ($conn) {
    try {
        $query = "SELECT * FROM Users";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        print_r($results);  

    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
} else {
    echo "Failed to establish a database connection.";
}

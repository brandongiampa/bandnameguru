<?php 

    $conn;

    include_once 'db.php';

    try {
        $conn = DB::connect();
        echo 'Sucksess!';
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

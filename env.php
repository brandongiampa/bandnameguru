<?php
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load(); 

    define( 'HOME_URL', $_ENV['HOME_URL'] );
?>
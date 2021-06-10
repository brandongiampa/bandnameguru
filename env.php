<?php isset( $bg_admin_is_allowed ) ? false : die( "This file is not for public consumption. Stop hacking." ); ?>

<?php
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load(); 

    define( 'HOME_URL', $_ENV['HOME_URL'] );
?>
<?php

    require_once "../../vendor/autoload.php" ; 
    use Dotenv\Dotenv; 
    $dotenv = Dotenv::createImmutable( "../../" );
    $dotenv->load();

    class DB {

        private static $dbConnection;

        public static function connect(){

            $dbHost = $_SERVER[ 'DB_HOST' ];
            $dbName = $_ENV[ 'DB_NAME' ];
            $dbUser = $_ENV[ 'DB_USER' ];
            $dbPassword = isset( $_ENV[ 'DB_PASSWORD' ] ) ? $_ENV[ 'DB_PASSWORD' ] : "";

            if ( self::$dbConnection === null ) {

                self::$dbConnection = new PDO( "mysql:host=${dbHost};dbname=${dbName};charset=utf8", $dbUser, $dbPassword );
                self::$dbConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                self::$dbConnection->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

            }

            return self::$dbConnection;

        }

    }
?>
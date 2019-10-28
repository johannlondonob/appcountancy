<?php 
    class Db {
        private static $conectorDb = null;

        function __construct(){}
        
            public static function Conectar() {
                $pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                
                self::$conectorDb = new PDO("mysql:host=localhost;dbname=appcountancy","root","",$pdoOptions);

                return self::$conectorDb;
            }
    }
?>
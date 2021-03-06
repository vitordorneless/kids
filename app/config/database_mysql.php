<?php
class Database {

    private static $dbName = "kids";
    private static $dbHost = "127.0.0.1";
    private static $dbUsername = "root";
    private static $dbUserPassword = "07917207";
    private static $cont = null;

    public function __construct() {
        die('Não rolou');
    }

    public static function connect() {
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect() {
        self::$cont = null;
    }
}
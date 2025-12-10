<?php
class Database {

    private static $host = "localhost";
    private static $port = "5432"; 
    private static $dbname = "GestionnaireProjet";
    private static $username = "postgres";  
    private static $password = "1234";      
    private static $pdo = null;

    public static function getConnection() {
        if (self::$pdo === null) {

            $dsn = "pgsql:host=" . self::$host .
                   ";port=" . self::$port .
                   ";dbname=" . self::$dbname . ";";

            try {
                self::$pdo = new PDO(
                    $dsn,
                    self::$username,
                    self::$password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die("<h2> Erreur de connexion PostgreSQL :</h2>" . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
?>
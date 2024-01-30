<?php

include(__DIR__."/../db_conf.php");

class Dbh {
    protected function connection() {
        try {
            $pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";port=3306", DBUSER, DBPASSWD);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
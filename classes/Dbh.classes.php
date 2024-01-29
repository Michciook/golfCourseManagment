<?php

class Dbh {
    private $host = '54.38.50.59';
    private $username = 'www13358_golf';
    private $password = 'EhTkvrjkxsrP3xHl86Eh';
    private $dbname = 'www13358_golf';

    protected function connection() {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;port=3306", 
            $this->username, 
            $this->password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
<?php
include "../db_conf.php";

try {
    $pdo = new PDO("mysql:host=HOST;dbname=DBNAME;port=3306", DBUSER, DBPASSWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
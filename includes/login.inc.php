<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

   include "../classes/Dbh.classes.php";
   include "../classes/login.classes.php";
   include "../classes/login_controller.classes.php";

   $login = new loginController($username, $password);

   $login->loginUser();

   header("location: ../index.php?error=none");
}
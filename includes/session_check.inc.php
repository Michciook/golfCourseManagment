<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("location: ../index.php?error=notloggedin");
        exit;
    }
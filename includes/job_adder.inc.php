<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $worker = $_POST["worker"];
    $description = $_POST["description"];
    $date = strtotime($_POST['date']); 
    $date = date('Y-m-d H:i:s', $date);

   include "../classes/Dbh.classes.php";
   include "../classes/jobs.classes.php";
   include "../classes/jobs_controller.classes.php";

   $jobAdder = new jobsController();

   $jobAdder->jobAdder($worker, $description, $date);

   header("location: ../panel.php?success=".$worker);
}
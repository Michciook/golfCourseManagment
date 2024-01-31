<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $worker = $_POST["worker"];
    $description = $_POST["description"];

   include "../classes/Dbh.classes.php";
   include "../classes/jobs.classes.php";
   include "../classes/jobs_controller.classes.php";

   $jobAdder = new jobsController();

   $jobAdder->jobAdder($worker, $description);

   header("location: ../panel.php?success=".$worker);
}
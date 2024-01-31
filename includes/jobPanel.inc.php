<?php
        include "classes/Dbh.classes.php";
        include "classes/jobs.classes.php";
        include "classes/jobs_controller.classes.php";
        include "classes/jobs_view.classes.php";

        $jobs = new JobsView();

        $jobs->displayJobs($_SESSION["userid"]);
    ?>
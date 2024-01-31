<?php
        include "classes/Dbh.classes.php";
        include "classes/jobs.classes.php";
        include "classes/jobs_controller.classes.php";
        include "classes/jobs_view.classes.php";

        $jobs = new JobsView();

        if(!isset($_GET["error"])) {
            $jobs->displayJobs($_SESSION["userid"]);
        }
        #if userRole is administrator or manager, show job adder form
        if($_SESSION["userroleID"] == 2 or $_SESSION["userroleID"] == 3) {
            $jobs->jobAdderView($_SESSION["userid"]);
        }
    ?>
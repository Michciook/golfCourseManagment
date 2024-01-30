<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/jobs-style.css">
</head>
<body>
    <?php
        session_start();
        include "classes/Dbh.classes.php";
        include "classes/jobs.classes.php";
        include "classes/jobs_controller.classes.php";
        include "classes/jobs_view.classes.php";

        $jobs = new JobsView();

        $jobs->displayJobs($_SESSION["userid"]);
    ?>

    <form action="includes/logout.inc.php" method="post">
        <button>Logout</button>   
    </form>
</body>
</html>
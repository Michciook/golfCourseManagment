<?php include "includes/session_check.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User panel</title>
    <link rel="stylesheet" href="css/jobs-style.css">
</head>
<body>
    <?php
        include "includes/jobPanel.inc.php"
    ?>

    <form action="includes/logout.inc.php" method="post">
        <button>Logout</button>   
    </form>
</body>
</html>
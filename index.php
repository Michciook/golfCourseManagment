<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["userid"])) {
            echo '
                    <h3>Login</h3>
                    
                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button>Login</button>   
                    </form>';
        } else {
            echo '<form action="includes/logout.inc.php" method="post">
                    <button>Logout</button>   
                    </form>';
        }
    ?>  
</body>
</html>
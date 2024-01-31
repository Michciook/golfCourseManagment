<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login in!</title>
    <link rel="stylesheet" href="css/login-style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Login</h1>        
            <form action="includes/login.inc.php" method="post">
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <button class="btn">Login</button>   
            </form>
        <?php
            session_start();
                
            if (isset($_GET["error"])) {
                switch ($_GET["error"]) {
                    case "wrongpassword":
                        echo "<p>Wrong password!</p>";
                        break;
                    case "usernotfound":
                        echo "<p>Can't find user with provided login!</p>";
                        break;
                    case "notloggedin":
                        echo "<p>Login to access this site!";
                        break;
                    default:
                        echo "<p>Unknown error!";
                        break;
                }
            }
        ?>
    </div>  
</body>
</html>
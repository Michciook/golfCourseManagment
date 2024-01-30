<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login-style.css">
</head>
<body>
    <div class="wrapper">
        <?php
            session_start();
            if(!isset($_SESSION["userid"])) {
                echo '
                        <h1>Login</h1>        
                            <form action="includes/login.inc.php" method="post">
                                <div class="input-box">
                                    <input type="text" name="username" placeholder="Username">
                                </div>
                                <div class="input-box">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <button class="btn">Login</button>   
                            </form>';
                        if (isset($_GET["error"])) {
                            switch ($_GET["error"]) {
                                case "wrongpassword":
                                    echo "Wrong password!";
                                    break;
                                case "usernotfound":
                                    echo "Can't find user with provided login!";
                                    break;
                                default:
                                    break;
                            }
                        }
            } else {
                echo '<form action="includes/logout.inc.php" method="post">
                        <button>Logout</button>   
                        </form>';
            }
        ?>
    </div>  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="col-md-12">
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
            } else {
                echo '<form action="includes/logout.inc.php" method="post">
                        <button>Logout</button>   
                        </form>';
            }
        ?>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
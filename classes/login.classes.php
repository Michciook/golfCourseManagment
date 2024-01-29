<?php

class Login extends Dbh {
    protected function getUser($username, $password) {
        $stmt = $this->connection()->prepare('SELECT user_password from users WHERE username = ?;');

        if(!$stmt->execute([$username])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pdoHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $pdoHashed[0]["user_password"]);

        if($checkPassword == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif($checkPassword == true) {
            $stmt = $this->connection()->prepare('SELECT * from users WHERE username = ? AND user_password = ?;');
            
            if(!$stmt->execute(array($username, $pdoHashed[0]["user_password"]))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound_2"    );
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["userID"];
            $_SESSION["username"] = $user[0]["username"];
        }

        $stmt = null;
    }
}
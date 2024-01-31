<?php

class Jobs extends Dbh {
    protected function getJobs($userID) {
        $stmt = $this->connection()->prepare('SELECT jobs.jobID, jobs.description, jobs.entryDate, courses.name as course, users.username as username
                                                FROM jobs
                                                JOIN courses ON jobs.courseID = courses.courseID
                                                JOIN users ON jobs.userID = users.userID
                                                WHERE jobs.courseID = (SELECT courseID FROM users WHERE userID = ?);');

        if(!$stmt->execute([$userID])) {
            $stmt = null;
            header("location: ../panel.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../panel.php?error=nojobsfound");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getWorkers($userID) {
        $stmt = $this->connection()->prepare('SELECT username FROM users WHERE users.courseID = (SELECT courseID FROM users WHERE userID = ?);');

        if(!$stmt->execute([$userID])) {
            $stmt = null;
            header("location: ../panel.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../panel.php?error=usernotfound");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function addJob($worker, $description, $date) {
        $stmt = $this->connection()->prepare('insert into jobs (userID, courseID, description, entryDate) select users.userID, users.courseID, ?, ? from users where username = ?;');

        if(!$stmt->execute([$description, $date, $worker])) {
            $stmt = null;
            header("location: ../panel.php?error=stmtfailed");
            exit();
        }
    }

    
}
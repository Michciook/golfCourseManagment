<?php

class Jobs extends Dbh {
    protected function getJobs($userID) {
        $stmt = $this->connection()->prepare('SELECT jobs.jobID, jobs.description, courses.name, users.username as username
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
            header("location: ../panel.php?error=usernotfound");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
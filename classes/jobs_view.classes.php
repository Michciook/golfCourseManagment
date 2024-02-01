<?php

class JobsView extends Jobs {
    public function displayJobs($userID) {
        $jobsArray = $this->getJobs($userID);
        $uniqueDates = array_unique(array_column($jobsArray, 'entryDate'));

        echo "<h1>".$jobsArray[0]["course"]."</h1>";    
        if(empty($jobsArray)) {
            echo "<h1>NO JOBS TO DISPLAY</h1>";
        } else {
            foreach ($uniqueDates as $date) {
                echo "<table class='jobs'><tr>";
                    echo "<th>User</th>";
                    echo "<th>Job Description for: ". $date ."</th>";
                echo "</tr>";
                foreach ($jobsArray as $job) {
                    if ($job['entryDate'] == $date) {
                        echo "<tr>";
                            echo "<td>". $job["username"] . "</td>";
                            echo "<td>". $job["description"] . "</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
            }
        }
    }

    public function jobAdderView($userID) {
        $workersArray = $this->getWorkers($userID);

        echo '
        <form action="../includes/job_adder.inc.php" method="post">
            <label for="worker">Choose a worker:</label>
            <select id="worker" name="worker">';
        
        foreach ($workersArray as $worker) {
            echo "<option value=". $worker["username"] .">". $worker["username"] . "</option>";
        }


        echo '
            </select>
            <input type="text" name="description" placeholder="Description">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
            <input type="submit">
        </form>
        ';
    }
}
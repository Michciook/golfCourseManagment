<?php

class JobsView extends JobsController {
    public function displayJobs($userID) {
        $jobsArray = $this->getJobs($userID);

        echo "<h1>".$jobsArray[0]["course"]."</h1>";
        echo "<table id='jobs'><tr>";
            echo "<th>User</th>";
            echo "<th>Job Description</th>";
        echo "</tr>";
        foreach ($jobsArray as $job) {
            echo "<tr>";
                echo "<td>". $job["username"] . "</td>";
                echo "<td>". $job["description"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
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
            <input type="submit">
        </form>
        ';
    }
}
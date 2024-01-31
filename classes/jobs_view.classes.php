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

    public function jobAdder($userID) {
        $workersArray = $this->getWorkers($userID);

        echo '
        <form action="/action_page.php">
            <label for="workers">Choose a worker:</label>
            <select id="workers" name="workers">';
        
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
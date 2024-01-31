<?php

class JobsController extends Jobs {
    public function jobAdder($username, $description, $date) {
        $this->addJob($username, $description, $date);
    }
}
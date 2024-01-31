<?php

class JobsController extends Jobs {
    public function jobAdder($username, $description) {
        $this->addJob($username, $description);
    }
}
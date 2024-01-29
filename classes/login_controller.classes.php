<?php 

class loginController extends Login {

    public function __construct(private string $username, private string $password) {}

    public function loginUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
        }
        $this->getUser($this->username, $this->password);
    }

    private function emptyInput() {
        if(empty($this->username) || empty($this->password)) {
            return false;
        } else {
            return true;
        }
    }
}
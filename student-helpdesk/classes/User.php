<?php

class User {

    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = trim($username);
        $this->password = trim($password);
    }

    public function getUsername(){
        return $this->username;
    }

    public function validateLogin(){

        if($this->username === "Prachi04" && $this->password === "Prachi@2026"){
            return "success";
        }

        if($this->username === "Admin04" && $this->password === "Admin@2026"){
            return "success";
        }

        return "failed";
    }
}
?>

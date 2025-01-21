<?php

class User {

    private $id;
    private $name;
    private $email;
    private $password;

    public function __get($attr) {

        return $this->$attr;
    }

    public function __set($attr, $value) {

        $this->$attr = $value;
    }
}

?>
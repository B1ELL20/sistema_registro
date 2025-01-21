<?php

class Conection {

    private $host = 'localhost';
    private $dbname = 'user_registration';
    private $user = 'root';
    private $password = '';

    public function conect() {

        try {

            $conection = new PDO(

                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->password"
            );

            return $conection;

        } catch (PDOException $e) {

            echo '<p>'.$e->getMessege().'<p>';
        }   
    }
}

?>
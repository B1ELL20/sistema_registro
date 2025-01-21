<?php

    var_dump($_POST);

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'user_registration';

    $conection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conection->connect_errno) {

        echo 'Erro';
    
    } else {

        echo 'Conectou pivas';
        
    }

    class User {

        private string $name;
        private string $email;
        private string $password;

        public function set_info(string $name, string $email, string $password) {

            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }


        public function edit() {


        }

        public function delete() {


        }
    }

    $user = new User();

    if(!empty($_POST)) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $user->set_info($name,  $email, $pass);

        $result = mysqli_query($conection, "INSERT INTO users(nome, email, senha) VALUES ('$name', '$email', '$pass');");
    }
    
?>
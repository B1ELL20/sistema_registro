<?php

    require "../backend/user.php";
    require "../backend/user_service.php";
    require "../backend/conection.php";

    if ($_GET['action'] == 'insert') {

        $valid_email = true;
        $valid_pass = true;
        $user = new User();
        $conection = new Conection();

        $userService = new UserService($conection, $user);
        $users = $userService->get();

        foreach ($users as $id => $userIn) {

            if ($userIn->email == $_POST['email']) {

                $valid_email = false;
            }
        }

        if (strlen($_POST['password']) <= 6 ) {

            $valid_pass = false;
        }

        if ($_POST['name'] == '' || $_POST['email'] == '' || $_POST['password'] == '') {

            $valid_email = false;
            $valid_pass = false;
        }


        if ($valid_email && $valid_pass) {

            $user->__set('name', $_POST['name']);
            $user->__set('email', $_POST['email']);
            $user->__set('password', $_POST['password']);

            $userService = new UserService($conection, $user);
            $userService->insertInto();

            header('Location: ../index.php?insert=valid');

        } else {

            if (!$valid_email && $valid_pass) {

                header('Location: ../index.php?insert=email');

            } else if ($valid_email && !$valid_pass) {

                header('Location: ../index.php?insert=password');

            } else if (!$valid_email && !$valid_pass) {

                header('Location: ../index.php?insert=invalid');
            }

            
        }

    } else if ($_GET['action'] == 'get') {

        $user = new User();
        $conection = new Conection();

        $userService = new UserService($conection, $user);
        $users = $userService->get();
    
    } else if ($_GET['action'] == 'update') {

        $user = new User();
        $user->__set('id', $_POST['id']);
        $user->__set('name', $_POST['name']);
        $user->__set('email', $_POST['email']);
        $user->__set('password', $_POST['password']);

        $conection = new Conection();

        $userService = new UserService($conection, $user);
        $users = $userService->update();

        header('Location: ../pages/users.php?update=1&action=get&valid=1');
    
    } else if ($_GET['action'] == 'del') {

        $user = new User();
        $user->__set('id', $_GET['id']);

        $conection = new Conection();

        $userService = new UserService($conection, $user);
        $users = $userService->delete();

        header('Location: ../pages/users.php?del=1&action=get');
    }
?>
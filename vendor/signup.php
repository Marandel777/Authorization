<?php
    session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $error_fields = [];

    if($full_name === ''){
        $error_fields[] = 'full_name';
    }
    if($login === ''){
        $error_fields[] = 'login';
    }
    if($email === '0' || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error_fields[] = 'email';
    }
    if($password === ''){
        $error_fields[] = 'password';
    }
    if($password_confirm === ''){
        $error_fields[] = 'password_confirm';
    }

    if(!isset($_FILES['avatar'])){
        $error_fields[] = 'avatar';
    }

    if(!empty($error_fields)){
        $response = [
            "status" => false,
            "type" => 1,
            "message" => 'Перевірте заповненість полів',
            "fields" => $error_fields
        ];
        echo json_encode($response);
        die();
    }

    if($password === $password_confirm) {
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'],'../' . $path);
    }

    $check_login = mysqli_query($connect,"SELECT * FROM `users` WHERE `login` = '$login'");
    $check_email = mysqli_query($connect,"SELECT * FROM `users` WHERE `email` LIKE '%$email%'");

    if(mysqli_num_rows($check_login) > 0){     
        $response = [
            "status" => false,
            "type" => 2,
            "message" => 'Вже зареєстрвано користувача з таким логіном',
        ];
        echo json_encode($response);
        die();
    }

    if(mysqli_num_rows($check_email) > 0){     
        $response = [
            "status" => false,
            "type" => 2,
            "message" => 'Вже зареєстрвано користувача з такою поштою',
        ];
        echo json_encode($response);
        die();
    }

    $password = md5($password);

    mysqli_query($connect,"INSERT INTO `users` (`full_name`, `login`, `email`, `password`, `avatar`) 
    VALUES ('$full_name', '$login', ' $email', '$password', '$path')");
    
    $response = [
        "status" => true,
        "message" => 'Реєстрація пройшла успішно',
    ];
    echo json_encode($response);
    die();

    // $_SESSION['messege'] = 'Реєстрація пройшла успішно';
    // header('Location: ../index.php');
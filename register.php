<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('Location: ./profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Авторизація і регістрація</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css"> 
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="./js/jquery-3.6.4.min.js"></script>
    <script defer src="./js/main.js"></script>
</head>
<body>
    <div class="container">
    <form action="./vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>ПІП</label>
        <input type="text" name="full_name" placeholder="Ведіть ваше повне ім'я">
        <label>Логін</label>
        <input type="text" name="login" placeholder="Ведіть ваш логін">
        <label>Пароль</label>
        <input type="email"name="email" placeholder="Ведіть вашу Пошту">
        <label>Зображення профілю</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Ведіть ваш пароль">
        <label>Підтвердження пароля</label>
        <input type="password" name="password_confirm" placeholder="Підтвердіть ваш пароль">
        <button type="submit" class="register-button">Зареєструйтеся</button>
        <p>У вас вже є обілковий запис? - <a href="./index.php">Авторизація</a></p>
        <?php
            if(count($_SESSION) !== 0 ){
                echo '<p class="messege">' . $_SESSION['messege'] . '</p>';
            } 
            unset($_SESSION['messege']);
         ?>
    </form>
    </div>
</body>
</html>
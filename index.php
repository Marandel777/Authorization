<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('Location: ./profile.php');
    }
?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація і регістрація</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css"> 
    <link rel="stylesheet" href="./css/style.css">   
    <script defer src="./js/jquery-3.6.4.min.js"></script>
    <script defer src="./js/main.js"></script>
</head>
<body>
    <div class="container">
    <form  method="post">
        <label>Логін</label>
        <input type="text" name="login" placeholder="Ведіть ваш логін">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Ведіть ваш пароль">
        <button type="submit" class="login-button">Увійти</button>
        <p>У вас немає обілкового запису? - <a href="./register.php">Зареєструйтеся</a></p>
        <p class="messege none"></p>
    </form>
    </div>
</body>
</html>
<!-- action="./vendor/signin.php" -->
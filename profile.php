<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профіль користувача</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css"> 
    <link rel="stylesheet" href="./css/style.css">   
</head>
<body>
    <div class="container">
    <form action="./vendor/signin.php" method="post">
        <img src="<?=$_SESSION['user']['avatar']?>" width="100px"alt="">
        <h2><?=$_SESSION['user']['full_name']?></h2>
        <a href="#"><?=$_SESSION['user']['email'] ?></a>
        <a href="./vendor/logout.php" class="logout">Вихід</a>
    </form>
    </div>
</body>
</html>
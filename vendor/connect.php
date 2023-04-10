<?php

$connect = mysqli_connect('localhost','root','','test');

if(!$connect) {
    die('Error connect to Databse');
}
$connect->set_charset("utf8");
<?php

session_start();

if(!isset($_SESSION['loggedIn'])){
    header("Location: ".baseUrl()."/views/pertemuan_20/login.php");
    exit;
}

if(isset($_POST['username']) &&  isset($_POST['password'])){
    $result = selectUsersBy("username", $_POST['username']);
}
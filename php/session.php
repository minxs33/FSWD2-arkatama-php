<?php
if(!isset($_SESSION['loggedIn'])){
    header("Location: ".baseUrl()."/views/pertemuan_20/login.php");
    exit;
}

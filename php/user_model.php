<?php

include 'functions.php';
$action = $_GET['action'];

$now = date('Y-m-d H:i:s');

$mysqli = conn("ta_magang", "root", "");

switch ($action) {
    case 'addUsers':
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $role = mysqli_real_escape_string($mysqli, $_POST['role']);
        $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
        $address = mysqli_real_escape_string($mysqli, $_POST['address']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $created_at = $now;
        $updated_at = $now;

        
        if(!$_FILES['avatar']['size'] == 0 || !$_FILES['avatar']['name'] == ""){
            $avatar = basename($_FILES['avatar']['name']);
            
            $target_dir = "../assets/avatar/";
            $target_file = $target_dir . $avatar;
            $status = 1;
            
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if ($check === false) {
                echo "File is not an image.";
                $status = 0;
            }

            if (file_exists($target_file)) {
                echo "File already exists.";
                $status = 0;
            }

            if ($_FILES["avatar"]["size"] > 500000) {
                echo "Your file is too large.";
                $status = 0;
            }

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
                $status = 0;
            }

            if ($status == 1 && move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                $query = $mysqli->query("INSERT INTO users(email,name,role,avatar,phone,address,password,created_at,updated_at) VALUES('$email','$name','$role','$avatar','$phone','$address','$password','$created_at','$updated_at')");
                if ($query) {
                    header("Location: ".baseUrl()."/views/pertemuan_19/dashboard.php");
                    exit;
                } else {
                    var_dump($query);
                    mysqli_error($mysqli);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }else{
            $query = $mysqli->query("INSERT INTO users(email,name,role,phone,address,password,created_at,updated_at) VALUES('$email','$name','$role','$phone','$address','$password','$created_at','$updated_at')");
                if($query){
                    header("Location: ".baseUrl()."/views/pertemuan_19/dashboard.php");
                    exit;
                }else{
                    var_dump($query);
                }
        }
        break;
    case "deleteUsers":
        $id = $_GET['id'];

        $getUsers = selectUsersBy("id",$id);
        $result = $getUsers->fetch_array(MYSQLI_ASSOC);
        // var_dump($id);
        if($result['avatar']){
            unlink("../assets/avatar/".$result['avatar']);
        }

        $query = $mysqli->query("DELETE FROM users WHERE id = '$id'");
        if($query){
            header("Location: ".baseUrl()."/views/pertemuan_19/dashboard.php");
            exit;
        }else{
            var_dump($query);
        }
        break;
    case "editUsers":
        $data = array(
            "email" => mysqli_real_escape_string($mysqli, $_POST['email']),
            "name" => mysqli_real_escape_string($mysqli, $_POST['name']),
            "role" => mysqli_real_escape_string($mysqli, $_POST['role']),
            "phone" => mysqli_real_escape_string($mysqli, $_POST['phone']),
            "address" => mysqli_real_escape_string($mysqli, $_POST['address']),
            "updated_at" => $now
        );

        $id = mysqli_real_escape_string($mysqli, $_POST['id']);

        if($_POST['password']){
            $data["password"] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        if(!$_FILES['avatar']['size'] == 0 || !$_FILES['avatar']['name'] == ""){
            $getUsers = selectUsersBy("id",$id);
            $result = $getUsers->fetch_array(MYSQLI_ASSOC);

            if($result['avatar']){
                unlink("../assets/avatar/".$result['avatar']);
            }
            
            $avatar = basename($_FILES['avatar']['name']);

            $data["avatar"] = mysqli_escape_string($mysqli, $avatar);
            
            $target_dir = "../assets/avatar/";
            $target_file = $target_dir . $avatar;
            $status = 1;
            
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if ($check === false) {
                echo "File is not an image.";
                $status = 0;
            }

            if (file_exists($target_file)) {
                echo "File already exists.";
                $status = 0;
            }

            if ($_FILES["avatar"]["size"] > 500000) {
                echo "Your file is too large.";
                $status = 0;
            }

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
                $status = 0;
            }

            if ($status == 1 && move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                echo "Your file".$avatar." has been uploaded.";
            }else{
                echo "There's an error while uploading your file";
            }
        }
        
        $values = '';
        $seperator = '';

        foreach($data as $k => $v){
            $values .= $seperator.'`'.$k.'` ="'.$v.'"';
            $seperator = ',';
        }

        $query = $mysqli->query("UPDATE users SET ".$values."WHERE id ='$id'");

        if($query){
            header("Location: ".baseUrl()."/views/pertemuan_19/dashboard.php");
            exit;
        }else{
            var_dump($query);
        }

        break;
        
    default:
        echo "Invalid action.";
    break;
}

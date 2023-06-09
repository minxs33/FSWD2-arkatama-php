<?php 

include "../../php/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?=baseUrl()?>/assets/css/main.css" rel="stylesheet">
    <title>Pertemuan 20 - Login</title>
    <style>
        .btn:focus{
        outline: none;
        }
    </style>
</head>
<body>

<div class="d-flex align-items-center justify-content-center vh-100">
    <form action="<?=baseUrl()?>/php/user_model.php?action=login" method="POST" style="min-width: 400px;">
        <div class="card p-4 d-flex d-column justify-content-center">
            <?php
                session_start();
                if(!empty($_SESSION['warning']))
                {
                ?>
                    <div class="alert alert-danger"><?=$_SESSION['warning']?></div>
                <?php
                }
                session_destroy();
            ?>
            <div class="d-flex justify-content-center">
                <h5 class="fw-semibold text-success m-2">Login</h5 class="fw-semibold text-success">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="password">
                    <span class="input-group-append">
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary border-start-0 border ms-n3">
                            <i id="icon" class="fa fa-eye-slash"></i>
                        </button>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small><a href="<?=baseUrl()?>" class="text-success">Kembali</a></small>
                <button class="btn btn-sm btn-success px-3" type="submit">
                    Next
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    const togglePassword = document
        .querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const icon = document.getElementById('icon');
    togglePassword.addEventListener('click', () => {
        const type = password
            .getAttribute('type') === 'password' ?
            'text' : 'password';
        password.setAttribute('type', type);
        icon.classList.toggle('fa-eye');
    });
</script>

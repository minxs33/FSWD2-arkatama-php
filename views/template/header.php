<?php
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="<?=baseUrl()?>/assets/css/main.css" rel="stylesheet">
    <title><?=$title?></title>
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light shadow-sm">
    <div class="container-fluid mx-4">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="navbar-nav ms-auto my-2 navbar-nav-scroll" style="--bs-scroll-height: 200px;">
              <li class="nav-item">
                <a class="nav-link text-success fw-medium" href="<?=baseUrl()?>">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-success fw-medium" href="<?=baseUrl()?>/views/php_2.php">Pertemuan 17</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-success fw-medium" href="<?=baseUrl()?>/views/php_3.php">Pertemuan 18</a>
              </li>
            </ul>
        </div>
    </div>
  </nav>

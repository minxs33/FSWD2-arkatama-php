<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
              <li class="nav-item">
                <a class="nav-link text-success fw-medium" href="<?=baseUrl()?>/views/php_6.php">Pertemuan 21</a>
              </li>
              <?php
                session_start();
                if(empty($_SESSION['loggedIn'])){
              ?>
              <li class="nav-item">
                <a class="ms-2 btn btn-outline-success fw-medium" href="<?=baseUrl()?>/views/pertemuan_20/login.php"><i class="fas fa-sign-in fa-sm"></i> Login</a>
              </li>
              <?php
                }else{
                  $getUsers = selectUsersBy("id",$_SESSION['userId']);
                  $result = $getUsers->fetch_array(MYSQLI_ASSOC);
                  ?>
                  <li class="nav-item">
                    <a class="nav-link text-success fw-medium" href="<?=baseUrl()?>/views/pertemuan_19/dashboard.php">Pertemuan 19</a>
                  </li>
                   <li class="nav-item dropdown">
                      <a class="nav-link text-success fw-medium dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <?php
                          echo "<img style='width:25px; height:25px;' class='rounded' src='".baseUrl()."/assets/avatar/".$result['avatar']."' alt='".$result['avatar']."'>";
                      ?>
                      </a>

                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li class="px-2"><span class="fw-medium text-success small">Logged in as <?=$result['name']?></span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item fw-medium small" href="<?=baseUrl()?>/php/user_model.php?action=logout"><i class="fas fa-sign-out-alt fa-sm text-danger"></i> Logout</a></li>
                      </ul>
                  </li>

                  <?php
                }
              ?>
            </ul>
        </div>
    </div>
  </nav>

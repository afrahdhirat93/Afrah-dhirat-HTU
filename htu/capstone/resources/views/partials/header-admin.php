<?php

use Core\Helpers\Helper; ?>

    
<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://kit.fontawesome.com/3fad7bc9aa.js" crossorigin="anonymous"></script>




    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS SYSTEM HTU</title>
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">

</head>

<body class="admin-view">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid ">
            <a class="navbar-brand" href="/"><img src="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/assets/15.png"  style="width:90px;height:60px;" > </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><i style = "color:white;" class="bi bi-box-arrow-right icon-white fa-2xl"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div id="admin-area" class="row d-flex justify-content-center">
        <div class="col-1 admin-links ">
            <ul class="list-group list-group-flush mt-3 d-block p-3 link-dark text-decoration-none">
                <?php if (Helper::check_permission(['post:read'])) : ?>
                    <li class="list-group-item">
                        <a class="nav-link active" aria-current="page" href="/products"><i class="fa-sharp fa-solid fa-store fa-2xl"></i></a>
                       

                    </li>
                <?php endif;
                
                if (Helper::check_permission(['post:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/products/create"><i class="fa-sharp fa-solid fa-square-plus fa-2xl"></i> </a>

                    </li>

                <?php endif;
                if (Helper::check_permission(['tag:read'])) : ?>
                    <li class="list-group-item">
                        <a href="/transactions"><i class="fa-sharp fa-solid fa-ticket fa-2xl"></i></a>
                    </li>
                <?php endif;
              
              if (Helper::check_permission(['user:read'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users"><i class="fa-sharp fa-solid fa-users fa-2xl"></i> </a>
                    </li>
                <?php endif;            

if (Helper::check_permission(['user:create'])) :
    ?>
        <li class="list-group-item align-items-center">
            <a href="/users/create"><i class="fa-sharp fa-solid fa-user-plus fa-2xl"></i>
</a>
        </li>


    <?php endif;
  

if (Helper::check_permission(['selling:read'])) :
    ?>
        <li class="list-group-item">
            <a href="/sales"><i class="fa-sharp fa-solid fa-cart-shopping fa-2xl"></i> </a>
        </li>
    <?php endif;

                
                
                
                ?>
                
            </ul>
        </div>
        <div class="col-11 admin-area-content">
            <div class="container my-5">
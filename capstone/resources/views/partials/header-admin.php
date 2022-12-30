<?php

use Core\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
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

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">POS HTU </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>

    <div id="admin-area" class="row">
        <div class="col-2 admin-links">
            <ul class="list-group list-group-flush mt-3 d-block p-3 link-dark text-decoration-none">
                <?php if (Helper::check_permission(['post:read'])) : ?>
                    <li class="list-group-item">
                        <a class="nav-link active" aria-current="page" href="/products">All Products</a>
                    </li>
                <?php endif;
                
                if (Helper::check_permission(['post:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/products/create">Insert Items </a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['tag:read'])) : ?>
                    <li class="list-group-item">
                        <a href="/transactions">All Transaction</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['tag:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/transactions/create"> trans</a>
                    </li>
                <?php endif;
              

if (Helper::check_permission(['sell:max'])) :
    ?>
        <li class="list-group-item">
            <a href="/products/max">max dashboard</a>
        </li>
    <?php endif;
                if (Helper::check_permission(['user:read'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users">All Users</a>
                    </li>
                <?php endif;

if (Helper::check_permission(['Accountant:selling'])) :
    ?>
        <li class="list-group-item">
            <a href="/sales">Selling Dashboard</a>
        </li>
    <?php endif;
                if (Helper::check_permission(['user:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users/create">Create User</a>
                    </li>
                <?php endif; ?>
                
            </ul>
        </div>
        <div class="col-10 admin-area-content">
            <div class="container my-5">
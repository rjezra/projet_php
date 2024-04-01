<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require './controleur/functions.php';
require_once './functions/auth.php';
?>
<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>
        <?php if (isset($titre)) : ?>
            <?php echo $titre; ?>
        <?php else :  ?>
            Mon site
        <?php endif ?>
    </title>
    <link rel="stylesheet" href="./assets/css/sticky-footer-navbar.css">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mon Site</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <?= nav_menu('nav-item') ?>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if (est_connecte()) : ?>
                            <li class="nav-item"><a href="logout.php" class="nav-link">Se deconecter</a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require __DIR__.'/headbalise.php';
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/events.png" alt="Brand Logo" style="max-height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <a class="nav-link" aria-current="page" href="/">HOME</a>
                    <a class="nav-link" href="#">COMING SOON</a>
                    <a class="nav-link" href="#">MOST POPULAR</a>
                    <a class="nav-link" href="#">LIVE AGAIN</a>
                </div>
                <div class="dropdown">
                    <?php if ($_SESSION['username']==null) :?>
                    <i class="bi bi-person-circle" style="font-size: 20px;" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="/user/login">Login</a></li>
                        <li><a class="dropdown-item" href="/user/newuser">Create Account</a></li>
                    </ul>
                    <?php else: ?>
                      <a class="nav-link" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false" >Hi, <?= htmlspecialchars($_SESSION['username']); ?></a>
                       <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Publish</a></li>
                        <li><a class="dropdown-item" href="/user/logout">Logout</a></li>
                    </ul>
                    <?php endif ;?>
                </div>
            </div>
        </div>
    </nav>
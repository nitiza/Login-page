<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/assets/css/style.css">
    
    <title>Nitiza</title>
</head>
<body>
    <?php
        $uri = service('uri');

    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index">Nitiza</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if (session()->get('isLoggedIn')): ?>
            <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active': null) ?>">

                <a class="nav-link" href="dashboard">Dashboard </a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active': null) ?>">
                <a class="nav-link" href="profile">Profile</a>
            </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="logout">Logout</a>
            </li>  
            </ul>

        <?php else: ?>
        
            <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active': null) ?>">
                <a class="nav-link" href="index">Login </a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active': null) ?>">
                <a class="nav-link" href="register">Register</a>
            </li>
            </ul>
        </div>
        <?php endif; ?>
  </div>
</nav>
    

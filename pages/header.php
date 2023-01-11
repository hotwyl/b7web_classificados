<?php require './config.php'; ?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classificados</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
    <script src="./assets/js/jquery-3.6.3.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid d-flex flex-wrap">
            <div class="navbar-header">
                <a href="./" class="navbar-brand">Classificados</a>
            </div>
            <ul class="nav">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                    <li class="nav-item"><a href="./meus-anuncios.php" class="nav-link link-light px-2">Meus Anúncios</a></li>
                    <li class="nav-item"><a href="./sair.php" class="nav-link link-light px-2">Sair</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="./cadastre-se.php" class="nav-link link-light px-2">Cadastre-se</a></li>
                    <li class="nav-item"><a href="./login.php" class="nav-link link-light px-2">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
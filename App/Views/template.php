<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Construction</title>
    <!-- Icon -->
    <link rel="icon" href="<?php echo URL_BASE;?>/imagens/logo-icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css/w3.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css/toastr.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css/santri.css">

    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css-awesome/brands.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css-awesome/fontawesome.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css-awesome/regular.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css-awesome/solid.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css-awesome/svg-with-js.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>/css-awesome/v4-shims.css">

    <!-- JS -->
    <script src="<?php echo URL_BASE;?>/js/jquery.js"></script>

</head>
<body>
    <!-- MENU -->
    <?php if( isset($_SESSION['logado']) ): ?>

        <header>
            <nav>
                <a href="/users/pesquisar" class="logo">Construction</a>

                <!-- Botão do MENU Responsivo -->
                <div class="mobile-menu">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>

                <ul class="nav-list">
                    <li><a href="/users/pesquisar"> Pesquisar Usuários </a></li>
                    <li><a href="/users/cadastrar"> Cadastrar Usuário </a></li>
                    <li><a href="/home/logout"> Logout </a></li>
                </ul>
            </nav> 
        </header>

    <?php endif; ?>

    <?php require_once '../App/views/' . $view . '.php'; ?>

    <script src="<?php echo URL_BASE;?>/js/mobile-navbar.js"></script>
</body>
</html>
<?php
require_once '../vendor/autoload.php';
?>

<html lang="pt-br">

<head>
    <title>Início</title>
    <link rel="stylesheet" href="../public/assets/css/index.css">
    <?php
    require_once "../views/includes/head.php";
    ?>
</head>

<body>
    <?php
    require "../views/includes/navbar.php";
    ?>
    <main>
        <div class="lateral-cards">
            <div class="lateral-container">
                <div class="lateral-card-title">
                    <span class="bi bi-envelope-paper"></span>
                    <h1>Inbox</h1>
                </div>
                <div class="cards-container">
                    <div class="example"></div>
                </div>
            </div>
        </div>
        <div class="main-cards"></div>
    </main>
    <?php
    require_once "../views/includes/scripts.php";
    ?>
</body>

</html>
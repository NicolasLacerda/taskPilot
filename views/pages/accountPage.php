<?php

session_start();

if (empty($_SESSION['mail'])) {
    header("Location: /views/pages/accountPage.php");
    exit();
} else {
    echo "Ainda tá logado";
};
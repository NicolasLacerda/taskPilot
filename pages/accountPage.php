<?php

session_start();

if (empty($_SESSION['mail'])) {
    header("Location: /pages/loginPage.php");
    exit();
} else {
    echo "Ainda tá logado";
};
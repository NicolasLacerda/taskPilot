<?php

session_start();

if (empty($_SESSION['mail'])) {
    header("Location: loginPage.php");
    exit();
}

require_once '../../vendor/autoload.php';

use App\Handlers\LoginUserHandler;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="/public/assets/css/account.css">
    <?php
    require_once "../includes/head.php";
    ?>
</head>

<body>
    <div class="menu w-100 d-flex flex-row">
        <div>
            <a href="../../public/index.php"
                class="text-decoration-none backBtn ms-5 h-100 flex-row d-flex justify-content-center align-items-center gap-2 border-0 bg-transparent">
                <i class="bi bi-chevron-left"></i>
                <p class="m-0">Account Settings</p>
            </a>
        </div>
    </div>

    <main class="justify-content-center align-items-center d-flex flex-row gap-3">
        <div
            class="account-container h-75 bg-white rounded-4 d-flex align-items-center justify-content-center flex-column">
            <img class="profile" src="../../public/imgs/profile.jpeg" alt="">
            <div class="w-100 flex-column justify-content-center align-items-center d-flex">
                <h3 class="mt-3 title-name"><?php echo $_SESSION['name'] ?></h3>
                <p class="accountStatus">New Client</p>
                <button class="editBtn" type="submit" value="send">Edit Account</button>
                <div class="d-flex flex-column w-100 justify-content-center align-items-center gap-3 mt-3">
                    <div class="d-flex flex-column inputBoxs">
                        <p class="p-0 m-0">Email</p>
                        <?php echo $_SESSION['mail'] ?>
                    </div>
                    <div class="d-flex flex-column inputBoxs">
                        <p class="p-0 m-0">Phone</p>
                        <?php echo $_SESSION['phone'] ?>
                    </div>
                    <div class="d-flex flex-column inputBoxs">
                        <p class="p-0 m-0">Date of birth</p>
                        <?php echo $_SESSION['birthday'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="form-container h-75 bg-white rounded-4 d-flex align-items-start justify-content-start flex-column px-5">
        </div>
    </main>
</body>

</html>
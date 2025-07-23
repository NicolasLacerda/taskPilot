<?php
class Logout
{
    public function accountLogout()
    {
        session_start();

        session_unset();

        session_destroy();

        header("Location: /views/pages/loginPage.php");
        exit;
    }
}

$logout = new Logout();
$logout->accountLogout();
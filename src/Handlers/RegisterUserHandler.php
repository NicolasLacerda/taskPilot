<?php
session_start();

require_once "../../vendor/autoload.php";

use App\Core\Connection;
use App\Controllers\RegisterUserController;

class RegisterUserHandler extends RegisterUserController
{
    public function connection()
    {
        try {
            $pdo = Connection::pdoCode();

            if ($this->registration()) {
                $smtp = $pdo->prepare("INSERT INTO `users`(`name`, `phone`, `birthday`, `mail`, `password`) VALUES (:name, :phone, :birthday, :mail, :password)");


                $smtp->execute([
                    ':name'     => $this->name,
                    ':phone'    => $this->phone,
                    ':birthday' => $this->birthday,
                    ':mail'     => $this->mail,
                    ':password' => $this->password
                ]);


                header('Location: /views/pages/loginPage.php');
                exit();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$connectWithSQL = new RegisterUserHandler();
$connectWithSQL->connection();
<?php

session_start();

require_once "user.php";
require_once "connection.php";

// Se a variável mail dentro de session estiver com algo, redirecionar para accountPage
if (!empty($_SESSION['mail'])) {
    header("Location: /pages/accountPage.php");
    exit;
}

class RegisterUser
{
    protected $password, $confirmPassword, $name, $phone, $birthday, $mail;

    public function registration()
    {

        // Instância da classe Usuario, passando valores para os parâmetros do construct.
        $newUser = new Usuario(
            $_POST["name"] ?? '',
            $_POST["phone"] ?? '',
            $_POST["birthday"] ?? '',
            $_POST["mail"] ?? '',
            $_POST["password"] ?? '',
            $_POST["confirmPassword"] ?? ''
        );

        // Transforma os GETs da classe usuário em variáveis.
        $this->name = filter_var(mb_convert_case(mb_strtolower($newUser->getName()), MB_CASE_TITLE, "UTF-8"), FILTER_SANITIZE_SPECIAL_CHARS);
        $this->phone = filter_var($newUser->getPhone(), FILTER_SANITIZE_SPECIAL_CHARS);
        $this->birthday = $newUser->getBirthday();
        $this->mail = filter_var($newUser->getMail(), FILTER_SANITIZE_EMAIL);
        $this->password = $newUser->getPassword();
        $this->confirmPassword = $newUser->getConPassword();

        if ($this->password === $this->confirmPassword && filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return true;
        } else {
            echo "<script>alert('As senhas não são iguais, por favor tente novamente!');</script>";
            return false;
        };
    }
}

class ConnectWithServer extends RegisterUser
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


                header('Location: /pages/login.php');
                exit();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$connectWithSQL = new ConnectWithServer();
$connectWithSQL->connection();

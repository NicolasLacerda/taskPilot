<?php
session_start();

require_once "../../vendor/autoload.php";

use App\Core\Connection;
use App\Controllers\LoginUserController;

class LoginUserHandler extends LoginUserController
{
    public function checkLogin()
    {

        $pdo = Connection::pdoCode();

        if ($this->pegarDadosDeLogin()) {
            $smtp = $pdo->prepare("SELECT * FROM users WHERE mail = :mail");

            $smtp->execute([':mail'     => $this->mail]);

            if ($smtp->rowCount() === 1) {
                $user = $smtp->fetch(PDO::FETCH_ASSOC);

                // Verifica a senha usando password_verify
                if (password_verify($this->password, $user['password'])) {
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['name'] = $user['name']; // opcional
                    header("Location: /views/pages/accountPage.php");
                    exit;
                } else {
                    $this->alertaErro("Senha incorreta!");
                }
            } else {
                $this->alertaErro("Usuário não encontrado!");
            }
        } else {
            $this->alertaErro("Email inválido!");
        }
    }

    private function alertaErro($mensagem)
    {
        echo "<script>alert('$mensagem'); window.location.href = '/views/pages/loginPage.php';</script>";
        exit;
    }
}
$connectWithSQL = new LoginUserHandler();
$connectWithSQL->checkLogin();
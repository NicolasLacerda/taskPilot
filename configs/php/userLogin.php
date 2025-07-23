<?php

session_start();

require_once "user.php";
require_once "connection.php";

class SearchUser
{
    protected $mail;
    protected $password;

    public function pegarDadosDeLogin()
    {
        // Composição da classe UserLogin, passando valores para os parâmetros do construct.
        $loginUser = new Usuario(
            '',
            '',
            '',
            $_POST["mail"] ?? '',
            $_POST["password"] ?? '',
            ''
        );

        // Transforma os GETs da classe usuário em variáveis.
        $this->mail = $loginUser->getMail();
        $this->password = $loginUser->getPassword();

        // Procura no Banco de Dados por email e senha.
        if (filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        };
    }
}

class ConnectWithServer extends SearchUser
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
                    header("Location: /pages/accountPage.php");
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
        echo "<script>alert('$mensagem'); window.location.href = '/pages/loginPage.php';</script>";
        exit;
    }
}
$connectWithSQL = new ConnectWithServer();
$connectWithSQL->checkLogin();

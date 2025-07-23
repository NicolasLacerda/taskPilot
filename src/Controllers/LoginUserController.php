<?php

namespace App\Controllers;

session_start();

require_once "../../vendor/autoload.php";

use App\Models\User;

class LoginUserController
{
    protected $mail;
    protected $password;

    public function pegarDadosDeLogin()
    {
        // Composição da classe UserLogin, passando valores para os parâmetros do construct.
        $loginUser = new User(
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
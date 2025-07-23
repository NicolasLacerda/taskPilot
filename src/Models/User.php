<?php

namespace App\Models;

class User
{
    private $name, $phone, $birthday, $mail, $password, $confirmPassword;

    public function __construct($name, $phone, $birthday, $mail, $password, $confirmPassword)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->birthday = $birthday;
        $this->mail = $mail;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getBirthday()
    {
        return $this->birthday;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getConPassword()
    {
        return $this->confirmPassword;
    }
}
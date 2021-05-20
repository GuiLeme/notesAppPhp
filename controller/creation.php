<?php
require "..model/dao/UsuarioDao.php";
require "..model/Usuario.php";
require "..model/config.php";
$usuarioDao = new UsuarioDao($pdo);


$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

$usuario = new Usuario();

if ($nome && $email && $senha){
    $usuario -> setNome($nome);
    $usuario -> setEmail($email);
    $usuario -> setSenha($senha);


    $usuarioDao -> create($usuario);
}


header('Location: login.php');
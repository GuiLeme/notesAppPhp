<?php
session_start();

require "../model/dao/UsuarioDao.php";
require "../model/config.php";

$udao = new UsuarioDao($pdo);

$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');


$usuario = $udao -> findByEmail($email);
$eUsuario = false;

if ($usuario!=false){
    $eUsuario = ($senha == $usuario -> getSenha());
}
$_SESSION['teste'] = $eUsuario;

if ($eUsuario){
    setcookie('usuario', $usuario->getId().';'.$usuario->getEmail().$usuario->getNome(), time()+3600);
    $_SESSION['logado'] = true; 
    header("Location: ../index.php");
    exit;
}
header("Location: ../login.php");
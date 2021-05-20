<?php
session_start();

if (!isset($_COOKIE['usuario'])){
    $_SESSION['logado'] = false;
    header("Location: login.php");
    exit;
}
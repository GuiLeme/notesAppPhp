<?php
session_start();

require "../model/Nota.php";
require "../model/dao/NotaDao.php";
require "../model/config.php";

$idNota = filter_input(INPUT_GET, 'idNota');

$nDao = new NotaDao($pdo);
$nDao->delete($idNota);

$_SESSION['deletado'] = true;
header("Location: ../../index.php");
exit;
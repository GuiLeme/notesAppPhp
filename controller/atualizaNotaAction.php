<?php
session_start();

require "../model/Nota.php";
require "../model/dao/NotaDao.php";
require "../model/config.php";

$corpo = filter_input(INPUT_POST, 'corpo');
$idNota = filter_input(INPUT_POST, 'idNota');

$nDao = new NotaDao($pdo);
$nota = new Nota();
$nota->setIdNota($idNota);
$nota->setCorpo($corpo);

$nDao->update($nota);

$_SESSION['atualizado'] = true;
header("Location: ../index.php");
exit;
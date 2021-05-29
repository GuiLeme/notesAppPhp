<?php
require "../model/Nota.php";
require "../model/dao/NotaDao.php";
require "../model/config.php";

$corpo = filter_input(INPUT_POST, 'corpo');
$idUsu = filter_input(INPUT_POST, 'idUsu');

$nDao = new NotaDao($pdo, $idUsu);

$nota = new Nota();
$nota -> setCorpo($corpo);
$nota -> setAparece(0);

$nDao -> create($nota);

header("Location: ../index.php");
exit;
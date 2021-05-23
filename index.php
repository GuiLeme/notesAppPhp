<?php
require "middleware/authMiddleware.php";


require "model/dao/NotaDao.php";
require "model/Usuario.php";
require "model/config.php";

$u = $_COOKIE["usuario"];

$usuario = new Usuario();
$teste = $usuario -> strToUsu($u);

$nDao = new NotaDao($pdo, $usuario -> getId());

require 'view/index.html';
?>
<h1>Seja bem vindo(a) às suas notas!</h1>
<hr>
<?php require 'view/helpers/header.html'; ?>
<hr>
<div>
<ul>
<?php 
$resultado = $nDao->findAll();
if ($resultado != false) {
    foreach($resultado as $nota){
        echo "<li>".$nota."</li>";
    }
}
?>
</ul>
</div>
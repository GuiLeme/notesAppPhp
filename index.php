<?php
require "middleware/authMiddleware.php";

require "model/config.php";
require "model/Nota.php";
require "model/dao/NotaDao.php";
require "model/Usuario.php";

$u = $_COOKIE["usuario"];

$usuario = new Usuario();
$usuario -> strToUsu($u);

$pdo -> prepare("SELECT * FROM usuarios");

$nDao = new NotaDao($p = $pdo, $idUsu = $usuario -> getId());

require 'view/index.html';
?>
<h1>Seja bem vindo(a) às suas notas, <?php echo $usuario->getNome();?>!</h1>
<hr>
<?php require 'view/helpers/header.html'; ?>
<hr>
<div>
<ul>
<?php 
$resultado = $nDao->findAll();
if ($resultado != false) {
    foreach($resultado as $nota){
        echo "<li>".$nota['corpo']."</li>";
    }
}
?>
</ul>
</div>
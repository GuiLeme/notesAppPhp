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

if ($_SESSION['deletado']){
    echo 'Nota deletada com sucesso.';
    $_SESSION['deletado'] = false;
}
if ($_SESSION['atualizado']){
    echo 'Nota atualizada com sucesso.';
    $_SESSION['atualizado'] = false;
}
?>

<div class="container">
    <h1 style="margin: 30px">Seja bem vindo(a) às suas notas, <?php echo $usuario->getNome();?>!</h1>

    <?php require 'view/helpers/header.html'; ?>

    <a href="middleware/sair.php">Sair</a>
    <div>
        <ul>
        <?php 
        $resultado = $nDao->findAll();
        if ($resultado != false) {
            foreach($resultado as $nota){
                echo "<li><input class='check' type='checkbox' id=".$nota['idNota'].">".$nota['corpo']."|| <a href='controller/deleteAction.php/?idNota=".$nota['idNota']."'>Deletar Nota</a> || <a href='atualizaNota.php/?idNota=".$nota['idNota']."'>Atualizar Nota</a> </li>";
            }
        }
        ?>
        </ul>
        
        <form action="update.php" method="POST">
            <input type="hidden" id='listaAnterior'>
            <input type="hidden" id='mudou'>
        </form>
    </div>
    <script src="assets/js/index.js"></script>
</div>
<?php
require "middleware/authMiddleware.php";
?>

<h1>O que você quer adicionar hoje?</h1>
<hr>
<?php
require 'view/index.html';
require 'view/helpers/header.html';
$idUsu = explode(';', $_COOKIE['usuario'])[0];

?>
<hr>

<form action="controller/addAction.php" method="POST">
    <label>
        Digite sua nota:
        <input type="text" name="corpo">
    </label>
    <input type="hidden" value="<?php echo $idUsu?>" name='idUsu'>
    <input type="submit" value="Enviar">
</form>
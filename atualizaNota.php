<?php
require "middleware/authMiddleware.php";

require "model/Nota.php";
require "model/dao/NotaDao.php";
require "model/config.php";

$idNota = filter_input(INPUT_GET, 'idNota');
?>

<h1>Como você quer atualizar sua nota?</h1>
<hr>
<?php
require 'view/index.html';
require 'view/helpers/header.html';
$idUsu = explode(';', $_COOKIE['usuario'])[0];

$nDao = new NotaDao($pdo, $idUsu);
$nota = $nDao->findById($idNota);
?>
<hr>

<form action="controller/atualizaNotaAction.php" method="POST">
    <label>
        Digite sua nota:
        <input type="text" name="corpo" value='<?php echo $nota['corpo'];?>'>
    </label>
    <input type="hidden" value="<?php echo $idNota?>" name='idNota'>
    <input type="submit" value="Enviar">
</form>
<?php
setcookie('usuario', '', time() - 1*3600, '/');
header('Location: ../index.php');
exit;
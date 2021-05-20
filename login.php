<?php
session_start();




if (!$_SESSION['logado']) {
    echo "<h2>Você não está logado. Por favor, faça o Login, ou crie um usuário:</h2>";
}
?>

<h1>Olá, seja bem vindo ao seu bloco de anotações na nuvem.</h1>

<form action="validation.php" method='POST'>
    <label>
        Email:
        <input type="email" name='email'>
    </label><br><br>
    <label>
        Senha:
        <input type="password" name='senha'>
    </label><br><br>
    <input type="submit" value='Entrar'>
</form>
<br><br>

<h2>É novo por aqui? Não tem problema, crie uma conta:</h2>
<form action="controller/creation.php" method='POST'>
    <label>
        Digite seu Nome:
        <input type="text" name='nome'>
    </label><br><br>
    <label>
        Digite seu email:
        <input type="email" name='email'>
    </label><br><br>
    <label>
        Senha:
        <input type="password" name='senha'>
    </label><br><br>
    <label>
        Digite sua senha novamente:
        <input type="password">
    </label><br><br>
    <input type="submit" value='Criar conta'>
</form>
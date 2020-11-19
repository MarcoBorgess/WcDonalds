<?php
session_start();
include('db.php');

//VERIFICAÇÃO SE USER/SENHA NÃO ESTÃO VAZIOS
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: adm.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT id, usuario FROM wcregistro WHERE usuario = '{$usuario}' AND senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: adm.php#entrar');
    exit();
}

?>
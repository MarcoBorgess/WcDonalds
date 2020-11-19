<?php
    session_start();
    include("db.php");

    $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

    $sql = "SELECT COUNT(*) AS total FROM wcregistro WHERE usuario = '$usuario'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1) {
        $_SESSION['usuario_existe'] = true;
        header('Location: cadastro.php');
        exit;
    }

    $sql = "INSERT INTO wcregistro (usuario, senha, created_at) VALUES ('$usuario', '$senha', NOW())";

    if($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
    }

    $conexao->close();

    header('Location: cadastro.php');
    exit;
    ?>
<?php
    session_start();
    include("db.php");

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $itens = mysqli_real_escape_string($conexao, trim($_POST['itens']));
    $valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));

    $sql = "INSERT INTO wccompra (nome, itens, valor, hora) VALUES ('$nome', '$itens', '$valor', NOW())";

    if($conexao->query($sql) === TRUE) {
        $_SESSION['compra_efetuada'] = true;
    }

    $conexao->close();

    header('Location: cardapio.php');
    exit;
    ?>
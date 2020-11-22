<?php 
    require_once 'cliente.php';

    $objCliente = new Cliente();

    if(isset($_POST['delete_id'])){
        $id = $_POST['delete_id'];
        if($objCliente->delete($id)){
            $objCliente->redirect('painel.php');
        }
    }

    if(isset($_POST['insert'])){
        $nome = $_POST['txtNome'];
        $item = $_POST['txtItem'];
        $valor = $_POST['txtValor'];
        if($objCliente->insert($nome, $item, $valor)){
            $objCliente->redirect('painel.php');
        }
    }

    if(isset($_POST['buy'])){
        $nome = $_POST['txtNome'];
        $item = $_POST['txtItem'];
        $valor = $_POST['txtValor'];
        if($objCliente->buy($nome, $item, $valor)){
            $objCliente->redirect('comprado.html');
        }
    }

    if(isset($_POST['editar_id'])){
        $id = $_POST['editar_id'];
        $nome = $_POST['txtNome'];
        $item = $_POST['txtItem'];
        $valor = $_POST['txtValor'];
        if($objCliente->update($nome, $item, $valor, $id)){
            $objCliente->redirect('painel.php');
        }
    }

?>
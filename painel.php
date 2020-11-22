<?php
    require_once 'verifica_login.php';
    require_once 'cliente.php';
    $objCliente = new Cliente();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="https://i.imgur.com/AvbzrNb.png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Cliente</title>
</head>
<body>
    <!-- NAVBAR -->
    <div class="logo">
      <a href="index.html">
        <img src="https://i.imgur.com/LF04JDt.png" alt="WcDonald's" width="90" height="90" class="imglogo">
      </a>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html"> Home </a>    
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cardapio.html"> Cárdapio </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sobre.html"> Sobre </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato.html"> Contato </a>
        </li>  
        <li class="nav-item active">
          <a class="nav-link" href="painel.php"> Adm <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </nav>  
    <!-- BACKGROUND 1 -->
    <div class="bd1">
      <img src="https://d25dk4h1q4vl9b.cloudfront.net/bundles/common/header-home-v2--br.jpg" alt="WcDonald's">
    </div>
    <!-- conteudo -->
    <div class="container" id="painelcss">
        <h2>Olá, <?php echo $_SESSION['usuario']; ?></h2>
        <h2> <a href="logout.php">Sair</a></h2>  
        <p>
            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModalCadastrar">
                <span class="glyphicon glyphicon-plus"></span> Adicionar
            </button>
        </p>    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Item</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "select * from wccompra";
                    $stmt = $objCliente->runQuery($query);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while($rowCliente = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                            <tr>
                                <td><?php echo($rowCliente['nome']); ?></td>
                                <td><?php echo($rowCliente['item']); ?></td>
                                <td><?php echo($rowCliente['valor']); ?></td>
                                <td>
                                    <a href="#">
                                        <span class="fas fa-edit"
                                            data-toggle="modal" data-target="#ModalEditar"
                                            data-clienteid="<?php print $rowCliente['id']; ?>"
                                            data-clientenome="<?php print $rowCliente['nome']; ?>"
                                            data-clienteitem="<?php print $rowCliente['item']; ?>"
                                            data-clientevalor="<?php print $rowCliente['valor']; ?>">
                                        </span>
                                    </a>                               
                                </td>
                                <td>
                                    <a href="#">
                                        <span class="fas fa-trash-alt"
                                            data-toggle="modal" data-target="#ModalDeletar"
                                            data-clienteid="<?php print $rowCliente['id']; ?>"
                                            data-clientenome="<?php print $rowCliente['nome']; ?>">
                                        </span>
                                    </a>                               
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
        <!-- Modal CADASTRAR CLIENTE -->
        <div class="modal fade" id="myModalCadastrar" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cadastrar Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>    
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body -->
                        <form action="ctr_cliente.php" method="POST">
                            <input type="hidden" name="insert" value="1">
                            <div class="form-group">
                                <label for="email">Nome</label>
                                <input type="text" class="form-control" id="nome" name="txtNome">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Item</label>
                                <input type="text" class="form-control" id="item" name="txtItem">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Valor</label>
                                <input type="text" class="form-control" id="valor" name="txtValor">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- Modal CADASTRAR CLIENTE -->

        <!-- Modal DELETAR CLIENTE -->
        <div class="modal fade" id="ModalDeletar" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body -->
                        <form action="ctr_cliente.php" method="POST">
                            <input type="hidden" name="delete_id" value="" id="recipient-id">
                            <div class="form-group">
                                <label for="email">Nome</label>
                                <input type="text" class="form-control" id="recipient-nome" name="txtNome" readonly>
                            </div>
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- Modal DELETAR CLIENTE -->

        <!-- Modal EDITAR CLIENTE -->
        <div class="modal fade" id="ModalEditar" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body -->
                        <form action="ctr_cliente.php" method="POST">
                            <input type="hidden" name="editar_id" value="" id="recipient-id">
                            <div class="form-group">
                                <label for="email">Nome</label>
                                <input type="text" class="form-control" id="recipient-nome" name="txtNome">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Item</label>
                                <input type="text" class="form-control" id="recipient-item" name="txtItem">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Valor</label>
                                <input type="text" class="form-control" id="recipient-valor" name="txtValor">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- Modal EDITAR CLIENTE -->
    </div> <!-- Container -->
    <script>
        $('#ModalDeletar').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var recipientid = button.data('clienteid');
            var recipientnome = button.data('clientenome');

            var modal = $(this)
            modal.find('.modal-title').text('Tem certeza que deseja deletar o cliente '+recipientnome+'?');
            modal.find('#recipient-id').val(recipientid);
            modal.find('#recipient-nome').val(recipientnome);
        })
    </script>
    <script>
        $('#ModalEditar').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget)
                var recipientid = button.data('clienteid');
                var recipientnome = button.data('clientenome');
                var recipientitem = button.data('clienteitem');
                var recipientvalor = button.data('clientevalor');

                var modal = $(this)
                modal.find('.modal-title').text('Editar cliente '+recipientnome);
                modal.find('#recipient-id').val(recipientid);
                modal.find('#recipient-nome').val(recipientnome);
                modal.find('#recipient-item').val(recipientitem);
                modal.find('#recipient-valor').val(recipientvalor);
            })
    </script>
</body>
</html>
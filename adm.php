<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="https://i.imgur.com/AvbzrNb.png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>WcDonald's - Administrativo</title>
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
        <li class="nav-item ">
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
          <a class="nav-link" href="adm.php"> Adm <span class="sr-only">(current)</span> </a>
        </li>
      </ul>
      <!-- CARRINHO --> 
      <a class="nav-link" href="" id="carrinho"> 
        <img src="https://image.flaticon.com/icons/png/512/34/34562.png" alt="" width="24" height="24">
      </a>
    </nav>  
    <!-- BACKGROUND 1 -->
    <div class="bd1">
      <img src="https://d25dk4h1q4vl9b.cloudfront.net/bundles/common/header-home-v2--br.jpg" alt="WcDonald's">
    </div>
    <!-- conteudo -->
    <div class="conteudo"> 
        <h1> LOGIN ADMINISTRATIVO </h1>
        <div class="card-group">
        <form action="login.php" method="POST" id="entrar">
          <?php
            if(isset($_SESSION['nao_autenticado'])):
          ?>
          <div class="alert alert-danger">
            <strong>ERRO:</strong> Usuário ou senha inválidos.
          </div>
          <?php
            endif;
            unset($_SESSION['nao_autenticado']);
          ?>
          <div class="form-group">
            <label for="user">Usuário:</label>
            <input name="usuario" type="text" class="form-control" placeholder="Seu usuário" autofocus="">
          </div>
          <div class="form-group">
            <label for="pwd">Senha:</label>
            <input name="senha" type="password" class="form-control" placeholder="Sua senha">
          </div>
          <a href="cadastro.php#cadastrar">
            <button type="button" class="btn btn-info" >Cadastrar</button>
          </a>
          <button type="submit" class="btn btn-success">Enviar</button>
        </form>
        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="contato.html" class="sobree"> WcDonalds.com.br</a>
      </div>
    </footer>
  </body>
</html>
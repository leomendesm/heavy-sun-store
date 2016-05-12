<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
 
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
  <a class="waves-effect waves-light btn modal-trigger" href="#modal2">Modal</a>
  <div id="modal1" class="modal">
    <div class="modal-content">
    <h4>
        Cadastro
    </h4>
    <div>
    <form class="col s12" id="formregister">
      <div class="row">
        <div class="input-field col s12">
          <input id="nome" type="text" class="validate" name="nome">
          <label for="nome">Nome Completo</label>
        </div>
      </div>
     <div class="row">
        <div class="input-field col s12 l6">
          <input id="pass" type="password" class="validate" name="senha">
          <label for="pass">Senha</label>
        </div>
        <div class="input-field col s12 l6">
          <input id="cpass" type="password" class="validate" name="csenha">
          <label for="cpass">Confirmar Senha</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="end" type="text" class="validate" name="enderec">
          <label for="end">Endereço</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 l6">
          <input id="cep" type="text" class="validate" name="cep">
          <label for="cep">CEP</label>
        </div>
        <div class="input-field col s12 l6">
          <input id="cpf" type="text" class="validate" name="cpf">
          <label for="cpf">CPF</label>
        </div>
      </div>
    </form>
    </div>
    </div>
    <div class="modal-footer"><a id="submit" class="waves-effect waves-light btn">Confirmar</a>
    </div>
  </div>
 <div id="modal2" class="modal">
    <div class="modal-content">
    <h4>
        Login
    </h4>
    <div>
    <form class="col s12">
     <div class="row">
        <div class="input-field col s12">
          <input id="lemail" type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>
      </div>
     <div class="row">
        <div class="input-field col s12">
          <input id="senha" type="password" class="validate" name="senha">
          <label for="password">Senha</label>
        </div>
      </div> 
      <div class="row">
        <div class="input-field col s12">
            <p>
                <input type="checkbox" id="test6" name="remember" />
                <label for="test6">Lembrar-se</label>
            </p>
        </div></div>   
    </form>
    </div>
    </div>
    <div class="modal-footer">
     <a class="waves-effect waves-light btn">Confirmar</a>
      <a href="#!" class=" modal-action modal-close btn-flat">Cancelar</a>
    </div>
  </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
  <script src="js/init.js"></script>

  </body>
</html>

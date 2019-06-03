<?php 
  require_once("valida_chamado.php");
?>

<?php 

  $calls = [];


  $file = fopen('file.hd', 'r');

   while(!feof($file)){
    $register = fgets($file);
    $calls[] = $register;
   }
    fclose($file);    
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

            <?foreach($calls as $call){?>

            <?php
              $data_calls = explode('&', $call);

              //aparição dos pedidos segundo o tipo de usuario adm/user
              if ($_SESSION['id_profile'] == 2){
                  if($_SESSION['id'] != $data_calls[0]){
                    continue; //pula os dados que não cumprirem a condição, nao mostrando eles na tela
                  }
              }

              if (count($data_calls) < 3){
                continue;
              }

            ?>
              
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title textCase"><?=$data_calls[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted textCase"><?=$data_calls[2]?></h6>
                  <p class="card-text textCase"><?=$data_calls[3]?></p>

                </div>
              </div>

            <?}?>

              <div class="row mt-5">
                <div class="col-6">
                <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
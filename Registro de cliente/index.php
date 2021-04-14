<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
  <div id="contenedor-principal">
    <form action="registrocliente.php" method="post">
      <div id="contenedor-texto">
        <div id="fecha">
          <p id="fecha-sol">Registro de Cliente<br></p>
        </div>
        <div class="boxes">
          <p>Datos del Cliente </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde">
                <p>Nombre:</p>
              </div>
              <div class="col borde">
                <input type="text" name="nombrecliente" required 
                value="<?php if(isset($_SESSION['nombrecliente'])) echo $_SESSION['nombrecliente']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Empresa:</p>
              </div>
              <div class="col borde">
                <input type="text" name="empresa" 
                value="<?php if(isset($_SESSION['empresa'])) echo $_SESSION['empresa']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde ">
                <p>Dirección:</p>
              </div>
              <div class="col borde">
                <input type="text" name="calle"
                value="<?php if(isset($_SESSION['calle'])) echo $_SESSION['calle']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Correo:</p>
              </div>
              <div class="col borde">
                <input type="text" name="correo"
                value="<?php if(isset($_SESSION['correo'])) echo $_SESSION['correo']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Teléfono:</p>
              </div>
              <div class="col borde">
                <input type="text" name="tel"
                value="<?php if(isset($_SESSION['tel'])) echo $_SESSION['tel']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde ">
                <p>RFC:</p>
              </div>
              <div class="col borde">
                <input type="text" name="rfc"
                value="<?php if(isset($_SESSION['rfc'])) echo $_SESSION['rfc']?>">
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-2 borde">
                <p>Saldo Inicial:</p>
              </div>
              <div class="col borde">
                <input type="text" name="saldo" required
                value="<?php if(isset($_SESSION['saldo'])) echo $_SESSION['saldo']?>">
              </div>
            </div>
          </div>
        </div>
        <button type="submit" >Registrar</button>
      </div>
      
    </form>
  </div>
</body>
</html>

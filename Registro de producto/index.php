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
    <form action="registroproducto.php" method="post" enctype="multipart/form-data">
      <div id="contenedor-texto">
        <div id="fecha">
          <p id="fecha-sol">Registro de Producto<br></p>
        </div>
        <div class="boxes">
          <p>Datos del Producto </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde">
                <p>Nombre:</p>
              </div>
              <div class="col borde">
                <input type="text" name="nombre" required 
                value="<?php if(isset($_SESSION['nombre'])) echo $_SESSION['nombre']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Descripción:</p>
              </div>
              <div class="col borde">
                <input type="text" name="desc" required 
                value="<?php if(isset($_SESSION['desc'])) echo $_SESSION['desc']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Imagen:</p>
              </div>
              <div class="col borde salto">
                <input type="file" name="img" required
                value="<?php if(isset($_SESSION['img'])) echo $_SESSION['img']?>">
              </div>
            </div>
          </div>
          <p>Cantidades Iniciales </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde salto">
                <p>Bodega:</p>
              </div>
              <div class="col borde">
                <input type="text" name="inv_bod" required
                value="<?php if(isset($_SESSION['inv_bod'])) echo $_SESSION['inv_bod']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde salto">
                <p>Almacén:</p>
              </div>
              <div class="col borde">
                <input type="text" name="inv_al" required
                value="<?php if(isset($_SESSION['inv_al'])) echo $_SESSION['inv_al']?>">
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

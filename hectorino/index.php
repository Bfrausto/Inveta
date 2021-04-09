<?php
    session_start();
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : false;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clase de DIVs</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }
        body {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        }
        #contenedor-superior {
            height: 43vh;
            background-color: #333333;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        #contenedor-superior img {
            width: 192px;
            height: auto;
        }
        #contenedor-superior h1 {
            color: white;
            font-size: 35px;
            letter-spacing: 5.25px;
            font-variant: small-caps;
            font-weight: normal;
            margin: 15px 0px;
        }
        #contenedor-superior h2 {
            color: #ec8013;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            font-size: 24px;
            font-weight: normal;
        }
        #contenedor-inferior {
            height: calc(100vh - 43vh);
            background-color: white;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-direction: column;
        }
        #formulario {
            height: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-direction: column;
        }
        #formulario .mini-contenedor {
            max-width: 380px;
            width: 100%;
            padding: 30px;
            text-align: center;
        }
        #formulario .titulo-formulario {
            background-color: #ec8013;
            text-align: center;
            font-size: 20px;
            font-variant: small-caps;
            color: black;
            border-radius: 5px;
            padding: 10px 0px;
        }
        #formulario .campo {
            width: calc(100% - 24px - 40px);
            padding: 8px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            color: #555;
            margin: 20px;
            border-radius: 5px;
        }
        #formulario .campo-error {
            border: 1px solid red;
            box-shadow: 0 0px 8px red;
        }
        #formulario .texto-error {
            color: red;
        }
        #formulario .button {
            background-color: #ec8013;
            border: none;
            text-align: center;
            font-weight: lighter;
            color: rgba(0, 0, 0, 0.8);
            border-radius: 5px;
            font-size: 14px;
            padding: 6px 12px;
            margin-top: 50px;
            transition: all 0.5s;
        }
        #formulario input:focus {
            border: 1px solid #ec8013;
            outline: 0;
            box-shadow: 0 0px 8px rgb(227 105 34);
        }
        #formulario .button:hover {
            cursor: pointer;
            background-color: rgba(0,0,0,0.7);
            color: #fff;
        }

        #div-password {
            display: none;
        }

        @media only screen and (max-width: 1500px) {
            #contenedor-superior img {
                width: 100px;
            }
        }
    </style>
</head>
<body>
    <div id="contenedor-superior">
        <img src="logo.png">
        <h1>Tecnológico Nacional de México</h1>
        <h2><?php echo isset($_SESSION['name']) ? 
            'Bienvenido '.$_SESSION['name'] : "Instituto Tecnológico de Querétaro"; ?></h2>
    </div>
    <div id="contenedor-inferior">
        <form id="formulario" action="validacion.php" method="post">
            <div id="div-numcontrol" class="mini-contenedor">
                <p class="titulo-formulario">Número de Control</p>
                <input value="17142041" id="input-numcontrol" class="campo <?php echo $error ? 'campo-error' : ''; ?>" type="text" name="ncontrol"
                    placeholder="Introduce tu número de control">
                <?php
                    if ($error) {
                        echo '<p class="texto-error">Datos de inicio de sesión incorrectos</p>';
                    }
                ?>
                <button id="button-numcontrol" class="button">Entrar</button>
            </div>
            <div id="div-password" class="mini-contenedor">
                <p class="titulo-formulario">Contraseña</p>
                <input value="1111" id="input-password" class="campo" type="password" name="password"
                    placeholder="Introduce tu contraseña">
                <input id="button-password" type="submit" class="button" value="Entrar">
            </div>
        </form>
    </div>
</body>
<script>
    document.getElementById('button-numcontrol').addEventListener('click', function (e) {
        e.preventDefault()
        document.getElementById('div-numcontrol').style.display = 'none'
        document.getElementById('div-password').style.display = 'block'
    })

    document.getElementById('input-numcontrol').addEventListener('keyup', function (e) {
        document.getElementById('input-numcontrol').classList.remove('campo-error')
        let textosError = document.getElementsByClassName('texto-error')
        for (let i = 0; i < textosError.length; i++) {
            const element = textosError[i];
            element.remove()
        }
    })
</script>
</html>
<?php
    $_SESSION['error'] = false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3fd1b9fc4b.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="media/favicon.ico" >
</head>
<body>
    <form action="validar.php" method="post">
        <div id="container">
        <img src="media/logo.png">
        <p style="font-size:20px; font-weight:bold; padding-top:30px; color:red">Usuario o contraseña inválidos.</p>
            <div id="inputs">
                <div id="usuario">
                    <input type="text" placeholder="Usuario" name="usuario"> 
                </div>
                <div id="pass">
                    <input type="password" placeholder="Password" name="password">
                </div>
            </div>
            <div id = "singin">
                <button type="submit" style="margin-bottom:80px">Sign In</button>
            </div>
        </div>
    </form>
</body>
</html>
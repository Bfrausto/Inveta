<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="media/favicon.ico" >
</head>
<body>
    <form action="validar.php" method="post">
        <div id="container">
            <img src="media/logo.png">
            <div id="inputs">
                <div id="usuario">
                    <input type="text" placeholder="Usuario" name="usuario"> 
                </div>
                <div id="pass">
                    <input type="password" placeholder="Password" name="password">
                </div>
            </div>
            <div id = "singin">
                <button type="submit" >Sign In</button>
            </div>
        </div>
    </form>
</body>
</html>
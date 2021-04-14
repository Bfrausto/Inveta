<?php
    session_start();
    // $usuario = $_POST["usuario"];
    $cliente = $_POST["nombrecliente"];
    $saldo = $_POST["saldo"];
    $empresa=$_POST["empresa"];
    $calle=$_POST["calle"];
    $correo=$_POST["correo"];
    $tel=$_POST["tel"];
    $rfc=$_POST["rfc"];
    

    $dbservername = "localhost";
    $dbusername = "inveta";
    $dbpassword = "root";
    $dbname = "inveta";

    // Create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    // Check connection

    if (!$conn->connect_error) {
        $sql = "INSERT INTO clientes(nombre,saldo,empresa,calle,correo,tel,rfc)
                values('$cliente',$saldo,'$empresa','$calle','$correo','$tel','$rfc');";
        if($conn->query($sql) === TRUE){
            echo "
            <script>
                alert('Cliente registrado corrrectamente');
            </script>";
            $_SESSION = array();
            include('home.php');

        }
        else{
            echo "<script>
                    alert('Ocurrió un error. Favor de revisar los datos');
                  </script>";
            $_SESSION["nombrecliente"] =$cliente;
            $_SESSION["saldo"] =$saldo;
            $_SESSION["empresa"] =$empresa;
            $_SESSION["calle"] =$calle;
            $_SESSION["correo"] =$correo;
            $_SESSION["tel"] =$tel;
            $_SESSION["rfc"] =$rfc;
            include('index.php');

        }
    }
    $conn->close();
?>
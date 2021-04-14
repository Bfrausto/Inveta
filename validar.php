<?php
    session_start();
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $dbservername = "localhost";
    $dbusername = "inveta";
    $dbpassword = "root";
    $dbname = "inveta";

    // Create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    // Check connection

    if (!$conn->connect_error) {
        $sql = "SELECT usuario, pass
                    FROM users
                 WHERE usuario = '$usuario'
                    AND pass = '$password'";
        $result = $conn->query($sql);
        if($result->num_rows){
            include('home.php');
        }
        else{
            include('bad.php');

        }
    }
    $conn->close();
?>

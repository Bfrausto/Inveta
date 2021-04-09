<?php
session_start();

$ncontrol = $_POST["ncontrol"];
$password = $_POST["password"];

$dbserver = "localhost";
$dbusername = "sii_app";
$dbpass = "root";
$dbname = "sii";

$check = true;

// Create connection
$conn = new mysqli($dbserver, $dbusername, $dbpass, $dbname);

// Check connection
if (!$conn->connect_error) {
    $sql = "SELECT id, nombre, no_ctrl, email
                FROM alumnos
             WHERE no_ctrl = '$ncontrol'
                AND pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["error"] = false;
        $_SESSION["username"] = $row["no_ctrl"];
        $_SESSION["name"] = $row["nombre"];
        $_SESSION["email"] = $row["email"];
        header('Location: '.$_SERVER["HTTP_REFERER"]);
        $check = false;
    }
}

if ($check && isset($_SERVER["HTTP_REFERER"])) {
    $_SESSION["error"] = true;
    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else {
    echo  'Ocurrió un error';
}
$conn->close();
?>
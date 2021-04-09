<?php 
session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$vPassword = $_POST["vPassword"];
$description = $_POST["description"];
$img = $_POST["avatar"];

$dbservername = "localhost";
$dbusername = "form_user";
$dbpassword = "root";
$dbname = "form";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

$check = false;

function error() {
    $check = true;
    if ($check && isset($_SERVER["HTTP_REFERER"])) {
        $_SESSION["error"] = true;
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo  'Ocurrió un error';
    }
}

$target_dir = "photos/";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["avatar"]["size"] > 20 * 1024 * 1024) {
    error();
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && 
 $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    error();
    $uploadOk = 0;
}

if ($name && $email && $password && $vPassword && $description) {
    if ($password != $vPassword) {
        error();
    } else {
        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                if (!$conn->connect_error) {
                    $sql = "SELECT * 
                                FROM users
                             WHERE email = '$email'";
                    
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $sql = "UPDATE users 
                                SET name = '$name', email = '$email', description = '$description',
                                    password = '$password', image = '$target_file'
                                WHERE email = '$email'";
                    } else {
                        $sql = "INSERT INTO users(name, email, password, description, image)
                                    VALUES('$name', '$email', '$password', '$description', '$target_file')";
                    }
                    
                    if ($conn->query($sql) === true) {
                        $_SESSION["name"] = $name;
                        $_SESSION["email"] = $email;
                        $_SESSION["description"] = $description;
                        $_SESSION["image"] = $target_file;
                        header("Location: http://localhost/proyectoformulario/home.php");
                    } else {
                        error();
                    }
                } else {
                    error();
                }
            } else {
                error();
            }
        }
    }
} else {
    error();
}

$conn->close();

?>
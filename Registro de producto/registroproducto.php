<?php
    session_start();
    // $usuario = $_POST["usuario"];
    $nombre = $_POST["nombre"];
    $desc = $_POST["desc"];
    $inv_bod=$_POST["inv_bod"];
    $inv_al=$_POST["inv_al"];
    // $img=$_POST["img"];
    

    $dbservername = "localhost";
    $dbusername = "inveta";
    $dbpassword = "root";
    $dbname = "inveta";
    //image 
    //echo $_FILES["img"]["name"];
    $directory = "uploads/";
    $file=$directory.basename($_FILES["img"]["name"]);
    $filetype=strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $uploadOk = 1;
    $size=getimagesize($_FILES["img"]["tmp_name"]);
    $img_size=$_FILES["img"]["size"];
    // Create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if(true){
        if ($size) {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $file)) {
                if (!$conn->connect_error) {
                    $sql = "INSERT INTO products(name,des,inv_bod,inv_al,img)
                            values('$nombre','$desc',$inv_bod,$inv_al,'$file');";
                    if($conn->query($sql) === TRUE){
                        echo "
                        <script>
                            alert('Producto registrado corrrectamente');
                        </script>";
                        $_SESSION = array();
                        include('home.php');
                        // header("Location: http://localhost/proyectoformulario/home.php");
                    }
                    else{
                        echo "<script>
                                alert('Ocurrió un error. Favor de revisar los datos');
                                </script>";
                        $_SESSION["nombre"] =$nombre;
                        $_SESSION["desc"] =$desc;
                        $_SESSION["inv_bod"] =$inv_bod;
                        $_SESSION["inv_al"] =$inv_al;
                        $_SESSION["img"] =$file;
                        include('index.php');
    
                    }
                }
            } 
        }else{
            echo "<script>
            alert('El archivo no es una imagen');
            </script>";
            $_SESSION["nombre"] =$nombre;
            $_SESSION["desc"] =$desc;
            $_SESSION["inv_bod"] =$inv_bod;
            $_SESSION["inv_al"] =$inv_al;
            $_SESSION["img"] =$file;
            include('index.php');
        }
    }else{
        echo "<script>
            alert('El archivo es demasiado grande');
            </script>";
            $_SESSION["nombre"] =$nombre;
            $_SESSION["desc"] =$desc;
            $_SESSION["inv_bod"] =$inv_bod;
            $_SESSION["inv_al"] =$inv_al;
            $_SESSION["img"] =$file;
            include('index.php');
    }
    
        
    $conn->close();
?>
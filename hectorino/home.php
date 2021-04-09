<?php 
    session_start();

    $dbservername = "localhost";
    $dbusername = "inveta";
    $dbpassword = "root";
    $dbname = "inveta";

    // Create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    $cards = [];

    if (!$conn->connect_error) {
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($cards, $row);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6b259f39e8.js" 
        crossorigin="anonymous"></script>
</head>
<body>
<div class="background-container"
    style="flex-wrap: wrap">
    <?php
        foreach ($cards as $key => $card) { 
    ?>
            <div class="card card-type-2">
                <div class="card-header" 
                    style="background-image: url('<?php echo $card['image'] ?>');">
                    <div class="card-state-container">
                        <p class="card-state">
                            <i class="fas fa-headphones"></i>
                            Focusing
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="card-title">
                        <?php echo $card['name'] ?>
                    </h1>
                    <p class="card-description">
                        <?php echo $card['description'] ?>
                    </p>
                    <p class="card-extras">
                        <i class="fas fa-envelope"></i>
                        <?php echo $card['email'] ?>
                    </p>
                </div>
            </div>
    <?php 
        }
    ?>
</body>
</html>
<?php

    session_start();

    if (!isset($_SESSION["user"])){
        header("Location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANEL użytkownika</title>
</head>
<body>
    <h2>Witaj, <?= htmlspecialchars($_SESSION["user"]) ?>!</h2>
    <p>Panel użytkownika</p>
    <a href="logout.php">Wyloguj się</a>
    
</body>
</html>


    <!-- // echo $_SESSION["login"]."<br>";
    // echo session_id();
    // session_regenerate_id();
    // echo "<br>".session_id();
    // session_destroy();
    // unset($_SESSION["login"]);
    // echo $_SESSION["login"]."<br>"; -->

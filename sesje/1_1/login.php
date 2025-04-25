
<?php
    session_start();

    if (isset($_SESSION["user"])){
        header("Location: dashboard.php");
        exit();
    }

    $error = null;

    $credentials = require 'credentials.php';
    $storedUsername = $credentials["username"];
    $storedPasswordHash = $credentials["password_hash"];

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $inputUserName = $_POST["username"] ?? "";
        $imputPassword = $_POST["password"] ?? "";

        if($inputUserName === $storedUsername && password_verify($imputPassword, $storedPasswordHash)){          
            $_SESSION["user"] = $inputUserName;
            header("Location: dashboard.php");
            exit();
    
        }else{
            $error = "nieprawidłowe dane logowania";
        }
        
    }

    // $user = "admin";
    // $password = "haslo123";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <h2>Zaloguj się</h2>
    <?php if($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error); ?>test</p>
        <?php endif; ?>
    

    <form action="login.php" method = "post">
        <label >Login: <input type="text" name= "user" required></label><br>
        <label >Login: <input type="password" name= "password" required></label><br>
        <button typy = "submit">Zaloguj sie</button>


    </form>

</body>
</html>
  
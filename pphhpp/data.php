<?php
    /*
    echo "<pre>";
        var_dump($_GET);
    echo "<pre>";

    echo "<hr>";
    echo "<pre>";
        print_r($_GET);
    echo "<pre>";

    */

    // echo "<pre>";
    //     print_r($_SERVER);
    // echo "</pre>"

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $name = htmlspecialchars($_GET['name']);
        $email = htmlspecialchars($_GET['email']);
        $message = htmlspecialchars($_GET['message']);

    //    echo $name;

    echo <<< DATA
    <h2>Dane pobrane z formularza:</h2>
    <p><strong>Imię:</strong>$name</p>
    <p><strong>email:</strong>$email</p>
    <p><strong>message:</strong>$message</p>

DATA;
    }else{
        echo "Formularz nie został";
        echo '<br><a href="form.html">Wróć</a>';
    }

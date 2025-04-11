
    <!-- /*
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
    // echo "</pre>" -->
    <?php

    function validatePhoneNumber($phone){
        return preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/', $phone);
    }

    function validateEmial($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function isAdult($birthdate){
        $birth = new DateTime($birthdate);
        $today = new DateTime();
        $age = $today->diff($birth)->y;
        return $age >= 18;
    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $name = htmlspecialchars(trim($_GET['name']));
        $email = htmlspecialchars(trim($_GET['email']));
        $phone = htmlspecialchars(trim($_GET['phone']));
        $birthdate = htmlspecialchars($_GET['birthdate']);

        $subject = htmlspecialchars(trim($_GET['subject']));

        $message = htmlspecialchars(trim($_GET['message']));
        $contact_preference = htmlspecialchars(trim($_GET['contact_preference']));

        $errors = [];

        if(!validatePhoneNumber($phone)) {
            $errors[] = "Numer telefonu musi być w formacie 123-456-789";
        }

        if(!validateEmial($email)) {
            $errors[] = "Niepoprawny format adresu email";
        }

     
        if(!isAdult($birthdate)){
            $errors[] = "musisz mieć conajmniej 18 lat";
        }

    

        if(empty($message)){
            $errors[] = "Wiadomość nie może być pusta";
        }

        if(count($errors)){
            echo "<h2>Wystąpiły błędy</h2>";
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        } else {

            echo <<< DATA
            <h2>Dane pobrane z formularza:</h2>
            <p><strong>Imię:</strong>$name</p>
            <p><strong>email:</strong>$email</p>
            <p><strong>telefon:</strong>$phone</p>
            <p><strong>Temat wiadomości:</strong>$subject</p>
            <p><strong>Preferencje kontaktu:</strong>$contact_preference</p>

            <p><strong>message:</strong>$message</p>
            <br><a href="form.html">Wróć</a>;
        DATA;
        }

    //    echo $name;


    }else{
        echo "Formularz nie został";
        echo '<br><a href="form.html">Wróć</a>';
    }

    echo "<hr>";
    echo "<pre>";
        print_r($_GET);
    echo "<pre>";
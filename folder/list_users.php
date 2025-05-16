<?php
    require_once 'db_connect.php';

    $sql = "SELECT * from `users`;";
    $result = $mysqli->query($sql);

    if($result->num_rows > 0){
        echo "<h2>Lista użytkowników</h2>";
        echo "<table border='1'><tr><th>ID</th><th>Imię</th><th>Email</th><th>Data urodzenia</th><th>płeć</th><th>Opis</th><th>Utworzono</th></tr>";
        while ($row = $result->fetch_object()){
            echo"<tr>";
            echo"<td>$row->id";
            echo"<td>$row->name";
            echo"<td>$row->email";
            echo"<td>$row->birth_date";
            echo"<td>$row->gender";
            echo"<td>$row->description";
            echo"<td>$row->created_at";


            echo"</tr>";            
        }

    }else{
        echo "Brak danych";

    }

    $mysqli->close();
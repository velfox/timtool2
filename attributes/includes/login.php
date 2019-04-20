<?php
session_start();

if(isset($_SESSION['user'])){
    exit(header("Location: /index.php"));
}

if (isset($_POST['submit'])) {
    require_once "./attributes/includes/db.php";
    $wachtwoord = mysqli_escape_string($db, $_POST['wachtwoord']);
    $gebruikersnaamps = mysqli_escape_string($db, $_POST['gebruikersnaam']);

    if ($gebruikersnaamps == "") {
        $errors[] = 'gebruikersnaam mag niet leeg zijn.';
    }
    if ($wachtwoord == "") {
        $errors[] = 'wachtwoord mag niet leeg zijn.';
    }

    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE username='$gebruikersnaamps'";
        $gebruikersnaam = $db->query($sql);

        if ($gebruikersnaam->num_rows > 0) {
            // output data of each row
            while($row = $gebruikersnaam->fetch_assoc()) {
                $password = $row["password"];
                $id = $row["id"];
            }
            if (password_verify( $wachtwoord, $password)) {
                $_SESSION['user'] = $gebruikersnaamps;
                $_SESSION['id'] = $id;
                $_SESSION['time_start_login'] = time();
                exit(header("Location: /index.php"));
            } else {
                $errors[] = 'wachtwoord gegevens klopppen niet.';
            }
        } else {
            $errors[] = 'gb naam gegevens klopppen niet.';
        }

    }
} 



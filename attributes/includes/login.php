<?php
session_start();

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
            } else {
                $errors[] = 'wachtwoord gegevens klopppen niet.';
            }
        } else {
            $errors[] = 'gb naam gegevens klopppen niet.';
        }

    }
} 

if(isset($_SESSION['user'])){
    header("location: index.php");

?>
    <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
    <input type="submit" name="loguit" value="loguit"/>
    </form>

  <?php
} else {
?>
 <?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

 <section class="loginform">
    <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
        <label for="uname"><b> gebruikersnaam </b></label>
        <input type="text" placeholder="Enter Username" name="gebruikersnaam" required>

        <label for="psw"><b> wachtwoord </b></label>
        <input type="password" placeholder="Enter Password" name="wachtwoord" required>

        <input type="submit" name="submit" value="Save"/>
    </div>
  </form>
 </section>

 <?php }?>

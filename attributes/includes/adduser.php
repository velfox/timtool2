<?php
session_start();
?>

<?php
// if(!isset($_SESSION['user'])){
//     header("location: admin.php");
// } else {
//     if (isset($_POST['loguit'])) { 
//         unset($_SESSION["user"]);
//         session_destroy($_SESSION["user"]); 
//         header("location: admin.php");
//         session_destroy($_SESSION['time_start_login']);
//     }

if (isset($_POST['submit'])) {
    require_once "./attributes/includes/db.php";
    $wachtwoord = mysqli_escape_string($db, $_POST['wachtwoord']);
    $gebruikersnaam = mysqli_escape_string($db, $_POST['gebruikersnaam']);

    if ($gebruikersnaam == "") {
        $errors[] = 'gebruikersnaam mag niet leeg zijn.';
    }
    if ($wachtwoord == "") {
        $errors[] = 'wachtwoord mag niet leeg zijn.';
    }

    if (empty($errors)) {
        $passwordhas = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES ('$gebruikersnaam', '$passwordhas')";
        $result = mysqli_query($db, $query);


    }
}  else {
    $errors[] = 'geensubmit.';
}



echo 'hoi.';

if(isset($result)){
    echo 'Gebruiker toegevoegd.';
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

 <?php }  ?>

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
    $wachtwoord = mysqli_escape_string($db, $_POST['name']);
    $img = mysqli_escape_string($db, $_POST['img']);
    $beschrijfing = mysqli_escape_string($db, $_POST['beschrijfing']);
    $user_id = mysqli_escape_string($db, $_POST['gebruikersnaam']);

    if ($gebruikersnaam == "") {
        $errors[] = 'gebruikersnaam mag niet leeg zijn.';
    }
    if ($wachtwoord == "") {
        $errors[] = 'wachtwoord mag niet leeg zijn.';
    }

    if (empty($errors)) {
        $query = "INSERT INTO opdrachtgevers (name, img, beschrijfing) VALUES ('$gebruikersnaam', '$img', '$beschrijfing')";
        $result = mysqli_query($db, $query);

        $query = "INSERT INTO opdrachtgevers_users (opdrachgever_id, user_id) VALUES ('$user_id', '$user_id')";
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
            
        <label for="psw"><b> logo </b></label>
        <input type="file" name="Logo Opdrachtgever" id="fileToUpload">


        <input type="submit" name="submit" value="Save"/>
    </div>
  </form>
 </section>

 <?php }  ?>

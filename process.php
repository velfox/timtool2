<?php
  session_start();
  if(isset($_SESSION['user'])){

  require_once "./attributes/includes/db.php";

  echo 'Processing... add user ';

  // Check for POST variable
  if(isset($_POST['name'])){
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $tijd = mysqli_real_escape_string($db, $_POST['time']);
    $ntijd = preg_replace('/\s+/', '', $tijd);
    $disk = mysqli_real_escape_string($db, $_POST['disk']);
    $userid = mysqli_real_escape_string($db, $_SESSION["id"]);
    $opdrachtgeverid = mysqli_real_escape_string($db, $_POST['opdrachtgeverid']);
    $query = "INSERT INTO besteding(nameopd, bestede_tijd, discription, user_id, opdrachtgever_id) VALUES('$name', '$ntijd', '$disk', '$userid' ,'$opdrachtgeverid')";

    if(mysqli_query($db, $query)){
      echo 'User Added...';
    } else {
      echo 'ERROR: '. mysqli_error($db);
    }
  }
}
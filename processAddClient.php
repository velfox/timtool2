<?php
session_start();
if(isset($_SESSION['user'])){

require_once "./attributes/includes/db.php";

echo 'Processing... add user ';

// Check for POST variable
if(isset($_POST['demoboxNameWaarden'])){
  $demoboxNameWaarden = mysqli_real_escape_string($db, $_POST['demoboxNameWaarden']);
  $demoboxBerschijfingWaarden = mysqli_real_escape_string($db, $_POST['demoboxBerschijfingWaarden']);
  $demoboxImgWaarden = mysqli_real_escape_string($db, $_POST['demoboxImgWaarden']);
  $userid = mysqli_real_escape_string($db, $_SESSION["id"]);
  $query = "INSERT INTO opdrachtgevers(name, img, beschijfing) VALUES('$demoboxNameWaarden', '$demoboxImgWaarden', '$demoboxBerschijfingWaarden')";

  if(mysqli_query($db, $query)){
    echo 'opdrachtgever Added...';
    $last_id = mysqli_insert_id($db);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    $query = "INSERT INTO opdrachtgevers_users(opdrachgever_id, user_id) VALUES('$last_id', '$userid')";
    if(mysqli_query($db, $query)){
      echo 'opdrachtgever user Added...';

      
    } else {
      echo 'ERROR: '. mysqli_error($db);
    }
  } else {
    echo 'ERROR: '. mysqli_error($db);
  }
}

}

<?php
session_start();

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'timetool');

echo 'Processing... ';

// Check for POST variable
if(isset($_POST['demoboxNameWaarden'])){
  $demoboxNameWaarden = mysqli_real_escape_string($conn, $_POST['demoboxNameWaarden']);
  $demoboxBerschijfingWaarden = mysqli_real_escape_string($conn, $_POST['demoboxBerschijfingWaarden']);
  $demoboxImgWaarden = mysqli_real_escape_string($conn, $_POST['demoboxImgWaarden']);
  $userid = mysqli_real_escape_string($conn, $_SESSION["id"]);
  $query = "INSERT INTO opdrachtgevers(name, img, beschijfing) VALUES('$demoboxNameWaarden', '$demoboxImgWaarden', '$demoboxBerschijfingWaarden')";

  if(mysqli_query($conn, $query)){
    echo 'opdrachtgever Added...';
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    $query = "INSERT INTO opdrachtgevers_users(opdrachgever_id, user_id) VALUES('$last_id', '$userid')";
    if(mysqli_query($conn, $query)){
      echo 'opdrachtgever user Added...';

      
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}

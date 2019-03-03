<?php

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'timetool');

echo 'Processing... ';

// Check for POST variable
if(isset($_POST['name'])){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $tijd = mysqli_real_escape_string($conn, $_POST['time']);
  $ntijd = preg_replace('/\s+/', '', $tijd);
  $disk = mysqli_real_escape_string($conn, $_POST['disk']);
  $userid = mysqli_real_escape_string($conn, $_POST['userid']);
  $opdrachtgeverid = mysqli_real_escape_string($conn, $_POST['opdrachtgeverid']);
  $query = "INSERT INTO besteding(nameopd, bestede_tijd, discription, user_id, opdrachtgever_id) VALUES('$name', '$ntijd', '$disk', '$userid' ,'$opdrachtgeverid')";

  if(mysqli_query($conn, $query)){
    echo 'User Added...';
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}

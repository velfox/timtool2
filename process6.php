<?php
session_start();

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'timetool');

echo 'Processing... ';

// Check for POST variable
if(isset($_POST['removeid'])){
  $userid = mysqli_real_escape_string($conn, $_POST['removeid']);
  $query = "DELETE FROM opdrachtgevers WHERE id = $userid";

  if(mysqli_query($conn, $query)){
    $query = "DELETE FROM opdrachtgevers_users WHERE opdrachgever_id = $userid";
    if(mysqli_query($conn, $query)){
      echo 'opdrachtgever user deleted...';      
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}

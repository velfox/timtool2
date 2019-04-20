<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location: login.php");
} else {
    if (isset($_POST['loguit'])) { 
        unset($_SESSION["user"]);
        session_destroy($_SESSION["user"]); 
        header("location: login.php");
        session_destroy($_SESSION['time_start_login']);
    }
}

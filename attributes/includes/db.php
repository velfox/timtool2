<?php 
$host     = 'localhost';
$username = 'root';
$password = '';
$database = 'timetool';

//stap 1 verbinding maken met de database
$db = mysqli_connect($host, $username, $password, $database) or die('error '. mysqli_connect_error()); //stap 2 test verbinding or die
<?php
session_start();
unset($_SESSION["user"]);
session_destroy($_SESSION["user"]); 
session_destroy($_SESSION['time_start_login']);
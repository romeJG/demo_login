<?php
// to log out, the session would be first started in this backend page 
session_start();
// the session values would be then cleared 
session_unset();
// once data is cleared, the session would be destroyed or terminated 
session_destroy();
// return to login page 
header('Location: ../pages/index.php');
exit();

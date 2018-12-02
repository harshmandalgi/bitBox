<?php
session_start();
session_destroy();
header('location:http://localhost/filezapp/phpfinal/index.php');
?>
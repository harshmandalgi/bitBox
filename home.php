<?php
session_start();
if ($_SESSION['username'] == "")
{
    header('location:http://localhost//oslab_phpex1/index.php');
} 
?>
<html>
<head>
</head>
<body>
<h2>hello,welcome<?php echo $_SESSION['username'];?></h2>
<a href="logout.php">logout</a>
</body>
</html>
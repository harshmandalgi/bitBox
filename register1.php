<?php
$username=$_POST['username'];
$password=$_POST['password'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"oslab_phpex1");
$q="select * from userlogin where username='$username'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)	
{   

    header('location:http://localhost/bitBox/register2.php?u=e');
    $_SESSION['check']="valid";
}
else
{
    $q="insert into `userlogin`(`username`, `password`) values ('$username','$password')"; 
    $result=mysqli_query($con,$q);
    if($result)
    {
        header('location:http://localhost/bitBox/index.php?u=a');
    }  
    else{

    }  
}
?>

<?php
session_start();
$username=$_SESSION['username'];

$users=$_POST['names'];
$files1=$_POST['filename_s'];
$formats=$_POST['formats'];

$userarray = explode(',', $users);
$filearray = explode(',', $files1);
$formatarray = explode(',', $formats);
$result=array();

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"oslab_phpex1");


for($i=0; $i<(sizeof($userarray)); $i++)
{
    for($j=0; $j<(sizeof($filearray)); $j++)
    {
        $q="insert into `data` values('".$filearray[$j]."','".$userarray[$i]."','".$formatarray[$j]."','".$username."')";
        $var1=mysqli_query($con,$q);
        array_push($result,$var1);
        
    }
    
}

//checking false values
if(!in_array("true", $result))
{   
    $fail=array();
    for($i=0; $i<sizeof($result); $i++)
    {
        if($result[$i]=="false")
            array_push($fail,$i);
    }
    echo "<script>alert('Some files: ".$fail." not saved. All others were shared successfully.')</script>";
}
else{
    echo "<script>alert('All Files shared successfully!')</script>";
}

	
echo "<script>window.location.replace('http://localhost/bitBox/share.php');</script>";
?>

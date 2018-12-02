
<?php
session_start();
$username=$_SESSION['username'];
$target_dir = "uploads_public/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = true;
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        
        $uploadOk = 0;
    }
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"oslab_phpex1");
$q="insert into `data` values ('".$_FILES["fileToUpload"]['name']."','".$username."','n','-o')";
$result=mysqli_query($con,$q);

if($result)
{
    echo "<script>alert('File saved!')</script>";
    
}
else
{
    echo "<script>alert('File upload Unsuccessfull!')</script>";
    
}	
echo "aaaaa<script>window.location.replace('http://localhost/bitBox/uploadnotes.php');</script>";
?>

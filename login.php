<?php

$server = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($server, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }

$username=$_POST['username']; 
$password=$_POST['password'];


//Prevent SQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password); 

// encrypt password 
$encrypted_password=md5($password);

//SELECT FROM DATABASE
$sql="SELECT * FROM members WHERE username='$username' and password='$password'";

$result=mysql_query($sql);
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("username");
session_register("password"); 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>




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
  header("Location: main.html");
  exit;
 }


$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$email = stripslashes($email);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$encrypt_password=md5($password);







$sql = "INSERT INTO members (name, email, password) 
VALUES('$username', '$email', $encrypt_password')";


if($result = mysqli_query($conn, $sql)){

echo $username;
echo $password;
echo $email;
echo $encrypt_password;
};

echo $username;
echo $password;
echo $email;
echo $encrypt_password;




?>
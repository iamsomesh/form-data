
<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "user_db";
$login_email=$_GET["email"];
$login_password=$_GET["password"];

// Create connection
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT user_name,email,password FROM user_db where email='$login_email' and pass='$login_password'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
//var_dump($row);
if ($row['email']==$login_email && $row['password']==$login_password) {
  // output data of each row
  echo "Hello ".$row['user_name'];
} else {
  echo "0 results";
}
?>
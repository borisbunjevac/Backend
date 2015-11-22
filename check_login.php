<?php
$servername = "localhost";
$username = "bazaUd744";
$password = "Y]:Ua^3C]S]i";
$dbname = "baza";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define $username and $password 
$username=$_POST['name']; 
$password=$_POST['pwd'];

$sql = "SELECT userid, username, password FROM Users WHERE username = '$username' && password = '$password'";
$result = $conn->query($sql);
    $count=mysqli_num_rows($result);
   $row=mysqli_fetch_array($result);

    if ($count==1)
   {
        session_start();       
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location: login_success.html");
       }
   else
   {
        echo "Invalid username or password";
        } 

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>

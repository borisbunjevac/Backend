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

$name = $_POST["name"];
$pwd = $_POST["pwd"];

if(empty($name) || empty($pwd))
{
    echo "You did not fill out the required fields.";
    die();
}
else {

$sql = "SELECT userid, username, password FROM Users WHERE username = '$name'";
$result = $conn->query($sql);
    $count=mysqli_num_rows($result);
   $row=mysqli_fetch_array($result);

    if ($count>=1)
   {
         echo "Username already exists.";
       }
   else
   {
        
        

$sql = "INSERT INTO Users (username, password)
VALUES ('$name','$pwd')";

if ($conn->query($sql) === TRUE) {
     header("location: signedup.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
   }
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

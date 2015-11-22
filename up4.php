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

$bookid = $_POST["bookid"];
$name = $_POST["name"];
$autor = $_POST["autor"];
$published = $_POST["published"];
$language = $_POST["language"];
$original = $_POST["original"];
$sql = "UPDATE Books
SET bookname='$name', autor='$autor', published='$published', language='$language', original='$original' 
 WHERE bookid='$bookid'
";

if ($conn->query($sql) === TRUE) {
    header("location: logout_up.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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

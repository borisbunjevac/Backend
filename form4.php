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

echo "<html>";
echo "<body>";
echo "<div class='container'>";
echo "<h1>Knjige</h1>";
echo "<form action='up4.php' method='post'>";
echo "Knjiga: <select name='bookid'>";

$sql = "SELECT bookid, bookname FROM Books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        unset($regionid,$regioname);
        $bookid = $row['bookid'];
        $bookname = $row['bookname'];
        echo '<option value="' . $bookid . '">' . $bookname . '</option>';
  }
} else {
    echo "0 results";
}

$conn->close();

echo "</select><br><br>";
echo "Naziv:<input type='text' name='name'><br><br>";
echo "Autor:<input type='text' name='autor'><br><br>";
echo "Godina izdavanja:<input type='text' name='published'><br><br>";
echo "Jezik:<input type='text' name='language'><br><br>";
echo "Jezik originala:<input type='text' name='original'><br><br>";
echo "<input type='submit' value='Izmeni'>";
echo "</form>";
echo "<a href='preg.php'>Pregledaj knjige</a><br>";
echo "</div>";
echo "</body>";
echo "</html>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="stilpreg.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>

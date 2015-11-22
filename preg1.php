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
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="stilpreg.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <meta charset="utf-8" />
        <title>Books</title>
    </head>
    <body>
       <div class="container">
          <div class="row">
              <div class="col-xs-12">
        <h1>Knjige</h1>
            
     <table class="table table-striped table-bordered">
     <tr>     
     <th>id</th>
     <th>Naziv Knjige</th>
     <th>Autor</th>
     <th>Godina izdavanja</th>
     <th>Jezik</th>
     <th>Jezik originala</th>
     </tr>
         <?php
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10;
   session_start();
    $year = $_POST["year"];
   if (empty($year)) {
      $year = $_SESSION['year']; 
   } else {
      $year = $_POST["year"]; 
   }   
            
   $_SESSION['year'] = $year;    
   $sql = "SELECT bookid, bookname, autor, published, language, original
    FROM Books
    WHERE published='$year'
    LIMIT $start_from,10
    ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["bookid"]. "</td><td>" . $row["bookname"]. "</td><td>" . $row["autor"]. "</td><td>" . $row["published"]. "</td><td>" . $row["language"] . "</td><td>" . $row["original"] . "</td></tr>";
  }
} else {
    echo "0 results";
}

$sql = "SELECT COUNT(Books.bookid) 
FROM Books
WHERE published='$year'
"; 
$result = $conn->query($sql);
$row=mysqli_fetch_array($result);
$total_records = $row[0];
$total_pages = ceil($total_records / 10); 
  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='preg1.php?page=".$i."'>Strana".$i." </a> "; 
};

$conn->close();
   ?>
     </table>
              </div>
          </div> 
     </div> 
    </body>
</html>

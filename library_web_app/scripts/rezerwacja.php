<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password);
//zapytanie czy login już istnieje
$conn->query("use library");

$userid = $_SESSION['user_id'];
$bookid = $_GET['book_id'];
$sql = "INSERT INTO BORROW(userId,bookId,startingDate,endingDate)
     VALUES ($userid,$bookid,CURDATE(),DATE_ADD(CURDATE(), INTERVAL 14 DAY));";
$conn->query($sql);
$conn->close();
echo '<script>
        alert("Pomyślnie zarezerwowano książkę");
        location="../pages/katalog_ksiazek.php";
        </script>';

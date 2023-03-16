<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
//połączenie z bazą
$conn = new mysqli($servername, $username, $password);
//zapytanie czy login już istnieje
$conn->query("use library");
$login = $_POST['frm_login'];
$pass = $_POST['frm_pass'];
$sql = "SELECT * FROM user WHERE login = '$login' AND password='$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { //jeśli zapytanie coś zwróciło
  //rozpoczęcie sesji
  session_start();
  $_SESSION['user'] = $_POST['frm_login'];
  $row = $result->fetch_row();
  $_SESSION['user_id'] = $row[0];
  //wyczyszczenie tablicy $post
  $_POST = array();
  header("Location: ../pages/strona_tytulowa.php");
} else {
  //wyczyszczenie tablicy $post
  $_POST = array();
  //przekierowanie do logowania
  echo '<script>
        alert("Błędne dane logowania");
        location="../pages/logowanie.html";
        </script>';
  // header("Location: ../pages/logowanie.html");  
}
$conn->close();

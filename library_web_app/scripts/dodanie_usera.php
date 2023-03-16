<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
//połączenie z bazą
$conn = new mysqli($servername, $username, $password);
//zapytanie czy login już istnieje
$conn->query("use library");
$sql = "SELECT * FROM user WHERE login = '" . $_POST['frm_login'] . "'";
$result = mysqli_query($conn, $sql);
// echo($result->num_rows);
if (mysqli_num_rows($result) > 0) { //jeśli zapytanie coś zwróciło
  //wyczyszczenie tablicy $post
  $_POST = array();
  //przekierowanie do tego samego formularza z alertem
  // header("Location: new_user.php");
  echo "rekord istnieje";
} else {
  $user_login = $_POST['frm_login'];
  $user_pass = $_POST['frm_pass'];
  //dodanie do bazy i przekierowanie do strony z logowaniem z odpowiednim komunikatem
  $conn->query("INSERT INTO user (login, password,role)
        VALUES ('$user_login', '$user_pass','user')");
  //wyczyszczenie tablicy $post
  $_POST = array();
  //przekierowanie do logowania
  // header("Location: glowna.php");
  echo "powinienem dodać";
  $conn->close();
}

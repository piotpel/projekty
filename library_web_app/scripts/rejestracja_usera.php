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

if (mysqli_num_rows($result) > 0) { //jeśli zapytanie coś zwróciło
  //wyczyszczenie tablicy $post
  $_POST = array();
  //przekierowanie do tego samego formularza z alertem
  // header("Location: new_user.php");
  echo '<script>
        alert("Ten login jest już w użyciu");
        location="../pages/rejestracja.html";
        </script>';
} else {
  $user_login = $_POST['frm_login'];
  $user_pass = $_POST['frm_pass'];
  //dodanie do bazy i przekierowanie do strony z logowaniem z odpowiednim komunikatem
  $conn->query("INSERT INTO user (login, password,role)
        VALUES ('$user_login', '$user_pass','Standard')");
  //wyczyszczenie tablicy $post
  $_POST = array();
  //przekierowanie do logowania
  echo '<script>
        alert("Zarejestrowano pomyślnie");
        location="../pages/logowanie.html";
        </script>';
}
$conn->close();

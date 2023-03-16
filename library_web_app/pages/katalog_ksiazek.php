<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Katalog książek</title>
  <!-- Import Bootstrapa -->
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/katalog_ksiazek.css">
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->

</head>

<body>
  <div>
    <!-- Pasek nawigacji -->
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a href="strona_tytulowa.php">
          <img class="logo" src="../images/logo_biblioteka.PNG" style="width:19rem; height:5rem;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item navpage">
              <a class="nav-link active" href="strona_tytulowa.php">Aktualności</a>
            </li>
            <li class="nav-item navpage_katalog">
              <a class="nav-link active" href="katalog_ksiazek.php">Katalog książek</a>
            </li>
            <li class="nav-item navpage">
              <a class="nav-link active" href="o_nas.php">O nas</a>
            </li>
            <li class="nav-item navpage">
              <a class="nav-link active" href="kontakt.php">Kontakt</a>
            </li>
            <?php
            session_start();
            if (!isset($_SESSION['user_id'])) {
              echo '<form class="container-fluid justify-content-start navpage_login  navpage_register">
              <a href="logowanie.html">
                <button class="btn btn-outline-danger me-2  navpage" type="button">Logowanie</button>
              </a>
              <a href="rejestracja.html">
                <button class="btn btn-outline-danger me-2  navpage" type="button">Rejestracja</button>
              </a>
            </form>';
            } else {
              echo '<form class="container-fluid justify-content-start navpage_login  navpage_register">
              <a href="../scripts/wylogowanie.php">
                <button class="btn btn-outline-danger me-2  navpage" type="button">Wyloguj</button>
              </a>
            </form>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  </div>
  <div class="col-lg-6 col-md-9 col-sm-12 glowny-kontener">
    <h1>Książki dostępne w bibliotece:</h1>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT B.* FROM Book B LEFT JOIN Borrow BO on B.BookId=BO.BookId
        WHERE CURDATE() not between IFNULL(startingDate,'2000-01-01') AND IFNULL(endingDate,'2000-01-01')";
    $result = $conn->query($sql);
    echo "<table class='styled-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Tytuł</th>";
    echo "<th>Autor</th>";
    echo "<th>Gatunek</th>";
    echo "<th>Wypożycz</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      //id ksiazki
      echo "<td class='bookId'>" . $row["bookId"] . "</td>";
      //autor
      echo "<td class='author'>" . $row["author"] . "</td>";
      //tytul
      echo "<td class='title'>" . $row["title"] . "</td>";
      // gatunek
      echo "<td class-='genre'>" . $row["genre"] . "</td>";
      //przycisk do wypozyczenia
      if (isset($_SESSION['user_id'])) {
        echo "<td><button class=borrow onclick='openForm()'><i class='fas fa-book-open'></i></button></td>";
      } else {
        echo "<td>Musisz być zalogowany żeby <br> 
                      móc rezerwować książki.</td>";
      }
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    $conn->close();
    ?>
  </div>
  <div class="loginPopup">
    <div class="formPopup" id="popupForm">
      <form method=get action=../scripts/rezerwacja.php class="formContainer">
        <h2>Rezerwacja książki</h2>
        <label for="book_author">
          <strong>Autor:</strong>
          <input type="text" id="book_author" name="book_author" readonly>
          <label for="book_title">
            <strong>Tytuł książki:</strong>
            <input type="text" id="book_title" name="book_title" readonly>
            <input type="hidden" id="book_id" name="book_id" readonly>
            <button type="submit" class="btn">Potwierdzenie rezerwacji</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Anuluj rezerwacje</button>
      </form>
    </div>
  </div>
  <!-- Skrypty do otwarcia formularza, ikon i wypożyczenia. -->
  <script src="../scripts/open_close_form.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../scripts/borrow.js" type="text/javascript">
  </script>
  <!-- Footer strony -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Biblioteka czynna</h6>
          <p class="text-justify">Poniedziałek - Piątek 8:00 - 17:00 </br>
            Sobota 8:00 - 12:00</br>
            Niedziela Nieczynne.</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Ważne linki</h6>
          <ul class="footer-links">
            <li><a href="strona_tytulowa.php">Aktualności</a></li>
            <li><a href="katalog_ksiazek.php">Katalog książek</a></li>
            <li><a href="o_nas.php">O nas</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by
            Pelan & Matlak.
          </p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>
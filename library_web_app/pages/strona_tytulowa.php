<!doctype html>
<html lang="en">

<head>
  <!-- Import Bootstrapa -->
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <title>Biblioteka</title>
</head>

<body>
  <div>
    <!-- Pasek nawigacji -->
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a href="strona_tytulowa.php">
          <img class="logo" src="../images/logo_biblioteka.PNG" style="width:300px; height:80px;">
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


  <section>
    <img class="mySlides" src="../images/slajder-1.jpg" style="width:100%">
    <img class="mySlides" src="../images/slajder1-1.jpg" style="width:100%">
    <img class="mySlides" src="../images/slajder-2.jpg" style="width:100%">
  </section>


  <!-- JavaScript do Bootstrapa -->
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "library";

  // Nawiązanie połączenia
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Sprawdzenie połączenia
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT  * FROM Article
        ORDER BY articleId DESC
        LIMIT 3";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    echo "<div class='article-div'>";
    //id ksiazki
    echo "<h1>" . $row["title"] . "</h1>";
    echo "<h2>" . $row["subtitle"] . "</h2>";
    echo "<form action='../scripts/artykul.php' method='get'>";
    echo "<input type='hidden' name='article_id' value='" . $row['articleId'] . "'>";
    echo '<button type="submit" class="btn btn-primary read_more">Czytaj dalej</button>';
    echo "<hr>";
    echo "</form>";
    echo "</div>";
  }

  $conn->close();
  ?>
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
  <!-- Wywołanie skryptku karuzeli obrazkowej -->
  <script src="../scripts/carousel.js" type="text/javascript"></script>
</body>

</html>
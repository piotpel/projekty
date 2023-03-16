<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";
    //połączenie z bazą
    $conn = new mysqli($servername, $username, $password);
    //zapytanie czy login już istnieje
    $conn->query("use library");
    $articleId = $_GET['article_id'];
    $sql = "SELECT * FROM article WHERE articleId=$articleId";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    echo $row[2];
    ?>
  </title>
  <!-- Import Bootstrapa -->
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/artykul.css">
</head>

<body>
  <!-- Pasek nawigacji -->
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a href="../pages/strona_tytulowa.php">
        <img class="logo" src="../images/logo_biblioteka.PNG" style="width:300px; height:80px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item navpage">
            <a class="nav-link active" href="../pages/strona_tytulowa.php">Aktualności</a>
          </li>
          <li class="nav-item navpage_katalog">
            <a class="nav-link active" href="../pages/katalog_ksiazek.php">Katalog książek</a>
          </li>
          <li class="nav-item navpage">
            <a class="nav-link active" href="../pages/o_nas.php">O nas</a>
          </li>
          <li class="nav-item navpage">
            <a class="nav-link active" href="../pages/kontakt.php">Kontakt</a>
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

  <?php
  echo "<div class='container article'><div class ='img_container'><img class='article_img' src='" . $row[4] . "'></div>"; //link do fotki
  echo '<div class="col-lg-6 col-md-9 col-sm-12 glowny-kontener">';
  echo "<h1>" . $row[2] . "</h1><br>"; //tytuł
  echo "<h2>" . $row[5] . "</h2><br>"; //podtytuł
  echo "<p>" . $row[3] . "</p><br>"; //tekst
  echo '</div></div>';

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
</body>
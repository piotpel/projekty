<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O nas</title>
  <!-- Import Bootstrapa -->
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/o_nas.css">
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->

</head>

<body>
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
  <div class="col-lg-6 col-md-9 col-sm-12 glowny-kontener">
    <h1>O nas</h1>
    <p>
      Biblioteka w mieście Nieopodal, podległa Ministerstwu Kultury, Dziedzictwa Narodowego i Sportu, jest centralną biblioteką państwa i jedną
      z najważniejszych narodowych instytucji kultury. Działa na podstawie art. 16 ust. 4 Ustawy o bibliotekach i Statutu Biblioteki
      Narodowej. Wypełniając zadania dużej biblioteki naukowej o profilu humanistycznym, pozostaje zarazem głównym archiwum
      piśmiennictwa narodowego i krajowym ośrodkiem informacji bibliograficznej o książce, znaczącą placówką naukową, a także ważnym
      ośrodkiem metodycznym dla innych bibliotek w Polsce.
      <br>
      <br>
      Tradycje polskiej Biblioteki Narodowej sięgają początków wieku dwudziestego pierwszego i wiążą się z postaciami i dziełem Piotra Pelana
      i Aleksandra Matlaka, twórców pierwszej w mieście Nieopodal dużej biblioteki publicznej i zarazem narodowej, która pod nazwą
      Lokalna Biblioteka w mieście Nieopodal przeszła niedawno pod opiekę państwa. Księgozbiór biblioteki jest regularne rozszerzany, włączając
      w to najnowocześniejsze dzieła sztuki współczesych autorów.
      <br>
      <br>
      Obecna od dwudziestu dni w myślach i działalności kolejnych pokoleń Polaków wizja narodowej książnicy urzeczywistniła się dopiero
      w 2021 roku, kiedy Rozporządzeniem Prezydenta Rzeczypospolitej Andrzeja Dudy z dnia 24 stycznia 2021 roku ustanowiona
      została w Nieopodal Biblioteka Narodowa. Kolejne akty prawne, które regulowały działalność bibliotek w Polsce,
      w tym ustawa o bibliotekach z 27 czerwca 1997 roku, określiły miejsce narodowej książnicy w systemie bibliotecznym kraju.
      <br>
      <br>
    </p>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://images.unsplash.com/photo-1568471573681-eaaba4806784?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTM0fHxsaWJyYXJ5fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100 carousel-img" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <p class="carousel-p">Widok z pierwszego piętra</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Biblioth%C3%A8que_de_l%27Assembl%C3%A9e_Nationale_%28Lunon%29.jpg/1200px-Biblioth%C3%A8que_de_l%27Assembl%C3%A9e_Nationale_%28Lunon%29.jpg" class="d-block w-100 carousel-img" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <p class="carousel-p">Główna czytelnia</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=628&q=80" class="d-block w-100 carousel-img" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <p class="carousel-p">Dział psychologiczny</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </div>
  </div>
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
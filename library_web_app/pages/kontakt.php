<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontakt</title>
  <!-- Import Bootstrapa -->
  <!-- ------------------------------------------------------------------------------------------------------------------------ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/kontakt.css">
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
  <h1>Skontaktuj się z nami</h1>
  <div class="col-lg-8 col-md-9 col-sm-12 rules">
    <button type="button" class="user_rules">Zanim wyślesz wiadomość, zapoznaj się z "Obowiązkiem
      informacyjnym"</button>
    <div class="content">
      <ol>
        <li>Administratorem danych osobowych jest Biblioteka Nieopodal (pl. Jana Nowaka-Jeziorańskiego 3, 00-000
          Nieopodal), e-mail: sekretariat@biblioteka.nieopodal.pl, nr tel.: 00-00 000 000.
          We wszelkich sprawach dotyczących przetwarzania danych osobowych przez Bibliotekę można kontaktować
          się z wyznaczonym w tym celu Inspektorem Ochrony Danych poprzez wysłanie wiadomości na adres:
          iod@biblioteka.nieopodal.pl
        </li>
        <li>Pani/Pana dane, podane w wysłanej do nas wiadomości za pośrednictwem poczty elektronicznej i/lub
          formularza kontaktowego, będą przetwarzane w celach związanych z udzieleniem odpowiedzi na zadane
          pytanie.
        </li>
        <li>Podstawą prawną przetwarzania Pani/Pana danych osobowych będzie udzielona przez Państwa zgoda (art.
          6 ust. 1 lit. a RODO).
        </li>
        <li>Podanie danych jest dobrowolne, jednakże ich niepodanie będzie skutkowało brakiem możliwości
          uzyskania odpowiedzi na Państwa pytanie.
        </li>
        <li>Pani/Pana dane osobowe będą przechowywane przez okres umożliwiający całkowite zakończenie działań
          związanych z udzieleniem odpowiedzi na pytanie, a następnie w przypadku niektórych spraw, także
          przez okres przechowywania dokumentacji w archiwum.
        </li>
        <li>Posiada Pani/Pan prawo dostępu do treści swoich danych osobowych, prawo do ich sprostowania,
          usunięcia, jak również prawo do ograniczenia ich przetwarzania, prawo do przenoszenia danych, prawo
          do wniesienia sprzeciwu wobec przetwarzania Pani/Pana danych osobowych. Ponadto także prawo do
          cofnięcia zgody w dowolnym momencie (w przypadku jej udzielenia) bez wpływu na zgodność z prawem
          przetwarzania, którego dokonano na podstawie zgody przed jej wycofaniem. Wycofanie zgody odbywać się
          będzie poprzez wysłanie wycofania zgody na adres poczty elektronicznej:
          sekretariat@biblioteka.nieopodal.pl
        </li>
        <li>Jest Pan/Pani uprawniony(a) do wniesienia skargi do Prezesa Urzędu Ochrony Danych Osobowych z tytułu
          naruszenia przepisów dotyczących ochrony danych osobowych.
        </li>
        <li>Odbiorcami Państwa danych będą: podmioty serwisujące nasze systemy informatyczne, podmioty
          dostarczające i utrzymujące oprogramowanie wykorzystywane w celu przetwarzania Państwa danych.
        </li>
        <li>Pani/Pana dane nie będą przekazywane poza granice Unii Europejskiej lub do organizacji
          międzynarodowych.
        </li>
        <li>Nie będziemy w żadnym wypadku podejmować zautomatyzowanych decyzji, w tym czynności polegających na
          profilowaniu użytkowników.
        </li>
      </ol>
    </div>
  </div>
  <div class="col-lg-8 col-md-9 col-sm-12 glowny-kontener ">
    <div class="row">
      <div class="col-lg-4">
        <h5>Dział Promocji, Marketingu i PR</h5>
        <p>
          Kierownik: Tomiasz Mayer<br>
          tel. 111 111 111<br>
          tel. 11 11 11 111<br>
          e-mail: promocja@biblioteka.nieopodal.pl
        </p>
      </div>
      <div class="col-lg-4">
        <h5>Dział Metodyczny i Projektów</h5>
        <p>
          Kierownik: Tomasz Stoś<br>
          tel. 222 222 222<br>
          tel. 22 22 22 222<br>
          e-mail: metodyczny@biblioteka.nieopodal.pl
        </p>
      </div>
      <div class="col-lg-4">
        <h5>Dział Spraw Majątkowych</h5>
        <p>
          Matuesz Moneykowski<br>
          tel. 333 333 333 <br>
          tel. 33 33 33 333<br>
          e-mail: windykacja@biblioteka.nieopodal.pl
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <h5>Dział Udostępniania Zbiorów</h5>
        <p>
          Kierownik: Sebastian Wzioł<br>
          tel. 444 444 444<br>
          tel. 44 44 44 444<br>
          e-mail: udostepnianie@biblioteka.nieopodal.pl
        </p>
      </div>
      <div class="col-lg-4">
        <h5>Dział Gospodarczo-Techniczny</h5>
        <p>
          Jerzy Brzęczek<br>
          tel. 555 555 555<br>
          tel. 55 55 55 555<br>
          e-mail: wuja@biblioteka.nieopodal.pl
        </p>
      </div>
      <div class="col-lg-4">
        <h5>Dział Informatyzacji i Cyfryzacji</h5>
        <p>
          Kierownik: Zogna Bacny<br>
          tel. 777 777 777<br>
          tel. 77 77 77 777<br>
          e-mail: informatyzacja@biblioteka.nieopodal.pl
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <h5>Dział Remontów i Inwestycji</h5>
        <p>
          Kierownik: Katarzyna Dowbor<br>
          tel. 888 888 888<br>
          owski tel. 88 88 88 888<br>
          e-mail: remonty@biblioteka.nieopodal.pl
        </p>
      </div>
      <div class="col-lg-4">
        <h5>Dział Budżetu i Finansów</h5>
        <p>
          Kierownik: John Turkey<br>
          tel. 999 999 999<br>
          tel. 99 99 99 999<br>
          e-mail: finanse@biblioteka.nieopodal.pl
        </p>
      </div>
      <div class="col-lg-4">
        <h5>Inspektor Ochrony Danych</h5>
        <p>
          Jerry Chickenpanick<br>
          tel. 00 00 00 000 <br>
          tel. 000 000 000 <br>
          e-mail: iod@biblioteka.nieopodal.pl
        </p>
      </div>
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
<!-- Ref do skryptu rozszerzającego div z zasadami -->
<script src="../scripts/expand.js" type="text/javascript">
</script>

</html>
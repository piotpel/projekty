<?php
session_start();
session_destroy();
session_unset();
header("Location: ../pages/strona_tytulowa.php");
?>
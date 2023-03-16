-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Sty 2022, 20:52
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article`
--

CREATE TABLE `article` (
  `articleId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `text` varchar(4000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `subtitle` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `article`
--

INSERT INTO `article` (`articleId`, `userId`, `title`, `text`, `image`, `subtitle`) VALUES
(1, 1, '„Mała książka – wielki człowiek” – zapisz malucha do biblioteki i odbierz czytelniczy starter!', 'Twoje dziecko nie ma jeszcze karty bibliotecznej? Zapisz je do biblioteki, a w prezencie otrzyma Wyprawkę Czytelniczą na dobry czytelniczy start! Akcja jest przeznaczona dla dzieci w wieku przedszkolnym (3-6 lat), również tych, które posiadają już kartę czytelnika.Są takie wydarzenia i rytuały w życiu dziecka, które nie tylko pozostają na długo w pamięci, ale mają też istotny wpływ na jego dorosłe życie. Jednym z tych ważnych doświadczeń w dzieciństwie mogą być pierwsze wizyty w bibliotece, dlatego Instytut Książki kolejny raz przygotował prawdziwą gratkę dla najmłodszych miłośników książek i ich rodziców w ramach ogólnopolskiej kampanii „Mała książka – wielki człowiek”. W filiach Biblioteki Nieopodal na dzieci w wieku 3 do 6 lat czeka szczególny prezent – Wyprawka Czytelnicza. Wyjątkiem są Filie nr 1 i nr 25, w których nie ma działów dziecięcych.', 'https://www.vistula.edu.pl/wp-content/uploads/sites/3/2017/07/student_biblioteka_wypozyczalnia.jpg', 'Świetna frajda dla najmłodszych!'),
(2, 1, 'Nabór do Nagrody Żółtej Ciżemki 2022 tylko do końca stycznia! Nowe zasady zgłaszania książkowych wydań!', 'Do 31 stycznia 2022 będzie trwał nabór do VI edycji Nagrody Żółtej Ciżemki! Swoje propozycje może zgłosić każdy drogą pocztową lub mailową, wysyłając je na adres: anna.przykładowa@biblioteka.nieopodal.pl. Każdy wydawca może zgłaszać do 5 tytułów. Pozostali zgłaszający mogą rekomendować tylko jedną książkę. Do Nagrody należy zgłaszać wyłącznie polskie książki, których pierwsze wydanie (papierowe) ukazało się w roku 2021.', 'https://www.biblioteka.krakow.pl/wp-content/uploads/2021/01/grafika_facebook_2021.jpg', 'Nie zwlekaj zapisz się już dziś!'),
(3, 1, 'Biblioteka Nieopodal i trzy książkomaty!', 'Biblioteka Nieopodal uruchomiła trzy nowe książkomaty dla czytelników! Takie urządzenia to idealne rozwiązania dla każdego zapracowanego, czy nie mogącego odebrać swoich książkowych zamówień w godzinach otwarcia biblioteki. Książkomaty znajdują się w trzech różnych miejscach Nieopodalu: w Opodalu (przy Bibliotece Głównej, ul. Główna 2), na Podalu (przy Filii nr 16, ul. Filijnej) oraz na osiedlu Nieopodalowym (przy Filii nr 42, ul. Osiedlowa 33).', 'https://www.arfido.com/files/ksiazkomat-krk2.jpg', 'Kolejna innowacja dla Polek i Polaków od zarządu Piotra i Aleksandra!');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `author` varchar(200) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `book`
--

INSERT INTO `book` (`bookId`, `author`, `title`, `genre`) VALUES
(1, 'C.S Lewis', 'Lew, czarownica i stara szafa', 'Fantastyka'),
(2, 'C.S Lewis', 'Książe Kaspian', 'Fantastyka'),
(3, 'C.S Lewis', 'Podróż \"Wędrowca do Świtu\"', 'Fantastyka'),
(4, 'C.S Lewis', 'Srebrne krzesło', 'Fantastyka'),
(5, 'C.S Lewis', 'Koń i jego chłopiec', 'Fantastyka'),
(6, 'C.S Lewis', 'Siostrzeniec czarodzieja', 'Fantastyka'),
(7, 'C.S Lewis', 'Ostatnia bitwa', 'Fantastyka'),
(8, 'Andrzej Sapkowski', 'Sezon burz', 'Fantastyka'),
(9, 'Andrzej Sapkowski', 'Miecz przeznaczenia', 'Fantastyka'),
(10, 'Andrzej Sapkowski', 'Ostatnie życzenie', 'Fantastyka'),
(11, 'Andrzej Sapkowski', 'Krew elfów', 'Fantastyka'),
(12, 'Andrzej Sapkowski', 'Czas pogardy', 'Fantastyka'),
(13, 'Andrzej Sapkowski', 'Chrzest ognia', 'Fantastyka'),
(14, 'Andrzej Sapkowski', 'Wież jaskółki', 'Fantastyka'),
(15, 'Andrzej Sapkowski', 'Pani Jeziora', 'Fantastyka'),
(16, 'J.R.R. Tolkien', 'Drużyna pierścienia', 'Fantastyka'),
(17, 'J.R.R. Tolkien', 'Dwie wieże', 'Fantastyka'),
(18, 'J.R.R. Tolkien', 'Powrót króla', 'Fantastyka'),
(19, 'J.R.R. Tolkien', 'Hobbit czyli tam i z powrotem', 'Fantastyka'),
(20, 'Stephen King', 'Billy Summers', 'Horror'),
(21, 'Bram Stoker', 'Drakula', 'Horror'),
(22, 'Graham Masterton', 'Dom stu szeptów', 'Horror'),
(23, 'Christina Henry', 'Czerwona królowa', 'Horror'),
(24, 'Stephen King', 'Później', 'Horror'),
(25, 'Stephen King', 'To ', 'Horror');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `borrow`
--

CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `bookId` int(11) DEFAULT NULL,
  `startingDate` date DEFAULT NULL,
  `endingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `borrow`
--

INSERT INTO `borrow` (`borrowId`, `userId`, `bookId`, `startingDate`, `endingDate`) VALUES
(1, 1, 1, '2022-01-25', '2022-02-08'),
(2, 1, 2, '2022-01-11', '2022-01-24'),
(3, 6, 19, '2022-01-25', '2022-02-08'),
(4, 5, 20, '2022-01-25', '2022-02-08'),
(5, 1, 8, '2022-01-26', '2022-02-09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `commentId` int(11) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `login` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`userId`, `login`, `password`, `role`) VALUES
(1, 'admin1', '123', 'admin'),
(2, 'normaluser', '123', 'user'),
(5, 'pelan', '1234', 'Standard'),
(6, 'matlak', '34', 'Standard'),
(7, 'user1', 'kekium', 'Standard');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleId`),
  ADD KEY `userId` (`userId`);

--
-- Indeksy dla tabeli `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`);

--
-- Indeksy dla tabeli `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indeksy dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `articleId` (`articleId`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `article`
--
ALTER TABLE `article`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Ograniczenia dla tabeli `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`);

--
-- Ograniczenia dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`articleId`) REFERENCES `article` (`articleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

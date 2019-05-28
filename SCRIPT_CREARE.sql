-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 28, 2019 la 11:23 PM
-- Versiune server: 10.1.38-MariaDB
-- Versiune PHP: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `potr`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `adnotari`
--

CREATE TABLE `adnotari` (
  `ID` int(11) NOT NULL,
  `id_strofa_tradusa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `adnotari`
--

INSERT INTO `adnotari` (`ID`, `id_strofa_tradusa`, `id_user`, `text`) VALUES
(1, 25, 1, 'test'),
(2, 17, 1, 'super');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `autor`
--

CREATE TABLE `autor` (
  `ID` int(11) NOT NULL,
  `nume` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `autor`
--

INSERT INTO `autor` (`ID`, `nume`) VALUES
(1, 'George Bacovia'),
(2, 'Mihai Eminescu'),
(4, 'Adrian Paunescu');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comentarii_poezie`
--

CREATE TABLE `comentarii_poezie` (
  `ID` int(11) NOT NULL,
  `id_poezie_romana` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `comentarii_poezie`
--

INSERT INTO `comentarii_poezie` (`ID`, `id_poezie_romana`, `id_user`, `text`) VALUES
(21, 1, 3, 'wooow'),
(22, 1, 1, 'Foarte frumoasa exprimarea'),
(23, 1, 1, 'Atat de trista aceasta poezie'),
(24, 1, 1, 'Atat de trista aceasta poezie'),
(26, 11, 1, 'Foarte emotionanta'),
(27, 11, 1, 'O ador'),
(28, 5, 1, 'Imi place aceasta poezie'),
(29, 5, 1, 'Superba'),
(30, 9, 1, 'O adevarata capodopera'),
(31, 9, 1, 'Minunata'),
(32, 10, 1, 'foarte trista'),
(33, 10, 1, 'Trist..'),
(34, 6, 1, 'Super tare'),
(35, 6, 1, 'wowow'),
(36, 7, 1, 'superba'),
(37, 7, 1, 'Imi place'),
(38, 1, 3, 'chiar foarte frumoasa'),
(39, 1, 3, 'Poetul plumbului'),
(40, 5, 3, 'wow'),
(41, 5, 3, 'Imi place'),
(42, 5, 3, 'Imi place poezie bacoviana'),
(43, 5, 3, 'O adevarata arta'),
(44, 9, 3, 'o poezie despre natura'),
(45, 9, 3, 'Marele poet al Romaniei'),
(46, 9, 3, 'Imi place'),
(47, 9, 3, 'foarte frumoasa poezie aceasta'),
(48, 10, 3, 'chiat m-a emotionat aceasta poezie'),
(49, 10, 3, 'lacrima'),
(50, 10, 3, 'asa multa suferinta'),
(51, 10, 3, '...'),
(52, 6, 3, 'Niciodata'),
(53, 6, 3, 'Felicitari pentru traducere'),
(54, 6, 3, 'Imi place'),
(55, 6, 3, 'Supeeer'),
(56, 7, 3, 'ce metafore frumoase'),
(57, 7, 3, 'foarte frumoase traduceri'),
(58, 7, 3, 'wow'),
(59, 7, 3, 'supeeer!!!'),
(60, 11, 3, 'poezia asta merita citita'),
(61, 11, 3, 'Imi place'),
(62, 11, 3, 'Minunata'),
(63, 11, 3, 'woooow');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comentarii_strofa`
--

CREATE TABLE `comentarii_strofa` (
  `ID` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_strofa_tradusa` int(11) NOT NULL,
  `descriere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `comentarii_strofa`
--

INSERT INTO `comentarii_strofa` (`ID`, `id_user`, `id_strofa_tradusa`, `descriere`) VALUES
(29, 3, 2, 'Felicitari');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `poezie_romana`
--

CREATE TABLE `poezie_romana` (
  `ID` int(11) NOT NULL,
  `poezie` text NOT NULL,
  `id_autor` int(11) NOT NULL,
  `titlu` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `poezie_romana`
--

INSERT INTO `poezie_romana` (`ID`, `poezie`, `id_autor`, `titlu`) VALUES
(1, 'Dormeau adânc sicriele de plumb, <br>\r\nSi flori de plumb si funerar vestmint -<br>\r\nStam singur în cavou... si era vint... <br>\r\nSi scirtiiau coroanele de plumb. <br>\r\n<br>\r\nDormea întors amorul meu de plumb <br>\r\nPe flori de plumb, si-am inceput sa-l strig - <br>\r\nStam singur lânga mort... si era frig... <br>\r\nSi-i atirnau aripile de plumb. <br>\r\n<br>', 1, 'Plumb'),
(5, 'Te uita cum ninge decembrie,<br>\r\nSpre geamuri, iubito, priveste<br>\r\nMai spune s-aduca jaratec<br>\r\nSi focul s-aud cum trosneste.<br>\r\n<br>\r\nSi mana fotoliul spre soba,<br>\r\nLa horn sa ascult vijelia,<br\r\nSau zilele mele - totuna <br>\r\nAs vrea sa le-nvat simfonia.<br>\r\n<br>', 1, 'Decembrie'),
(6, '\r\nUn cintec nu-i nimic in lumea asta<br>\r\nMai bine si-l zdrobesti si apoi sa taci<br>\r\nCind el cu o iluzie nu umple<br>\r\nGhiozdanele copiilor saraci.<br>\r\nDestul cu-atitea gasti aristocrate<br>\r\nCe cauta si-n cintece cistig<br>\r\nUn cintec nu-i nimic daca nu face<br>\r\nMai cald in casele in care-i frig.<br>\r\n <br>\r\nNiciodata ... Niciodata<br>\r\nSa nu uitam de cei mai tristi ca noi.<br>\r\n<br>\r\n', 4, 'Niciodata'),
(7, '\r\nAseara cand ne desparteam, aseara<br>\r\nTot mai era un pic de primavara<br>\r\nSi-acum arunca ochii pe fereastra<br>\r\nA viscolit pe despartirea noastra<br>\r\nDistanta s-a-nmultit cu alb de moarte<br>\r\nDeparte s-a facut foarte departe<br>\r\nSi ninge intre noi ninsoare mare<br>\r\nNinsoare de sfarsit de calendare<br>\r\n <br>\r\n Si ochii nu mai au ce sa mai vada<br>\r\nDoar urme de jivine prin zapada<br>\r\nDe ocna-i viscolul ce-mi arde rana<br>\r\nSi-ascult de sub zapezi siciliana<br>', 4, 'Ninsoare de adio'),
(9, 'Lacul codrilor albastru<br>\r\nNuferi galbeni il incarca;<br>\r\nTresarind in cercuri albe<br>\r\nEl cutremura o barca.<br>\r\n <br>\r\nSi eu trec de-a lung de maluri,<br>\r\nParc-ascult si parc-astept<br>\r\nEa din trestii sa rasara<br>\r\nSi sa-mi cada lin pe piept;<br>\r\n<br>', 2, 'Lacul'),
(10, 'Pierdut in suferinta nimicniciei mele,<br>\r\nCa frunza de pe apa, ca fulgerul in haos,<br>\r\nM-am inchinat ca magul la soare ii la stele<br>\r\nSi-ngaduie intrarea-mi în vecinicul repaos;<br>\r\nNimic sa nu s-auda de umbra vietii mele,<br>\r\nSa trec ca o suflare, un sunet, o scânteie,<br>\r\nCa lacrima ce-o varsa zadarnic o femeie...<br>\r\nZadarnica mea minte de visuri e o schele.<br>\r\n<br>\r\nCaci ce-i poetu-n lume si astazi ce-i poetul?<br>\r\nLa glasu-i singuratec s-asculte cine vrea.<br>\r\nNecunoscut strecoare prin lume cu încetul<br>\r\nSi nimene nu-ntreaba ce este sau era...<br>\r\nO boaba  de spuma, un cret de val, un nume,<br>\r\nCe timid se cuteaza în veacul cel de fier.<br>\r\nMai bine niciodata el n-ar fi fost pe lume<br>\r\nSi-n loc sa moara astazi, mai bine murea ieri.<br>\r\n<br>', 2, 'Pierdut in suferinta'),
(11, 'Ce frumoasa esti în prag de iarna,<br>\r\nNinge disperat asupra ta,<br>\r\nCerul peste tine se rastoarna,<br>\r\nTurturii în plete vor suna.<br>\r\n <br>\r\nHai sa fim doi oameni de zapada<br>\r\nRidicati de brate de copii,<br>\r\nCare-n frig si ger mai stiu sa creada<br>\r\nCa se pot iubi, se pot iubi.<br>', 4, 'Ce frumoasa esti');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `poezie_tradusa`
--

CREATE TABLE `poezie_tradusa` (
  `ID` int(11) NOT NULL,
  `id_poezie_romana` int(11) NOT NULL,
  `titlu` varchar(256) NOT NULL,
  `limba` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `poezie_tradusa`
--

INSERT INTO `poezie_tradusa` (`ID`, `id_poezie_romana`, `titlu`, `limba`) VALUES
(1, 1, 'Lead', 'english'),
(8, 1, 'Plomb', 'french'),
(11, 5, 'December', 'english'),
(13, 10, 'Lost in Suffering', 'english'),
(14, 9, 'The Lake', 'english'),
(15, 6, 'Never', 'english'),
(16, 7, 'Farewell Snowfall', 'english'),
(17, 11, 'You are so beautiful', 'english');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rating`
--

CREATE TABLE `rating` (
  `ID` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_strofa_tradusa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `rating`
--

INSERT INTO `rating` (`ID`, `id_user`, `id_strofa_tradusa`) VALUES
(3, 1, 2),
(4, 1, 4),
(5, 3, 2),
(2, 3, 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `strofa_tradusa`
--

CREATE TABLE `strofa_tradusa` (
  `ID` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_poezie_tradusa` int(11) NOT NULL,
  `strofa` text NOT NULL,
  `nr_strofa` int(11) NOT NULL,
  `vizualizari` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `limba` varchar(256) NOT NULL,
  `data_adaugarii` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `strofa_tradusa`
--

INSERT INTO `strofa_tradusa` (`ID`, `id_user`, `id_poezie_tradusa`, `strofa`, `nr_strofa`, `vizualizari`, `rating`, `limba`, `data_adaugarii`) VALUES
(2, 1, 1, 'Upturned my lead beloved lay asleep <br>\r\n                                    On the lead flower ... and I began to call - <br>\r\n                                    I stood alone by the corpse ... and it was cold ... <br>\r\n                                    And the wings of lead drooped. <br>\r\n                                                           <br>', 2, 262, 20, 'english', '2019-05-27 21:00:00'),
(4, 1, 8, 'Cercueils de plomb dormaient à poings fermés <br />\r\nComme fleurs de plomb, funéraire vêtement - <br />\r\nMoi. Le caveau !... il y faisait du vent. <br />\r\nPour faire pendant, couronnes de plomb grinçaient.<br />\r\n<br />', 1, 11, 3, 'french', '2019-05-08 21:00:00'),
(5, 1, 8, 'Dos tourné, mon amour de plomb dormait <br />\r\nSur fleurs de plomb ; j’entrepris de l’appeler - <br />\r\nLe mort - seul. Et moi… le froid y régnait… <br />\r\nToujours en plomb, ses ailes par terre pendaient.<br /> <br/>', 2, 11, 0, 'french', '2019-05-07 21:00:00'),
(15, 3, 11, 'See how December snows ...<br>\r\nLook there by the window, my dear -<br>\r\nTell them to bring in more embers,<br>\r\nThen we can hear the fire roar.<br>\r\n<br>', 1, 343, 0, 'english', '2019-05-08 11:31:00'),
(16, 3, 11, 'Push the armchair up the stove<br>\r\nAnd then we\'ll hear, by the chimney,<br>\r\nThe storm, or my days - it\'s the same -<br>\r\nI must learn their symphony.<br>\r\n<br>', 2, 230, 0, 'english', '2019-05-09 14:14:00'),
(17, 3, 17, 'You are so beautiful when winter begins<br>\r\nIt snows desperately upon you<br>\r\nThe sky flips over you<br>\r\nThrough tresses the icicles will tinkle<br>\r\n<br>', 1, 330, 0, 'english', '2019-05-14 05:00:00'),
(19, 1, 1, 'The coffins of lead were lying sound asleep,<br>\r\nAnd the lead flowers and the funeral clothes -<br>\r\nI stood alone in the vault ... and there was wind ...<br>\r\nAnd the wreaths of lead creaked.<br>\r\n<br>', 1, 203, 0, 'english', '2019-05-13 01:00:00'),
(20, 3, 14, 'Water lilies load all over<br>\r\nThe blue lake amid the woods,<br>\r\nThat imparts, while in white circles<br>\r\nStartling, to a boat its moods.<br>\r\n<br>', 1, 211, 0, 'english', '2019-05-28 16:56:00'),
(21, 3, 14, 'And along the strands I\'m passing<br>\r\nListening, waiting, in unrest,<br>\r\nThat she from the reeds may issue<br>\r\nAnd fall, gently, on my breast;<br>\r\n<br>', 2, 321, 0, 'english', '2019-05-26 22:00:00'),
(22, 2, 13, 'Lost in the suffering of my nothingness<br>\r\nLike a leaf on the water, like a lightening in chaos,<br>\r\nI prayed like the magus to the sun and the stars<br>\r\nTo grant me eternal rest.<br>\r\nThat nobody would know anything about the shadow of my life,<br>\r\nTo pass like a breath, a sound, a spark,<br>\r\nLike the tears shed in vain by a woman…<br>\r\nMy useless, dreamy mind is a scaffolding.<br>\r\n<br>', 1, 196, 0, 'english', '2019-05-28 15:00:00'),
(23, 2, 13, 'For what is the poet in this world and what is a poet today?<br>\r\nTo his lonely voice whoever wants to may listen.<br>\r\nUnknown he slowly makes his way into this world<br>\r\nAnd nobody asks what he is or was,<br>\r\nA grain of foam, a wave, a name<br>\r\nThat shyly leaves his mark on the iron century.<br>\r\nIt would have been better if he had never existed in this world<br>\r\nAnd instead of dying today, he should have died yesterday.<br>', 2, 205, 0, 'english', '2019-05-28 17:09:00'),
(24, 1, 17, 'You are so beautiful when winter begins<br>\r\nIt snows desperately upon you<br>\r\nThe sky flips over you<br>\r\nThrough tresses the icicles will tinkle<br>\r\n<br>', 1, 203, 0, 'english', '2019-05-14 10:00:00'),
(25, 1, 17, 'Come, let us be two snowmen<br>\r\nMade by children\'s arms<br>\r\nWhich in cold and frost they still believe<br>\r\nThey can love each other, love each other<br>\r\n<br>', 2, 200, 0, 'english', '2019-05-17 15:00:00'),
(26, 1, 15, 'A song is nothing in this world <br>\r\nBetter crush it and then shut up<br>\r\nIf it doesn\'t fill with an illusion<br>\r\nThe poor kids\' backpacks.<br>\r\nEnough with so many aristocrat gangs.<br>\r\nWho are looking for gain even from the songs<br>\r\nA song is nothing if it does not bring<br>\r\nWarm in the homes where it\'s cold.<br>\r\n<br>', 1, 196, 0, 'english', '2019-05-15 17:00:00'),
(27, 1, 15, 'Never ... Never<br>\r\nLet\'s not forget the most sad ones than us. <br>\r\n<br>', 2, 195, 0, 'english', '2019-05-17 05:00:00'),
(28, 1, 16, 'Last night, when we were breaking up, <br>last night <br>\r\nThere was still a little bit of Spring left\r\nNow, look out the window<br>\r\nIt snowed all over our break-up<br>\r\nThe distance multiplied with deathly white\r\nFar has become very far<br>\r\nAnd between us it\'s snowing a heavy snow\r\nAn end-of-calendar snow<br>\r\n<br>', 1, 79, 0, 'english', '2019-05-28 19:30:00'),
(29, 1, 16, 'And the eyes don\'t have anything left <br> to see<br>\r\nOnly wild beasts\' footprints in the snow<br>\r\nLike a prison\'s is the blizzard that burns my wound<br>\r\nAnd I\'m listening under the snow to the siciliana<br>\r\n<br>', 2, 79, 0, 'english', '2019-05-28 19:36:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `nume` varchar(256) NOT NULL,
  `parola` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `photo` varchar(256) DEFAULT NULL,
  `bio` text,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`ID`, `nume`, `parola`, `email`, `photo`, `bio`, `admin`) VALUES
(1, 'cotaoctavian', 'testare', 'octavian_cota@yahoo.com', '67767c742862be31831cde48e64fdb05.jpg', 'hello world', 1),
(2, 'octaviancota', 'parola', 'test@yahoo.com', 'poetry.png', NULL, 0),
(3, 'Bie', 'bunabuna', 'biancabacaoanu@yahoo.com', '14466930_1174521872607806_1548790919_o.jpg', NULL, 0);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `adnotari`
--
ALTER TABLE `adnotari`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user_foreign_key` (`id_user`),
  ADD KEY `id_strofa_adnotata_foreign` (`id_strofa_tradusa`);

--
-- Indexuri pentru tabele `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `comentarii_poezie`
--
ALTER TABLE `comentarii_poezie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_poezie_romana_foreignk` (`id_poezie_romana`),
  ADD KEY `id_user_foreignkey` (`id_user`);

--
-- Indexuri pentru tabele `comentarii_strofa`
--
ALTER TABLE `comentarii_strofa`
  ADD PRIMARY KEY (`ID`) USING HASH,
  ADD KEY `user_id_foreign` (`id_user`),
  ADD KEY `id_strofa_tradusa_foreignk` (`id_strofa_tradusa`);

--
-- Indexuri pentru tabele `poezie_romana`
--
ALTER TABLE `poezie_romana`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_autor_foreign` (`id_autor`);

--
-- Indexuri pentru tabele `poezie_tradusa`
--
ALTER TABLE `poezie_tradusa`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `limba` (`limba`,`id_poezie_romana`) USING BTREE,
  ADD KEY `id_poezie_romana_foreign` (`id_poezie_romana`);

--
-- Indexuri pentru tabele `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user_strofa_unic` (`id_user`,`id_strofa_tradusa`),
  ADD KEY `strofa_id_fgn` (`id_strofa_tradusa`);

--
-- Indexuri pentru tabele `strofa_tradusa`
--
ALTER TABLE `strofa_tradusa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_poezie_foreign` (`id_poezie_tradusa`),
  ADD KEY `id_user_foreign` (`id_user`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD UNIQUE KEY `user_data` (`nume`) USING BTREE,
  ADD UNIQUE KEY `user_email` (`email`) USING HASH;

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `adnotari`
--
ALTER TABLE `adnotari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `autor`
--
ALTER TABLE `autor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `comentarii_poezie`
--
ALTER TABLE `comentarii_poezie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pentru tabele `comentarii_strofa`
--
ALTER TABLE `comentarii_strofa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pentru tabele `poezie_romana`
--
ALTER TABLE `poezie_romana`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pentru tabele `poezie_tradusa`
--
ALTER TABLE `poezie_tradusa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `rating`
--
ALTER TABLE `rating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `strofa_tradusa`
--
ALTER TABLE `strofa_tradusa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `adnotari`
--
ALTER TABLE `adnotari`
  ADD CONSTRAINT `id_strofa_adnotata_foreign` FOREIGN KEY (`id_strofa_tradusa`) REFERENCES `strofa_tradusa` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_foreign_key` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `comentarii_poezie`
--
ALTER TABLE `comentarii_poezie`
  ADD CONSTRAINT `id_poezie_romana_foreignk` FOREIGN KEY (`id_poezie_romana`) REFERENCES `poezie_romana` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_foreignkey` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `comentarii_strofa`
--
ALTER TABLE `comentarii_strofa`
  ADD CONSTRAINT `id_strofa_tradusa_foreignk` FOREIGN KEY (`id_strofa_tradusa`) REFERENCES `strofa_tradusa` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `poezie_romana`
--
ALTER TABLE `poezie_romana`
  ADD CONSTRAINT `id_autor_foreign` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `poezie_tradusa`
--
ALTER TABLE `poezie_tradusa`
  ADD CONSTRAINT `id_poezie_romana_foreign` FOREIGN KEY (`id_poezie_romana`) REFERENCES `poezie_romana` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `strofa_id_fgn` FOREIGN KEY (`id_strofa_tradusa`) REFERENCES `strofa_tradusa` (`ID`),
  ADD CONSTRAINT `user_id_fgn` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);

--
-- Constrângeri pentru tabele `strofa_tradusa`
--
ALTER TABLE `strofa_tradusa`
  ADD CONSTRAINT `id_poezie_foreign` FOREIGN KEY (`id_poezie_tradusa`) REFERENCES `poezie_tradusa` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

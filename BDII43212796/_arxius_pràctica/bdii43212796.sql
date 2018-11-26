-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 26-11-2018 a les 00:52:36
-- Versió del servidor: 10.1.37-MariaDB
-- Versió de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `bdii43212796`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `article`
--

CREATE TABLE `article` (
  `preuArt` int(11) NOT NULL,
  `fotoArt` char(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `kcal` int(11) DEFAULT NULL,
  `g` int(11) DEFAULT NULL,
  `p` int(11) DEFAULT NULL,
  `id_article` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Bolcament de dades per a la taula `article`
--

INSERT INTO `article` (`preuArt`, `fotoArt`, `kcal`, `g`, `p`, `id_article`, `id_categoria`) VALUES
(2, 'imatges_web/fotos_art/patatesP.png', 330, 150, 4, 1, 1),
(2, 'imatges_web/fotos_art/patatesM.png', 400, 200, 5, 3, 1),
(3, 'imatges_web/fotos_art/patatesG.png', 440, 250, 7, 4, 1),
(7, 'imatges_web/fotos_art/hamb1.png', 750, 300, 11, 13, 4),
(5, 'imatges_web/fotos_art/hamb.png', 700, 300, 10, 14, 4),
(2, 'imatges_web/fotos_art/coca1.png', 100, 250, 2, 16, 3),
(2, 'imatges_web/fotos_art/coca2.png', 180, 356, 4, 17, 3),
(3, 'imatges_web/fotos_art/coca3.png', 200, 500, 4, 18, 3);

-- --------------------------------------------------------

--
-- Estructura de la taula `categoria`
--

CREATE TABLE `categoria` (
  `nomCat` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `fotoCat` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Bolcament de dades per a la taula `categoria`
--

INSERT INTO `categoria` (`nomCat`, `fotoCat`, `id_categoria`) VALUES
('Complements', 'imatges_web/fotos_cat/complements.png', 1),
('Postres', 'imatges_web/fotos_cat/postres.png', 2),
('Refrescs', 'imatges_web/fotos_cat/refrescs.png', 3),
('Hamburgeses', 'imatges_web/fotos_cat/hamburgueses.png', 4),
('Gelats', 'imatges_web/fotos_cat/gelats.png', 5),
('Altres', 'imatges_web/fotos_cat/altres.png', 6);

-- --------------------------------------------------------

--
-- Estructura de la taula `comanda`
--

CREATE TABLE `comanda` (
  `estat` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `targeta` char(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_comanda` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `element`
--

CREATE TABLE `element` (
  `nomElem` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_element` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Bolcament de dades per a la taula `element`
--

INSERT INTO `element` (`nomElem`, `id_element`) VALUES
('Patates S', 1),
('Menu Estalvi', 2),
('Patates M', 3),
('Patates XL', 4),
('Hamburguesa Pollastre', 5),
('Menu Deluxe', 6),
('Menu Happy Fat', 7),
('MenuBBQ', 8),
('Menu basic', 9),
('Menu guai', 10),
('Hamburguesa BBQ', 12),
('Hamburguesa Deluxe', 13),
('Hamburguesa S', 14),
('Hamburguesa M', 15),
('Coca-Cola S', 16),
('Coca-Cola M', 17),
('Coca-Cola XL', 18),
('Aigua', 19);

-- --------------------------------------------------------

--
-- Estructura de la taula `estoc`
--

CREATE TABLE `estoc` (
  `numEst` int(11) NOT NULL,
  `id_restaurant` int(11) DEFAULT NULL,
  `id_element` int(11) DEFAULT NULL,
  `id_estoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Bolcament de dades per a la taula `estoc`
--

INSERT INTO `estoc` (`numEst`, `id_restaurant`, `id_element`, `id_estoc`) VALUES
(100, 1, 16, 1),
(100, 1, 18, 2),
(0, 1, 17, 3),
(100, 1, 14, 4),
(100, 1, 13, 5),
(2, 1, 3, 6),
(100, 2, 16, 7),
(100, 2, 14, 8),
(100, 2, 1, 9),
(100, 3, 17, 10),
(100, 3, 13, 11),
(100, 3, 3, 12),
(100, 4, 18, 13),
(100, 4, 13, 14),
(100, 4, 4, 15),
(200, 5, 18, 16),
(200, 5, 14, 17),
(200, 5, 3, 18),
(200, 6, 16, 21),
(250, 6, 14, 22),
(250, 6, 4, 24),
(150, 7, 17, 25),
(150, 7, 13, 26),
(150, 7, 1, 27),
(150, 8, 16, 28),
(150, 8, 13, 29),
(125, 8, 14, 30),
(125, 8, 1, 31),
(125, 9, 16, 32),
(125, 9, 13, 33),
(140, 9, 1, 34),
(140, 10, 18, 35),
(140, 10, 14, 36),
(140, 10, 3, 37);

-- --------------------------------------------------------

--
-- Estructura de la taula `historic`
--

CREATE TABLE `historic` (
  `id_historic` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `preuMenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Bolcament de dades per a la taula `menu`
--

INSERT INTO `menu` (`id_menu`, `preuMenu`) VALUES
(2, 5),
(6, 11),
(7, 8),
(8, 8),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Estructura de la taula `quantitat`
--

CREATE TABLE `quantitat` (
  `numQuant` int(11) NOT NULL,
  `id_comanda` int(11) DEFAULT NULL,
  `id_element` int(11) DEFAULT NULL,
  `id_quantitat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `restaurant`
--

CREATE TABLE `restaurant` (
  `id_restaurant` int(11) NOT NULL,
  `adreca` char(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Bolcament de dades per a la taula `restaurant`
--

INSERT INTO `restaurant` (`id_restaurant`, `adreca`) VALUES
(1, 'Plaza Salesas'),
(2, 'San Ildefonso'),
(3, 'Buenavista'),
(4, 'Prim'),
(5, 'San Bernardo'),
(6, 'Virgen de los Peligros'),
(7, 'Hortaleza'),
(8, 'Cuesta de la Vega'),
(9, 'Segovia'),
(10, 'La Cruz');

-- --------------------------------------------------------

--
-- Estructura de la taula `r_menu_article`
--

CREATE TABLE `r_menu_article` (
  `id_elementM` int(11) NOT NULL,
  `id_elementA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Bolcament de dades per a la taula `r_menu_article`
--

INSERT INTO `r_menu_article` (`id_elementM`, `id_elementA`) VALUES
(2, 1),
(2, 14),
(2, 16),
(6, 3),
(6, 14),
(6, 18),
(7, 3),
(7, 14),
(7, 16),
(8, 1),
(8, 13),
(8, 17),
(9, 4),
(9, 13),
(9, 16),
(10, 1),
(10, 13),
(10, 18);

-- --------------------------------------------------------

--
-- Estructura de la taula `treballador`
--

CREATE TABLE `treballador` (
  `id_treballador` int(11) NOT NULL,
  `nomUsuari` char(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasenya` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Bolcament de dades per a la taula `treballador`
--

INSERT INTO `treballador` (`id_treballador`, `nomUsuari`, `contrasenya`, `id_restaurant`) VALUES
(1, 'JOSEANTONIO', 'contra0', 1),
(2, 'ALBERTBOZA', 'contra1', 1),
(3, 'ALBERTOCUARTERO', 'contra2', 2),
(4, 'CESARVALCARCEL', 'contra4', 2),
(5, 'GABRIELALONSO', 'contra6', 3),
(6, 'GONZALOSIERRA', 'contra7', 4),
(7, 'ALEJANDROPERICAS', 'contra8', 5),
(8, 'MIGUELANGELVELA', 'contra9', 6),
(9, 'JUANJOSESANTANA', 'contra10', 7),
(10, 'MARIABORREGUERO', 'contra11', 8),
(11, 'CAROLINAMERCADO', 'contra12', 9),
(12, 'ALVAROVALDEZ', 'contra13', 10),
(13, 'YOLANDAECHEVERRIA', 'contra14', 3),
(14, 'CONSUELOQUILES', 'contra15', 10),
(15, 'ROSAZABALA', 'contra16', 1),
(16, 'SUSANAPOLANCO', 'contra16', 1);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índexs per a la taula `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índexs per a la taula `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `id_restaurant` (`id_restaurant`);

--
-- Índexs per a la taula `element`
--
ALTER TABLE `element`
  ADD PRIMARY KEY (`id_element`);

--
-- Índexs per a la taula `estoc`
--
ALTER TABLE `estoc`
  ADD PRIMARY KEY (`id_estoc`),
  ADD KEY `id_restaurant` (`id_restaurant`),
  ADD KEY `id_element` (`id_element`);

--
-- Índexs per a la taula `historic`
--
ALTER TABLE `historic`
  ADD PRIMARY KEY (`id_historic`);

--
-- Índexs per a la taula `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Índexs per a la taula `quantitat`
--
ALTER TABLE `quantitat`
  ADD PRIMARY KEY (`id_quantitat`),
  ADD KEY `id_comanda` (`id_comanda`),
  ADD KEY `id_element` (`id_element`);

--
-- Índexs per a la taula `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- Índexs per a la taula `r_menu_article`
--
ALTER TABLE `r_menu_article`
  ADD PRIMARY KEY (`id_elementM`,`id_elementA`),
  ADD KEY `id_elementA` (`id_elementA`);

--
-- Índexs per a la taula `treballador`
--
ALTER TABLE `treballador`
  ADD PRIMARY KEY (`id_treballador`),
  ADD KEY `id_restaurant` (`id_restaurant`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la taula `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id_comanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `element`
--
ALTER TABLE `element`
  MODIFY `id_element` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la taula `estoc`
--
ALTER TABLE `estoc`
  MODIFY `id_estoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT per la taula `historic`
--
ALTER TABLE `historic`
  MODIFY `id_historic` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `quantitat`
--
ALTER TABLE `quantitat`
  MODIFY `id_quantitat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `treballador`
--
ALTER TABLE `treballador`
  MODIFY `id_treballador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `element` (`id_element`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Restriccions per a la taula `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`id_restaurant`) REFERENCES `restaurant` (`id_restaurant`);

--
-- Restriccions per a la taula `estoc`
--
ALTER TABLE `estoc`
  ADD CONSTRAINT `estoc_ibfk_1` FOREIGN KEY (`id_restaurant`) REFERENCES `restaurant` (`id_restaurant`),
  ADD CONSTRAINT `estoc_ibfk_2` FOREIGN KEY (`id_element`) REFERENCES `article` (`id_article`);

--
-- Restriccions per a la taula `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `element` (`id_element`);

--
-- Restriccions per a la taula `quantitat`
--
ALTER TABLE `quantitat`
  ADD CONSTRAINT `quantitat_ibfk_1` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id_comanda`),
  ADD CONSTRAINT `quantitat_ibfk_2` FOREIGN KEY (`id_element`) REFERENCES `element` (`id_element`);

--
-- Restriccions per a la taula `r_menu_article`
--
ALTER TABLE `r_menu_article`
  ADD CONSTRAINT `r_menu_article_ibfk_1` FOREIGN KEY (`id_elementM`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `r_menu_article_ibfk_2` FOREIGN KEY (`id_elementA`) REFERENCES `article` (`id_article`);

--
-- Restriccions per a la taula `treballador`
--
ALTER TABLE `treballador`
  ADD CONSTRAINT `treballador_ibfk_1` FOREIGN KEY (`id_restaurant`) REFERENCES `restaurant` (`id_restaurant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

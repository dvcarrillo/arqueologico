-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2018 a las 17:52:41
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arqueologico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` text COLLATE latin1_spanish_ci NOT NULL,
  `subtitulo` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `contenido` text COLLATE latin1_spanish_ci NOT NULL,
  `imagen_principal` text COLLATE latin1_spanish_ci NOT NULL,
  `imagenes` text COLLATE latin1_spanish_ci NOT NULL,
  `pie_imagen` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titulo`, `subtitulo`, `fecha`, `contenido`, `imagen_principal`, `imagenes`, `pie_imagen`) VALUES
(1, 'La Alhambra: una nueva visión', 'Explora en Arqueológico Granada la Alhambra como nunca antes vista. Las ruinas árabes, los pasadizos secretos y mucho más del 6 de abril al 6 de julio de 2018. Entradas limitadas y disponibles en la Tienda.', '2018-03-15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum auctor velit sit amet pretium. Integer in ultrices lorem, id congue ante. Quisque luctus, orci ut iaculis tristique, lacus orci efficitur tellus, non facilisis urna neque et risus. Duis sed turpis non tortor convallis congue quis nec nisl. Fusce nisi dolor, dignissim ut erat sit amet, sollicitudin placerat nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam gravida laoreet ligula a fermentum.\r\n\r\nMauris pulvinar bibendum egestas. Quisque luctus laoreet nunc non cursus. Phasellus aliquam risus lectus, sed mattis est cursus sit amet. Duis vitae lacinia ipsum. Integer tellus dolor, rhoncus at ipsum eu, hendrerit lobortis leo. In commodo mi orci, a consectetur quam congue nec. Etiam pellentesque arcu eget scelerisque sagittis. Curabitur et tellus eget sapien pharetra fermentum. Morbi erat nibh, volutpat vitae mauris id, fringilla ultrices mauris. Fusce vitae hendrerit mauris. Mauris arcu lectus, porttitor nec risus ac, aliquam volutpat lacus.\r\n\r\nSuspendisse tempor ante non finibus euismod. Duis lectus leo, interdum et scelerisque quis, dictum at eros. Maecenas interdum tellus libero, vel dapibus urna elementum in. Cras ac nisi eu nisl dignissim tempor. Suspendisse ac leo nibh. Sed pharetra felis eu est dapibus ultricies. Nunc molestie ex eu blandit rhoncus. Cras molestie augue auctor magna egestas mollis. Nunc quis lacus vel felis finibus dapibus. Sed et consequat neque. Morbi maximus felis et mollis egestas. Nam semper accumsan iaculis. Duis sit amet erat orci. Nulla ultricies, tellus vitae hendrerit viverra, arcu tellus sodales libero, vel mollis sem arcu sit amet dolor. Fusce pretium massa dui.\r\n\r\nCurabitur vitae quam vitae magna dictum facilisis ut eu eros. Phasellus ex mi, interdum sed feugiat id, placerat et lorem. Curabitur varius luctus nunc, sit amet semper leo lobortis non. Donec congue est ut dolor gravida, nec convallis diam condimentum. Fusce at gravida orci. Suspendisse potenti. Sed sodales semper dolor sit amet sagittis.', 'img/alhambra.jpg', 'img/alhambra-article.jpg', 'Patio en La Alhambra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `contenido` text COLLATE latin1_spanish_ci NOT NULL,
  `email` text COLLATE latin1_spanish_ci NOT NULL,
  `imagen` text COLLATE latin1_spanish_ci NOT NULL,
  `articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `fecha`, `hora`, `contenido`, `email`, `imagen`, `articulo`) VALUES
(1, 'David Vargas', '2018-03-21', '16:45:40', 'Gran artículo, ¡tendré que ir a verla!', 'dvcarrillo@correo.ugr.es', 'img/avatar/david.jpg', 0),
(2, 'Holly', '2018-03-21', '21:10:44', 'Love the Alhambra, looking forward to my trip to Granada on July!', 'hollyfrombadlands@aol.com', 'img/avatar/sissy.png', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

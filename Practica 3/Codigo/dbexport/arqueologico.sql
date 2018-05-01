-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-05-2018 a las 00:05:49
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
(0, 'La Alhambra: una nueva vision', 'Explora en Arqueologico Granada la Alhambra como nunca antes la has visto. Las ruinas arabes, los pasadizos secretos y mucho mas del 6 de abril al 6 de julio de 2018. Entradas limitadas y disponibles en la Tienda.', '2018-03-15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum auctor velit sit amet pretium. Integer in ultrices lorem, id congue ante. Quisque luctus, orci ut iaculis tristique, lacus orci efficitur tellus, non facilisis urna neque et risus. Duis sed turpis non tortor convallis congue quis nec nisl. Fusce nisi dolor, dignissim ut erat sit amet, sollicitudin placerat nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam gravida laoreet ligula a fermentum.\r\n\r\nMauris pulvinar bibendum egestas. Quisque luctus laoreet nunc non cursus. Phasellus aliquam risus lectus, sed mattis est cursus sit amet. Duis vitae lacinia ipsum. Integer tellus dolor, rhoncus at ipsum eu, hendrerit lobortis leo. In commodo mi orci, a consectetur quam congue nec. Etiam pellentesque arcu eget scelerisque sagittis. Curabitur et tellus eget sapien pharetra fermentum. Morbi erat nibh, volutpat vitae mauris id, fringilla ultrices mauris. Fusce vitae hendrerit mauris. Mauris arcu lectus, porttitor nec risus ac, aliquam volutpat lacus.\r\n\r\nSuspendisse tempor ante non finibus euismod. Duis lectus leo, interdum et scelerisque quis, dictum at eros. Maecenas interdum tellus libero, vel dapibus urna elementum in. Cras ac nisi eu nisl dignissim tempor. Suspendisse ac leo nibh. Sed pharetra felis eu est dapibus ultricies. Nunc molestie ex eu blandit rhoncus. Cras molestie augue auctor magna egestas mollis. Nunc quis lacus vel felis finibus dapibus. Sed et consequat neque. Morbi maximus felis et mollis egestas. Nam semper accumsan iaculis. Duis sit amet erat orci. Nulla ultricies, tellus vitae hendrerit viverra, arcu tellus sodales libero, vel mollis sem arcu sit amet dolor. Fusce pretium massa dui.\r\n\r\nCurabitur vitae quam vitae magna dictum facilisis ut eu eros. Phasellus ex mi, interdum sed feugiat id, placerat et lorem. Curabitur varius luctus nunc, sit amet semper leo lobortis non. Donec congue est ut dolor gravida, nec convallis diam condimentum. Fusce at gravida orci. Suspendisse potenti. Sed sodales semper dolor sit amet sagittis.', 'views/img/alhambra.jpg', 'views/img/alhambra-article.jpg', 'Patio en La Alhambra'),
(1, 'CAI \'18', 'El museo recogera el Certamen Arqueologico Internacional en 2018, por primera vez en Andalucia. Visitanos, en Granada del 20 al 30 de mayo de 2018.', '2018-03-10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum auctor velit sit amet pretium. Integer in ultrices lorem, id congue ante. Quisque luctus, orci ut iaculis tristique, lacus orci efficitur tellus, non facilisis urna neque et risus. Duis sed turpis non tortor convallis congue quis nec nisl. Fusce nisi dolor, dignissim ut erat sit amet, sollicitudin placerat nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam gravida laoreet ligula a fermentum.\r\n\r\nMauris pulvinar bibendum egestas. Quisque luctus laoreet nunc non cursus. Phasellus aliquam risus lectus, sed mattis est cursus sit amet. Duis vitae lacinia ipsum. Integer tellus dolor, rhoncus at ipsum eu, hendrerit lobortis leo. In commodo mi orci, a consectetur quam congue nec. Etiam pellentesque arcu eget scelerisque sagittis. Curabitur et tellus eget sapien pharetra fermentum. Morbi erat nibh, volutpat vitae mauris id, fringilla ultrices mauris. Fusce vitae hendrerit mauris. Mauris arcu lectus, porttitor nec risus ac, aliquam volutpat lacus.\r\n\r\nSuspendisse tempor ante non finibus euismod. Duis lectus leo, interdum et scelerisque quis, dictum at eros. Maecenas interdum tellus libero, vel dapibus urna elementum in. Cras ac nisi eu nisl dignissim tempor. Suspendisse ac leo nibh. Sed pharetra felis eu est dapibus ultricies. Nunc molestie ex eu blandit rhoncus. Cras molestie augue auctor magna egestas mollis. Nunc quis lacus vel felis finibus dapibus. Sed et consequat neque. Morbi maximus felis et mollis egestas. Nam semper accumsan iaculis. Duis sit amet erat orci. Nulla ultricies, tellus vitae hendrerit viverra, arcu tellus sodales libero, vel mollis sem arcu sit amet dolor. Fusce pretium massa dui.\r\n\r\nCurabitur vitae quam vitae magna dictum facilisis ut eu eros. Phasellus ex mi, interdum sed feugiat id, placerat et lorem. Curabitur varius luctus nunc, sit amet semper leo lobortis non. Donec congue est ut dolor gravida, nec convallis diam condimentum. Fusce at gravida orci. Suspendisse potenti. Sed sodales semper dolor sit amet sagittis.', 'views/img/cai18.jpeg', 'views/img/cai18.jpeg', 'Ruinas arqueologicas'),
(2, 'La mujer en la Edad Media', 'Arqueologico Granada recoge una exposicion inedita sobre la figura de la mujer en la Edad Media. Ven y descubre su arte. Disponible en mayo de 2018.', '2018-02-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum auctor velit sit amet pretium. Integer in ultrices lorem, id congue ante. Quisque luctus, orci ut iaculis tristique, lacus orci efficitur tellus, non facilisis urna neque et risus. Duis sed turpis non tortor convallis congue quis nec nisl. Fusce nisi dolor, dignissim ut erat sit amet, sollicitudin placerat nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam gravida laoreet ligula a fermentum.\r\n\r\nMauris pulvinar bibendum egestas. Quisque luctus laoreet nunc non cursus. Phasellus aliquam risus lectus, sed mattis est cursus sit amet. Duis vitae lacinia ipsum. Integer tellus dolor, rhoncus at ipsum eu, hendrerit lobortis leo. In commodo mi orci, a consectetur quam congue nec. Etiam pellentesque arcu eget scelerisque sagittis. Curabitur et tellus eget sapien pharetra fermentum. Morbi erat nibh, volutpat vitae mauris id, fringilla ultrices mauris. Fusce vitae hendrerit mauris. Mauris arcu lectus, porttitor nec risus ac, aliquam volutpat lacus.\r\n\r\nSuspendisse tempor ante non finibus euismod. Duis lectus leo, interdum et scelerisque quis, dictum at eros. Maecenas interdum tellus libero, vel dapibus urna elementum in. Cras ac nisi eu nisl dignissim tempor. Suspendisse ac leo nibh. Sed pharetra felis eu est dapibus ultricies. Nunc molestie ex eu blandit rhoncus. Cras molestie augue auctor magna egestas mollis. Nunc quis lacus vel felis finibus dapibus. Sed et consequat neque. Morbi maximus felis et mollis egestas. Nam semper accumsan iaculis. Duis sit amet erat orci. Nulla ultricies, tellus vitae hendrerit viverra, arcu tellus sodales libero, vel mollis sem arcu sit amet dolor. Fusce pretium massa dui.\r\n\r\nCurabitur vitae quam vitae magna dictum facilisis ut eu eros. Phasellus ex mi, interdum sed feugiat id, placerat et lorem. Curabitur varius luctus nunc, sit amet semper leo lobortis non. Donec congue est ut dolor gravida, nec convallis diam condimentum. Fusce at gravida orci. Suspendisse potenti. Sed sodales semper dolor sit amet sagittis.', 'views/img/mujeres-edad-media.jpg', 'views/img/mujeres-edad-media.jpg', 'Disfruta de esta exposicion durante el mes de mayo'),
(3, 'Arqueologico Virtual', 'Presentamos la nueva aplicacion para dispositivos iOS y Android de Arqueologico Granada, con la que podras visitar nuestras exposiciones en cualquier lugar.', '2018-01-22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum auctor velit sit amet pretium. Integer in ultrices lorem, id congue ante. Quisque luctus, orci ut iaculis tristique, lacus orci efficitur tellus, non facilisis urna neque et risus. Duis sed turpis non tortor convallis congue quis nec nisl. Fusce nisi dolor, dignissim ut erat sit amet, sollicitudin placerat nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam gravida laoreet ligula a fermentum.\r\n\r\nMauris pulvinar bibendum egestas. Quisque luctus laoreet nunc non cursus. Phasellus aliquam risus lectus, sed mattis est cursus sit amet. Duis vitae lacinia ipsum. Integer tellus dolor, rhoncus at ipsum eu, hendrerit lobortis leo. In commodo mi orci, a consectetur quam congue nec. Etiam pellentesque arcu eget scelerisque sagittis. Curabitur et tellus eget sapien pharetra fermentum. Morbi erat nibh, volutpat vitae mauris id, fringilla ultrices mauris. Fusce vitae hendrerit mauris. Mauris arcu lectus, porttitor nec risus ac, aliquam volutpat lacus.\r\n\r\nSuspendisse tempor ante non finibus euismod. Duis lectus leo, interdum et scelerisque quis, dictum at eros. Maecenas interdum tellus libero, vel dapibus urna elementum in. Cras ac nisi eu nisl dignissim tempor. Suspendisse ac leo nibh. Sed pharetra felis eu est dapibus ultricies. Nunc molestie ex eu blandit rhoncus. Cras molestie augue auctor magna egestas mollis. Nunc quis lacus vel felis finibus dapibus. Sed et consequat neque. Morbi maximus felis et mollis egestas. Nam semper accumsan iaculis. Duis sit amet erat orci. Nulla ultricies, tellus vitae hendrerit viverra, arcu tellus sodales libero, vel mollis sem arcu sit amet dolor. Fusce pretium massa dui.\r\n\r\nCurabitur vitae quam vitae magna dictum facilisis ut eu eros. Phasellus ex mi, interdum sed feugiat id, placerat et lorem. Curabitur varius luctus nunc, sit amet semper leo lobortis non. Donec congue est ut dolor gravida, nec convallis diam condimentum. Fusce at gravida orci. Suspendisse potenti. Sed sodales semper dolor sit amet sagittis.', 'views/img/museo-virtual.jpeg', 'views/img/museo-virtual.jpeg', 'Usa la aplicacion en cualquier lugar'),
(4, 'Up Next', 'El Stonehenge y sus secretos sin desvelar. Descubre todo su misterio proximamente en Arqueologico Granada.', '2018-04-22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum auctor velit sit amet pretium. Integer in ultrices lorem, id congue ante. Quisque luctus, orci ut iaculis tristique, lacus orci efficitur tellus, non facilisis urna neque et risus. Duis sed turpis non tortor convallis congue quis nec nisl. Fusce nisi dolor, dignissim ut erat sit amet, sollicitudin placerat nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam gravida laoreet ligula a fermentum.\r\n\r\nMauris pulvinar bibendum egestas. Quisque luctus laoreet nunc non cursus. Phasellus aliquam risus lectus, sed mattis est cursus sit amet. Duis vitae lacinia ipsum. Integer tellus dolor, rhoncus at ipsum eu, hendrerit lobortis leo. In commodo mi orci, a consectetur quam congue nec. Etiam pellentesque arcu eget scelerisque sagittis. Curabitur et tellus eget sapien pharetra fermentum. Morbi erat nibh, volutpat vitae mauris id, fringilla ultrices mauris. Fusce vitae hendrerit mauris. Mauris arcu lectus, porttitor nec risus ac, aliquam volutpat lacus.\r\n\r\nSuspendisse tempor ante non finibus euismod. Duis lectus leo, interdum et scelerisque quis, dictum at eros. Maecenas interdum tellus libero, vel dapibus urna elementum in. Cras ac nisi eu nisl dignissim tempor. Suspendisse ac leo nibh. Sed pharetra felis eu est dapibus ultricies. Nunc molestie ex eu blandit rhoncus. Cras molestie augue auctor magna egestas mollis. Nunc quis lacus vel felis finibus dapibus. Sed et consequat neque. Morbi maximus felis et mollis egestas. Nam semper accumsan iaculis. Duis sit amet erat orci. Nulla ultricies, tellus vitae hendrerit viverra, arcu tellus sodales libero, vel mollis sem arcu sit amet dolor. Fusce pretium massa dui.\r\n\r\nCurabitur vitae quam vitae magna dictum facilisis ut eu eros. Phasellus ex mi, interdum sed feugiat id, placerat et lorem. Curabitur varius luctus nunc, sit amet semper leo lobortis non. Donec congue est ut dolor gravida, nec convallis diam condimentum. Fusce at gravida orci. Suspendisse potenti. Sed sodales semper dolor sit amet sagittis.', 'views/img/up-next.jpeg', 'views/img/up-next.jpeg', 'Proxima exposicion en Arqueologico');

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
  `id_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `fecha`, `hora`, `contenido`, `email`, `imagen`, `id_articulo`) VALUES
(1, 'David Vargas', '2018-03-21', '16:45:40', 'Gran articulo, tendre que ir a verla', 'dvcarrillo@correo.ugr.es', 'david.jpg', 0),
(2, 'Holly', '2018-03-21', '21:10:44', 'Love the Alhambra, looking forward to my trip to Granada on July!', 'hollyfrombadlands@aol.com', 'sissy.png', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

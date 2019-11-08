-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-10-2019 a las 08:41:33
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `difraxi2_luis_quero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lq_banner_home`
--

CREATE TABLE `lq_banner_home` (
  `id` int(11) NOT NULL,
  `source` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lq_banner_home`
--

INSERT INTO `lq_banner_home` (`id`, `source`) VALUES
(1, '950_thump.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lq_categorias`
--

CREATE TABLE `lq_categorias` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lq_categorias`
--

INSERT INTO `lq_categorias` (`id`, `nombre`) VALUES
(1, 'Avanza'),
(2, 'Enterate'),
(3, 'Voces'),
(4, 'Cifras'),
(5, 'Inviertiendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lq_contacto`
--

CREATE TABLE `lq_contacto` (
  `telefono` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `estado` text NOT NULL,
  `ciudad` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lq_contacto`
--

INSERT INTO `lq_contacto` (`telefono`, `email`, `direccion`, `estado`, `ciudad`, `facebook`, `linkedin`, `instagram`, `id`) VALUES
('(415) 15 11 498', 'info@luisquero.mx', 'Blvd. Nombre, dirección', 'Gto.', 'León', 'https://www.facebook.com/Luis-Quero-104348870949849/?__tn__=%2Cd%2CP-R&eid=ARD4ns8dxiWv4Ay4smQnOagsEYpXn9QMDF1MIKwwB7drbFG4IS2ZuWVsRzhN4f24epOTJF0yBnPAe6fd', 'https://www.linkedin.com/in/luisalfonsoquero/', 'https://www.instagram.com/luisalfonsoquero/', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lq_entradas`
--

CREATE TABLE `lq_entradas` (
  `id` int(11) NOT NULL,
  `titulo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `img_post` varchar(255) NOT NULL,
  `video_post` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `vistas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lq_entradas`
--

INSERT INTO `lq_entradas` (`id`, `titulo`, `contenido`, `img_post`, `video_post`, `fecha`, `id_categoria`, `tipo`, `vistas`) VALUES
(1, 'Con Chava Perez', 'Con Chava Pérez', '351_thump.jpg', '', '2019-10-21', 1, 'img', 8),
(2, 'Con Marcela Rivera', 'Con Marcela Rivera', '361_thump.jpg', '', '2019-10-21', 3, 'img', 1),
(3, 'Con Ricardo Vivero', 'Con Ricardo Vivero', '119_thump.jpg', '', '2019-10-21', 3, 'img', 2),
(4, 'Con Ruben Acevedo ', 'Con Ruben Acevedo', '957_thump.jpg', '', '2019-10-21', 3, 'img', 3),
(5, 'Con Vicente Herrera', 'Con Vicente Herrera', '788_thump.jpg', '', '2019-10-21', 3, 'img', 8),
(6, 'Octubre marcará la diferencia en estas empresas, ¿quieres saber porqué?', 'A lo largo de los años he conocido dos tipos de empresas. \n\nYa sea por método o tradición, pero para una gran mayoría de empresas octubre marca el inicio de una tarea clave en las Organizaciones, la revisión y ajuste de su planeación estratégica y la integración del presupuesto que habilitará las iniciativas que se incluyen en el mismo. \n\nEn primer lugar, aquellas que viven el proceso como parte de una rutina anual. Una tarea mecánica, aislada del entorno y sin conocimiento para generar discusión entre el equipo directivo. Ante la convocatoria del director, los equipos directivos se congregan para intercambiar puntos de vista que, en su mayoría, tienen un sesgo importante y carecen de fundamentos. En esencia, más que ejercicios de planeación, son charlas de café.\n\nPor otro lado, están aquellas que son conscientes de la importancia que el último trimestre de cada año tiene en el horizonte de los próximos 5 o 10. Podría decirse que la empresa espera este momento del año ya que sabe que es tiempo de calibrar el enfoque para que todo ese esfuerzo, compromiso y creatividad de los colaboradores sea la fórmula que les permita seguir ganando esa ventaja competitiva que los distingue del resto. \n\nSin entrar en por menores del impacto macroeconómico, el ambiente político que prevalece, o incluso, la incertidumbre regulatoria en ciertos sectores del país, estoy convencido de que, si en realidad quieren comprometerse con un ejercicio de planeación, el equipo de liderazgo debe informarse sobre el panorama económico, las tendencias y las transformaciones en los modelos de negocio que sugiere el entorno actual.\n\nAsí mismo, ante la “guerra de talento” que prevalece en muchos sectores, es fundamental que las Organizaciones proyecten iniciativas de transformación y adaptación al cambio encaminadas a la retención y desarrollo de su talento. \n\nTú, el director.\nEs bien sabido que todo gran cambio inicia con la convicción del líder de la Organización, es decir en ti, el director. El privilegio de liderar a toda una Organización va acompañado de una gran responsabilidad, la capacidad de brindar dirección y visibilidad a tu equipo incluso en entornos de incertidumbre y turbulencia.\n\nEn ese sentido, es interesante lo que ofrece esta nueva propuesta del Tecnológico de Monterrey Campus Querétaro, el programa CEO Training. Un espacio que busca fortalecer competencias directivas de directores generales y de planta a través del diálogo y discusión con especialistas reconocidos como los son: Macario Schettino, Arturo Molina, Isaac Lucatero, Carlos Nava, Jaime Alonso, Santiago Vázquez, Mario De Marchis, Santiago Klappenbach y Ángelica Carlos.\n\nEl programa propone tres líneas de enfoque: el entorno mundial y nacional, la transformación y adaptación al cambio en tu empresa y hace un cierre perfecto abordando los desafíos del líder. \n\nA través de 10 módulos que se imparten los viernes desde las 16:00 a las 21:00 hrs y los sábados desde las 09:00 a las 14:00 hrs, el programa fomenta el relacionamiento entre directores generales y de planta de diversos sectores, donde el hilo conductor que les une es la consciencia y compromiso por transitar a su Organización ante los retos que sugiere el entorno actual.\n\n@luisalfonsoquero\n\n++++++++++\n\n\n\n\nEl privilegio de liderar a toda una Organización va acompañado de una gran responsabilidad, la capacidad de brindar dirección y visibilidad a tu equipo incluso en entornos de incertidumbre y turbulencia.\n\nLa recomendación de esta semana es para un programa que propone diálogo y discusión con especialistas reconocidos en tres líneas de enfoque: el entorno mundial y nacional, la transformación y adaptación al cambio en tu empresa.', '889_thump.png', '', '2019-10-21', 1, 'img', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lq_users`
--

CREATE TABLE `lq_users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lq_users`
--

INSERT INTO `lq_users` (`id`, `user`, `pass`, `tipo`) VALUES
(1, 'webadmin@admin.com', 'webadmin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lq_banner_home`
--
ALTER TABLE `lq_banner_home`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lq_categorias`
--
ALTER TABLE `lq_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lq_contacto`
--
ALTER TABLE `lq_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lq_entradas`
--
ALTER TABLE `lq_entradas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lq_users`
--
ALTER TABLE `lq_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lq_banner_home`
--
ALTER TABLE `lq_banner_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lq_categorias`
--
ALTER TABLE `lq_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `lq_contacto`
--
ALTER TABLE `lq_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lq_entradas`
--
ALTER TABLE `lq_entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lq_users`
--
ALTER TABLE `lq_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

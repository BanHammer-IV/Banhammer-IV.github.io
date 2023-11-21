CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `puesto` varchar(30) NOT NULL
);

CREATE TABLE `locaciones` (
  `direccion` varchar(100) NOT NULL,
  `apertura` time NOT NULL,
  `cierre` time NOT NULL,
  `cantidad_salas` varchar(100) NOT NULL,
  `peliculas` varchar(200) NOT NULL
);

CREATE TABLE `peliculas` (
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `director` varchar(30) NOT NULL,
  `clasificacion` varchar(30) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `salas` varchar(30) NOT NULL,
  `horario` time NOT NULL,
  `estreno` date NOT NULL,
  `idiomas` varchar(50) NOT NULL,
  `trailer` varchar(2000) NOT NULL
);

CREATE TABLE `promociones` (
  `nombre` varchar(50) NOT NULL,
  `inicio` datetime NOT NULL,
  `finalizacion` datetime NOT NULL,
  `precio` float NOT NULL,
  `contenido` varchar(2000) NOT NULL
);

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL
);
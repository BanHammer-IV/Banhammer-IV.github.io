CREATE TABLE `empleados` (
  `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Puesto` varchar(30) NOT NULL
);

CREATE TABLE `locaciones` (
  `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Direccion` varchar(100) NOT NULL,
  `Apertura` time NOT NULL,
  `Cierre` time NOT NULL,
  `CantidadSalas` varchar(100) NOT NULL,
  `Peliculas` varchar(200) NOT NULL
);

CREATE TABLE `peliculas` (
  `IdPelicula` int(11) NOT NULL AUTO_INCREMENT,
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
  `IdPromociones` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `inicio` datetime NOT NULL,
  `finalizacion` datetime NOT NULL,
  `precio` float NOT NULL,
  `contenido` varchar(2000) NOT NULL
);

CREATE TABLE `usuarios` (
  `IdUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL
);


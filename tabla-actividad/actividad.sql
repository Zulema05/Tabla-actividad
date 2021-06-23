-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2021 a las 22:15:24
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `ID_ACTIVIDAD` smallint(6) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PERIODO` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `OBJETIVO_GENERAL` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `COMPETENCIA` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `TEMARIO` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `AUTORIZADA` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ID_ORGANIGRAMA` int(11) NOT NULL,
  `NO_CREDITOS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`ID_ACTIVIDAD`, `ID_USUARIO`, `ID_PERIODO`, `NOMBRE`, `OBJETIVO_GENERAL`, `COMPETENCIA`, `TEMARIO`, `AUTORIZADA`, `ID_ORGANIGRAMA`, `NO_CREDITOS`) VALUES
(0, 12301, 2021, 'Ensayo del modelo cliente servidor', 'Redactar un ensayo de máximo 6 cuartillas sobre el modelo cliente/servidor, especificando las principales arquitecturas lógicas, sus ventajas y desventajas', 'Competencia No.1 Conocer los conceptos teóricos básicos relacionados con el modelo cliente/servidor.', 'Tema 1. Contexto de la programación cliente/servidor', 'S', 12380, 5),
(1, 12302, 2021, 'Características de la interfaz socket', 'Identificar las características de la interfaz socket. Utilizar sockets en el desarrollo de aplicaciones básicas cliente/servidor', 'Competencia No.2 Identificar las características de la interfaz socket.\r\nUtilizar sockets en el desarrollo de aplicaciones básicas cliente/servidor', 'Tema 2. Programación Cliente-Servidor de Bajo Nivel: sockets y canales\r\n', 'N', 12356, 5),
(2, 12303, 2021, 'Proyecto de desarrollo de software del tema', 'Identificar las características, ventajas y desventajas del mecanismo RMI de Java para la intercomunicación de aplicaciones mediante la invocación de métodos remotos. Desarrollar aplicaciones empleando el mecanismo RMI.', 'Competencia No.3 Identificar las características, ventajas y desventajas del mecanismo RMI de Java para la intercomunicación de aplicaciones mediante la invocación de métodos remotos. Desarrollar aplicaciones empleando el mecanismo RMI.', 'Tema 3. RMI (REMOTE METHOD INVOCATION)\r\n', 'S', 12378, 5),
(3, 12304, 2021, 'Proyecto de desarrollo de software del tema.Tarea', 'Identificar las características, ventajas y desventajas del Modelo de Objetos de Componentes Distribuidos de Microsoft. \r\n', 'Competencia No.4 Identificar las características, ventajas y desventajas del Modelo de Objetos de Componentes Distribuidos de Microsoft. Desarrollar aplicaciones bajo DCOM.', 'Tema 4. COM/DCOM (Component Object Model/ Distributed COM)', 'S', 12349, 5),
(4, 12305, 2021, 'Proyecto de software de una aplicación ', 'Proyecto de software de una aplicación cliente que consuma datos a través de un servicio webTarea\r\n', 'Competencia No.5 Comprender el funcionamiento de un servicio web.\r\nDesarrollar librerías de métodos remotos para realizar el intercambio de información estructurada en aplicaciones cliente-servidor. Publicar un servicio web para permitir su utilización por aplicaciones cliente.', 'Tema 5. Servicios web XML', 'S', 12332, 5),
(5, 12306, 2021, 'Realizar un cuadro comparativo entre el modelo de ', 'Analizar y comparar el modelo de programación Cliente – Servidor de dos y\r\ntres capas.', 'Competencia No.1 Identificar los componentes de la plataforma web, aplicando\r\nlas herramientas correspondientes para su configuración.', 'Tema 1. Plataforma Web.', 'S', 12378, 4),
(6, 12307, 2021, 'Práctica de ejercicios.', 'Diseño de interfaces mediante formularios o\r\ntempletes que atiendan problemas generales.\r\n', 'Competencia No.2 Identificar y conocer las estructuras de programación\r\ndesarrollando aplicaciones, empleando lenguaje HTML y lenguajes de programación. Desarrollar aplicaciones web que\r\nimplementan acceso a datos.', 'Tema 2. Entorno de programación.', 'S', 12321, 4),
(7, 12308, 2021, 'Práctica de instalación, configuración y administr', 'Reporte. Seleccione un sistema web (ebay, dell, mercado libre) y analice sus\r\ncomponentes, funcionamiento y factores de\r\néxito.', 'Competencia No.3 Identificar e implementar soluciones mediante herramientas de\r\ngestión de contenidos.', 'Tema 3. Herramientas de gestión de\r\ncontenidos.', 'N', 12365, 4),
(8, 12309, 2021, 'Realizar una práctica para elaborar un documento X', 'Práctica de ejercicios. Elaborar un documento en formato XML.', 'Competencia No.4 Identificar y conocer las características del lenguaje XML\r\ndesarrollando aplicaciones que resuelvan el intercambio de información estructurada. Desarrollar aplicaciones web que\r\nimplementan el intercambio de información a través de servicios web ya definidos.', 'Tema 4. Desarrollo con XML.', 'S', 12390, 4),
(9, 12310, 2021, 'Realizará una analogía del funcionamiento y las ca', 'Investigar de forma individual y analiza en grupo el funcionamiento y las características de STP, en fuentes de información confiable y plasma los resultados haciendo una analogía', 'Competencia No. 1 Aplica protocolos de capa 2 configurando topologías redundantes libre de loops, para disponer de la alta  disponibilidad de los datos en las organizaciones        ', 'Tema 1. STP y RSTP.', 'S', 12345, 5),
(10, 12311, 2021, 'Mapa mental de los conceptos, características, uso', 'Investigar de forma individual y analizar de manera grupal conceptos, usos y tipos de VLAN, así como sus características, realizarla la investigación en diferentes fuentes de información confiables, y presentar los resultados frente a grupo.', 'Competencia No.2 Usa y administra protocolos para la implementación de enlaces troncales y configuraciones en dispositivos de la capa de 2 para implementar seguridad y eficiencia en soluciones de red.       ', 'Tema 2. VLAN', 'S', 12370, 5),
(11, 12312, 2021, 'Cuadro sinóptico de los estándares ', 'Identificar los estándares 802.11a, 802.11b,802.11g y 802.11n.', 'Competencia No.3 Instalar una red inalámbrica que contemple planificación, configuraciones básicas estándares vigentes para dar soluciones inherentes en pequeñas empresas. ', 'Tema 3. INTRODUCCIÒN A LAS REDES INALAMBRICAS      ', 'S', 12357, 5),
(12, 12313, 2021, 'Modelo físico a escala que represente los elemento', 'Realizar un modelo físico a escala que represente los elementos internos de un ruteador, identificando su ubicación y explicando la función y proceso de arranque.', 'Competencia No.4 Conoce y aplica los componentes y funcionamiento de dispositivo de capa 3 para establecer configuraciones y direccionamiento básico.               ', 'Tema 1. ENRUTADORES', 'S', 12386, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`ID_ACTIVIDAD`),
  ADD KEY `FK_REFERENCE_19` (`ID_PERIODO`),
  ADD KEY `fk_ACTIVIDAD_ORGANIGRAMA1_idx` (`ID_ORGANIGRAMA`),
  ADD KEY `fk_ACTIVIDAD_USUARIO1_idx` (`ID_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

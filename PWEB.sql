
--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `ID` int(8) NOT NULL,
  `NombreDePila` varchar(20) NOT NULL,
  `ApellidoPaterno` varchar(20) NOT NULL,
  `ApellidoMaterno` varchar(20) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `CURP` varchar(50) NOT NULL,
  `NumBoleta` varchar(10) NOT NULL,
  `Alcaldia` varchar(30) NOT NULL,
  `Colonia` varchar(20) NOT NULL,
  `CodPost` int(20) NOT NULL,
  `NombreCalle` varchar(30) NOT NULL,
  `NumExt` int(20) NOT NULL,
  `NumInt` int(20) NOT NULL,
  `Tel` int(20) NOT NULL, 
  `Correo` varchar(20) NOT NULL,
  `Escuela` varchar(30) NOT NULL,
  `EntidadFederativa` varchar(30) NOT NULL,
  `Promedio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NumBoleta` (`NumBoleta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;










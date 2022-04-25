-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2021 a las 20:13:59
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmundo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Id_Carrera` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ID_Facultades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`Id_Carrera`, `nombre`, `ID_Facultades`) VALUES
(1, 'Arts and Science', 3),
(2, 'Associate Degree in Communications', 3),
(3, 'Associate Degree in Entrepenuership', 4),
(4, 'Associate Degree in Robotics', 2),
(5, 'Bachelor of Science in Information Technology', 5),
(6, 'Behavioural Science', 1),
(7, 'Digital Cinema and Photografy', 3),
(8, 'Doctorado en Cirugía Dental', 6),
(9, 'Doctorado en Medicina', 6),
(10, 'Doctorado en Odontología', 6),
(11, 'Diplomado Superior en Cocinero Profesional', 1),
(12, 'Lic. en CED', 1),
(13, 'Ing. Aeronáutica', 2),
(14, 'Ing. Biomédica', 6),
(15, 'Int\'l Business and Mkt', 4),
(16, 'Ing. Civil', 2),
(17, 'Ing. Eléctrica', 2),
(18, 'Ing. en Agronomía', 2),
(19, 'Ing. en Alimentos', 2),
(20, 'Ing. en Computación', 5),
(21, 'Ing. en Desarrollo de Software', 5),
(22, 'Ing. en Economía y Negocios', 4),
(23, 'Ing. en Logística y Distribución', 2),
(24, 'Ing. En Sistemas', 2),
(25, 'Ing. en Sistemas Informáticos', 5),
(26, 'Ing. en Telecomunicaciones y Redes', 2),
(27, 'Ing. Industrial', 2),
(28, 'Ing. Informática', 5),
(29, 'Ing. Mecatrónicariales', 2),
(30, 'Ing. Mecatrónica', 2),
(31, 'Ing. Mecánica', 2),
(32, 'Ing. Química', 2),
(33, 'Lic. en Arquitectura', 2),
(34, 'Lic. en Administración de Empresas', 4),
(35, 'Lic. en Animación Digital y Videojuegos', 3),
(36, 'Lic. en Anestesiología e Inhaloterapia', 6),
(37, 'Lic. en Administración Militar', 1),
(38, 'Lic. en Biologia', 1),
(39, 'Lic. en CIM', 3),
(40, 'Lic. En Ciencias de la Comunicación', 1),
(41, 'Lic. en CC de la Educación con especialidad en Matemáticas', 1),
(42, 'Lic. en Ciencias Jurídicas', 1),
(43, 'Lic. en Computación', 5),
(44, 'Lic. en Comunicaciones', 3),
(45, 'Lic. en Contaduría Pública ', 4),
(46, 'Lic. en Ciencias Químicas', 6),
(47, 'Lic. en Diseño de Modas', 3),
(48, 'Lic. en Diseño del Producto Artesanal', 3),
(49, 'Lic. en Diseño Estratégico', 3),
(50, 'Lic. en Diseño Gráfico', 3),
(51, 'Lic. en Diseño Industrial', 2),
(52, 'Lic. en Enfermería', 6),
(53, 'Lic. en Educacin Básica para primero y Segundo Ciclo', 1),
(54, 'Lic. en Educación con especialidad en Educación Básica', 1),
(55, 'Lic. en Economía ', 4),
(56, 'Lic. en Educación Especial', 1),
(57, 'Lic. en Educación especialidad Idioma Ingl?s', 1),
(58, 'Lic. en Economía y Negocios', 4),
(59, 'Lic. en Finanzas Empresariales', 4),
(60, 'Lic. en Fisioterapia', 1),
(61, 'Lic. en Geofísica', 2),
(62, 'Lic. en Gerencia Informática', 5),
(63, 'Lic. en Informática', 5),
(64, 'Lic. en idiomas con Esp. en Educación', 1),
(65, 'Lic. en Idiomas con Esp. en turismo', 4),
(66, 'Lic. en Informática Educativa', 5),
(67, 'Lic. en Idioma Inglés Opción Enseñanza ', 1),
(68, 'Lic. en Laboratorio Clínico', 6),
(69, 'Lic. en Lenguas Modernas', 1),
(70, 'Lic. en Mercadeo', 4),
(71, 'Lic. en Medicina Veterinaria', 6),
(72, 'Lic. en Nutrición ', 1),
(73, 'Lic. en Orientación Profesional', 1),
(74, 'Lic. en Periodismo', 3),
(75, 'Lic. en Psicología', 1),
(76, 'Lic. en Relaciones Internacionales', 4),
(77, 'Lic. en Sociología', 1),
(78, 'Lic. en Sistemas Informáticos', 5),
(79, 'Lic. En Teconología Educativa', 5),
(80, 'Lic. en Trabajo Social', 1),
(81, 'Lic. en Turismo', 4),
(82, 'Profesorado en Biología', 1),
(83, 'Profesorado en Educación Básica', 1),
(84, 'Profesorado en Educación de Primero y Segundo Ciclo', 1),
(85, 'Profesorado en Educación Media', 1),
(86, 'Profesorado en Educación Parvularia', 1),
(87, 'Profesorado en Inglés ', 1),
(88, 'Profesorado en Lenguaje', 1),
(89, 'Profesorado en Matemáticas', 1),
(90, 'Profesorado en Parvularia', 1),
(91, 'International  Business', 1),
(92, 'Sin Carrera', 7),
(93, 'Software Ingeneering', 5),
(94, 'Téc. Animación y Programación de Videojuegos', 5),
(95, 'Téc.en Enfermería', 6),
(96, 'Téc. en Arquitectura con Enfoque Digital', 2),
(97, 'Téc. en Asistencia Dental', 6),
(98, 'Téc. en Admín. de empresas Gastronómicas', 1),
(99, 'Téc. en Animación Digital Y Videojuegos ', 3),
(100, 'Téc. en Agroindustria', 2),
(101, 'Téc. en Agronomía', 2),
(102, 'Téc. en Computación', 5),
(103, 'Téc. en Control de Calidad', 2),
(104, 'Tec. En Ingeniería Industrial', 2),
(105, 'Téc. en Contaduría Pública ', 4),
(106, 'Téc. en Desarrollo de Hardware', 5),
(107, 'Téc. en Desarrollo de Software', 5),
(108, 'Téc. en Diseño Gráfico', 3),
(109, 'Tec. En Diseño Gráfico Publicitario', 3),
(110, 'Téc. en Diseño Grafico y Téc. en Multimedia', 3),
(111, 'Téc. en Electrónica Industrial- Dual', 2),
(112, 'Téc. en Gastronomía', 1),
(113, 'Téc. en Gestión del comercio exterior', 4),
(114, 'Téc. en Guía Turístico', 4),
(115, 'Tec. en Gestión Tecnológica del Desarrollo Cultural', 1),
(116, 'Téc. en Inglés', 1),
(117, 'Téc. en Ing. Biomédica', 6),
(118, 'Téc. en Ing Civil', 2),
(119, 'Téc. en Ingeniería de Redes Informáticas ', 5),
(120, 'Téc. en Ing. Eléctrica', 2),
(121, 'Téc en Ing. Industrial', 2),
(122, 'Téc. en Ing. Mecatrónica -Diurna', 2),
(123, 'Téc. en Ing. Mecatrónica -Dual', 2),
(124, 'Tec. En ingeniería Mecánica Opción Mantenimiento Industrial', 2),
(125, 'Tec. en Laboratorio Químico-Diurno', 2),
(126, 'Tec. en Laboratorio Químico-Dual', 2),
(127, 'Téc.  en Mantenimiento Aeronóutico', 2),
(128, 'Téc. en Mecánica Automotriz', 2),
(129, 'Téc. en Mantenimiento de Computadoras', 5),
(130, 'Téc. en Mecánica', 2),
(131, 'Téc. en Mercadeo', 4),
(132, 'Téc. en Mecánica Opción Mant. Industrial', 2),
(133, 'Tec. en Marketing Turístico', 4),
(134, 'Téc. en Multimedia', 3),
(135, 'Téc. en Ortesis y Protesis', 6),
(136, 'Téc. en Publicidad', 3),
(137, 'Téc. en Química Industrial -Dual', 2),
(138, 'Téc. en Quimica Industrial -Dual', 2),
(139, 'Téc. en Química Industrial-Diurno', 2),
(140, 'Tec. en Relacionales Públicas', 1),
(141, 'Téc. En Sistemas ', 5),
(142, 'Téc. en Sistemas Informáticos', 5),
(143, 'Téc. Ing de Redes Informáticas', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `IDchats` bigint(255) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDEmpresa` int(100) NOT NULL,
  `Receptor` int(10) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_ofertas_trabajos`
--

CREATE TABLE `empresa_ofertas_trabajos` (
  `IDpostulaciones` int(100) NOT NULL,
  `IDEmpresa` int(100) NOT NULL,
  `IDPais` int(11) NOT NULL,
  `IDDepartamento` int(11) NOT NULL,
  `IDCategoria` int(100) NOT NULL,
  `IDDesempenado` int(11) NOT NULL,
  `Plaza` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  `Vacante` int(3) NOT NULL,
  `TipoContratacion` varchar(25) NOT NULL,
  `Genero` varchar(15) NOT NULL,
  `EdadMenor` int(3) NOT NULL,
  `EdadMayor` int(3) NOT NULL,
  `SalarioMinimo` int(10) NOT NULL,
  `SalarioMaximo` int(10) NOT NULL,
  `Vihiculo` varchar(15) NOT NULL,
  `TipoVehiculo` varchar(25) NOT NULL,
  `Experiencia` varchar(2) NOT NULL,
  `IDAreaExperiencia` int(11) NOT NULL,
  `Expira` date NOT NULL,
  `FechaPublicacion` varchar(10) NOT NULL,
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_perfil`
--

CREATE TABLE `empresa_perfil` (
  `IDEmpresa` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDTipoEmpresa` int(100) NOT NULL,
  `IDPais` int(11) NOT NULL,
  `IDDepartamento` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `Mapa` varchar(500) NOT NULL,
  `Descripcion` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CodigoPostal` varchar(10) NOT NULL,
  `Telefono` varchar(25) NOT NULL,
  `Celular` varchar(25) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  `whatsapp` varchar(25) NOT NULL,
  `youtube` varchar(150) NOT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'pordefecto.jpg',
  `paginaweb` varchar(100) NOT NULL,
  `fecha_registro` text NOT NULL,
  `Expira` date NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Prueba',
  `Confidencial` varchar(10) NOT NULL,
  `razonSocial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `IDFacultates` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`IDFacultates`, `Nombre`) VALUES
(1, 'Humanidades'),
(2, 'Ingenierias '),
(3, 'Diseño Publicidad'),
(4, 'Ciencias Economicas'),
(5, 'Informática'),
(6, 'Salud'),
(7, 'Sin Facultad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardar-chats-candidato`
--

CREATE TABLE `guardar-chats-candidato` (
  `chats-empresas` bigint(255) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  `Tipo` varchar(10) NOT NULL DEFAULT 'Contacto',
  `idSolicitud` bigint(20) NOT NULL,
  `EstadoSolicitud` varchar(10) NOT NULL DEFAULT 'Recibido',
  `Estado` varchar(10) NOT NULL DEFAULT 'Visto',
  `FechaHora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardar_candidatos_empresas`
--

CREATE TABLE `guardar_candidatos_empresas` (
  `IDCandidatos` bigint(255) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDEmpresa` int(100) NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardar_seguimiento_candidato`
--

CREATE TABLE `guardar_seguimiento_candidato` (
  `IDSeguimiento` int(11) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDEmpresa` int(100) NOT NULL,
  `fecha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `IDNotificacion` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `Tipo` varchar(25) NOT NULL,
  `idSolicitud` varchar(25) NOT NULL,
  `EstadoSolicitud` varchar(25) NOT NULL DEFAULT 'Enviado',
  `Estado` varchar(15) NOT NULL DEFAULT 'En espera',
  `FechaHora` datetime NOT NULL DEFAULT current_timestamp(),
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises_habilitado_empresa`
--

CREATE TABLE `paises_habilitado_empresa` (
  `IDPaisesHabilitado` bigint(255) NOT NULL,
  `IDPais` int(11) NOT NULL,
  `IDUsuario` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_seleccion_candidato`
--

CREATE TABLE `proceso_seleccion_candidato` (
  `IDProceso` int(11) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDEmpresa` int(100) NOT NULL,
  `IDSeleccion` int(11) NOT NULL,
  `Comentario` text NOT NULL,
  `fecha_registro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_generales`
--

CREATE TABLE `reportes_generales` (
  `IDReporte` bigint(255) NOT NULL,
  `IDEmpresa` int(100) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `contador` bigint(255) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_seguimiento`
--

CREATE TABLE `reporte_seguimiento` (
  `Reporte_Seguimiento` bigint(255) NOT NULL,
  `IDSeleccion` int(11) NOT NULL,
  `IDEmpresa` int(100) NOT NULL,
  `contador` bigint(255) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_solicitado_empresa`
--

CREATE TABLE `servicio_solicitado_empresa` (
  `IDServcio` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `nombre_encargado` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `comentario` text NOT NULL,
  `FechaSolicitada` varchar(15) NOT NULL,
  `Estado` varchar(25) NOT NULL DEFAULT 'En espera'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_pago_empresa`
--

CREATE TABLE `solicitud_pago_empresa` (
  `IDPago` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `Enlace` text NOT NULL,
  `comentario` text NOT NULL,
  `Estado` varchar(25) NOT NULL DEFAULT 'En espera'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_areas_experiencia`
--

CREATE TABLE `soporte_areas_experiencia` (
  `IDTipo` int(150) NOT NULL,
  `Nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soporte_areas_experiencia`
--

INSERT INTO `soporte_areas_experiencia` (`IDTipo`, `Nombre`) VALUES
(1, '.Net'),
(2, '.net Framework(2.0+)'),
(3, '3D- Visual Estudio'),
(4, 'Access'),
(5, 'ADOBE'),
(6, 'After Effects'),
(7, 'AMADEUS'),
(8, 'android-SDK'),
(9, 'AS400'),
(10, 'ASP'),
(11, 'AutoCad'),
(12, 'C'),
(13, 'C ++'),
(14, 'Cold Fusión'),
(15, 'Configuración de Redes CISCO'),
(16, 'Configuración Exchange Server'),
(17, 'Configuración Planta Externa'),
(18, 'Configuración Proxy Server'),
(19, 'Configuración Redes  WAN/LAN'),
(20, 'Configuración TCP/IP'),
(21, 'Conmutación'),
(22, 'Corel Draw'),
(23, 'CSS2'),
(24, 'CSS3'),
(25, 'DBase'),
(26, 'Developer'),
(27, 'Django'),
(28, 'Dreamweaver'),
(29, 'Ensamblaje de Hardware'),
(30, 'Excel'),
(31, 'Flash'),
(32, 'Fox Pro'),
(33, 'FreeHand'),
(34, 'Git'),
(35, 'Hiberate'),
(36, 'HTML'),
(37, 'HTML5'),
(38, 'hypertable'),
(39, 'Illustrator'),
(40, 'Implementación Call Center'),
(41, 'Implementación Ecommerce'),
(42, 'Informix'),
(43, 'Internet'),
(44, 'Java'),
(45, 'JQuery'),
(46, 'JSON'),
(47, 'Knockout JS'),
(48, 'Linux'),
(49, 'Lotus Notes'),
(50, 'MAC'),
(51, 'Manejo de Aplicación JD EDWARDS'),
(52, 'Manejo de Aplicación SAP'),
(53, 'Manejo PBX'),
(54, 'Maya'),
(55, 'Modernizr'),
(56, 'MongoDB'),
(57, 'Ms DOS'),
(58, 'My SQL'),
(59, 'Nhibernate'),
(60, 'Node.JS'),
(61, 'Objective-c'),
(62, 'Oracle'),
(63, 'Page Market'),
(64, 'People Soft'),
(65, 'Photoshop'),
(66, 'PHP'),
(67, 'PL SQL'),
(68, 'PostgreSQL'),
(69, 'Power Builder'),
(70, 'Power Point'),
(71, 'Programación de Celular'),
(72, 'Project'),
(73, 'Publisher'),
(74, 'Python'),
(75, 'Radio Enlace'),
(76, 'ravenDB'),
(77, 'Router'),
(78, 'Ruby-on-rails'),
(79, 'SABRE'),
(80, 'Sharepoint Mindmanager'),
(81, 'Socket.IO'),
(82, 'Solaris'),
(83, 'SQL'),
(84, 'SQL Server'),
(85, 'Subversion'),
(86, 'Swish'),
(87, 'Switch'),
(88, 'SyBase'),
(89, 'Team foundation server'),
(90, 'Topología de Redes ( Hub, Switch, Router)'),
(91, 'Transmisión de  Datos'),
(92, 'Unix'),
(93, 'Unobustrive Javascript'),
(94, 'Visio'),
(95, 'Visual Basic'),
(96, 'Visual Fox Pro'),
(97, 'WCF'),
(98, 'Windows'),
(99, 'Windows NT'),
(100, 'Word'),
(101, 'WPF'),
(102, 'XML'),
(103, 'Conocimiento de informática básico'),
(104, 'Uso de programas para hacer presentaciones gráficas'),
(105, 'Manejo de contabilidad'),
(106, 'Técnicas de redacción persuasiva.'),
(107, 'Manejo de herramientas digitales para análisis y community management.'),
(108, 'écnicas básicas de diseño gráfico (Photoshop o Illustrator).'),
(109, 'Uso de software para posicionamiento web como Google Analytics.'),
(110, 'Dominio de idiomas'),
(111, 'Uso Framework Laravel'),
(112, 'Programación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_areas_habilidades`
--

CREATE TABLE `soporte_areas_habilidades` (
  `IDHabilidades` int(100) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soporte_areas_habilidades`
--

INSERT INTO `soporte_areas_habilidades` (`IDHabilidades`, `Nombre`) VALUES
(1, 'Excelente capacidad de liderazgo'),
(2, 'Comunicación, tanto verbal como escrita'),
(3, 'Trabajo en equipo.'),
(4, 'Capacidad de adaptación.'),
(5, 'Negociación.'),
(6, 'Control del estrés.'),
(7, 'Racionalización.'),
(8, 'Capacidad de comunicación.'),
(9, 'Innovación y creatividad.'),
(10, 'Iniciativa y toma de decisiones.'),
(11, 'Empatía'),
(12, 'Liderazgo'),
(13, 'Flexibilidad'),
(14, 'Escucha activa'),
(15, 'Autoconfianza y optimismo'),
(16, 'Persuasión'),
(17, 'Capacidad de comunicación'),
(18, 'Negociación'),
(19, 'Innovación y creatividad'),
(20, 'Iniciativa y toma de decisiones'),
(21, 'Capacidad de organización'),
(22, 'Planificación'),
(23, 'Autocontrol'),
(24, 'informatica '),
(25, 'Tecnologías'),
(26, 'Coordinar'),
(27, 'Formación continua'),
(28, 'Manejo de ofimatica'),
(29, 'Manejo de office');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_areas_trabajos`
--

CREATE TABLE `soporte_areas_trabajos` (
  `IDCategoria` int(100) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soporte_areas_trabajos`
--

INSERT INTO `soporte_areas_trabajos` (`IDCategoria`, `Nombre`) VALUES
(1, 'Administración'),
(2, 'Almacenamiento'),
(3, 'Apoyo de Oficina'),
(4, 'Banca | Servicios Financieros'),
(5, 'Call Center'),
(6, 'Compras'),
(7, 'Cualquier Área'),
(8, 'Finanzas | Contabilidad | Auditoría'),
(9, 'Informatática | Internet'),
(10, 'Mantenimiento'),
(11, 'Mercadeo | Ventas'),
(12, 'Operaciones | Logística'),
(13, 'Producción | Ingeniería | Calidad'),
(14, 'Publicidad | Comunicaciones | Servicios'),
(15, 'Puestos Profesionales'),
(16, 'Recursos Humanos'),
(17, 'Restaurantes'),
(18, 'Salud'),
(19, 'Telecomunicaciones'),
(20, 'Varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_cargos_desempenado`
--

CREATE TABLE `soporte_cargos_desempenado` (
  `IDDesempenado` int(11) NOT NULL,
  `IDCategoria` int(100) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soporte_cargos_desempenado`
--

INSERT INTO `soporte_cargos_desempenado` (`IDDesempenado`, `IDCategoria`, `nombre`) VALUES
(1, 1, 'Administrador'),
(2, 1, 'Analistas de Organización y Métodos'),
(3, 1, 'Asistente a la Presidencia | Gerencia General'),
(4, 1, 'Asistente Administrativo'),
(5, 1, 'Asistente de Gerencia'),
(6, 1, 'Gerente Administrativo'),
(7, 1, 'Gerente de Pais'),
(8, 1, 'Gerente de Planeación Estratégica'),
(9, 1, 'Gerente de planificación'),
(10, 1, 'Gerente General | Director Ejecutivo'),
(11, 1, 'Jefe Administrativo'),
(12, 1, 'Jefe de Area'),
(13, 1, 'Jefe de Planificación'),
(14, 1, 'Jefe o Encargad@  de O y M'),
(15, 1, 'Presidente'),
(16, 1, 'Sub Gerente General'),
(17, 2, 'Asistente de Inventarios'),
(18, 2, 'Auxiliar de Bodega'),
(19, 2, 'Bodeguero'),
(20, 2, 'Gerente de Bodega'),
(21, 2, 'Gerente de Repuestos'),
(22, 2, 'Jefe de Bodega'),
(23, 2, 'Jefe de Inventario'),
(24, 2, 'Montacarguista'),
(25, 3, 'Asistente de oficina'),
(26, 3, 'Auxiliar de Tiempo'),
(27, 3, 'Auxiliar General de Servicio'),
(28, 3, 'Cobrador'),
(29, 3, 'Digitador'),
(30, 3, 'Jefe de Seguridad'),
(31, 3, 'Mensajero'),
(32, 3, 'Oficial de Seguridad'),
(33, 3, 'Recepcionista'),
(34, 3, 'Recepcionusta Bilingue'),
(35, 3, 'Secretaria de Area | Departamento'),
(36, 3, 'Secretaria de Gcia. General | Presidencia'),
(37, 3, 'Secretaria Ejecutiva'),
(38, 3, 'Secretaria Ejecutiva Bilingue'),
(39, 4, 'Analista de Activos Fijos'),
(40, 4, 'Analista de Crédito'),
(41, 4, 'Asistente de Activos Fijos'),
(42, 4, 'Asistente de Cumplimiento | Auxiliar de Cumplimiento'),
(43, 4, 'Cajer@ Bancaria'),
(44, 4, 'Corredor de Bolsa'),
(45, 4, 'Ejecutiv@ Corporativo'),
(46, 4, 'Ejecutiv@ de Cuenta'),
(47, 4, 'Ejecutiv@ de Pyme'),
(48, 4, 'Gerente de Agencia | Sucursal'),
(49, 4, 'Ejecutiv@ de Afiliación | Tarjeta de Crédito'),
(50, 4, 'Gerente de Banca Electrónica'),
(51, 4, 'Gerente de Crédito'),
(52, 4, 'Gerente de Cuenta Pyme'),
(53, 4, 'Gerente de Cumplimiento'),
(54, 4, 'Gerente de Finanzas'),
(55, 4, 'Gerente de Operaciones Bursátiles'),
(56, 4, 'Gerente de Operaciones Financieras'),
(57, 4, 'Gerente de Tarjeta de Crédito'),
(58, 4, 'Gerente Departamento Internacional'),
(59, 4, 'Gerente Legal'),
(60, 4, 'Gestor de Riesgo'),
(61, 4, 'Jefe de Activos Fijos'),
(62, 4, 'Jefe de Agencia | Sucursal'),
(63, 4, 'Jefe de Cumplimiento'),
(64, 4, 'Jefe de Depósitos'),
(65, 4, 'Jefe de Fideicomisos'),
(66, 4, 'Jefe de Fraude de Tarjetas de Crédito'),
(67, 4, 'Jefe de Inteligencia de Negocios'),
(68, 4, 'Jefe de Tarjeta de Crédito'),
(69, 4, 'Oficial de Cumplimineto'),
(70, 4, 'Otros Puestos Bancarios'),
(71, 4, 'Perito Valuador'),
(72, 4, 'Superintendente'),
(73, 4, 'Tesorero'),
(74, 5, 'Agente de Calidad'),
(75, 5, 'Agente de Servicio'),
(76, 5, 'Agente de Soporte'),
(77, 5, 'Agente de Ventas'),
(78, 5, 'Auditor de Calidad'),
(79, 5, 'Coordinador de Calidad'),
(80, 5, 'Ejecutiv@ de Call Center'),
(81, 5, 'Gerente de Calidad'),
(82, 5, 'Gerente de Call Center'),
(83, 5, 'Jefe o Encargad@ de Call Center'),
(84, 5, 'Lider de Equipo'),
(85, 6, 'Asistente de Compras'),
(86, 6, 'Comprador'),
(87, 6, 'Encargad@ de Licitaciones'),
(88, 6, 'Gerente de Compras'),
(89, 6, 'Jefe de Compras'),
(90, 6, 'Planeador de Materiales'),
(91, 8, 'Analista Finaciero'),
(92, 8, 'Asesor de Crédito'),
(93, 8, 'Asesor Tributario'),
(94, 8, 'Asistente Contable'),
(95, 8, 'Asistente de Auditorá Externa'),
(96, 8, 'Asistentente de Auditoría Fiscal'),
(97, 8, 'Asistente de Auditoría Externa'),
(98, 8, 'Asistente de Contralor'),
(99, 8, 'Asistente de Costos'),
(100, 8, 'Asistente de Crédito y Cobro'),
(101, 8, 'Asistente de Planillas'),
(102, 8, 'Asistente Financiero'),
(103, 8, 'Asistente o Encargad@ de Tesosería'),
(104, 8, 'Auditor Externo'),
(105, 8, 'Auditor Interno'),
(106, 8, 'Auxiliar Contable'),
(107, 8, 'Auxiliar de Créditos'),
(108, 8, 'Cajer@'),
(109, 8, 'Contador de Costos'),
(110, 8, 'Contador General'),
(111, 8, 'Contralor'),
(112, 8, 'Director de Finanzas y Administración'),
(113, 8, 'Encargad@ de Planillas'),
(114, 8, 'Gerente de Auditoría Interna'),
(115, 8, 'Gerente de Contabilidad'),
(116, 8, 'Gerente de Créditos | Cobros'),
(117, 8, 'Gerentes de Finanzas y Administración'),
(118, 8, 'Gerente de Inversiones'),
(119, 8, 'Gerente de Presupuestos'),
(120, 8, 'Gerente de Tesorería'),
(121, 8, 'Gerente de Cobros'),
(122, 8, 'Jefe de Auditorúa Externa'),
(123, 8, 'Jefe de Auditoria Fiscal'),
(124, 8, 'Jefe de Auditoria Interna'),
(125, 8, 'Jefe de Caja'),
(126, 8, 'Jefe de Contabilidad'),
(127, 8, 'Jefe de Costos'),
(128, 8, 'Jefe de Crédito y Cobro'),
(129, 8, 'Jefe de Facturación'),
(130, 8, 'Jefe de Finanzas'),
(131, 8, 'Jefe de Presupuestos'),
(132, 8, 'Jefe de Tesorería'),
(133, 8, 'Negociador de Divisas'),
(134, 9, 'Administrador de Base de Datos'),
(135, 9, 'Administrador de Redes'),
(136, 9, 'Analista | Programador'),
(137, 9, 'Analista de Sistemas'),
(138, 9, 'Auditor de Sistemas'),
(139, 9, 'Devops'),
(140, 9, 'Director de Informática | Sistemas'),
(141, 9, 'Diseñador Web'),
(142, 9, 'Gerente de informática | Sistemas'),
(143, 9, 'Jefe de Arquitectura de Software | Jefe de Arquitectura IT'),
(144, 9, 'Jefe de Auditoría de Sistemas'),
(145, 9, 'Jefe de desarrollo de Software | Jefe de Programación'),
(146, 9, 'Jefe de Informática | Sistemas'),
(147, 9, 'Jefe de Soporte Técnico'),
(148, 9, 'Operador de Sistemas'),
(149, 9, 'Programador'),
(150, 9, 'Soporte Técnico'),
(151, 9, 'Técnico de  internet'),
(152, 9, 'Web Master'),
(153, 10, 'Albañil'),
(154, 10, 'Aseador de Equipo'),
(155, 10, 'Asistente de Mantenimiento'),
(156, 10, 'Carpintero'),
(157, 10, 'Electricista'),
(158, 10, 'Electromecánico'),
(159, 10, 'Gerente de Mantemiento'),
(160, 10, 'Gerentes de Servicios'),
(161, 10, 'Gerente de Talleres'),
(162, 10, 'Jardinero'),
(163, 10, 'Jefe de Calderas'),
(164, 10, 'Jefe de Mantenimiento | Insdustrial'),
(165, 10, 'Jefe de Pintura Automotriz'),
(166, 10, 'Jefe de Taller Mecánico Eléctrico'),
(167, 10, 'Mecánico'),
(168, 10, 'Mecánico Autonotriz'),
(169, 10, 'Operador Maquinaria Pesada'),
(170, 10, 'Pintor'),
(171, 10, 'Pintor Automotriz'),
(172, 10, 'Soldador'),
(173, 10, 'Supervisor de Mantemiento'),
(174, 10, 'Técnico Chapistero'),
(175, 10, 'Técnico de Calderas'),
(176, 10, 'Técnicos en Electrónica'),
(177, 10, 'Técnico en Refrigeración'),
(178, 10, 'Técnico Especializado'),
(219, 11, 'Administrativo de Ventas | Soporte de Ventas'),
(220, 11, 'Analista de Mecadeo | Invesitación de Mercados'),
(221, 11, 'Asistente de Mercadeo'),
(222, 11, 'Asistente de Ventas'),
(223, 11, 'Director Comercial'),
(224, 11, 'Director de Mercadeo'),
(225, 11, 'Display'),
(226, 11, 'Edecan'),
(227, 11, 'Ejecutiv@ de Telemarketing'),
(228, 11, 'Ejecutiv@ de Ventas'),
(229, 11, 'Ejecutiv@ de Ventas Industriales'),
(230, 11, 'Ejecutiv@ de Ventas Técnicas'),
(231, 11, 'Gerentes de Cuentas Claves'),
(232, 11, 'Gerentes de Marca | Producto'),
(233, 11, 'Gerente de Marcadeo'),
(234, 11, 'Gerente de Mercadeo Internacional | Exportaciones'),
(235, 11, 'Gerente de Mercadeo y Ventas'),
(236, 11, 'Gerentes de Sucursal'),
(238, 11, 'Gerente de Sucursal'),
(239, 11, 'Gerente de Trade Marketing'),
(240, 11, 'Gerente de Ventas'),
(241, 11, 'Gerente de Ventas Técnicas'),
(242, 11, 'Impulsador de Ventas'),
(243, 11, 'Jefe de impulsadoras | Display'),
(244, 11, 'Jefe de Investigación de Mercados'),
(245, 11, 'Jefe de Marca | Producto'),
(246, 11, 'Jefe de Mercadeo'),
(247, 11, 'Jefe de Sucursal | Agencia'),
(248, 11, 'Jefe de Telemarketing'),
(249, 11, 'Jefe de Ventas'),
(250, 11, 'Mercaderista | Merchandiser'),
(251, 11, 'Promotor(a) de Ventas'),
(253, 11, 'Supervisor de Promociones'),
(254, 11, 'Supervisor de Ventas'),
(255, 11, 'Trade Marketing'),
(256, 11, 'Vendedor'),
(257, 11, 'Vendedor de Mostrador | Interno'),
(258, 11, 'Vendedor Rutero'),
(259, 12, 'Asistente de Exportaciones | Importaciones'),
(260, 12, 'Asistente de Opereciones'),
(261, 12, 'Estibador'),
(262, 12, 'Facturador'),
(263, 12, 'Gerente de Flotas'),
(264, 12, 'Gerente de Operaciones'),
(265, 12, 'Gerente de Operaciones y Logística'),
(266, 12, 'Jefe de Sercicios Generales'),
(267, 12, 'Jefe o Encargad@ de Despacho | o Recepción'),
(268, 12, 'Jefe o Encargad@ de Exportaciones | Importaciones'),
(269, 12, 'Jefe o Encargad@ de Operaciones y Logística'),
(270, 12, 'Jefe o Encargad@ de Transporte | Tráfico'),
(271, 12, 'Planificador de Nave'),
(272, 12, 'Director de Operaciones'),
(273, 13, 'Asistente de Control de Calidad'),
(274, 13, 'Asistente de Ingeniería'),
(275, 13, 'Asistente de Laboratorio'),
(276, 13, 'Asistente de Planificación de la Producción'),
(277, 13, 'Asistente de Producción'),
(278, 13, 'Auditor de Calidad'),
(279, 13, 'Director de Producción'),
(280, 13, 'Gerente de Control de Calidad'),
(281, 13, 'Gerente de Ingeniería'),
(282, 13, 'Gerente de Producción | Planta'),
(283, 13, 'Gerente de Seguridad Industrial'),
(284, 13, 'Ingeniero de Planta y Proceso'),
(285, 13, 'Jefe de Control de Calidad'),
(286, 13, 'Jefe de Ingeniería de Procesos'),
(287, 13, 'Jefe de Laboratorio'),
(288, 13, 'Jefe de Planificación de la Producción'),
(289, 13, 'Jefe de Procesos o Sección'),
(290, 13, 'Jefe de Producción'),
(291, 13, 'Jefe o Encargad@ de Seguridad Industrial'),
(292, 13, 'Manipulador de Alimentos'),
(293, 13, 'Mecatrónico'),
(294, 13, 'Oficial de Seguridad Industrial'),
(295, 13, 'Operario de Producción'),
(296, 13, 'Supervisor de calidad'),
(297, 13, 'Supervisor de Producción'),
(298, 13, 'Técnico de Lubricación | Predictivo'),
(299, 13, 'Tecnólogo en Alimentos'),
(300, 14, 'Asistente de Comunicaciones | Relaciones Públicas'),
(301, 14, 'Asistente de Publicidad'),
(302, 14, 'Bocetista'),
(303, 14, 'Community Manager'),
(304, 14, 'Coordinador de Eventos'),
(305, 14, 'Copywriter'),
(306, 14, 'Dibujante por Computadora'),
(307, 14, 'Director Creativo'),
(308, 14, 'Editor'),
(309, 14, 'Ejecutiv@ de Cuentas de Agencia de Publicidad'),
(310, 14, 'Ejecutiv@ de Servicio al Cliente'),
(311, 14, 'Gerente de Comunicaciones | Relaciones Públicas'),
(312, 14, 'Gerente de Imagen Corporativa'),
(313, 14, 'Gerente de Publicadad y Promoción'),
(314, 14, 'Gerente de Servicio al Cliente'),
(315, 14, 'Jefe de Comunicaciones'),
(316, 14, 'Jefe de Prensa'),
(317, 14, 'Jefe de Publicidad'),
(318, 14, 'Diseño Grafico'),
(319, 14, 'Jefe de Servicio al Cliente'),
(320, 14, 'Jefe o Encargad@ Creativo'),
(321, 14, 'Jefe o Encargad@ de Artes'),
(322, 14, 'Periodista'),
(323, 14, 'Productor'),
(324, 14, 'Redactor'),
(325, 14, 'Reportero'),
(326, 14, 'Visualizador'),
(327, 15, 'Abogado'),
(328, 15, 'Agrónomo'),
(329, 15, 'Analista de Reclamos de Seguros'),
(330, 15, 'Arquitecto'),
(331, 15, 'Asesor Legal'),
(332, 15, 'Asistente Ténico | Proyectos'),
(333, 15, 'Biologo'),
(334, 15, 'Consultor'),
(335, 15, 'Corredor de Seguros'),
(336, 15, 'Diseñador Industrial'),
(337, 15, 'Encargado de Estadísticas'),
(338, 15, 'Gerente de Area'),
(339, 15, 'Gerente de Obras Civiles'),
(340, 15, 'Gerente Técnico | Proyecto'),
(341, 15, 'Ingeniero Biomédico'),
(342, 15, 'Ingeniero Civil'),
(343, 15, 'Ingeniero Eléctrico'),
(344, 15, 'Ingeniero en Sistemas'),
(345, 15, 'Ingeniero Industrial'),
(346, 15, 'Ingeniero Mecánico'),
(347, 15, 'Ingeniero Químico'),
(348, 15, 'Jefe o Encargad@ Legal'),
(349, 15, 'Jefe o Encarg@ Técnico | Proyecto'),
(350, 15, 'Microbiólogo'),
(351, 15, 'Ofical de Daños | Siniestros'),
(352, 15, 'Piloto Aereo'),
(353, 15, 'Sicólogo'),
(354, 16, 'Analista de Recursos Humanos'),
(355, 16, 'Asistente de Calidad Total'),
(356, 16, 'Asistente de Recursos Humanos'),
(357, 16, 'Coordinador de Rse'),
(358, 16, 'Director de Recursos Humanos'),
(359, 16, 'Encargad@ de Compensaciones'),
(360, 16, 'Encargad@ de Desarrollo Organizacional'),
(361, 16, 'Encargad@ de Reclutamiento'),
(362, 16, 'Generalista de Recursos Humanos'),
(363, 16, 'Gerente de Calidad Total'),
(364, 16, 'Gerente de Capacitación'),
(365, 16, 'Gerente de Compensaciones | Beneficios'),
(366, 16, 'Gerente de Desarrollo Organizacional'),
(367, 16, 'Gerente de Recursos Humanos'),
(368, 16, 'Gerente de Rse'),
(369, 16, 'Jefe de Reclutamiento y Selección'),
(370, 16, 'Jefe de Recursos Humanos'),
(371, 16, 'Jefe  o Encargad@ de Capacitación'),
(372, 16, 'Reclutador'),
(373, 17, 'Asistente de Cocina'),
(374, 17, 'Barista'),
(375, 17, 'Bartender'),
(376, 17, 'Chef'),
(377, 17, 'Cocinero'),
(378, 17, 'Gerente de Restaurante'),
(379, 17, 'Hostess'),
(380, 17, 'Jefe de Alimentos y Bebidas'),
(381, 17, 'Jefe de Cocina'),
(382, 17, 'Jefe de Meser@s'),
(383, 17, 'Jefe de Restaurante'),
(384, 17, 'Meser@'),
(385, 17, 'Panader@'),
(386, 17, 'Pastalero | Repostero'),
(387, 17, 'Repartidor'),
(388, 18, 'Asistente Dental'),
(389, 18, 'Enfermer@ Profesional | Auxiliar de Paramédico'),
(390, 18, 'Farmacéutico'),
(391, 18, 'Masajista'),
(392, 18, 'Mecánico Dental'),
(393, 18, 'Médico'),
(394, 18, 'Nutricionista'),
(395, 18, 'Odontólogo'),
(396, 18, 'Oftalmólogo'),
(397, 18, 'Optometrista'),
(398, 18, 'Radiólogo'),
(399, 18, 'Regente'),
(400, 18, 'Terapeuta'),
(401, 18, 'Veterinario'),
(402, 18, 'Vistador Médico'),
(403, 19, 'Gerente de Conmutación'),
(404, 19, 'Gerente de Interconexión'),
(405, 19, 'Gerente de Internet'),
(406, 19, 'Gerente de Redes'),
(407, 19, 'Gerente de Telecomunicaciones'),
(408, 19, 'Gerente de Telefonía Celular'),
(409, 19, 'Gerente de Transmisión'),
(410, 19, 'Jefe o Encargad@ de Planta Externa'),
(411, 19, 'Jefe o Encargad@ de Proyectos'),
(412, 19, 'Técnico de Planta Externa'),
(413, 19, 'Técnico en Redes'),
(414, 19, 'Técnico en Telecomunicaciones'),
(415, 20, 'Actor'),
(416, 20, 'Ama de Llaves'),
(417, 20, 'Apoyo Escénico (Sonido-Vestuario-Maquillaje)'),
(418, 20, 'Auxiliar de Vuelo | Aeromoza | Azafata'),
(419, 20, 'Bailarín'),
(420, 20, 'Bibliotecario'),
(421, 20, 'Botones'),
(422, 20, 'Camarógrafo'),
(423, 20, 'Catedrático'),
(424, 20, 'Chofer'),
(425, 20, 'Corredor de Propiedades'),
(426, 20, 'Cosmetólog@'),
(427, 20, 'Decorador | Diseñador de Interioes'),
(428, 20, 'Dibujante'),
(429, 20, 'Diseñador de Vestuario | Textil | Modas'),
(430, 20, 'Ebanista'),
(431, 20, 'Encuestador'),
(432, 20, 'Fotógrafo'),
(433, 20, 'Entrenador'),
(434, 20, 'Guía Turístico'),
(435, 20, 'Investigador Privado'),
(436, 20, 'Jefe de Cabina'),
(437, 20, 'Locutor'),
(438, 20, 'Maestr@'),
(439, 20, 'Marino'),
(440, 20, 'Modelista | Sastre'),
(441, 20, 'Modelo'),
(442, 20, 'Músico'),
(443, 20, 'Ninera'),
(444, 20, 'Operador de Equipo Pesado'),
(445, 20, 'Otros empleos'),
(446, 20, 'Peluquero'),
(447, 20, 'Personal de Tráfico Aéreo'),
(448, 20, 'Plomero'),
(449, 20, 'Poligrafista'),
(450, 20, 'Presentador'),
(451, 20, 'Precurador Judicial | Tramitador Juridico'),
(452, 20, 'Profesor Parvularia | Educación Inicial'),
(453, 20, 'Propagandista'),
(454, 20, 'Salvavidas'),
(455, 20, 'Topógrafo'),
(456, 20, 'Trabajador Social'),
(457, 20, 'Traductor | Intéprete'),
(458, 20, 'Trainee'),
(459, 20, 'Valet Parking');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_paises`
--

CREATE TABLE `soporte_paises` (
  `IDPais` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soporte_paises`
--

INSERT INTO `soporte_paises` (`IDPais`, `Nombre`) VALUES
(1, 'El Salvador'),
(2, 'Guatemala'),
(3, 'Alemania'),
(4, 'Argentina'),
(5, 'Australia'),
(6, 'Austria'),
(7, 'Bélgica'),
(8, 'Belice'),
(9, 'Bolivia'),
(10, 'Brasil'),
(11, 'Canadá'),
(12, 'Chile'),
(13, 'China'),
(14, 'Colombia'),
(15, 'Corea del Sur'),
(16, 'Costa Rica'),
(17, 'Croacia'),
(18, 'Cuba'),
(19, 'Dinamarca'),
(20, 'Ecuador'),
(21, 'Eslovenia'),
(22, 'España'),
(23, 'Estados Unidos'),
(24, 'Filipinas'),
(25, 'Finlandia'),
(26, 'Francia'),
(27, 'Grecia'),
(28, 'Haití'),
(29, 'Honduras'),
(30, 'Hong Kong'),
(31, 'Hungría'),
(32, 'India'),
(33, 'Irlanda'),
(34, 'Israel'),
(35, 'Italia'),
(36, 'Jamaica'),
(37, 'Japón'),
(38, 'México'),
(39, 'Nicaragua'),
(40, 'Noruega'),
(41, 'Nueva Zelanda'),
(42, 'Holanda'),
(43, 'Panamá'),
(44, 'Paraguay'),
(45, 'Perú'),
(46, 'Polonia'),
(47, 'Portugal'),
(48, 'Puerto Rico'),
(49, 'Reino Unido'),
(50, 'República Checa'),
(51, 'República Dominicana'),
(52, 'Rusia'),
(53, 'Sudáfrica'),
(54, 'Suecia'),
(55, 'Suiza'),
(56, 'Uruguay'),
(57, 'Venezuela'),
(58, 'Yugoslavia'),
(59, 'Trinidad y Tobago'),
(60, 'Bermudas'),
(61, 'Bahamas'),
(62, 'Barbados'),
(63, 'CuracaoAruba'),
(64, 'Jordania'),
(65, 'Taiwan'),
(66, 'Cualquier País de CA'),
(67, 'Cualquier País');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_paises_departamento`
--

CREATE TABLE `soporte_paises_departamento` (
  `IDDepartamento` int(11) NOT NULL,
  `IDPais` int(11) NOT NULL,
  `Nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soporte_paises_departamento`
--

INSERT INTO `soporte_paises_departamento` (`IDDepartamento`, `IDPais`, `Nombre`) VALUES
(1, 1, 'San Salvador'),
(2, 1, 'Ahuachapán'),
(3, 1, 'Cabañas'),
(4, 1, 'Cuscatlán'),
(5, 1, 'Libertad'),
(6, 1, 'La Paz'),
(7, 1, 'La Unión'),
(8, 1, 'Morazán'),
(9, 1, 'San Miguel'),
(10, 1, 'San Vicente'),
(11, 1, 'Santa Ana'),
(12, 1, 'Sonsonate'),
(13, 1, 'Usulután'),
(14, 16, 'Alajuela'),
(15, 16, 'Guanacaste'),
(16, 16, 'Heredia'),
(17, 16, 'Limón'),
(18, 16, 'Puntarenas'),
(19, 16, 'San José'),
(20, 2, 'Alta Verapaz'),
(21, 2, 'Baja Verapaz'),
(22, 2, 'Chimaltenango'),
(23, 2, 'Chiquimula'),
(24, 2, 'El Progreso'),
(25, 2, 'Escuintla'),
(26, 2, 'Ciudad Guatemala'),
(27, 2, 'Huehuetenango'),
(28, 2, 'Izabal'),
(29, 2, 'Jalapa'),
(30, 2, 'Jutiapa'),
(31, 2, 'Petén'),
(32, 2, 'Quetzaltenango'),
(33, 2, 'Quiche'),
(34, 2, 'Retalhuleu'),
(35, 2, 'Sacatepéquez'),
(36, 2, 'San Marcos'),
(37, 2, 'Santa Rosa'),
(38, 2, 'Sololá'),
(39, 2, 'Suchitepéquez'),
(40, 2, 'Totonicapán'),
(41, 2, 'Zacapa'),
(42, 29, 'Atlántida'),
(43, 29, 'Choluteca'),
(44, 29, 'Colón'),
(45, 29, 'Comayagua'),
(46, 29, 'Copán'),
(47, 29, 'Cortés'),
(48, 29, 'El Paraíso'),
(49, 29, 'Francisco Morazán'),
(50, 29, 'Gracias a Dios'),
(51, 29, 'Intibucá'),
(52, 29, 'Islas de la Bahía'),
(53, 29, 'La Paz'),
(54, 29, 'Lempira'),
(55, 29, 'Ocotepeque'),
(56, 29, 'Olancho'),
(57, 29, 'Santa Bárbara'),
(58, 29, 'Valle'),
(59, 29, 'Yoro'),
(60, 39, 'Boaco'),
(61, 39, 'Carazo'),
(62, 39, 'Chinandega'),
(63, 39, 'Chontales'),
(64, 39, 'Estelí'),
(65, 39, 'Granada'),
(66, 39, 'Jinotega'),
(67, 39, 'Madriz'),
(68, 39, 'Managua'),
(69, 39, 'Masaya'),
(70, 39, 'Matagalpa'),
(71, 39, 'Nueva Segovia'),
(72, 39, 'Río San Juan'),
(73, 39, 'Rivas'),
(74, 39, 'RAAN'),
(75, 39, 'RAAS'),
(76, 39, 'León'),
(77, 43, 'Bocas del Toro'),
(78, 43, 'Chiriquí'),
(79, 43, 'Coclé'),
(80, 43, 'Darién'),
(81, 43, 'Herrera'),
(82, 43, 'Los Santos'),
(83, 43, 'Ciudad Panamá'),
(84, 43, 'Veraguas'),
(85, 43, 'Colón'),
(86, 43, 'Panamá Oeste'),
(87, 67, 'Sin departamento'),
(88, 1, 'Chalatenango');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_tipo_empresa`
--

CREATE TABLE `soporte_tipo_empresa` (
  `IDTipoEmpresa` int(100) NOT NULL,
  `Area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soporte_tipo_empresa`
--

INSERT INTO `soporte_tipo_empresa` (`IDTipoEmpresa`, `Area`) VALUES
(1, 'Aeronaves | Astilleros'),
(2, 'Agencia de Reclutamiento'),
(3, 'Agrícola | Ganadera'),
(4, 'Agroindustria'),
(5, 'Agua | Obras Sanitarias'),
(6, 'Arquitectura | Diseño | Decoración'),
(7, 'Automotriz'),
(8, 'Bancos | Financieras'),
(9, 'Bienes Raices'),
(10, 'Bufete de Abogados'),
(11, 'Call Center'),
(12, 'Carpintería | Muebles'),
(13, 'Científica'),
(14, 'Combustibles (Gas | Petróleo)'),
(15, 'Comercial'),
(16, 'Comercio Mayorista (Intermediac. | Dist.)'),
(17, 'Comercio Minorista'),
(18, 'Confecciones'),
(19, 'Construcción'),
(20, 'Consultoría | Asesoría'),
(21, 'Consumo Masivo (Bebidas | Alimentos)'),
(22, 'Defensa'),
(23, 'Educación | Capacitación'),
(24, 'Electricidad (Distribución | Generación)'),
(25, 'Entretenimiento'),
(26, 'Estudios Jurídicos'),
(27, 'Exportación | Importación'),
(28, 'Farmacéutica'),
(29, 'Forestal | Papel | Celulosa'),
(30, 'Gobierno'),
(31, 'Hotelería | Turismo | Restaurantes'),
(32, 'Imprenta | Editoriales'),
(33, 'Industrial'),
(34, 'Ingeniería'),
(35, 'Inmobiliaria | Propiedades'),
(36, 'Internet'),
(37, 'Inversiones (Soc. | Cías. Holding)'),
(38, 'Logística | Distribución'),
(39, 'Manufacturas Varias'),
(40, 'Maquila'),
(41, 'Materiales de Construcción'),
(42, 'Medicina | Salud'),
(43, 'Medios de Comunicación'),
(44, 'Metalmecánica'),
(45, 'Minería'),
(46, 'Naviera'),
(47, 'Operaciones Portuarias'),
(48, 'Organizaciones sin Fines de Lucro'),
(49, 'Pesquera | Cultivos Marinos'),
(50, 'Petrolera'),
(51, 'Publicidad | Marketing | RRPP'),
(52, 'Química'),
(53, 'Seguros | Previsión'),
(54, 'Servicios'),
(55, 'Servicios Financieros Varios'),
(56, 'Servicios Varios'),
(57, 'Siderurgia'),
(58, 'Tecnologías de Información'),
(59, 'Telecomunicaciones'),
(60, 'Textil'),
(61, 'Transporte'),
(62, 'Tecnología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_tipo_experiencia`
--

CREATE TABLE `soporte_tipo_experiencia` (
  `IDAreaExperiencia` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soporte_tipo_experiencia`
--

INSERT INTO `soporte_tipo_experiencia` (`IDAreaExperiencia`, `Nombre`) VALUES
(1, 'Horas Sociales'),
(2, 'Prácticas Professionales / Pasantías'),
(3, 'Servicio Estudiantil'),
(4, 'menos de un año'),
(5, 'de uno a tres años'),
(6, 'de tres a cinco años'),
(7, 'de cinco a diez años'),
(8, 'de diez a quince años'),
(9, 'más de quince años'),
(10, 'Sin experiencia'),
(11, 'Indiferente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_seleccion_candidatos`
--

CREATE TABLE `tipo_seleccion_candidatos` (
  `IDSeleccion` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_seleccion_candidatos`
--

INSERT INTO `tipo_seleccion_candidatos` (`IDSeleccion`, `Nombre`) VALUES
(1, 'Contactar Candidato'),
(2, 'Candidato Contactado'),
(3, 'Entrevista por teléfono'),
(4, 'Programar entrevista'),
(5, 'Candidato rechazado (No entrevista)'),
(6, 'Candidato entrevistado presencial'),
(7, 'Candidato aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_conocimentos`
--

CREATE TABLE `usuarios_conocimentos` (
  `IDConocimientos` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDTipo` int(100) NOT NULL,
  `Nivel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_cuentas`
--

CREATE TABLE `usuarios_cuentas` (
  `IDUsuario` int(100) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Token` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `UltimaConexion` varchar(25) NOT NULL,
  `Cargo` varchar(20) NOT NULL,
  `Foto` varchar(100) NOT NULL DEFAULT 'avatar15.jpg',
  `Estado` varchar(15) NOT NULL DEFAULT 'Token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_documentos`
--

CREATE TABLE `usuarios_documentos` (
  `IDDocumento` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `Documento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_habilidades`
--

CREATE TABLE `usuarios_habilidades` (
  `IDHabilidad` int(11) NOT NULL,
  `IDHabilidades` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `Nivel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_idiomas`
--

CREATE TABLE `usuarios_idiomas` (
  `IDIdioma` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `Idioma` varchar(30) NOT NULL,
  `Nivel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_visitas`
--

CREATE TABLE `usuarios_visitas` (
  `IDEmpresa` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `visitas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_areas`
--

CREATE TABLE `usuario_areas` (
  `IDAreas` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDCategoria` int(100) NOT NULL,
  `IDDesempenado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_educacion`
--

CREATE TABLE `usuario_educacion` (
  `IDEducacion` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `CentroEduacativo` varchar(100) NOT NULL,
  `Especialidad` varchar(100) NOT NULL,
  `Id_Carrera` int(11) NOT NULL,
  `NivelEstudio` varchar(45) NOT NULL,
  `FechaInicio` varchar(12) NOT NULL,
  `FechaFinal` varchar(12) NOT NULL,
  `IDPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_experiencia`
--

CREATE TABLE `usuario_experiencia` (
  `IDExperiencia` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `Cargo` varchar(70) NOT NULL,
  `IDCategoria` int(100) NOT NULL,
  `IDTipoEmpresa` int(100) NOT NULL,
  `IDDesempenado` int(11) NOT NULL,
  `Lugar` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `RangoSalarial` varchar(30) NOT NULL,
  `FechaInicio` year(4) NOT NULL,
  `FechaFinal` varchar(12) NOT NULL,
  `PaginaEmpresa` varchar(100) NOT NULL,
  `Estado` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_favoritos_postulaciones`
--

CREATE TABLE `usuario_favoritos_postulaciones` (
  `IDFavoritos` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDpostulaciones` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_perfil`
--

CREATE TABLE `usuario_perfil` (
  `IDPerfil` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `IDPais` int(11) DEFAULT NULL,
  `IDDepartamento` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `EducacionSecundaria` varchar(25) NOT NULL,
  `Descripcion` text NOT NULL,
  `genero` varchar(1) NOT NULL,
  `LicenciaConducir` varchar(2) NOT NULL,
  `Vehiculo` varchar(2) NOT NULL,
  `ManejoVehiculo` varchar(25) NOT NULL,
  `CorreoAlternativo` varchar(50) NOT NULL,
  `Telefono` varchar(25) NOT NULL,
  `Celular` varchar(25) NOT NULL,
  `Discapacidad` varchar(2) NOT NULL,
  `TipoDiscapacidad` text NOT NULL,
  `ExperienciaLaboral` varchar(2) NOT NULL,
  `IDAreaExperiencia` int(11) NOT NULL,
  `Portafolio` varchar(50) NOT NULL,
  `Disponiblidad` varchar(50) NOT NULL,
  `SituacionActual` varchar(25) NOT NULL,
  `FechaNaciento` date NOT NULL,
  `edad` int(3) NOT NULL,
  `SalarioMinimo` varchar(10) NOT NULL,
  `SalarioMaximo` varchar(10) NOT NULL,
  `confidencial` varchar(15) NOT NULL,
  `identificacion` varchar(30) NOT NULL,
  `numidentificacion` varchar(50) NOT NULL,
  `urlvideo` text NOT NULL,
  `UltimaActualizacion` text NOT NULL,
  `Estado` varchar(15) NOT NULL DEFAULT 'En proceso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_postulaciones`
--

CREATE TABLE `usuario_postulaciones` (
  `IDOfertaTrabajo` int(100) NOT NULL,
  `IDpostulaciones` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `Estado` varchar(35) NOT NULL DEFAULT 'enviado',
  `Aprobacion` varchar(15) NOT NULL DEFAULT 'en espera',
  `FechaInscrita` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_referencia`
--

CREATE TABLE `usuario_referencia` (
  `IDReferencia` int(100) NOT NULL,
  `IDUsuario` int(100) NOT NULL,
  `Encargado` varchar(50) NOT NULL,
  `Empresa` varchar(50) NOT NULL,
  `Cargo` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Id_Carrera`),
  ADD KEY `fk_facultades_carreras` (`ID_Facultades`);

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`IDchats`),
  ADD KEY `fk_chats_usuer` (`IDUsuario`),
  ADD KEY `fk_chats_empresa` (`IDEmpresa`);

--
-- Indices de la tabla `empresa_ofertas_trabajos`
--
ALTER TABLE `empresa_ofertas_trabajos`
  ADD PRIMARY KEY (`IDpostulaciones`),
  ADD KEY `FK_Empresa_Ofertas` (`IDEmpresa`),
  ADD KEY `FK_Pais_OfertaTrabajos` (`IDPais`),
  ADD KEY `FK_Departamento_OfertaTrabajos` (`IDDepartamento`),
  ADD KEY `FK_AreaTrabajo_OfertaTrabajo` (`IDCategoria`),
  ADD KEY `FK_Cargo_OfertaTrabajo` (`IDDesempenado`),
  ADD KEY `FK_TipoExperiencia_ofertaEmpleo` (`IDAreaExperiencia`);

--
-- Indices de la tabla `empresa_perfil`
--
ALTER TABLE `empresa_perfil`
  ADD PRIMARY KEY (`IDEmpresa`),
  ADD KEY `FK_Cuentas_Empresa` (`IDUsuario`),
  ADD KEY `FK_Empresa_Tipo` (`IDTipoEmpresa`),
  ADD KEY `FK_Empresas_Pais` (`IDPais`),
  ADD KEY `FK_Empresas_Departamento` (`IDDepartamento`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`IDFacultates`);

--
-- Indices de la tabla `guardar-chats-candidato`
--
ALTER TABLE `guardar-chats-candidato`
  ADD PRIMARY KEY (`chats-empresas`),
  ADD KEY `chats-candidatos-reclutador` (`IDUsuario`);

--
-- Indices de la tabla `guardar_candidatos_empresas`
--
ALTER TABLE `guardar_candidatos_empresas`
  ADD PRIMARY KEY (`IDCandidatos`),
  ADD KEY `FK_Candidatos_Usuarioss` (`IDUsuario`),
  ADD KEY `FK_Candidatos_empresass` (`IDEmpresa`);

--
-- Indices de la tabla `guardar_seguimiento_candidato`
--
ALTER TABLE `guardar_seguimiento_candidato`
  ADD PRIMARY KEY (`IDSeguimiento`),
  ADD KEY `fk_seguimiento_usuario` (`IDUsuario`),
  ADD KEY `fk_seguimiento_empresa` (`IDEmpresa`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`IDNotificacion`),
  ADD KEY `FK_Notificaciones_Usuarios` (`IDUsuario`);

--
-- Indices de la tabla `paises_habilitado_empresa`
--
ALTER TABLE `paises_habilitado_empresa`
  ADD PRIMARY KEY (`IDPaisesHabilitado`),
  ADD KEY `FK_paises_mostrar` (`IDPais`),
  ADD KEY `fk_usuarios_mostrarpais` (`IDUsuario`);

--
-- Indices de la tabla `proceso_seleccion_candidato`
--
ALTER TABLE `proceso_seleccion_candidato`
  ADD PRIMARY KEY (`IDProceso`),
  ADD KEY `FK_Proceso_Usuario` (`IDUsuario`),
  ADD KEY `FK_Proceso_Empresa` (`IDEmpresa`),
  ADD KEY `FK_Proceso_Tipo` (`IDSeleccion`);

--
-- Indices de la tabla `reportes_generales`
--
ALTER TABLE `reportes_generales`
  ADD PRIMARY KEY (`IDReporte`),
  ADD KEY `fk_reporte_empresa` (`IDEmpresa`);

--
-- Indices de la tabla `reporte_seguimiento`
--
ALTER TABLE `reporte_seguimiento`
  ADD PRIMARY KEY (`Reporte_Seguimiento`),
  ADD KEY `Reporte_TipoSeleccion` (`IDSeleccion`),
  ADD KEY `Reporte_Empresa_Seleccion` (`IDEmpresa`);

--
-- Indices de la tabla `servicio_solicitado_empresa`
--
ALTER TABLE `servicio_solicitado_empresa`
  ADD PRIMARY KEY (`IDServcio`),
  ADD KEY `FK_Servcio_Usuario` (`IDUsuario`);

--
-- Indices de la tabla `solicitud_pago_empresa`
--
ALTER TABLE `solicitud_pago_empresa`
  ADD PRIMARY KEY (`IDPago`),
  ADD KEY `Fk_Pago_Usuario` (`IDUsuario`);

--
-- Indices de la tabla `soporte_areas_experiencia`
--
ALTER TABLE `soporte_areas_experiencia`
  ADD PRIMARY KEY (`IDTipo`);

--
-- Indices de la tabla `soporte_areas_habilidades`
--
ALTER TABLE `soporte_areas_habilidades`
  ADD PRIMARY KEY (`IDHabilidades`);

--
-- Indices de la tabla `soporte_areas_trabajos`
--
ALTER TABLE `soporte_areas_trabajos`
  ADD PRIMARY KEY (`IDCategoria`);

--
-- Indices de la tabla `soporte_cargos_desempenado`
--
ALTER TABLE `soporte_cargos_desempenado`
  ADD PRIMARY KEY (`IDDesempenado`),
  ADD KEY `Fk_areas_desempeno` (`IDCategoria`);

--
-- Indices de la tabla `soporte_paises`
--
ALTER TABLE `soporte_paises`
  ADD PRIMARY KEY (`IDPais`);

--
-- Indices de la tabla `soporte_paises_departamento`
--
ALTER TABLE `soporte_paises_departamento`
  ADD PRIMARY KEY (`IDDepartamento`),
  ADD KEY `FK_Pais_Departamento` (`IDPais`);

--
-- Indices de la tabla `soporte_tipo_empresa`
--
ALTER TABLE `soporte_tipo_empresa`
  ADD PRIMARY KEY (`IDTipoEmpresa`);

--
-- Indices de la tabla `soporte_tipo_experiencia`
--
ALTER TABLE `soporte_tipo_experiencia`
  ADD PRIMARY KEY (`IDAreaExperiencia`);

--
-- Indices de la tabla `tipo_seleccion_candidatos`
--
ALTER TABLE `tipo_seleccion_candidatos`
  ADD PRIMARY KEY (`IDSeleccion`);

--
-- Indices de la tabla `usuarios_conocimentos`
--
ALTER TABLE `usuarios_conocimentos`
  ADD PRIMARY KEY (`IDConocimientos`),
  ADD KEY `FK_Conocimientos_Cuenta` (`IDUsuario`),
  ADD KEY `FK_Conocimientos_Experiencia` (`IDTipo`);

--
-- Indices de la tabla `usuarios_cuentas`
--
ALTER TABLE `usuarios_cuentas`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- Indices de la tabla `usuarios_documentos`
--
ALTER TABLE `usuarios_documentos`
  ADD PRIMARY KEY (`IDDocumento`),
  ADD KEY `FK_usuarios_documentos` (`IDUsuario`);

--
-- Indices de la tabla `usuarios_habilidades`
--
ALTER TABLE `usuarios_habilidades`
  ADD PRIMARY KEY (`IDHabilidad`),
  ADD KEY `FK_Usuario_Habilidades` (`IDHabilidades`),
  ADD KEY `FK_Cuentas_Habilidades` (`IDUsuario`);

--
-- Indices de la tabla `usuarios_idiomas`
--
ALTER TABLE `usuarios_idiomas`
  ADD PRIMARY KEY (`IDIdioma`),
  ADD KEY `FK_Idioma_Usuario` (`IDUsuario`);

--
-- Indices de la tabla `usuarios_visitas`
--
ALTER TABLE `usuarios_visitas`
  ADD KEY `FK_Vistas_Empresas` (`IDEmpresa`),
  ADD KEY `FK_Cuentas_Visitas` (`IDUsuario`);

--
-- Indices de la tabla `usuario_areas`
--
ALTER TABLE `usuario_areas`
  ADD PRIMARY KEY (`IDAreas`),
  ADD KEY `FK_Usuario_Areas_Trabajos` (`IDCategoria`),
  ADD KEY `FK_Usuario_Cuentas` (`IDUsuario`),
  ADD KEY `fk_areas_cargos` (`IDDesempenado`);

--
-- Indices de la tabla `usuario_educacion`
--
ALTER TABLE `usuario_educacion`
  ADD PRIMARY KEY (`IDEducacion`),
  ADD KEY `FK_Usuario_Educacion` (`IDUsuario`),
  ADD KEY `FK_Pais_Educacion` (`IDPais`),
  ADD KEY `FK_Carreras_Educacuin` (`Id_Carrera`);

--
-- Indices de la tabla `usuario_experiencia`
--
ALTER TABLE `usuario_experiencia`
  ADD PRIMARY KEY (`IDExperiencia`),
  ADD KEY `FK_Usuario_Experienacia` (`IDUsuario`),
  ADD KEY `FK_Experiencia_areas_trabajos` (`IDCategoria`),
  ADD KEY `FK_AreasEmpresas_Experiencia` (`IDTipoEmpresa`),
  ADD KEY `FK_Experiecia_Desempeno` (`IDDesempenado`);

--
-- Indices de la tabla `usuario_favoritos_postulaciones`
--
ALTER TABLE `usuario_favoritos_postulaciones`
  ADD PRIMARY KEY (`IDFavoritos`),
  ADD KEY `Fk_usuario_favoritos` (`IDUsuario`),
  ADD KEY `FK_Postulaciones_Favoritos` (`IDpostulaciones`);

--
-- Indices de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD PRIMARY KEY (`IDPerfil`),
  ADD KEY `FK_Usuario_Perfil` (`IDUsuario`),
  ADD KEY `FK_Usuario_Pais` (`IDPais`),
  ADD KEY `FK_Usuaio_Departamento` (`IDDepartamento`),
  ADD KEY `FK_Usuario_TipoExperiencia` (`IDAreaExperiencia`);

--
-- Indices de la tabla `usuario_postulaciones`
--
ALTER TABLE `usuario_postulaciones`
  ADD PRIMARY KEY (`IDOfertaTrabajo`),
  ADD KEY `Fk_Cuentas_Postulaciones` (`IDUsuario`),
  ADD KEY `FK_Postulaciones_Ofertas` (`IDpostulaciones`);

--
-- Indices de la tabla `usuario_referencia`
--
ALTER TABLE `usuario_referencia`
  ADD PRIMARY KEY (`IDReferencia`),
  ADD KEY `FK_Usuario_Referencia` (`IDUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `Id_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `IDchats` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_ofertas_trabajos`
--
ALTER TABLE `empresa_ofertas_trabajos`
  MODIFY `IDpostulaciones` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_perfil`
--
ALTER TABLE `empresa_perfil`
  MODIFY `IDEmpresa` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `IDFacultates` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `guardar-chats-candidato`
--
ALTER TABLE `guardar-chats-candidato`
  MODIFY `chats-empresas` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guardar_candidatos_empresas`
--
ALTER TABLE `guardar_candidatos_empresas`
  MODIFY `IDCandidatos` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guardar_seguimiento_candidato`
--
ALTER TABLE `guardar_seguimiento_candidato`
  MODIFY `IDSeguimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `IDNotificacion` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paises_habilitado_empresa`
--
ALTER TABLE `paises_habilitado_empresa`
  MODIFY `IDPaisesHabilitado` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proceso_seleccion_candidato`
--
ALTER TABLE `proceso_seleccion_candidato`
  MODIFY `IDProceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportes_generales`
--
ALTER TABLE `reportes_generales`
  MODIFY `IDReporte` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_seguimiento`
--
ALTER TABLE `reporte_seguimiento`
  MODIFY `Reporte_Seguimiento` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio_solicitado_empresa`
--
ALTER TABLE `servicio_solicitado_empresa`
  MODIFY `IDServcio` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_pago_empresa`
--
ALTER TABLE `solicitud_pago_empresa`
  MODIFY `IDPago` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `soporte_areas_experiencia`
--
ALTER TABLE `soporte_areas_experiencia`
  MODIFY `IDTipo` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `soporte_areas_habilidades`
--
ALTER TABLE `soporte_areas_habilidades`
  MODIFY `IDHabilidades` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `soporte_areas_trabajos`
--
ALTER TABLE `soporte_areas_trabajos`
  MODIFY `IDCategoria` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `soporte_cargos_desempenado`
--
ALTER TABLE `soporte_cargos_desempenado`
  MODIFY `IDDesempenado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT de la tabla `soporte_paises`
--
ALTER TABLE `soporte_paises`
  MODIFY `IDPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `soporte_paises_departamento`
--
ALTER TABLE `soporte_paises_departamento`
  MODIFY `IDDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `soporte_tipo_empresa`
--
ALTER TABLE `soporte_tipo_empresa`
  MODIFY `IDTipoEmpresa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `soporte_tipo_experiencia`
--
ALTER TABLE `soporte_tipo_experiencia`
  MODIFY `IDAreaExperiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipo_seleccion_candidatos`
--
ALTER TABLE `tipo_seleccion_candidatos`
  MODIFY `IDSeleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios_conocimentos`
--
ALTER TABLE `usuarios_conocimentos`
  MODIFY `IDConocimientos` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_cuentas`
--
ALTER TABLE `usuarios_cuentas`
  MODIFY `IDUsuario` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_documentos`
--
ALTER TABLE `usuarios_documentos`
  MODIFY `IDDocumento` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_habilidades`
--
ALTER TABLE `usuarios_habilidades`
  MODIFY `IDHabilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_idiomas`
--
ALTER TABLE `usuarios_idiomas`
  MODIFY `IDIdioma` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_areas`
--
ALTER TABLE `usuario_areas`
  MODIFY `IDAreas` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_educacion`
--
ALTER TABLE `usuario_educacion`
  MODIFY `IDEducacion` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_experiencia`
--
ALTER TABLE `usuario_experiencia`
  MODIFY `IDExperiencia` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_favoritos_postulaciones`
--
ALTER TABLE `usuario_favoritos_postulaciones`
  MODIFY `IDFavoritos` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  MODIFY `IDPerfil` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_postulaciones`
--
ALTER TABLE `usuario_postulaciones`
  MODIFY `IDOfertaTrabajo` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_referencia`
--
ALTER TABLE `usuario_referencia`
  MODIFY `IDReferencia` int(100) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `fk_facultades_carreras` FOREIGN KEY (`ID_Facultades`) REFERENCES `facultades` (`IDFacultates`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `fk_chats_empresa` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa_perfil` (`IDEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chats_usuer` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa_ofertas_trabajos`
--
ALTER TABLE `empresa_ofertas_trabajos`
  ADD CONSTRAINT `FK_AreaTrabajo_OfertaTrabajo` FOREIGN KEY (`IDCategoria`) REFERENCES `soporte_areas_trabajos` (`IDCategoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Cargo_OfertaTrabajo` FOREIGN KEY (`IDDesempenado`) REFERENCES `soporte_cargos_desempenado` (`IDDesempenado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Departamento_OfertaTrabajos` FOREIGN KEY (`IDDepartamento`) REFERENCES `soporte_paises_departamento` (`IDDepartamento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Empresa_Ofertas` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa_perfil` (`IDEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Pais_OfertaTrabajos` FOREIGN KEY (`IDPais`) REFERENCES `soporte_paises` (`IDPais`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TipoExperiencia_ofertaEmpleo` FOREIGN KEY (`IDAreaExperiencia`) REFERENCES `soporte_tipo_experiencia` (`IDAreaExperiencia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa_perfil`
--
ALTER TABLE `empresa_perfil`
  ADD CONSTRAINT `FK_Cuentas_Empresa` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Empresa_Tipo` FOREIGN KEY (`IDTipoEmpresa`) REFERENCES `soporte_tipo_empresa` (`IDTipoEmpresa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Empresas_Departamento` FOREIGN KEY (`IDDepartamento`) REFERENCES `soporte_paises_departamento` (`IDDepartamento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Empresas_Pais` FOREIGN KEY (`IDPais`) REFERENCES `soporte_paises` (`IDPais`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `guardar-chats-candidato`
--
ALTER TABLE `guardar-chats-candidato`
  ADD CONSTRAINT `chats-candidatos-reclutador` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `guardar_candidatos_empresas`
--
ALTER TABLE `guardar_candidatos_empresas`
  ADD CONSTRAINT `FK_Candidatos_Usuarioss` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Candidatos_empresass` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa_perfil` (`IDEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `guardar_seguimiento_candidato`
--
ALTER TABLE `guardar_seguimiento_candidato`
  ADD CONSTRAINT `fk_seguimiento_empresa` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa_perfil` (`IDEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seguimiento_usuario` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `FK_Notificaciones_Usuarios` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paises_habilitado_empresa`
--
ALTER TABLE `paises_habilitado_empresa`
  ADD CONSTRAINT `FK_paises_mostrar` FOREIGN KEY (`IDPais`) REFERENCES `soporte_paises` (`IDPais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_mostrarpais` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proceso_seleccion_candidato`
--
ALTER TABLE `proceso_seleccion_candidato`
  ADD CONSTRAINT `FK_Proceso_Empresa` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa_perfil` (`IDEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Proceso_Tipo` FOREIGN KEY (`IDSeleccion`) REFERENCES `tipo_seleccion_candidatos` (`IDSeleccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Proceso_Usuario` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reportes_generales`
--
ALTER TABLE `reportes_generales`
  ADD CONSTRAINT `fk_reporte_empresa` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa_perfil` (`IDEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte_seguimiento`
--
ALTER TABLE `reporte_seguimiento`
  ADD CONSTRAINT `Reporte_Empresa_Seleccion` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa_perfil` (`IDEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Reporte_TipoSeleccion` FOREIGN KEY (`IDSeleccion`) REFERENCES `tipo_seleccion_candidatos` (`IDSeleccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_solicitado_empresa`
--
ALTER TABLE `servicio_solicitado_empresa`
  ADD CONSTRAINT `FK_Servcio_Usuario` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_pago_empresa`
--
ALTER TABLE `solicitud_pago_empresa`
  ADD CONSTRAINT `Fk_Pago_Usuario` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `soporte_cargos_desempenado`
--
ALTER TABLE `soporte_cargos_desempenado`
  ADD CONSTRAINT `Fk_areas_desempeno` FOREIGN KEY (`IDCategoria`) REFERENCES `soporte_areas_trabajos` (`IDCategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `soporte_paises_departamento`
--
ALTER TABLE `soporte_paises_departamento`
  ADD CONSTRAINT `FK_Pais_Departamento` FOREIGN KEY (`IDPais`) REFERENCES `soporte_paises` (`IDPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_conocimentos`
--
ALTER TABLE `usuarios_conocimentos`
  ADD CONSTRAINT `FK_Conocimientos_Cuenta` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Conocimientos_Experiencia` FOREIGN KEY (`IDTipo`) REFERENCES `soporte_areas_experiencia` (`IDTipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_documentos`
--
ALTER TABLE `usuarios_documentos`
  ADD CONSTRAINT `FK_usuarios_documentos` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_habilidades`
--
ALTER TABLE `usuarios_habilidades`
  ADD CONSTRAINT `FK_Cuentas_Habilidades` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios_cuentas` (`IDUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Usuario_Habilidades` FOREIGN KEY (`IDHabilidades`) REFERENCES `soporte_areas_habilidades` (`IDHabilidades`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

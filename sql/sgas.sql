-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/12/2022 às 04:29
-- Versão do servidor: 10.1.21-MariaDB
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sgas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `classroom`
--

CREATE TABLE `classroom` (
  `room_code` varchar(32) NOT NULL,
  `institute_id` int(11) NOT NULL,
  `available` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `capacity` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `classroom`
--

INSERT INTO `classroom` (`room_code`, `institute_id`, `available`, `created_at`, `updated_at`, `deleted_at`, `capacity`, `isActive`) VALUES
('B4102', 4, 1, '2022-12-01 04:02:38', '2022-12-01 04:02:50', '0000-00-00 00:00:00', 100, 1),
('C1105', 1, 1, '2022-11-07 02:58:43', '2022-11-25 19:54:11', '0000-00-00 00:00:00', 80, 1),
('LDC2', 1, 1, '2022-11-07 04:41:33', '2022-11-07 04:41:33', '0000-00-00 00:00:00', 60, 1),
('LDC5', 1, 1, '2022-11-07 04:40:47', '2022-11-07 04:40:47', '0000-00-00 00:00:00', 50, 1),
('LDC6', 1, 1, '2022-11-07 04:53:33', '2022-11-07 04:53:33', '0000-00-00 00:00:00', 50, 1),
('LEMP', 4, 1, '2022-11-25 18:40:34', '2022-11-26 08:24:09', '0000-00-00 00:00:00', 50, 1),
('X1102', 3, 1, '2022-11-26 04:23:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 120, 1),
('X1103', 3, 1, '2022-11-26 04:24:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 120, 1),
('X1302', 3, 1, '2022-11-25 18:40:56', '2022-11-25 18:40:56', '0000-00-00 00:00:00', 120, 1),
('X1303', 3, 1, '2022-11-26 04:24:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 120, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `institute`
--

CREATE TABLE `institute` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `acronym` varchar(24) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `institute`
--

INSERT INTO `institute` (`id`, `name`, `acronym`, `created_at`, `updated_at`, `deleted_at`, `isActive`) VALUES
(1, 'Instituto de MatemÃ¡tica e ComputaÃ§Ã£o', 'IMC', '2022-11-06 20:56:48', '2022-11-25 18:39:16', '0000-00-00 00:00:00', 1),
(2, 'Instituto de FÃ­sica e QuÃ­mica', 'IFQ', '2022-11-06 20:57:06', '2022-11-25 18:39:45', '0000-00-00 00:00:00', 1),
(3, 'Instituto de Engenharia MecÃ¢nica', 'IEM', '2022-11-06 21:18:33', '2022-11-25 19:50:22', '0000-00-00 00:00:00', 1),
(4, 'Instituto de Engenharia de ProduÃ§Ã£o e GestÃ£o', 'IEPG', '2022-11-25 17:46:52', '2022-11-25 17:46:52', '0000-00-00 00:00:00', 1),
(5, 'Instituto de Recursos Naturais', 'IRN', '2022-11-25 18:26:08', '2022-11-25 18:26:08', '0000-00-00 00:00:00', 1),
(6, 'Instituto de Engenharia de Sistemas e Tecnologia da InformaÃ§Ã£o', 'IESTI', '2022-11-25 18:26:52', '2022-11-25 18:26:52', '0000-00-00 00:00:00', 1),
(7, 'Instituto de Sistemas ElÃ©tricos e Energia', 'ISEE', '2022-12-01 03:59:48', '2022-12-01 04:00:29', '0000-00-00 00:00:00', 1),
(8, 'Instituto de Engenharias Integradas', 'IEI', '2022-12-01 04:00:10', '2022-12-01 04:00:10', '0000-00-00 00:00:00', 0),
(9, 'Instituto de CiÃªncias TecnolÃ³gicas', 'ICT', '2022-12-01 04:00:22', '2022-12-01 04:00:22', '0000-00-00 00:00:00', 0),
(10, 'Instituto de CiÃªncias Puras e Aplicadas', 'ICPA', '2022-12-01 04:00:45', '2022-12-01 04:00:45', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `requestor_id` int(11) NOT NULL,
  `classroom_id` varchar(32) NOT NULL,
  `request_time_start` datetime NOT NULL,
  `request_time_end` datetime NOT NULL,
  `request_status` enum('A','R','P','E') DEFAULT 'P',
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rejected_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `request`
--

INSERT INTO `request` (`request_id`, `requestor_id`, `classroom_id`, `request_time_start`, `request_time_end`, `request_status`, `requested_at`, `approved_at`, `rejected_at`) VALUES
(2, 15, 'C1105', '2022-11-26 06:00:00', '2022-11-26 08:00:00', 'P', '2022-11-26 03:27:13', '2022-11-26 07:47:26', '2022-11-26 07:47:33'),
(3, 15, 'X1302', '2022-11-30 14:00:00', '2022-11-30 19:00:00', 'A', '2022-11-26 04:09:18', '2022-11-26 06:52:56', '0000-00-00 00:00:00'),
(4, 14, 'LDC6', '2022-11-29 07:00:00', '2022-11-29 10:30:00', 'A', '2022-11-26 04:31:25', '2022-11-26 06:39:51', '0000-00-00 00:00:00'),
(5, 14, 'C1105', '2022-12-01 13:30:00', '2022-12-01 16:30:00', 'A', '2022-11-26 04:52:20', '2022-11-26 06:23:52', '0000-00-00 00:00:00'),
(6, 1, 'C1105', '2022-11-26 06:00:00', '2022-11-26 08:00:00', 'A', '2022-11-26 06:42:33', '2022-11-26 07:47:27', '2022-11-26 07:38:18'),
(7, 1, 'X1102', '2022-11-16 06:00:00', '2022-11-16 07:30:00', 'R', '2022-12-01 02:37:05', '0000-00-00 00:00:00', '2022-12-01 02:37:51'),
(8, 1, 'X1102', '2022-11-28 06:00:00', '2022-11-28 07:30:00', 'P', '2022-12-01 02:43:39', '0000-00-00 00:00:00', '2022-12-01 02:43:42'),
(9, 1, 'X1102', '2022-11-28 06:00:00', '2022-11-28 07:30:00', 'P', '2022-12-01 02:44:23', '0000-00-00 00:00:00', '2022-12-01 02:44:30'),
(10, 1, 'X1303', '2022-11-28 06:00:00', '2022-11-28 00:00:00', 'P', '2022-12-01 02:45:47', '0000-00-00 00:00:00', '2022-12-01 02:45:51'),
(11, 1, 'X1103', '2022-12-14 06:00:00', '2022-12-14 07:30:00', 'A', '2022-12-01 02:58:06', '2022-12-01 03:39:32', '2022-12-01 03:15:19'),
(12, 15, 'C1105', '2022-11-25 06:00:00', '2022-11-26 08:00:00', 'E', '2022-11-26 03:27:13', '2022-11-26 07:47:26', '2022-11-26 07:47:33'),
(13, 15, 'LDC6', '2022-12-02 06:00:00', '2022-12-02 07:00:00', 'P', '2022-12-01 03:14:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'LDC2', '2022-12-02 06:00:00', '2022-12-02 08:30:00', 'P', '2022-12-01 03:39:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'X1103', '2022-12-14 06:30:00', '2022-12-14 08:00:00', 'P', '2022-12-01 03:39:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 15, 'LDC2', '2022-12-15 06:00:00', '2022-12-15 08:00:00', 'A', '2022-12-01 03:58:45', '2022-12-01 04:17:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `type` enum('A','M','U') NOT NULL DEFAULT 'U',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `altered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass_word`, `cpf`, `telephone`, `type`, `created_at`, `altered_at`) VALUES
(1, 'Nixon Silva', 'nixonmoreira42@gmail.com', 'a9f1a78e88b7361ca8d7e5e62e25815c339a493d071ab2f01f57785c2916a164', '124.248.366-71', '(35) 9 9767-8384', 'A', '2022-11-06 18:55:04', '2022-11-06 18:55:04'),
(2, 'Rafael Soares', 'rafaelsoares@gmail.com', 'a9f1a78e88b7361ca8d7e5e62e25815c339a493d071ab2f01f57785c2916a164', '951.423.544-43', '(12) 1 1111-1111', 'U', '2022-11-06 18:55:04', '2022-11-06 21:34:12'),
(4, 'Ulf Westberg', 'ulf@lemon.com', 'a9f1a78e88b7361ca8d7e5e62e25815c339a493d071ab2f01f57785c2916a164', '451.431.242-80', '(35) 9 9621-2201', 'U', '2022-11-06 18:55:04', '2022-11-06 22:15:25'),
(8, 'Rafael Carvalho', 'rafacar@gmail.com', '06f74868f8ff669923384e737b8f60836966de21100705e31367987a71e8776d', '914.671.223-27', '(35) 4 2424-2424', 'U', '2022-11-06 23:20:59', '2022-11-06 22:20:59'),
(9, 'Bruna Moreira', 'brunamoreira@gmail.com', 'eee23bcc7b4814689db9db5037ab429003327b920716cc84e64ab73a31fa4283', '357.443.275-50', '(35) 1 2121-2121', 'U', '2022-11-06 23:25:28', '2022-11-06 22:25:28'),
(10, 'Fernando de SÃ¡', 'fernandodesagaming@gmail.com', '778d3a97ebff89b9d613a894cba8974018b2e3ac414c87424456288436b4a51e', '489.647.269-10', '(35) 3 4315-5021', 'U', '2022-11-06 23:37:26', '2022-11-06 22:37:26'),
(12, 'Beatriz Soares', 'beatriz@gmail.com', '7551580e2690c97caccbfd1d483b80e0b9de220bd85d3a9a8a50fb4409467036', '251.911.728-17', '(35) 9 9999-9999', 'U', '2022-11-07 04:42:49', '2022-11-07 03:42:49'),
(13, 'Markus Kalevi', 'markus@gmail.com', '2074553969263a53aaddfa323171fa66ecc6557ee44b157febacff5d7fe1cff9', '867.337.533-91', '(35) 9 9999-9999', 'U', '2022-11-07 04:51:47', '2022-11-07 03:51:47'),
(14, 'Kevin Magnussen', 'kmag@gmail.com', 'fdf48176dcdff048108e3f03bc3ded8dcde72e018fa0af0a10a4db1dd2f859a4', '070.751.040-63', '(35) 1 1234-4444', 'M', '2022-11-25 20:59:31', '2022-11-25 21:37:44'),
(15, 'Nicholas Latifi', 'goat@gmail.com', 'a1a95cfaf5ba1b8542b7f3519a021fa227f0e446f969444b4bcaeb21678b0e7d', '417.287.130-56', '(35) 9 9777-1111', 'U', '2022-11-25 21:38:28', '2022-11-25 21:38:28'),
(16, 'Alex Oliveira', 'alex@gmail.com', 'c84a48b15c51a601eb3fab03366013050a74cc476099ca98249a33448aef84fc', '471.676.670-56', '(11) 9 9999-9999', 'U', '2022-11-26 08:24:54', '2022-11-26 08:24:54'),
(17, 'Bruno Guazelli Batista', 'brunoguazzelli@unifei.edu.br', '1659d828b985e1095f022d7507e199d41f3ff383ac3862ec7275728bcf2dcea3', '017.235.680-66', '(35) 9 9991-0000', 'A', '2022-12-01 04:24:30', '2022-12-01 04:24:30');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`room_code`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Índices de tabela `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `acronym` (`acronym`);

--
-- Índices de tabela `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `classroom_id` (`classroom_id`),
  ADD KEY `requestor_id` (`requestor_id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `institute`
--
ALTER TABLE `institute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `institute` (`id`);

--
-- Restrições para tabelas `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`room_code`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`requestor_id`) REFERENCES `user` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `cancelExpiredRequests` ON SCHEDULE EVERY 30 MINUTE STARTS '2022-11-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE request
	SET request_status = 'E'
    WHERE (request_time_start < NOW()) AND request_status = 'P'$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

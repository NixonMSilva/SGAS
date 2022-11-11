-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2022 às 00:40
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
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `classroom`
--

INSERT INTO `classroom` (`room_code`, `institute_id`, `available`, `created_at`, `updated_at`, `deleted_at`, `capacity`) VALUES
('C1105', 1, 1, '2022-11-07 02:58:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 80),
('LDC2', 1, 1, '2022-11-07 04:41:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 60),
('LDC5', 1, 1, '2022-11-07 04:40:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 50),
('LDC6', 1, 1, '2022-11-07 04:53:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 50);

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
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `institute`
--

INSERT INTO `institute` (`id`, `name`, `acronym`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Instituto de Matemática e Computação', 'IMC', '2022-11-06 20:56:48', '2022-11-06 20:56:48', '0000-00-00 00:00:00'),
(2, 'Instituto de Física e Química', 'IFQ', '2022-11-06 20:57:06', '2022-11-06 20:57:06', '0000-00-00 00:00:00'),
(3, 'Instituto de Engenharia Mecânica', 'IEM', '2022-11-06 21:18:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `requestor_id` int(11) NOT NULL,
  `classroom_id` varchar(32) NOT NULL,
  `request_date` date NOT NULL,
  `request_time_start` datetime NOT NULL,
  `request_time_end` datetime NOT NULL,
  `request_status` enum('A','R','P') DEFAULT 'P',
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `declined_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Teste1', 'teste1@teste.com', 'a9f1a78e88b7361ca8d7e5e62e25815c339a493d071ab2f01f57785c2916a164', '124.248.366-71', '(35) 9 9123-4567', 'A', '2022-11-06 18:55:04', '2022-11-06 18:55:04'),
(2, 'Teste2', 'teste1@teste.com', '773fb49987462fd744039d0a4101dd14f7f36e673108420ef7c856f23645e6bb', '951.423.544-43', '(12) 1 1111-1111', 'U', '2022-11-06 22:34:12', '2022-11-06 21:34:12'),
(3, 'Teste3', 'teste1@teste.com', '4522c34369c5c7ef91fd9fef56a00a6c0358bed6993700efc114d5df6ba027ce', '451.431.242-80', '(35) 9 9621-2201', 'U', '2022-11-06 23:15:25', '2022-11-06 22:15:25'),
(4, 'Teste4', 'teste1@teste.com', '06f74868f8ff669923384e737b8f60836966de21100705e31367987a71e8776d', '914.671.223-27', '(35) 4 2424-2424', 'U', '2022-11-06 23:20:59', '2022-11-06 22:20:59'),
(5, 'Teste5', 'teste1@teste.com', 'eee23bcc7b4814689db9db5037ab429003327b920716cc84e64ab73a31fa4283', '357.443.275-50', '(35) 1 2121-2121', 'U', '2022-11-06 23:25:28', '2022-11-06 22:25:28'),
(6, 'Teste6', 'teste1@teste.com', '778d3a97ebff89b9d613a894cba8974018b2e3ac414c87424456288436b4a51e', '489.647.269-10', '(35) 3 4315-5021', 'U', '2022-11-06 23:37:26', '2022-11-06 22:37:26'),
(7, 'Teste7', 'teste1@teste.com', '7551580e2690c97caccbfd1d483b80e0b9de220bd85d3a9a8a50fb4409467036', '251.911.728-17', '(35) 9 9999-9999', 'U', '2022-11-07 04:42:49', '2022-11-07 03:42:49'),
(8, 'Teste8', 'teste1@teste.com', '2074553969263a53aaddfa323171fa66ecc6557ee44b157febacff5d7fe1cff9', '867.337.533-91', '(35) 9 9999-9999', 'U', '2022-11-07 04:51:47', '2022-11-07 03:51:47');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2022 às 18:12
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `consulta_voto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor_votacao`
--

CREATE TABLE `eleitor_votacao` (
  `id` int(11) NOT NULL,
  `nome_eleitor` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `matricula` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zona` int(11) NOT NULL,
  `registrado_por` int(11) NOT NULL,
  `votou` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `protocolo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `eleitor_votacao`
--

INSERT INTO `eleitor_votacao` (`id`, `nome_eleitor`, `cpf`, `matricula`, `zona`, `registrado_por`, `votou`, `data_hora`, `foto`, `protocolo`) VALUES
(1, 'Victor de Andrade Machado', 93979894215, '28567', 0, 12, 1, '2022-11-16 16:27:44', '', 1216172652);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `eleitor_votacao`
--
ALTER TABLE `eleitor_votacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eleitor_votacao`
--
ALTER TABLE `eleitor_votacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

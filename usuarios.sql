-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/10/2023 às 14:51
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cesta_fundacao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `local` varchar(200) NOT NULL,
  `nivel` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `local`, `nivel`, `ativo`, `cadastro`) VALUES
(1, 'Administrador', 'admin', '1b5ce369219d7357a392c5799256a86be9413427', 'admin@demo.com.br', 'EMEF Prof. Maria Tereza Ganassali de Oliveira', 2, 1, '2020-02-06 10:16:08'),
(2, 'Victor Machado', 'victormachado', 'cd71790f6f7706fbf18d8acb05f70a9160b87cb5', 'victor.machado@jacarei.sp.gov.br', 'Prefeitura de Jacarei', 2, 1, '2021-10-26 10:18:00'),
(3, 'ANA CLECIA DO PRADO', 'anaclecia', '31ce8aad1f5eea345e47a4d84bcf2150f4063fdd', '00', 'Gerência de Materiais', 2, 1, '2023-06-01 13:55:23'),
(4, 'CARLOS ALBERTO ABREU DOS SANTOS', 'carlosabreu', '90dc5c69e0045e3cd33f00f2b615064ccf893a71', '0', 'Departamento de Suprimentos', 2, 1, '2023-06-01 16:16:05'),
(5, 'ANDERSON GABRIEL DE SOUZA FARIA', 'andersonfaria', 'bd76c767dfedf86adb6012ea7bb3a4cfa233f9c3', '0', 'Suprimentos', 2, 1, '2023-06-01 16:20:25'),
(6, 'LEVINA MARCAL FLORINDO', 'levinaflorindo', 'abc994f24e615fcf353dc39bbd5283c5e9609fdd', 'nulo', 'Suprimentos', 2, 1, '2023-06-02 13:34:30'),
(7, 'MARIA VALERIA DE MELO', 'mariamelo', 'cf34416259efcbbc1fed4131b4c68e9f40aafc8d', 'nulo', 'Suprimentos', 2, 1, '2023-06-02 13:35:40'),
(8, 'RITA DE CASSIA SOUZA', 'ritasouza', '53cf9f6255e78b2faad5a36f923a94ee974ad92a', 'nulo', 'nulo', 2, 1, '2023-06-02 13:36:42'),
(9, 'IRACI FERREIRA DA SILVA FIGUEIRA', 'iracifigueira', 'a4aa6855f1f934b3d475b444062d8f9692a40d42', 'nulo', 'nulo', 2, 1, '2023-06-02 13:37:49'),
(10, 'JOSÉ ELMAR GONÇALVES BRAGA', 'josebraga', '565ce8f45501ad8dced581ca0f2c5a82a4616518', 'Nulo', 'Nulo', 2, 1, '2023-06-05 09:20:50'),
(11, 'Ronaldo Martins Ramos', 'ronaldo.martins', 'a274aa7aa2dab192a0998032398a411ebb931f64', 'ronaldo.martins@jacarei.sp.gov.br', '', 1, 1, '2023-08-07 16:15:38'),
(1, 'Administrador', 'admin', '1b5ce369219d7357a392c5799256a86be9413427', 'admin@demo.com.br', 'EMEF Prof. Maria Tereza Ganassali de Oliveira', 2, 1, '2020-02-06 10:16:08'),
(2, 'Victor Machado', 'victormachado', 'cd71790f6f7706fbf18d8acb05f70a9160b87cb5', 'victor.machado@jacarei.sp.gov.br', 'Prefeitura de Jacarei', 2, 1, '2021-10-26 10:18:00'),
(3, 'ANA CLECIA DO PRADO', 'anaclecia', '31ce8aad1f5eea345e47a4d84bcf2150f4063fdd', '00', 'Gerência de Materiais', 2, 1, '2023-06-01 13:55:23'),
(4, 'CARLOS ALBERTO ABREU DOS SANTOS', 'carlosabreu', '90dc5c69e0045e3cd33f00f2b615064ccf893a71', '0', 'Departamento de Suprimentos', 2, 1, '2023-06-01 16:16:05'),
(5, 'ANDERSON GABRIEL DE SOUZA FARIA', 'andersonfaria', 'bd76c767dfedf86adb6012ea7bb3a4cfa233f9c3', '0', 'Suprimentos', 2, 1, '2023-06-01 16:20:25'),
(6, 'LEVINA MARCAL FLORINDO', 'levinaflorindo', 'abc994f24e615fcf353dc39bbd5283c5e9609fdd', 'nulo', 'Suprimentos', 2, 1, '2023-06-02 13:34:30'),
(7, 'MARIA VALERIA DE MELO', 'mariamelo', 'cf34416259efcbbc1fed4131b4c68e9f40aafc8d', 'nulo', 'Suprimentos', 2, 1, '2023-06-02 13:35:40'),
(8, 'RITA DE CASSIA SOUZA', 'ritasouza', '53cf9f6255e78b2faad5a36f923a94ee974ad92a', 'nulo', 'nulo', 2, 1, '2023-06-02 13:36:42'),
(9, 'IRACI FERREIRA DA SILVA FIGUEIRA', 'iracifigueira', 'a4aa6855f1f934b3d475b444062d8f9692a40d42', 'nulo', 'nulo', 2, 1, '2023-06-02 13:37:49'),
(10, 'JOSÉ ELMAR GONÇALVES BRAGA', 'josebraga', '565ce8f45501ad8dced581ca0f2c5a82a4616518', 'Nulo', 'Nulo', 2, 1, '2023-06-05 09:20:50'),
(11, 'Ronaldo Martins Ramos', 'ronaldo.martins', 'a274aa7aa2dab192a0998032398a411ebb931f64', 'ronaldo.martins@jacarei.sp.gov.br', '', 1, 1, '2023-08-07 16:15:38'),
(1, 'Administrador', 'admin', '1b5ce369219d7357a392c5799256a86be9413427', 'admin@demo.com.br', 'EMEF Prof. Maria Tereza Ganassali de Oliveira', 2, 1, '2020-02-06 10:16:08'),
(2, 'Victor Machado', 'victormachado', 'cd71790f6f7706fbf18d8acb05f70a9160b87cb5', 'victor.machado@jacarei.sp.gov.br', 'Prefeitura de Jacarei', 2, 1, '2021-10-26 10:18:00'),
(3, 'ANA CLECIA DO PRADO', 'anaclecia', '31ce8aad1f5eea345e47a4d84bcf2150f4063fdd', '00', 'Gerência de Materiais', 2, 1, '2023-06-01 13:55:23'),
(4, 'CARLOS ALBERTO ABREU DOS SANTOS', 'carlosabreu', '90dc5c69e0045e3cd33f00f2b615064ccf893a71', '0', 'Departamento de Suprimentos', 2, 1, '2023-06-01 16:16:05'),
(5, 'ANDERSON GABRIEL DE SOUZA FARIA', 'andersonfaria', 'bd76c767dfedf86adb6012ea7bb3a4cfa233f9c3', '0', 'Suprimentos', 2, 1, '2023-06-01 16:20:25'),
(6, 'LEVINA MARCAL FLORINDO', 'levinaflorindo', 'abc994f24e615fcf353dc39bbd5283c5e9609fdd', 'nulo', 'Suprimentos', 2, 1, '2023-06-02 13:34:30'),
(7, 'MARIA VALERIA DE MELO', 'mariamelo', 'cf34416259efcbbc1fed4131b4c68e9f40aafc8d', 'nulo', 'Suprimentos', 2, 1, '2023-06-02 13:35:40'),
(8, 'RITA DE CASSIA SOUZA', 'ritasouza', '53cf9f6255e78b2faad5a36f923a94ee974ad92a', 'nulo', 'nulo', 2, 1, '2023-06-02 13:36:42'),
(9, 'IRACI FERREIRA DA SILVA FIGUEIRA', 'iracifigueira', 'a4aa6855f1f934b3d475b444062d8f9692a40d42', 'nulo', 'nulo', 2, 1, '2023-06-02 13:37:49'),
(10, 'JOSÉ ELMAR GONÇALVES BRAGA', 'josebraga', '565ce8f45501ad8dced581ca0f2c5a82a4616518', 'Nulo', 'Nulo', 2, 1, '2023-06-05 09:20:50'),
(11, 'Ronaldo Martins Ramos', 'ronaldo.martins', 'a274aa7aa2dab192a0998032398a411ebb931f64', 'ronaldo.martins@jacarei.sp.gov.br', '', 1, 1, '2023-08-07 16:15:38'),
(1, 'Administrador', 'admin', '1b5ce369219d7357a392c5799256a86be9413427', 'admin@demo.com.br', 'EMEF Prof. Maria Tereza Ganassali de Oliveira', 2, 1, '2020-02-06 10:16:08'),
(2, 'Victor Machado', 'victormachado', 'cd71790f6f7706fbf18d8acb05f70a9160b87cb5', 'victor.machado@jacarei.sp.gov.br', 'Prefeitura de Jacarei', 2, 1, '2021-10-26 10:18:00'),
(3, 'ANA CLECIA DO PRADO', 'anaclecia', '31ce8aad1f5eea345e47a4d84bcf2150f4063fdd', '00', 'Gerência de Materiais', 2, 1, '2023-06-01 13:55:23'),
(4, 'CARLOS ALBERTO ABREU DOS SANTOS', 'carlosabreu', '90dc5c69e0045e3cd33f00f2b615064ccf893a71', '0', 'Departamento de Suprimentos', 2, 1, '2023-06-01 16:16:05'),
(5, 'ANDERSON GABRIEL DE SOUZA FARIA', 'andersonfaria', 'bd76c767dfedf86adb6012ea7bb3a4cfa233f9c3', '0', 'Suprimentos', 2, 1, '2023-06-01 16:20:25'),
(6, 'LEVINA MARCAL FLORINDO', 'levinaflorindo', 'abc994f24e615fcf353dc39bbd5283c5e9609fdd', 'nulo', 'Suprimentos', 2, 1, '2023-06-02 13:34:30'),
(7, 'MARIA VALERIA DE MELO', 'mariamelo', 'cf34416259efcbbc1fed4131b4c68e9f40aafc8d', 'nulo', 'Suprimentos', 2, 1, '2023-06-02 13:35:40'),
(8, 'RITA DE CASSIA SOUZA', 'ritasouza', '53cf9f6255e78b2faad5a36f923a94ee974ad92a', 'nulo', 'nulo', 2, 1, '2023-06-02 13:36:42'),
(9, 'IRACI FERREIRA DA SILVA FIGUEIRA', 'iracifigueira', 'a4aa6855f1f934b3d475b444062d8f9692a40d42', 'nulo', 'nulo', 2, 1, '2023-06-02 13:37:49'),
(10, 'JOSÉ ELMAR GONÇALVES BRAGA', 'josebraga', '565ce8f45501ad8dced581ca0f2c5a82a4616518', 'Nulo', 'Nulo', 2, 1, '2023-06-05 09:20:50'),
(11, 'Ronaldo Martins Ramos', 'ronaldo.martins', 'a274aa7aa2dab192a0998032398a411ebb931f64', 'ronaldo.martins@jacarei.sp.gov.br', '', 1, 1, '2023-08-07 16:15:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 11-Nov-2022 às 15:11
-- Versão do servidor: 8.0.26
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id_eleicao` int NOT NULL,
  `eleicao` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `data_eleicao` date NOT NULL,
  `obs_eleicao` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id_eleicao`, `eleicao`, `data_eleicao`, `obs_eleicao`) VALUES
(0, 'Eleições 2021', '2021-10-16', ' Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor_votacao`
--

CREATE TABLE `eleitor_votacao` (
  `id` int NOT NULL,
  `nome_eleitor` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` bigint NOT NULL,
  `zona` int NOT NULL,
  `registrado_por` int NOT NULL,
  `votou` int NOT NULL,
  `data_hora` timestamp NOT NULL,
  `foto` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `protocolo` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor_votacao20`
--

CREATE TABLE `eleitor_votacao20` (
  `id` int NOT NULL,
  `nome_eleitor` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` bigint NOT NULL,
  `zona` int NOT NULL,
  `registrado_por` int NOT NULL,
  `votou` bit(1) NOT NULL,
  `data_hora` timestamp NOT NULL,
  `foto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `protocolo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor_votacao_`
--

CREATE TABLE `eleitor_votacao_` (
  `id` int NOT NULL,
  `nome_eleitor` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` bigint NOT NULL,
  `zona` int NOT NULL,
  `registrado_por` int NOT NULL,
  `votou` int NOT NULL,
  `data_hora` timestamp NOT NULL,
  `foto` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `protocolo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor_votacao_21`
--

CREATE TABLE `eleitor_votacao_21` (
  `id` int NOT NULL,
  `nome_eleitor` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` bigint NOT NULL,
  `zona` int NOT NULL,
  `registrado_por` int NOT NULL,
  `votou` int NOT NULL,
  `data_hora` timestamp NOT NULL,
  `foto` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `protocolo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor_votacao_limpo`
--

CREATE TABLE `eleitor_votacao_limpo` (
  `id` int NOT NULL,
  `nome_eleitor` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` bigint NOT NULL,
  `zona` int NOT NULL,
  `registrado_por` int NOT NULL,
  `votou` int NOT NULL,
  `data_hora` timestamp NOT NULL,
  `foto` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `protocolo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor_votacao_teste`
--

CREATE TABLE `eleitor_votacao_teste` (
  `id` int NOT NULL,
  `nome_eleitor` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` bigint NOT NULL,
  `zona` int NOT NULL,
  `registrado_por` int NOT NULL,
  `votou` int NOT NULL,
  `data_hora` timestamp NOT NULL,
  `foto` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `protocolo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `escola` varchar(200) NOT NULL,
  `nivel` int UNSIGNED NOT NULL DEFAULT '1',
  `ativo` binary(1) NOT NULL DEFAULT '1',
  `cadastro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `escola`, `nivel`, `ativo`, `cadastro`) VALUES
(1, 'Usuário Teste', 'demo', '56a115e654b51cb6c7dbdd7f7601b1a0808e573d', 'usuario@demo.com.br', 'EMEI Antônio Joaquim Mesquita', 1, 0x31, '2020-02-06 10:16:08'),
(2, 'Administrador', 'admin', '1b5ce369219d7357a392c5799256a86be9413427', 'admin@demo.com.br', 'EMEF Prof. Maria Tereza Ganassali de Oliveira', 2, 0x31, '2020-02-06 10:16:08'),
(15, 'Ione Pereira dos Santos ', 'ione', '904ae3adb34c6c81e18f2639db2110a1cc2b52a9', 'email@email.com', 'EducaMais - Centro ', 1, 0x31, '2021-11-05 13:05:47'),
(12, 'Victor Machado', 'victormachado', '145b3a7860e4980f0b281c1d43f1e9336b7f5fd2', 'victor.machado@jacarei.sp.gov.br', 'EMEI Comendador Antônio Loureiro Cardoso', 2, 0x31, '2021-10-26 10:18:00'),
(9, 'João Eduardo', 'joaoeduardo', 'd29ecca92eeb2f935d5c78ca4b68687fc365b2e9', 'joao.eduardo@jacarei.sp.gov.br', 'DTI', 2, 0x31, '2020-03-16 16:30:50'),
(13, 'Victor Machado', 'victormachado2', 'bfb88de3e57f0ef42818951b96df82728b5479b4', 'victor.machado2@jacarei.sp.gov.br', 'EMEI Comendador Antônio Loureiro Cardoso', 1, 0x31, '2021-10-26 10:22:11'),
(16, 'Aleksandro Valdomiro da Silva', 'aleksandro', 'be24f5bdf87b24df74035f20dbe27cab4faa9bfc', 'email@email.com', 'EMEIF Tarcisio Francisco Barbosa', 1, 0x31, '2021-11-05 13:06:43'),
(17, 'Eduardo Campos Otávio', 'eduardo', '94080c67ec0c43ffaffe8a2e0ecaa656d5a39715', 'email@email.com', 'EMEF Prof. Joaquim Passos e Silva ', 1, 0x31, '2021-11-05 13:07:35'),
(18, 'Edna de Alcântara Afonso ', 'edna', '1c40960bf3fd9af27273011f74bf2e48e8a4e7be', 'email@email.com', 'EducaMais - Esperança ', 1, 0x31, '2021-11-05 13:09:22'),
(19, 'Jean Peter Ibrahim', 'jean', 'be86f0ab6814290ee01567096c89ab7b5f272018', 'email@email.com', 'EMEF Prof. Beatriz Junqueira da Silveira Santos ', 1, 0x31, '2021-11-05 13:10:23'),
(20, 'Adriano José Teixeira', 'adriano', '0e8936757992c022ab03ee653c3cd10cf11c42ef', 'email@email.com', 'EMEF Prof. Tito Máximo', 1, 0x31, '2021-11-05 13:11:03'),
(21, 'Greice de Fátima Teixeira Campos', 'greice', 'd98ade57889ce1cdff75d594b93f82bf109fbe5b', 'email@email.com', 'EMEI Antônio Lelis Vieira', 1, 0x31, '2021-11-05 13:12:31'),
(22, 'Jamil Clélio Fernandes', 'jamil', '2702f92424734b61f9ea76ffeaf1bce076c5a0a0', 'email@email.com', 'EMEF José Éboli de Lima ', 1, 0x31, '2021-11-05 13:13:21'),
(23, 'Claudete Aparecida Alves de Faria', 'claudete', '9cdf9e637dcff3ba9792eef8044009e51da50d79', 'email@email.com', 'EMEF Conceição Ap. Magalhães  Silva ', 1, 0x31, '2021-11-05 13:14:46'),
(24, 'Ana Caroline C S Martins ', 'anacaroline', '813776fa0c2938678b977edbcf7c70c6679412e4', 'email@email.com', 'EMEF Conceição Ap. Magalhães  Silva ', 1, 0x31, '2021-11-05 13:15:36'),
(25, 'Gabriela Torres do Prado Silva', 'gabriela', '2734d5a5933fd192f09c37f1acfe6045a31b5181', 'email@email.com', 'EMEF José Éboli de Lima ', 1, 0x31, '2021-11-05 13:16:27'),
(26, 'Guilherme Seixas Mendonça ', 'guilherme', '073ffac11456eba396adabf4585c0b0aa49ceab5', 'email@email.com', 'EducaMais - Esperança ', 1, 0x31, '2021-11-05 13:17:24'),
(27, 'André Luiz Assunção ', 'andre', '6e70dfeaf4917b1878c418134f755d78bdaa3d7e', 'email@email.com', 'EMEI Antônio Lelis Vieira', 1, 0x31, '2021-11-05 13:18:30'),
(28, 'Moyra Gabriela Baptista Braga Fernandes', 'moyra', '7699a5b0c9e00a8a4e416c35f1b9fea95b3f601e', 'email@email.com', 'EducaMais - Centro ', 1, 0x31, '2021-11-05 13:20:13'),
(29, 'Anderson Ulisses de Araujo Santiago', 'anderson', '0024da39637e9d77f227e54b88fe521b18f05038', 'email@email.com', 'EMEI Antônio Lelis Vieira', 1, 0x31, '2021-11-05 13:21:29'),
(30, 'Marcia Rezende Shinye Fernandes', 'marcia', '67098b4bcef7a41500ee194f97a514e2d757c0cf', 'email@email.com', 'EMEF Prof. Joaquim Passos e Silva ', 1, 0x31, '2021-11-05 13:22:36'),
(31, 'Mariana Tosato Machado', 'mariana', '7d3d71d4e8b987033c332eafed1ca1cb678d2109', 'email@email.com', 'EMEF Prof. Tito Máximo', 1, 0x31, '2021-11-05 13:23:34'),
(32, 'Amanda Maximo valério ', 'amanda', '331516fcfb945789eb51ac5544d1231d1cb27a5b', 'email@email.com', 'EMEF Prof. Tito Máximo', 1, 0x31, '2021-11-05 13:24:30'),
(33, 'Claudia Ciapina Roldão', 'claudia', 'a0bea235f4b50ff81b9a7d456d465ac2bc7faa30', 'email@email.com', 'EMEF Prof. Beatriz Junqueira da Silveira Santos ', 1, 0x31, '2021-11-05 13:25:21'),
(34, 'Lucas Morotti dos Santos', 'lucas', '80c6be8fc2c328c9f9687873dc636407b4dd14d5', 'email@email.com', 'EducaMais - Centro ', 1, 0x31, '2021-11-05 13:25:58'),
(35, 'CÍNTIA FRANCO ALVARENGA ABDO', 'cintia', '769bd5c08a9df5efb179c37aa5aeeae86c0bf865', 'email@email.com', '_', 1, 0x31, '2021-11-05 13:26:48'),
(36, 'Luiz Carlos dos Santos Turci', 'luiz', 'ee7be3bf235c3ad3a415344be361fbb944209c1f', 'email@email.com', 'EMEIF Tarcisio Francisco Barbosa', 1, 0x31, '2021-11-05 13:27:43'),
(37, 'Martha Castro de Souza Rodrigue', 'martha', 'ad8a1349bf68359a533d39178813b661cc345144', 'email@email.com', 'EMEF Conceição Ap. Magalhães  Silva ', 1, 0x31, '2021-11-05 13:28:29'),
(38, 'Gustavo Peixoto Barros dos Santos ', 'gustavo', 'da721788f1b0e9bcb2f3466816eaf579319940f0', 'email@email.com', 'EMEF Prof. Beatriz Junqueira da Silveira Santos ', 1, 0x31, '2021-11-05 13:29:14'),
(39, 'Hugo Tadeu Amaral de Melo ', 'hugo', '241795936cfb7dac24dbdbe5b63664955932c4f3', 'email@email.com', 'EMEF José Éboli de Lima ', 1, 0x31, '2021-11-05 13:30:03'),
(40, 'Rafael Aponi de Figueredo Rocha  ', 'rafael', '47cdcf5bd08259a364f1e7b0c8d8966812204605', 'email@email.com', 'EMEIF Tarcisio Francisco Barbosa', 1, 0x31, '2021-11-05 13:30:48'),
(41, 'Girlaine Dias dos Santos', 'girlaine', 'd702a6e54358ce6daf65f42eed7f94a79466d6a3', 'email@email.com', 'EMEF Prof. Joaquim Passos e Silva ', 1, 0x31, '2021-11-05 13:31:42'),
(42, 'Felipe de Vilas Boas Silva Santos ', 'felipe', '5d69856dc027497b227bceccc6e4d3fecd9ca884', 'email@email.com', 'EducaMais - Esperança ', 1, 0x31, '2021-11-05 13:32:16'),
(43, 'Celso Florencio de Souza', 'celso_educacentro', '0d31c0e599b1942b7957dbd6126db500ae97a7a5', 'email@email.com', 'EducaMais - Centro ', 1, 0x31, '2022-07-31 13:20:13'),
(44, 'Celso Florencio de Souza', 'celso_aluizio', '0d31c0e599b1942b7957dbd6126db500ae97a7a5', 'email@email.com', 'EMEF Aluízio do Amaral Campos', 1, 0x31, '2022-07-31 13:20:13'),
(45, 'Ana Caroline Cardoso de Siqueira Martins', 'carol_saojoao', '560fe5f7fada2e50ca4e26303928be450562e384', 'email@email.com', 'Educamais - São joão', 1, 0x31, '2022-07-31 13:20:13'),
(46, 'Ana Caroline Cardoso de Siqueira Martins', 'carol_adelia', '560fe5f7fada2e50ca4e26303928be450562e384', 'email@email.com', 'EMEIF Adelia Pereira Braz Rossi', 1, 0x31, '2022-07-31 13:20:13'),
(47, 'Ana Caroline Cardoso de Siqueira Martins', 'carol_ricardina', '560fe5f7fada2e50ca4e26303928be450562e384', 'email@email.com', 'EMEF Ricardina dos Santos Morães', 1, 0x31, '2022-07-31 13:20:13'),
(48, 'Nicolas Rosalém', 'nicolas_aluizio', '8c75aad0deaf3d20bcc744046a634c2f127faa30', 'email@email.com', 'EMEF Aluízio do Amaral Campos', 1, 0x31, '2022-07-31 13:20:13'),
(49, 'Nicolas Rosalém', 'nicolas_tarcisio', '8c75aad0deaf3d20bcc744046a634c2f127faa30', 'email@email.com', 'EMEIF Tarcísio Francisco Barbosa', 1, 0x31, '2022-07-31 13:20:13'),
(50, 'Nicolas Rosalém', 'nicolas_joaquim', '8c75aad0deaf3d20bcc744046a634c2f127faa30', 'email@email.com', 'EMEF Joaquim Passos e Silva', 1, 0x31, '2022-07-31 13:20:13'),
(51, 'Camila Maria Leite de Oliveira Pereira ', 'camila_saojoao', '578de5128673c822ae03d38b2aad5c8d666cdeec', 'email@email.com', 'Educamais - São joão', 1, 0x31, '2022-07-31 13:20:13'),
(52, 'Camila Maria Leite de Oliveira Pereira ', 'camila_adelia', '578de5128673c822ae03d38b2aad5c8d666cdeec', 'email@email.com', 'EMEIF Adelia Pereira Braz Rossi', 1, 0x31, '2022-07-31 13:20:13'),
(53, 'Camila Maria Leite de Oliveira Pereira ', 'camila_joaquim', '578de5128673c822ae03d38b2aad5c8d666cdeec', 'email@email.com', 'EMEF Joaquim Passos e Silva', 1, 0x31, '2022-07-31 13:20:13'),
(54, 'Camila Maria Leite de Oliveira Pereira ', 'camila_maria', '578de5128673c822ae03d38b2aad5c8d666cdeec', 'email@email.com', 'EMEF Maria Luiza de Souza Vasques', 1, 0x31, '2022-07-31 13:20:13'),
(55, 'Camila Maria Leite de Oliveira Pereira ', 'camila_mabito', '578de5128673c822ae03d38b2aad5c8d666cdeec', 'email@email.com', 'EMEIF Presbítero Mabito Shoji', 1, 0x31, '2022-07-31 13:20:13'),
(56, 'Rogério Costa Manso', 'rogerio_saojoao', '73dee7274432e324d9587d881be6e9fc8e9259bb', 'email@email.com', 'Educamais - São joão', 1, 0x31, '2022-07-31 13:20:13'),
(57, 'Rogério Costa Manso', 'rogerio_jose', '73dee7274432e324d9587d881be6e9fc8e9259bb', 'email@email.com', 'EMEF José Éboli de Lima', 1, 0x31, '2022-07-31 13:20:13'),
(58, 'Rogério Costa Manso', 'rogerio_educacentro', '73dee7274432e324d9587d881be6e9fc8e9259bb', 'email@email.com', 'Educamais - Centro', 1, 0x31, '2022-07-31 13:20:13'),
(59, 'Rogério Costa Manso', 'rogerio_ricardina', '73dee7274432e324d9587d881be6e9fc8e9259bb', 'email@email.com', 'EMEF Ricardina dos Santos Morães', 1, 0x31, '2022-07-31 13:20:13'),
(60, 'Rogério Costa Manso', 'rogerio_maria', '73dee7274432e324d9587d881be6e9fc8e9259bb', 'email@email.com', 'EMEF Maria Luiza de Souza Vasques', 1, 0x31, '2022-07-31 13:20:13'),
(61, 'Aías José de Santana', 'aias_aluizio', '759a0234bc3581b781f13292e83868ce5b56c5f3', 'email@email.com', 'EMEF Aluízio do Amaral Campos', 1, 0x31, '2022-07-31 13:20:13'),
(62, 'Aías José de Santana', 'aias_tarcisio', '759a0234bc3581b781f13292e83868ce5b56c5f3', 'email@email.com', 'EMEIF Tarcísio Francisco Barbosa', 1, 0x31, '2022-07-31 13:20:13'),
(63, 'Aías José de Santana', 'aias_joaquim', '759a0234bc3581b781f13292e83868ce5b56c5f3', 'email@email.com', 'EMEF Joaquim Passos e Silva', 1, 0x31, '2022-07-31 13:20:13'),
(64, 'Aías José de Santana', 'aias_conceicao', '759a0234bc3581b781f13292e83868ce5b56c5f3', 'email@email.com', 'EMEF Conceição Aparecida Magalhaes Silva', 1, 0x31, '2022-07-31 13:20:13'),
(65, 'Ana Caroline Cardoso de Siqueira Martins', 'carol_conceicao', '560fe5f7fada2e50ca4e26303928be450562e384', 'email@email.com', 'EMEF Conceição Aparecida Magalhaes Silva', 1, 0x31, '2022-07-31 13:20:13'),
(66, 'Ana Caroline Cardoso de Siqueira Martins', 'carol_jorge', '560fe5f7fada2e50ca4e26303928be450562e384', 'email@email.com', 'EMEIF Jorge Vieira da Silva', 1, 0x31, '2022-07-31 13:20:13'),
(67, 'Celso Florencio de Souza', 'celso_jorge', '0d31c0e599b1942b7957dbd6126db500ae97a7a5', 'email@email.com', 'EMEIF Jorge Vieira da Silva', 1, 0x31, '2022-07-31 13:20:13'),
(68, 'Celso Florencio de Souza', 'celso_jose', '0d31c0e599b1942b7957dbd6126db500ae97a7a5', 'email@email.com', 'EMEF José Éboli de Lima', 1, 0x31, '2022-07-31 13:20:13'),
(69, 'Nicolas Rosalém', 'nicolas_mabito', '8c75aad0deaf3d20bcc744046a634c2f127faa30', 'email@email.com', 'EMEIF Presbítero Mabito Shoji', 1, 0x31, '2022-07-31 13:20:13'),
(70, 'Nicolas Rosalém', 'nicolas_adelia', '8c75aad0deaf3d20bcc744046a634c2f127faa30', 'email@email.com', 'EMEIF Adelia Pereira Braz Rossi', 1, 0x31, '2022-07-31 13:20:13'),
(71, 'Alexandre', 'alexandre_adelia', '7315d4336d2ef4c2062c59222689fbee2db06cf1', 'email@email.com', 'EMEIF Adelia Pereira Braz Rossi', 1, 0x31, '2022-07-31 13:20:13'),
(72, 'Ana Caroline Cardoso de Siqueira Martins', 'carol_educacentro', '560fe5f7fada2e50ca4e26303928be450562e384', 'email@email.com', 'Educamais - centro', 1, 0x31, '2022-07-31 13:20:13'),
(73, 'Alexandre', 'alexandre_tarcicio', '7315d4336d2ef4c2062c59222689fbee2db06cf1', 'email@email.com', 'EMEIF Prof Tarcisio Francisco Barbosa - 1 de maio', 1, 0x31, '2022-07-31 13:20:13'),
(74, 'Moyra Gabriela Batista Braga Fernandes ', 'moyra_salvador', '7b4e975acc1b42fdcca7cf27e776189f447b0499', 'email@email.com', 'Cidade Salvador', 1, 0x31, '2022-08-04 17:00:00'),
(75, 'Moyra Gabriela Batista Braga Fernandes ', 'moyra_sbenedito', '7b4e975acc1b42fdcca7cf27e776189f447b0499', 'email@email.com', 'Conjunto Sao Benedito', 1, 0x31, '2022-08-09 17:00:00'),
(76, 'Celso Florencio de Souza', 'celso_tito', '0d31c0e599b1942b7957dbd6126db500ae97a7a5', 'email@email.com', 'Tito Máximo', 1, 0x31, '2022-08-09 17:00:00'),
(77, 'Ana Caroline Cardoso de Siqueira Martins', 'carolif', '560fe5f7fada2e50ca4e26303928be450562e384', 'email@email.com', 'Instituto Federal', 1, 0x31, '2022-08-12 18:01:01'),
(78, 'Nicolas Rosalém', 'nicolas_decio', '8c75aad0deaf3d20bcc744046a634c2f127faa30', 'email@email.com', 'Décio Moreira', 1, 0x31, '2022-08-13 13:08:43'),
(79, 'Minoru Takatori', 'minoru', 'b286693841ac7a745dd68cf0d475cb0573b7196f', 'email@email.com', 'teste dti', 1, 0x31, '2022-08-13 13:15:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `voto`
--

CREATE TABLE `voto` (
  `id` int NOT NULL,
  `id_candidato` int DEFAULT NULL,
  `id_eleitor` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `protocolo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `voto`
--

INSERT INTO `voto` (`id`, `id_candidato`, `id_eleitor`, `data_hora`, `protocolo`) VALUES
(1, 123, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-19 16:16:00', ''),
(2, 123, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-19 16:17:50', ''),
(3, 0, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-19 16:29:43', ''),
(4, 0, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-19 16:29:51', ''),
(5, 1, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-19 16:30:30', ''),
(6, NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-20 10:28:38', ''),
(7, 0, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-20 11:17:40', ''),
(8, 321, 'd41d8cd98f00b204e9800998ecf8427e', '2021-01-05 14:02:19', ''),
(9, 12, '1234321', '2021-01-12 11:57:51', '2021012145751'),
(10, 12, '1234321', '2021-01-12 11:58:31', '2021012145831'),
(11, 12, '1234321', '2021-01-12 11:58:38', '2021012145838'),
(12, 123, '25693170141', '2021-01-12 12:00:29', '2021012150029'),
(13, 123, '25693170141', '2021-01-12 12:01:19', '2021012150119'),
(14, 123, '25693170141', '2021-01-12 12:01:24', '2021012150124'),
(15, 123, '25693170141', '2021-01-12 12:01:55', '2021012150155'),
(16, 123, '25693170141', '2021-01-12 12:02:57', '2021012150257'),
(17, 123, '25693170141', '2021-01-12 12:03:11', '2021012150311'),
(18, 123, '25693170141', '2021-01-12 12:50:36', '2021012155036'),
(19, 123, '25693170141', '2021-01-12 12:59:37', '2021012155937'),
(20, 123, '25693170141', '2021-01-12 13:04:07', '2021012160407'),
(21, 123, '25693170141', '2021-01-12 13:10:41', '2021012161041'),
(22, 123, '25693170141', '2021-01-12 13:13:02', '2021012161302'),
(23, 123, 'bf86648eea65083cdfcf226a6371abf6', '2021-01-12 13:19:40', '2021012161940'),
(24, 123, '', '2021-01-12 13:20:57', '2021012162057'),
(25, 123, 'bf86648eea65083cdfcf226a6371abf6', '2021-01-12 13:21:41', '2021012162141'),
(26, 90, 'd41d8cd98f00b204e9800998ecf8427e', '2021-01-15 11:22:59', '2021015142259'),
(27, 90, 'd41d8cd98f00b204e9800998ecf8427e', '2021-01-22 10:05:46', '2021022130546'),
(28, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:05:10', '2021026140510'),
(29, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:10:36', '2021026141036'),
(30, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:40:35', '2021026144035'),
(31, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:41:00', '2021026144100'),
(32, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:45:09', '2021026144509'),
(33, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:45:20', '2021026144520'),
(34, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:46:38', '2021026144638'),
(35, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:47:54', '2021026144754'),
(36, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:48:46', '2021026144846'),
(37, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:50:24', '2021026145024'),
(38, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:51:39', '2021026145139'),
(39, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:52:23', '2021026145223'),
(40, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:53:20', '2021026145320'),
(41, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:56:45', '2021026145645'),
(42, 80, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:57:30', '2021026145730'),
(43, 11, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 11:59:27', '2021026145927'),
(44, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 12:04:58', '2021026150458'),
(45, 8, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 12:06:45', '2021026150645'),
(46, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 14:01:09', '2021026170109'),
(47, -100, '', '2021-01-26 14:26:48', '2021026172648'),
(48, NULL, '', '2021-01-26 14:26:52', '2021026172652'),
(49, -100, '', '2021-01-26 14:28:12', '2021026172812'),
(50, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 14:50:22', '2021026175022'),
(51, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 14:53:08', '2021026175308'),
(52, 99, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 14:54:40', '2021026175440'),
(53, 123, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 14:54:52', '2021026175452'),
(54, 321, 'd41d8cd98f00b204e9800998ecf8427e', '2021-01-26 14:57:07', '2021026175707'),
(55, 123, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 15:03:49', '2021026180349'),
(56, NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2021-01-26 15:03:56', '2021026180356'),
(57, -100, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 15:04:09', '2021026180409'),
(58, 80, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 15:04:21', '2021026180421'),
(59, NULL, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 15:14:44', '2021026181444'),
(60, 1, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 15:36:19', '2021026183619'),
(61, 12, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 15:38:20', '2021026183820'),
(62, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 16:21:44', '2021026192144'),
(63, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 16:22:08', '2021026192208'),
(64, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 16:25:33', '2021026192533'),
(65, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 16:28:14', '2021026192814'),
(66, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 16:29:13', '2021026192913'),
(67, 90, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 16:29:29', '2021026192929'),
(68, 123, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 16:32:16', '2021026193216'),
(69, 123, '6c30734811916b0f0f24a4630b08036f', '2021-01-26 16:51:21', '2021026195121'),
(70, 123, '6c30734811916b0f0f24a4630b08036f', '2021-01-27 11:13:54', '2021027141354'),
(71, 123, '6c30734811916b0f0f24a4630b08036f', '2021-01-27 11:16:23', '2021027141623'),
(72, 123, '6c30734811916b0f0f24a4630b08036f', '2021-01-27 11:19:59', '2021027141959'),
(73, 47, '6c30734811916b0f0f24a4630b08036f', '2021-01-27 11:22:52', '2021027142252'),
(74, 47, '6c30734811916b0f0f24a4630b08036f', '2021-01-27 11:27:38', '2021027142738'),
(75, 47, '6c30734811916b0f0f24a4630b08036f', '2021-01-27 11:28:20', '2021027142820'),
(76, 47, '6c30734811916b0f0f24a4630b08036f', '2021-01-27 11:30:24', '2021027143024'),
(77, 123, '6c30734811916b0f0f24a4630b08036f', '2021-01-27 15:47:58', '2021027184758'),
(78, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 09:47:44', '2021028124744'),
(79, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 09:54:41', '2021028125441'),
(80, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 09:55:19', '2021028125519'),
(81, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 09:56:25', '2021028125625'),
(82, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 09:56:56', '2021028125656'),
(83, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 10:00:48', '2021028130048'),
(84, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 10:03:10', '2021028130310'),
(85, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 10:03:57', '2021028130357'),
(86, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 10:05:10', '2021028130510'),
(87, 22, '6c30734811916b0f0f24a4630b08036f', '2021-01-28 10:05:49', '2021028130549');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `eleitor_votacao`
--
ALTER TABLE `eleitor_votacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eleitor_votacao20`
--
ALTER TABLE `eleitor_votacao20`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eleitor_votacao_`
--
ALTER TABLE `eleitor_votacao_`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eleitor_votacao_21`
--
ALTER TABLE `eleitor_votacao_21`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eleitor_votacao_limpo`
--
ALTER TABLE `eleitor_votacao_limpo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eleitor_votacao_teste`
--
ALTER TABLE `eleitor_votacao_teste`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `nivel` (`nivel`);

--
-- Índices para tabela `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eleitor_votacao`
--
ALTER TABLE `eleitor_votacao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eleitor_votacao20`
--
ALTER TABLE `eleitor_votacao20`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eleitor_votacao_`
--
ALTER TABLE `eleitor_votacao_`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eleitor_votacao_21`
--
ALTER TABLE `eleitor_votacao_21`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eleitor_votacao_limpo`
--
ALTER TABLE `eleitor_votacao_limpo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eleitor_votacao_teste`
--
ALTER TABLE `eleitor_votacao_teste`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `voto`
--
ALTER TABLE `voto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

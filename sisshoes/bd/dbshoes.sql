-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2021 às 00:08
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbmotos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmarca`
--

CREATE TABLE `tbtipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbmarca`
--

INSERT INTO `tbtipo` (`id`, `tipo`) VALUES
(1, 'Sandalia'),
(2, 'Salto'),
(3, 'Mocassim'),
(4, 'Bota');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmoto`
--

CREATE TABLE `tbcalcado` (
  `id` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `material` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbmoto`
--

INSERT INTO `tbcalcado` (`id`, `idTipo`, `modelo`, `material`) VALUES
(1, 1, 'Rasteira preta detalhe pedras', 'Couro'),
(2, 3, 'Mocassim bege com franja', 'Nubuck'),
(3, 4, 'Bota western com detalhes', 'Couro');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbmarca`
--
ALTER TABLE `tbtipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbmoto`
--
ALTER TABLE `tbcalcado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbmarca`
--
ALTER TABLE `tbtipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbmoto`
--
ALTER TABLE `tbcalcado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

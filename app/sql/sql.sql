-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2021 às 17:40
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
-- Banco de dados: `carbox`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CLIENTE_ID` int(11) NOT NULL,
  `CLIENTE_CNPJ` int(14) NOT NULL,
  `CLIENTE_RAZAO` varchar(100) DEFAULT NULL,
  `CLIENTE_FANTASIA` varchar(100) NOT NULL,
  `CLIENTE_EMAIL` varchar(100) DEFAULT NULL,
  `CLIENTE_CODSAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprador`
--

CREATE TABLE `comprador` (
  `COMPRADOR_ID` int(11) NOT NULL,
  `COMPRADOR_CNPJ` varchar(20) DEFAULT NULL,
  `COMPRADOR_NOME` varchar(100) DEFAULT NULL,
  `COMPRADOR_EMAIL` varchar(100) DEFAULT NULL,
  `COMPRADOR_SENHA` varchar(100) DEFAULT NULL,
  `COMPRADOR_STATUS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `PEDIDO_ID` int(11) NOT NULL,
  `PEDIDO_DESC` varchar(100) NOT NULL,
  `PEDIDO_UNIDADE` varchar(11) NOT NULL,
  `PEDIDO_PRODUTO` varchar(100) NOT NULL,
  `PEDIDO_QUANTIDADE` varchar(11) NOT NULL,
  `PEDIDO_DATAEMISSAO` date NOT NULL,
  `PEDIDO_RAZAO` varchar(100) NOT NULL,
  `PEDIDO_CODSAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `PRODUTO_ID` int(11) NOT NULL,
  `PEDIDO_CODSAP` varchar(11) NOT NULL,
  `PRODUTO_PRODUTO` varchar(100) DEFAULT NULL,
  `PRODUTO_UNIDADE` varchar(100) DEFAULT NULL,
  `PRODUTO_IMG` varchar(220) DEFAULT NULL,
  `PRODUTO_FIXA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`PRODUTO_ID`, `PEDIDO_CODSAP`, `PRODUTO_PRODUTO`, `PRODUTO_UNIDADE`, `PRODUTO_IMG`, `PRODUTO_FIXA`) VALUES
(1, '11', 'lapis', NULL, '00000000000000000000000023232.png', 'ARTIGO - SEGURANÃ‡A DA INFORMAÃ‡ÃƒO.docx'),
(2, '2', 'caneta', NULL, '00000000000000000000000023232.png', 'dsparalegal.com.br.pdf'),
(3, 'a', '1', NULL, '00000000000000000000000023232.png', 'barbeariadonvaliante.com.br.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `restrito`
--

CREATE TABLE `restrito` (
  `RESTRITO_ID` int(11) NOT NULL,
  `RESTRITO_NOME` varchar(100) DEFAULT NULL,
  `RESTRITO_SENHA` varchar(100) DEFAULT NULL,
  `RESTRITO_EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `restrito`
--

INSERT INTO `restrito` (`RESTRITO_ID`, `RESTRITO_NOME`, `RESTRITO_SENHA`, `RESTRITO_EMAIL`) VALUES
(1, '[value-2]', '[value-3]', '[value-4]'),
(2, 'aaaaa', '111', 'aaaa'),
(3, 'aaaaa', '698d51a19d8a121ce581499d7b701668', 'aaaa');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CLIENTE_ID`);

--
-- Índices para tabela `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`COMPRADOR_ID`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`PEDIDO_ID`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`PRODUTO_ID`);

--
-- Índices para tabela `restrito`
--
ALTER TABLE `restrito`
  ADD PRIMARY KEY (`RESTRITO_ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CLIENTE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `comprador`
--
ALTER TABLE `comprador`
  MODIFY `COMPRADOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `PEDIDO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `PRODUTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `restrito`
--
ALTER TABLE `restrito`
  MODIFY `RESTRITO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

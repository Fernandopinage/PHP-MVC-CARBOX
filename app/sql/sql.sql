-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2021 às 23:16
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
  `CLIENTE_CNPJ` varchar(20) NOT NULL,
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
  `COMPRADOR_CNPJ` varchar(100) DEFAULT NULL,
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
  `PEDIDO_CODSAP` int(11) NOT NULL,
  `PEDIDO_NUM` int(11) NOT NULL
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
  `PRODUTO_FIXA` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`PRODUTO_ID`, `PEDIDO_CODSAP`, `PRODUTO_PRODUTO`, `PRODUTO_UNIDADE`, `PRODUTO_IMG`, `PRODUTO_FIXA`) VALUES
(1, '01', 'OxigÃªnio Industrial', '', 'OxigÃªnio Industrial.png', 'OXIGENIO_GASOSO.pdf'),
(2, '02', 'OxigÃªnio Medicinal', '', 'OxigÃªnio Medicinal.png', 'OXIGENIO_MEDICINAL.pdf'),
(3, '03', 'NitrogÃªnio Industrial', '', 'NitrogÃªnio Industrial.png', 'NITROGENIO_GASOSO.pdf'),
(4, '04', 'Ar Comprimido RespirÃ¡vel', '', 'Ar Comprimido RespirÃ¡vel.png', 'AR_COMPRIMIDO.pdf'),
(5, '05', 'ArgÃ´nio Industrial', '', 'ArgÃ´nio Industrial.png', 'ARGONIO_GASOSO.pdf'),
(6, '06', 'DiÃ³xido de Carbono Industrial', '', 'DiÃ³xido de Carbono Industrial.png', 'DIOXIDO_DE_CARBONO.pdf'),
(7, '07', 'DiÃ³xido de Carbono Medicinal', '', 'DiÃ³xido de Carbono Medicinal.png', 'DIOXIDO_DE_CARBONO (1).pdf'),
(8, '08', 'Acetileno Dissolvido Industrial', '', 'Acetileno Dissolvido Industrial.png', 'ACETILENO.pdf'),
(9, '09', 'Misturas para solda - Carbomix', '', 'Misturas para solda - Carbomix.png', 'GAS-MISTURA-PARA-SOLDA.pdf'),
(10, '10', 'DiÃ³xido de Carbono LÃ­quido', '', 'DiÃ³xido de Carbono LÃ­quido.png', 'ARGONIO_LIQUIDO.pdf'),
(11, '11', 'ArgÃ´nio LÃ­quido', '', 'ArgÃ´nio LÃ­quido.png', 'ARGONIO_LIQUIDO (1).pdf'),
(12, '12', 'NitrogÃªnio LÃ­quido', '', 'NitrogÃªnio LÃ­quido.png', 'LIQ-NITROG_NIO-L_QUIDO.pdf'),
(13, '13', 'OxigÃªnio LÃ­quido', '', 'OxigÃªnio LÃ­quido.png', 'OXIGENIO_LIQUIDO.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `restrito`
--

CREATE TABLE `restrito` (
  `RESTRITO_ID` int(11) NOT NULL,
  `RESTRITO_NOME` varchar(100) DEFAULT NULL,
  `RESTRITO_SENHA` varchar(100) DEFAULT NULL,
  `RESTRITO_EMAIL` varchar(100) NOT NULL,
  `RESTRITO_STATUS` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `restrito`
--

INSERT INTO `restrito` (`RESTRITO_ID`, `RESTRITO_NOME`, `RESTRITO_SENHA`, `RESTRITO_EMAIL`, `RESTRITO_STATUS`) VALUES
(4, 'LUIZ FERNANDO PINAGÃ‰ COUTINHO', '63a9f0ea7bb98050796b649e85481845', 'luiz.c@progride.com.br', 'S'),
(7, 'Rhuan viana', '202cb962ac59075b964b07152d234b70', 'rhuan.v@progride.com.br', 'N'),
(8, 'ORISMAR ', 'c7916c9600109ef3c10758b7d4b497b2', 'orismar@progride.com.br', 'S');

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
  MODIFY `CLIENTE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comprador`
--
ALTER TABLE `comprador`
  MODIFY `COMPRADOR_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `PEDIDO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `PRODUTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `restrito`
--
ALTER TABLE `restrito`
  MODIFY `RESTRITO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

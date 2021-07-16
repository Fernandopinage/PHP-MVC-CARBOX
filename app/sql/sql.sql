-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2021 às 23:47
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
  `CLIENTE_CODSAP` int(11) NOT NULL,
  `CLIENTE_STATUS` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CLIENTE_ID`, `CLIENTE_CNPJ`, `CLIENTE_RAZAO`, `CLIENTE_FANTASIA`, `CLIENTE_EMAIL`, `CLIENTE_CODSAP`, `CLIENTE_STATUS`) VALUES
(8, '004.963.342-20', 'luiz fernando pinage coutinho', '', 'luiz.c@progride.com.br', 1, 'S');

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

--
-- Extraindo dados da tabela `comprador`
--

INSERT INTO `comprador` (`COMPRADOR_ID`, `COMPRADOR_CNPJ`, `COMPRADOR_NOME`, `COMPRADOR_EMAIL`, `COMPRADOR_SENHA`, `COMPRADOR_STATUS`) VALUES
(18, '004.963.342-20', 'luiz01', 'luizfernandoluck@hotmail.com', '4f574cbe76fab3b4bce0b154df7bb5aa', 'Ativo'),
(19, '004.963.342-20', 'luiz02', 'luiz2@hotmail.com', '702170e2e81a6670a0dd40ba0d3a33a5', 'Ativo'),
(20, '004.963.342-20', 'MARCOS VINICIUS COUTINHO2', 'luiz5@hotmail.com', 'e9efcfedb77c814254c49e7a0069b5a1', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `PEDIDO_ID` int(11) NOT NULL,
  `PEDIDO_DESC` varchar(100) NOT NULL,
  `PEDIDO_UNIDADE` varchar(11) NOT NULL,
  `PEDIDO_PRODUTO` varchar(200) NOT NULL,
  `PEDIDO_QUANTIDADE` varchar(200) NOT NULL,
  `PEDIDO_DATAEMISSAO` date NOT NULL,
  `PEDIDO_RAZAO` varchar(100) NOT NULL,
  `PEDIDO_CODSAP` varchar(200) NOT NULL,
  `PEDIDO_NUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`PEDIDO_ID`, `PEDIDO_DESC`, `PEDIDO_UNIDADE`, `PEDIDO_PRODUTO`, `PEDIDO_QUANTIDADE`, `PEDIDO_DATAEMISSAO`, `PEDIDO_RAZAO`, `PEDIDO_CODSAP`, `PEDIDO_NUM`) VALUES
(76, '', '', 'Oxigenio Liquido', '11', '2021-07-14', 'LUIZ FERNANDO PINAGÃ‰ COUTINHO', '13', 2324514),
(77, '', '', 'Oxigenio Industrial', '1', '2021-07-16', 'LUIZ FERNANDO PINAGÃ‰ COUTINHO', '01', 7399516),
(78, '', '', 'Oxigenio Medicinal', '1', '2021-07-16', 'LUIZ FERNANDO PINAGÃ‰ COUTINHO', '02', 8061516),
(79, '', '', 'Oxigenio Medicinal', '1', '2021-07-16', 'LUIZ FERNANDO PINAGÃ‰ COUTINHO', '02', 8061516),
(80, '', '', 'Oxigenio Industrial', '1', '2021-07-16', 'LUIZ FERNANDO PINAGÃ‰ COUTINHO', '01', 3038716),
(81, '', '', 'Oxigenio Medicinal', '1', '2021-07-16', 'LUIZ FERNANDO PINAGÃ‰ COUTINHO', '02', 3416416);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `PRODUTO_ID` int(11) NOT NULL,
  `PEDIDO_CODSAP` varchar(11) NOT NULL,
  `PRODUTO_PRODUTO` varchar(100) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `PRODUTO_UNIDADE` varchar(100) DEFAULT NULL,
  `PRODUTO_IMG` varchar(220) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `PRODUTO_FIXA` varchar(220) NOT NULL,
  `PRODUTO_STATUS` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`PRODUTO_ID`, `PEDIDO_CODSAP`, `PRODUTO_PRODUTO`, `PRODUTO_UNIDADE`, `PRODUTO_IMG`, `PRODUTO_FIXA`, `PRODUTO_STATUS`) VALUES
(1, '01', 'Oxigenio Industrial', '', 'Oxigenio Industrial.png', '', 'S'),
(2, '02', 'Oxigenio Medicinal', '', 'Oxigenio Medicinal.png', 'OXIGENIO_MEDICINAL.pdf', 'S'),
(3, '03', 'Nitrogenio Industrial', '', 'Nitrogenio Industrial.png', 'NITROGENIO_GASOSO.pdf', 'S'),
(4, '04', 'Ar Comprimido Respiravel', '', 'Ar Comprimido Respiravel.png', 'AR_COMPRIMIDO.pdf', 'S'),
(5, '05', 'Argonio Industrial', '', 'Argonio Industrial.png', 'ARGONIO_GASOSO.pdf', 'S'),
(6, '06', 'Dioxido de Carbono Industrial', '', 'Dioxido de Carbono Industrial.png', 'DIOXIDO_DE_CARBONO.pdf', 'S'),
(7, '07', 'Dioxido de Carbono Medicinal', '', 'Dioxido de Carbono Medicinal.png', 'DIOXIDO_DE_CARBONO (1).pdf', 'S'),
(8, '08', 'Acetileno Dissolvido Industrial', '', 'Acetileno Dissolvido Industrial.png', 'ACETILENO.pdf', 'S'),
(9, '09', 'Misturas para solda - Carbomix', '', 'Misturas para solda - Carbomix.png', 'GAS-MISTURA-PARA-SOLDA.pdf', 'S'),
(10, '10', 'Dioxido de Carbono Liquido', '', 'Dioxido de Carbono Liquido.png', '', 'S'),
(11, '11', 'Argonio Liquido', '', 'Argonio Liquido.png', 'ARGONIO_LIQUIDO (1).pdf', 'S'),
(12, '12', 'Nitrogenio Liquido', '', 'Nitrogenio Liquido.png', 'LIQ-NITROG_NIO-L_QUIDO.pdf', 'S'),
(13, '13', 'Oxigenio Liquido', '', 'Oxigenio Liquido.png', 'OXIGENIO_LIQUIDO.pdf', 'S');

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
(8, 'ORISMAR ', 'c7916c9600109ef3c10758b7d4b497b2', 'orismar@progride.com.br', 'S'),
(9, 'paulo victor pinage', '4b79615ef5b8f6ef0f51067d2dda1459', 'suporte@progride.com.br', 'S'),
(10, 'Rhuan viana', '0e293aab4bfd669ed7d358e6c799bcd0', 'rhuan.v@progride.com.br', 'N'),
(11, 'LUIZ FERNANDO PINAGÃ‰ COUTINHO', 'def6c925ebc4812683676ac6775de7af', 'luizfernandoluck@hotmail.com', 'S');

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
  MODIFY `CLIENTE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `comprador`
--
ALTER TABLE `comprador`
  MODIFY `COMPRADOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `PEDIDO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `PRODUTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `restrito`
--
ALTER TABLE `restrito`
  MODIFY `RESTRITO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

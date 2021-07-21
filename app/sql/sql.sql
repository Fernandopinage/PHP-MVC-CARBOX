-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21-Jul-2021 às 09:10
-- Versão do servidor: 10.3.18-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenciaprogride_carboxi`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprador`
--

CREATE TABLE `comprador` (
  `COMPRADOR_ID` int(11) NOT NULL,
  `COMPRADOR_CNPJ` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `COMPRADOR_NOME` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `COMPRADOR_EMAIL` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `COMPRADOR_SENHA` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `COMPRADOR_STATUS` varchar(100) CHARACTER SET utf8 NOT NULL,
  `COMPRADOR_ACESSO` varchar(1) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `PEDIDO_ID` int(11) NOT NULL,
  `PEDIDO_DESC` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_UNIDADE` varchar(11) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_PRODUTO` varchar(200) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_QUANTIDADE` varchar(200) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_DATAEMISSAO` date NOT NULL,
  `PEDIDO_RAZAO` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_CODSAP` varchar(200) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_NUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `PRODUTO_ID` int(11) NOT NULL,
  `PEDIDO_CODSAP` varchar(11) CHARACTER SET utf8 NOT NULL,
  `PRODUTO_PRODUTO` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PRODUTO_UNIDADE` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PRODUTO_IMG` varchar(220) CHARACTER SET utf8 DEFAULT NULL,
  `PRODUTO_FIXA` varchar(220) CHARACTER SET utf8 NOT NULL,
  `PRODUTO_STATUS` varchar(1) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`PRODUTO_ID`, `PEDIDO_CODSAP`, `PRODUTO_PRODUTO`, `PRODUTO_UNIDADE`, `PRODUTO_IMG`, `PRODUTO_FIXA`, `PRODUTO_STATUS`) VALUES
(1, '01', 'Oxigênio Industrial ', '', 'Oxigenio Industrial.png', 'OXIGENIO_GASOSO.pdf', 'S'),
(2, '02', 'Oxigênio Medicinal ', '', 'Oxigenio Medicinal.png', 'OXIGENIO.pdf', 'S'),
(3, '03', 'Nitrogênio Industrial ', '', 'Nitrogenio Industrial.png', 'NITROGENIO_GASOSO.pdf', 'S'),
(4, '04', 'Ar Comprimido Respirável', '', 'Ar Comprimido Respiravel.png', 'AR_COMPRIMIDO.pdf', 'S'),
(5, '05', 'Argônio Industrial', '', 'Argonio Industrial.png', 'ARGONIO_GASOSO.pdf', 'S'),
(6, '06', 'Dióxido de Carbono Industrial ', '', 'Dioxido de Carbono Industrial.png', 'DIOXIDO_DE_CARBONO.pdf', 'S'),
(7, '07', 'Acetileno Dissolvido Industrial ', '', 'Acetileno Dissolvido Industrial.png', 'ACETILENO.pdf', 'S'),
(8, '08', 'Misturas para solda - Carbomix ', '', 'Misturas para solda - Carbomix.png', 'GAS - MISTURA PARA SOLDA.pdf', 'S'),
(9, '09', 'Oxigênio Líquido ', '', 'Oxigenio Liquido.png', 'OXIGENIO_LIQUIDO.pdf', 'S'),
(10, '10', 'Nitrogênio Líquido', '', 'Nitrogenio Liquido.png', 'LIQ - NITROG_NIO L_QUIDO.pdf', 'S'),
(11, '11', 'Argônio Líquido', '', 'Argonio Liquido.png', 'ARGONIO_LIQUIDO.pdf', 'S'),
(12, '12', 'Dióxido de Carbono Líquido', '', 'Dioxido de Carbono Industrial (1).png', 'ARGONIO_LIQUIDO.pdf', 'S'),
(13, '13', 'Dióxido de Carbono Medicinal  ', '', 'Dioxido de Carbono Medicinal.png', 'GAS - DI_XIDO DE CARBONO.pdf', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `restrito`
--

CREATE TABLE `restrito` (
  `RESTRITO_ID` int(11) NOT NULL,
  `RESTRITO_NOME` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `RESTRITO_SENHA` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `RESTRITO_EMAIL` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `RESTRITO_STATUS` varchar(1) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `restrito`
--

INSERT INTO `restrito` (`RESTRITO_ID`, `RESTRITO_NOME`, `RESTRITO_SENHA`, `RESTRITO_EMAIL`, `RESTRITO_STATUS`) VALUES
(4, 'LUIZ FERNANDO PINAGÉ COUTINHO', '63a9f0ea7bb98050796b649e85481845', 'luiz.c@progride.com.br', 'S');

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
  MODIFY `PRODUTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `restrito`
--
ALTER TABLE `restrito`
  MODIFY `RESTRITO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

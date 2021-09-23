-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23-Set-2021 às 12:17
-- Versão do servidor: 10.3.31-MariaDB
-- versão do PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `carboxi_sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CLIENTE_ID` int(11) NOT NULL,
  `CLIENTE_CNPJ` varchar(100) NOT NULL,
  `CLIENTE_RAZAO` varchar(100) DEFAULT NULL,
  `CLIENTE_FANTASIA` varchar(100) NOT NULL,
  `CLIENTE_EMAIL` varchar(100) DEFAULT NULL,
  `CLIENTE_CODSAP` varchar(11) NOT NULL,
  `CLIENTE_STATUS` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CLIENTE_ID`, `CLIENTE_CNPJ`, `CLIENTE_RAZAO`, `CLIENTE_FANTASIA`, `CLIENTE_EMAIL`, `CLIENTE_CODSAP`, `CLIENTE_STATUS`) VALUES
(1, '07.656.227/0001-39', 'A. W. FABER-CASTELL AMAZONIA S/A', '', 'nfe@faber-castell.com.br', 'C000003', 'S'),
(2, '14.855.328/0001-02', 'AGRO RIO AGROPECUARIA LTDA - ME', '', 'renata@grupoativo.com.br', 'C000005', 'S'),
(3, '04.571.587/0001-40', 'ALEGRA INDUSTRIA E COMERCIO LTDA', '', 'alegra@alegranautica.com.br', 'C000006', 'S'),
(4, '06.044.947/0001-80', 'ALIANCA SERVICOS DE EDIF E TRANSP LTDA', '', 'alianca_servicos@aliancalogistic.com.br', 'C000007', 'S'),
(5, '77.294.254/0021-38', 'AMAGGI EXPORTACAO E IMPORTACAO LTDA', '', 'nfe.fiscal@grupoamaggi.com.br', 'C000008', 'S'),
(6, '05.477.207/0001-75', 'AMAZON ACO INDUSTRIA E COMERCIO LTDA', '', 'nubiane.silva@amazonaco.com.br', 'C000010', 'S'),
(7, '08.541.798/0001-90', 'AMAZON SAND E COM DE AREIA E FUND LTDA', '', 'admin@amazonsand.com.br', 'C000011', 'S'),
(8, '84.526.284/0001-44', 'AMAZONIA IND E COM DE POLPAS LTDA', '', 'amazoniapolpas@ig.com.br', 'C000012', 'S'),
(9, '07.354.898/0001-45', 'ARDO CONSTRUTORA E PAVIMENTACAO LTDA', '', 'teninho@ardoconstrutora.com.br', 'C000014', 'S'),
(10, '05.932.421/0001-74', 'AUTO MECANICA RORAIMA LTDA', '', 'evilasio_francisco@hotmail.com', 'C000018', 'S'),
(11, '84.507.920/0001-90', 'AZEVEDO TRANSPORTES LTDA', '', 'azevedo@azevedotransportes.com.br', 'C000019', 'S'),
(12, '10.386.114/0001-75', 'BENDSTEEL DA AMAZ IND COM DE EST DE LTDA', '', 'receptor.xml@bendsteelam.com.br', 'C000023', 'S'),
(13, '13.499.467/0001-70', 'BIOTEC CONT AMB COM SERV DE AR COND LTDA', '', 'biotec.jander@gmail.com', 'C000024', 'S'),
(14, '03.296.391/0001-21', 'C M NAVEGACAO EST CONST REP NAVAIS LTDA', '', 'cm_navegacao@hotmail.com', 'C000026', 'S'),
(15, '02.003.331/0001-00', 'CENTRO IMAGEM DO AMAZONAS LTDA - EPP', '', 'cia.imagem@yahoo.com.br', 'C000032', 'S'),
(16, '33.122.466/0007-04', 'CERAS JOHNSON LTDA', '', 'arquivo.nfe@scj.com rpneto@scj.com', 'C000033', 'S'),
(17, '06.151.511/0001-90', 'CIDADE TRANSPORTES LTDA', '', 'notas@grupocidade.com', 'C000035', 'S'),
(18, '16.596.915/0001-41', 'CLINICA DE OFT ESP DO AMAZ LTDA - EPP', '', 'jfrancisca35@yahoo.com.br', 'C000037', 'S'),
(19, '04.443.961/0001-21', 'COMERCIO E NAVEGACAO PRATES LTDA', '', 'saleteprates@navegacaoprates.com.br', 'C000038', 'S'),
(20, '02.896.727/0003-96', 'COMETAIS IND E COM METAIS LTDA', '', 'nfe@cometais.com.br', 'C000039', 'S'),
(21, '04.672.291/0001-15', 'COPLAST INDUSTRIA E COM RES PLAST LTDA', '', 'nfe@coplastam.com.br', 'C000042', 'S'),
(22, '11.253.034/0001-04', 'CORTEMETAL DA AMAZONIA LTDA.', '', 'adm.am@cortemetal.compcp.am@c', 'C000043', 'S'),
(23, '05.089.941/0009-14', 'DELIMA COMERCIO E NAVEGACAO LTDA', '', 'assistente_navegacao01@delimanavegacao.com.br', 'C000047', 'S'),
(24, '13.378.697/0001-80', 'DMN ESTALEIRO DA AMAZONIA LTDA', '', 'dmnestaleiro@gmail.com', 'C000051', 'S'),
(25, '10.978.993/0001-24', 'ECOMIX MOAGEM E TRAT DE RESIDUOS LTDA', '', 'financeiro@ecomixsustentavel.com.br', 'C000060', 'S'),
(26, '04.176.689/0001-60', 'ENVISION INDUSTRIA DE PROD ELET LTDA', '', 'claudia.souza@tpv-tech.com', 'C000063', 'S'),
(27, '02.709.163/0001-73', 'ERAM ESTALEIRO RIO AMAZONAS LTDA', '', 'aninha.azevedo@eram.com.br', 'C000064', 'S'),
(28, '84.527.274/0001-23', 'ETERNAL IND COM SV TRAT RES DA AM LTDA', '', 'eternalam@eternalam.com.br', 'C000065', 'S'),
(29, '01.571.899/0001-65', 'IFER DA AMAZONIA LTDA', '', 'rsantos@ifer.com.br', 'C000077', 'S'),
(30, '15.815.491/0001-04', 'INDUSTRIA TRANSFORMADORES AMAZONAS LTDA', '', 'renaldo@itam.com.br', 'C000085', 'S'),
(31, '04.629.853/0001-48', 'J OLIVEIRA MARQUES CIA LTDA', '', 'compras@jmarquesconstrutora.com.br', 'C000086', 'S'),
(32, '63.700.553/0001-77', 'JURUA ESTALEIRO E NAVEGACAO LTDA', '', 'auricelia@juruaestaleiro.com.br', 'C000096', 'S'),
(33, '08.645.181/0001-15', 'LA VITTA CENTRO REP HUM DO AMAZ LTDA ME', '', 'administracao@lavittamanaus.com.br', 'C000099', 'S'),
(34, '05.158.534/0001-64', 'MASSEG TRANSPORTE E ASSESSORIA LTDA', '', 'comercial@masseg.com.br controle@masseg.com.br', 'C000108', 'S'),
(35, '05.526.543/0001-60', 'I3M ENGENHARIA LTDA', '', 'ciro.lobo@mei-eng.br', 'C000111', 'S'),
(36, '04.045.166/0001-85', 'METALURGICA BRASFERRO LTDA', '', 'ederson16@gmail.com', 'C000113', 'S'),
(37, '19.255.297.0001/64', 'MP ATIVIDADE DE REP HUM LTDA - EPP', '', 'orlandiafigueiredo@gmail.com', 'C000116', 'S'),
(38, '14.090.727/0001-11', 'OLIVEIRAS COM E SERV DE US LTDA ME', '', 'oliveiraservicosnavais@hotmail.com', 'C000129', 'S'),
(39, '04.398.525/0001-88', 'EMBACORP DA AMAZONIA SOLUCOES EMB PAPEL', '', 'nfepck.br@ipaper.com', 'C000130', 'S'),
(40, '05.057.914/0001-02', 'PARENTE ANDRADE LTDA', '', '0', 'C000133', 'S'),
(41, '22.772.156/0001-23', 'PROTENORTE MAT DE SEG LTDA', '', 'protenorte@protenorte-am.com.br', 'C000138', 'S'),
(42, '01.971.223/0001-69', 'REZENDE CAMINHOES COM E REP LTDA', '', 'rezendecaminhoes@hotmail.com', 'C000139', 'S'),
(43, '06.030.520/0001-23', 'RIOLIMPO INDUSTRIA E COM DE RES LTDA', '', 'nferiolimpo@riolimpoam.com.br', 'C000141', 'S'),
(44, '10.686.654/0001-74', 'SD COMERCIO DE GAS LTDA ME', '', 'financeiro@fenixcomercioltda.com.br', 'C000150', 'S'),
(45, '04.669.925/0001-80', 'SETA SERV ESP DE TRANSP DO AMAZ LTDA', '', 'fernando@setatransportes.com.br', 'C000155', 'S'),
(46, '04.335.535/0002-55', 'SUPER TERMINAIS COM E IND LTDA', '', 'adalgisa@superterminais.com.br', 'C000160', 'S'),
(47, '08.201.761/0002-02', 'SUPER TRANS TRANSP LOGIST E SERV LTDA', '', 'supertrans@strans.com.br', 'C000161', 'S'),
(48, '04.023.958/0001-59', 'TRANSPORTADORA COMERCIAL LTDA', '', 'transportadoracomercial@hotmail.com', 'C000165', 'S'),
(49, '84.481.373/0001-11', 'USEMIX CONCRETO E FUNDACOES LTDA', '', 'cris@usemix.com.br', 'C000169', 'S'),
(50, '18.527.891/0001-02', 'WALDEMIR MEND OLIVEIRA - EIRELI ME', '', 'contato@dekanaval.com.br', 'C000171', 'S'),
(51, '04.984.328/0001-40', 'WALLEN USINAGEM E FER DE CORTE LTDA', '', 'compras@wallen.com.br', 'C000172', 'S'),
(52, '08.741.572/0001-33', 'YASUFUKU POLIMEROS DO BRASIL LTDA', '', 'claudia@yasufuko.com.br', 'C000176', 'S'),
(53, '07.374.179/0001-96', 'OLIVA PINTO LOGISTICA LTDA', '', 'olivapinto@olivapinto.com.br', 'C000182', 'S'),
(54, '04.659.617/0001-74', 'AMAZON CLEAN SERV DE INCINERACAO LTDA', '', 'financeiro@amazonclean.com.br ', 'C000186', 'S'),
(55, '08.310.033/0001-40', 'RD REFRIGERACAO COM E SERVICOS LTDA', '', 'rd@hotmail.com', 'C000188', 'S'),
(56, '18.073.380/0001-50', 'DAIKIN AR CONDICIONADO AMAZONAS LTDA', '', 'xmlnfe@daikin.com.br', 'C000201', 'S'),
(57, '04.413.977/0001-91', 'PAM INDUSTRIA DE PLASTICO INJETADOS LTDA', '', 'keila@pastore.com.br', 'C000203', 'S'),
(58, '04.944.068/0001-80', 'MUSASHI DA AMAZONIA LTDA', '', 'ivanete@musashi.com.br', 'C000216', 'S'),
(59, '01.001.925/0001-10', 'F B VERAS ROCHA - ME', '', 'simonepereira2310@gmail.com', 'C000220', 'S'),
(60, '00.016.040/5702-53', 'FRANCISCO MARTINS DE ARAUJO', '', ' ', 'C000237', 'S'),
(61, '63.699.839/0001-80', 'WHIRLPOOL ELETRODOMESTICOS AM S.A', '', 'nfe@whirlpool.com', 'C000244', 'S'),
(62, '09.565.801/0001-79', 'JR COMERCIO DE ARTEFATOS METALICOS LTDA', '', 'jr@jrartefatos.com.br', 'C000246', 'S'),
(63, '34.505.214/0001-31', 'METALURGICA SATO DA AMAZONIA LTDA', '', 'sergio_coutinho@metalsato.com.br', 'C000247', 'S'),
(64, '05.073.228/0001-25', 'BERTOLINI CONST NAVAL DA AMAZONIA LTDA', '', 'financeiro@tbl.com.br', 'C000249', 'S'),
(65, '01.568.020/0001-26', 'TRANSPORTE CARINHOSO LTDA', '', 'transportecarinhoso@hotmail.com', 'C000252', 'S'),
(66, '07.200.194/0001-18', 'CAL-COMP IND E COM DE ELETR E INF LTDA', '', 'cleide_froes@cal-comp.com.br', 'C000271', 'S'),
(67, '05.370.016/0001-00', 'FUNDO ESTAD DE SAUDE DO ESTADO RORAIMA', '', 'hudson@saude.rr.gov.br', 'C000280', 'S'),
(68, '04.563.672/0001-66', 'SOCIEDADE FOGAS LIMITADA', '', 'compras@fogas.com.br', 'C000292', 'S'),
(69, '23.027.675/0001-20', 'METALURGICA MARLIN S/A IND COM IMP EXPOR', '', 'dinar@mmarlin.com.br', 'C000293', 'S'),
(70, '01.771.241/0001-05', 'HITACHI ASTEMO MANAUS BRAKE SYSTEMS LTDA', '', 'compra@nissinbr.com.br', 'C000300', 'S'),
(71, '07.305.913/0001-65', 'SOLUTIONS 2 GO DO BRASIL INDUSTRIA, COMERCIO E DISTRIBUICAO', '', 'fiscal.dadc@sonydadc.com', 'C000302', 'S'),
(72, '10.246.042/0001-60', 'PAIVA E ARAUJO SERV MED HOSP LTDA - ME', '', 'ts.paiva@terra.com.br', 'C000310', 'S'),
(73, '12.922.786/0001-83', 'HVAC ENG E SERV DE INST DE MAQ E EQUIP', '', 'nfe@hvac-engenharia.com.br', 'C000311', 'S'),
(74, '04.957.650/0001-80', 'AMAZONGAS DIST DE GAS LIQ DE PETROL LTDA', '', 'compras@amazongas.com.br', 'C000312', 'S'),
(75, '00.892.361/0001-90', 'ALPHA ASSEMBLY SOLUT BRASIL SOLDAS LTDA', '', 'nfe@alent.com', 'C000319', 'S'),
(76, '06.186.733/0001-49', 'EXATA CARGO LTDA', '', 'comercial@exatacargo.com.br', 'C000337', 'S'),
(77, '22.595.950/0001-49', 'ADRIANA DOS SANTOS FIGUEIREDO - ME', '', 'torneadoramanauara@gmail.com', 'C000345', 'S'),
(78, '04.618.096/0001-07', 'J NASSER ENGENHARIA LTDA', '', 'compras@jnasser.com.br', 'C000346', 'S'),
(79, '00.512.663/0001-95', 'VIA MARCONI VEICULOS LTDA', '', 'tesouraria@viamarconi.com.br', 'C000355', 'S'),
(80, '33.174.335/0001-85', 'CROWN EMB METALICAS DA AMAZONIA S/A', '', 'magno.lima@crowncork.com.br', 'C000363', 'S'),
(81, '04.403.408/0001-65', 'PANASONIC DO BRASIL LIMITADA', '', 'nf_eletronica_entrada@br.panasonic.com', 'C000366', 'S'),
(82, '16.502.282/0001-65', 'YAMADA-LOM FAB DE ART DE MAT PLAST LTDA', '', 'fiscal@ylom.com.br', 'C000367', 'S'),
(83, '84.501.873/0001-78', 'TUTIPLAST IND E COM LTDA', '', 'roze.compras@tutiplast.com.br', 'C000372', 'S'),
(84, '05.678.625/0001-20', 'DUNORTE LOC DE MAQ E LOG LIMITADA', '', 'comercial@dunloc.com.br', 'C000373', 'S'),
(85, '10.919.908/0005-80', 'SIDERAL LINHAS AEREAS LTDA', '', 'aux.financeiro@expressoadorno.com.br', 'C000374', 'S'),
(86, '00.379.190/0001-08', 'TECNOAR ASS TEC COM DA AM LTDA', '', 'tecnoar@tecnoarengenharia.com.br', 'C000403', 'S'),
(87, '05.149.040/0001-13', 'SIERRA DO BRASIL LTDA', '', 'suprimentos@portodemanaus.com.br', 'C000407', 'S'),
(88, '06.996.299/0001-62', 'HEVI EMBALAGENS DA AMAZONIA LTDA', '', 'fiscal@hevi.com.br', 'C000411', 'S'),
(89, '04.012.043/0001-48', 'HITACHI ASTEMO MANAUS CHASSIS SYSTEMS LTDA', '', 'nfe@showa.com.br', 'C000412', 'S'),
(90, '84.496.066/0001-04', 'PST ELETRONICA LTDA', '', 'pnfe@pst.com.br', 'C000413', 'S'),
(91, '01.125.524/0001-71', 'FARINA TRANSPORTES E COMERCIO LTDA', '', 'farina@farinatransportes.com.br', 'C000417', 'S'),
(92, '12.238.478/0001-33', 'NEW CITY POINT DE ALIMENTOS LTDA - ME', '', 'newcity@habibs.com.br', 'C000422', 'S'),
(93, '84.094.911/0001-15', 'ARCOMA DA AMAZONIA IND E COM LTDA', '', 'financeiro@arcoma.com.br compras@arcoma.com.br', 'C000427', 'S'),
(94, '02.499.629/0001-53', 'SODECIA  AUTOMOTIVE MANAUS LTDA.', '', 'davidemidio@scorpios.com.br', 'C000432', 'S'),
(95, '09.137.895/0001-85', 'KAWASAKI MOTORES DO BRASIL LTDA', '', 'nilson@kawasakibrasil.com', 'C000435', 'S'),
(96, '01.481.603/0001-15', 'BEIRA ALTA INDUSTRIAL LTDA', '', 'edineia@beiraalta.ind.br', 'C000438', 'S'),
(97, '02.949.077/0001-38', 'EMILIA CAROLINA MELLO VIEIRA ME', '', 'advemiliacarolina@gmail.com', 'C000445', 'S'),
(98, '22.278.205/0001-76', 'TERRA DO CAJU HORTIFRUTIGRANJEIRO LTDA', '', 'w.assessoriacontabil@hotmail.com', 'C000449', 'S'),
(99, '00.015.857/4412-34', 'FRANCISCO SERAFIM GOMES DE OLIVEIRA', '', ' ', 'C000450', 'S'),
(100, '34.525.444/0001-62', 'MICROSERVICE TECNOLOGIA DIGIT DA AM LTDA', '', 'nfe@microservice.com.br', 'C000459', 'S'),
(101, '24.225.851/0001-09', 'F J R SERVICOS MEDICOS LTDA - ME', '', 'cleoviana.equilibriummedical@gmail.com', 'C000461', 'S'),
(102, '08.658.519/0001-73', 'RAVIBRAS EMBALAGENS DA AMAZONIA LTDA', '', 'pedro.silva@gruporavi.com', 'C000488', 'S'),
(103, '07.379.546/0001-44', 'HONDA LOCK DO BRASIL LTDA', '', 'notas@hondalock.com.br', 'C000493', 'S'),
(104, '93.688.778/0002-05', 'LIGA MONTAGEM E MAN ELETROMECANICA LTDA', '', 'rogeldo.suprimentos@ligaengenharia.com.br', 'C000502', 'S'),
(105, '34.019.992/0016-05', 'MINERACAO TABOCA S/A', '', 'adriana.viegas@mtaboca.com.br', 'C000505', 'S'),
(106, '84.492.198/0001-68', 'MURANO VEICULOS LTDA', '', 'janio.monte@gruposimoes.com.br', 'C000511', 'S'),
(107, '04.547.098/0001-52', 'I-SHENG BRASIL IND COM COMP ELET. LTDA', '', 'laura.souza@ishengbr.com', 'C000517', 'S'),
(108, '34.520.130/0001-77', 'POLE POSITION TECNOLOGIA LTDA', '', 'sergiane.souza@poleam.com', 'C000522', 'S'),
(109, '54.612.650/0001-17', 'ESSILOR DA AM IND COM LTDA', '', 'naira.monteiro@essilor.com.br', 'C000528', 'S'),
(110, '11.807.269/0001-09', 'GTD INST. MAQ. IND COM MAT ELETRICO LTDA', '', 'gtd.instecom@gmail.com', 'C000532', 'S'),
(111, '00.004.345/4136-21', 'DANIEL ALEXANDER PEREIRE DA CUNHA', '', 'minaspetshop@gmail.com', 'C000535', 'S'),
(112, '22.140.774/0001-50', 'PUNTO ADRIANOPOLIS COM DE ALIM LTDA', '', 'adriele.duarte@habibs.com.br', 'C000537', 'S'),
(113, '84.105.477/0001-21', 'PNEUFACIL COM VAR DE PNEUMATICOS LTDA', '', 'contab@pneufacilmanaus.com.br', 'C000543', 'S'),
(114, '05.518.782/0001-79', 'REI DAS MANGUEIRAS IND E COM LTDA', '', 'vendas@reidasmangueiras.com.br', 'C000544', 'S'),
(115, '07.782.473/0001-37', 'METALURGICA SETE DE SETEMBRO DA AM LTDA', '', 'nfe.am@mssamazonia.com.br', 'C000546', 'S'),
(116, '34.590.315/0001-58', 'BRASIL NORTE BEBIDAS LTDA', '', 'katiane.goes@gruposimoes.com.br', 'C000553', 'S'),
(117, '05.402.904/0015-62', 'EMPRESA BRASILEIRA DE DISTRIBUICAO LTDA', '', 'nfe.edbmanaus@ebdbr.com.br', 'C000557', 'S'),
(118, '02.104.432/0005-00', 'CONESTOGA-ROVERS E ASSOCIADOS ENG LTDA', '', 'alorenzo@craengenharia.com.br', 'C000564', 'S'),
(119, '02.518.679/0001-30', 'SHIZEN VEICULOS LTDA', '', 'xml.nfe@gruposimoes.com.br', 'C000567', 'S'),
(120, '13.336.651/0001-07', 'CARDAN NORDESTE COM DE PCS P V LTDA', '', ' ', 'C000571', 'S'),
(121, '32.068.363/0006-60', 'TOTAL LINHAS AEREAS S.A', '', 'laurence.melo@total.com.br', 'C000590', 'S'),
(122, '08.882.020/0001-45', 'LM NAVEGACAO E TRANSP LTDA', '', 'contato@navetrans.com.br', 'C000594', 'S'),
(123, '19.314.893/0001-78', 'C L COMERCIO VAREJISTA DE ALIMENTOS LTDA', '', 'mauriciosantis75@hotmail.com', 'C000608', 'S'),
(124, '22.141.417/0001-07', 'PUNTO PEDRO TEIXEIRA COM DE ALIM LTDA', '', 'andreza.souza@regazzofastfood.com.br', 'C000609', 'S'),
(125, '15.809.486/0001-80', 'FH DE OLIVEIRAPEIXOTO EIRELI', '', 'contasapagar@fhopeixoto.com.br', 'C000616', 'S'),
(126, '22.768.840/0001-31', 'CONSTRUTORA ETAM LTDA', '', 'compras@etamconstrutora.com.br', 'C000627', 'S'),
(127, '13.392.705/0001-43', 'TECWAY SERV E LOCDE EQUIPAMENTOS LTDA-EP', '', 'aparecido@tecway.srv.br', 'C000629', 'S'),
(128, '03.540.153/0001-10', 'MARIUA CONSTRUCOES LTDA', '', 'compras@mariua.net financeiro@mariua.net', 'C000634', 'S'),
(129, '09.379.563/0001-07', 'D. J. EMPREENDIMENTOS EDUCACIONAIS LTDA-', '', 'marcileia.mattos@idaam.com.br', 'C000637', 'S'),
(130, '00.624.964/0001-00', 'COMPANHIA DE GAS DO AMAZONAS', '', 'andreza.santos@cigas-am.com.br', 'C000641', 'S'),
(131, '34.599.837/0001-10', 'ESPLANADA IND E COM DE COLCHOES LTDA', '', 'leandro.silva@eurosono.com.br', 'C000642', 'S'),
(132, '21.238.016/0001-07', 'STEPWORK ENGENHARIA INSTALACOES E PROJET', '', 'suporte@stepworkengenharia.com.br', 'C000655', 'S'),
(133, '34.582.973/0001-06', 'ALFATEC IND E COM LTDA.', '', 'compras@alfatecbr.com.br', 'C000664', 'S'),
(134, '05.872.087/0001-00', 'GASTROCLIN SERV MEDICOS LTDA', '', 'gastroclinserv.medicos@gmail.com', 'C000665', 'S'),
(135, '15.698.838/0001-78', 'RIBRO IND. COM. E SERV METALURGICOS', '', 'compras@ribro.com.br', 'C000668', 'S'),
(136, '34.558.189/0001-54', 'V A SILVA E CIA LTDA', '', 'valdivino.alexandre1@gmail.com', 'C000669', 'S'),
(137, '26.013.023/0001-24', 'CONIPA IND E COM PRES METAIS E ART DECOR', '', 'emmanuela.costa@conipaind.com.br', 'C000672', 'S'),
(138, '74.404.229/0008-02', 'FLEXTRONICS INTERNATIONAL TECNOLOGIA LTD', '', 'alexandre.freitas3@flex.com ', 'C000690', 'S'),
(139, '11.509.468/0001-22', 'HOSPITAL LOTTY IRIS EIRELI-ME', '', 'tesouraria.hli@gmail.com', 'C000702', 'S'),
(140, '22.575.359/0001-20', 'R F DE MENDONCA EIRELI-ME', '', 'raimundofm1978@gmail.com', 'C000704', 'S'),
(141, '02.810.005/0001-05', 'MG GOLD IND DA AMAZONIA LTDA', '', 'compras@mggold.com.br', 'C000707', 'S'),
(142, '00.265.284/0001-48', 'SEIXAS NUNES LTDA', '', 'moiseseixas@hotmail.com', 'C000709', 'S'),
(143, '13.560.720/0001-53', 'ANTONIO CARLOS MENEZES REGIS DE ALMEIDA', '', 'casadosdescartaveis@gmail.com', 'C000723', 'S'),
(144, '24.570.268/0001-27', 'PALLOMA FRANCA DE LIMA FRANCINE', '', 'nortebaloes@gmail.com', 'C000726', 'S'),
(145, '06.219.530/0001-01', 'NORTE SHOPPING BRASIL LTDA', '', 'norteshoppingbr@gmail.com', 'C000733', 'S'),
(146, '08.962.294/0001-44', 'SUMIDENSO DA AMAZONIA IND ELETRICAS LTDA', '', ' ', 'C000746', 'S'),
(147, '07.303.379/0002-39', 'COMPANHIA ENERGETICA MANAUARA', '', 'fernandopegas@utemanauara.com.br', 'C000754', 'S'),
(148, '13.452.287/0001-32', 'HUMBERTO MONTEIRO DE OLIVEIRA - ME', '', 'monica.franco.oliveira@gmail.com', 'C000755', 'S'),
(149, '26.123.230/0001-31', 'POP BALLOON COM DE ARTG PARA FESTAS LTDA', '', 'popballoon.manaus@gmail.com', 'C000756', 'S'),
(150, '28.090.410/0001-90', 'FANTASTIC PARTY COM E DEC FESTAS LTDA ME', '', 'contato@fantasticpartyam.com', 'C000758', 'S'),
(151, '63.735.609/0001-29', 'CENTRO AMAZONENSE DE OFTALMOLOGIA LTDA', '', 'adm@cao.med.br', 'C000779', 'S'),
(152, '00.394.429/0189-05', 'COMANDO DA AERONAUTICA', '', 'borisbsb@fab.mil.br', 'C000780', 'S'),
(153, '01.208.577/0001-56', 'NOVO TEMPO IND GRAFICA LTDA', '', 'orleanslima@novotempo-ig.com.br', 'C000781', 'S'),
(154, '23.026.776/0001-86', 'AVANPLAS POLIMEROS DA AMAZONIA LTDA', '', 'nfe@avanplas.com.br', 'C000783', 'S'),
(155, '42.565.697/0019-17', 'INTERTEK DO BRASIL INSPECOES LTDA', '', 'jose.filho@intertek.com', 'C000788', 'S'),
(156, '28.705.216/0001-71', 'LOPES E LIMA LTDA', '', 'artfestaslojas@gmail.com', 'C000789', 'S'),
(157, '02.137.093/0001-26', 'KF CONSTRUCOES E COM LTDA', '', 'adm@kfmateriaisdeconstrucoes.com.br', 'C000793', 'S'),
(158, '30.409.425/0001-10', 'REALIZE COMERCIO DE ARTIGOS FESTAS LTDA', '', 'financeiro@grupopinto.com.br', 'C000797', 'S'),
(159, '04.471.785/0001-31', 'MOSS QUATRO M LTDA', '', 'alexandre@moss4m.com.br', 'C000812', 'S'),
(160, '23.351.361/0001-88', 'ML COMERCIO DE ARTIG DE DECOR EIRELI', '', 'partyshopbr@outlook.com', 'C000815', 'S'),
(161, '30.428.481/0001-00', 'VANESSA MARTINS MELO DRUMOND 78960029220', '', 'dcorfestas@hotmail.com', 'C000816', 'S'),
(162, '21.803.751/0001-16', 'JULIE V R ASSI', '', 'julierocha@uol.com.br', 'C000817', 'S'),
(163, '00.280.273/0001-37', 'SAMSUNG ELETRONICA DA AMAZONIA LTDA', '', 'contabilidade@carboxigases.com', 'C000819', 'S'),
(164, '22.798.094/0001-29', 'FLEX IMPORT EXPORT IND E COM DE MAQ E MO', '', 'sidney@flex-am.com.br', 'C000820', 'S'),
(165, '26.590.347/0001-25', 'AM COM DE ART PARA FESTAS LTDA', '', 'palaciodasfestas.compras@gmail.com', 'C000828', 'S'),
(166, '15.705.880/0001-79', 'ELAINE LINS MARQUES DA COSTA - EIRELI', '', 'financeiro@maricotascraft.com.br', 'C000832', 'S'),
(167, '03.665.204/0001-30', 'NAUTICA VELHO ARTHUR COM E SERV LTDA', '', 'nauticavelhoarthur@ig.com.br', 'C000845', 'S'),
(168, '54.644.042/0001-94', 'PISO X ENG E CONST LTDA - ME', '', 'compras@pisox.com.br', 'C000846', 'S'),
(169, '13.405.486/0001-90', 'CLAUDIO DO C GONCALVES', '', 'topimplante@gmail.com', 'C000852', 'S'),
(170, '47.144.548/0003-30', 'GTEL GRUPO TECNICO DE ELETROMECANICA S.A', '', 'jose.coutinho@gtel-sp.com.br', 'C000856', 'S'),
(171, '08.214.295/0002-91', 'SUPER CANCUN COM DE PROD ALIMENTICIOS', '', 'gerencia@supercancun.com.br', 'C000864', 'S'),
(172, '84.115.484/0001-04', 'CARGO ENGENHARIA DE AR CONDICIONADO DA A', '', 'compras@cargoengenharia.com.br', 'C000870', 'S'),
(173, '11.758.367/0001-95', 'TPV DO BRASIL INDUSTRIA DE ELETRONICOS L', '', 'claudia.souza@tpv-tech.com', 'C000887', 'S'),
(174, '18.139.195/0001-10', 'EXPORT MANAUS RECUPERACAO E COMERCIO DE', '', 'administrativo.manaus@gruporfr.com.br', 'C000890', 'S'),
(175, '07.532.752/0004-95', 'PNEU FORTE LTDA', '', 'junior.guimaraes@pneufortenet.com.br', 'C000896', 'S'),
(176, '31.356.611/0001-09', 'RANAM IND.E COM.DE IMPLEMEN. TRANSP.LTDA', '', 'fabio@ranam.com.br dpfiscal@ranam.com.br', 'C000910', 'S'),
(177, '05.408.808/0001-26', 'ADIEL BRAGA DE MENEZES', '', 'barcostitan@hotmail.com', 'C000915', 'S'),
(178, '23.732.890/0003-93', 'UNIMED DE MANAUS EMPREENDIMENTOS S.A', '', 'carlos.oliveira@unimedmanaus.coop.br', 'C000920', 'S'),
(179, '18.983.150/0001-28', 'SOLTEC INSPECOES E SERV DE CONSTRUC LTDA', '', 'lucifabioralves@gmail.com', 'C000929', 'S'),
(180, '03.426.484/0001-23', 'SALDANHA RODRIGUES LTDA', '', 'gtec@seringasr.com.br', 'C000937', 'S'),
(181, '33.739.314/0001-60', 'DENISON GUIMARAES NERY 51977036287', '', 'denisonnery@gmail.com', 'C000938', 'S'),
(182, '08.322.908/0001-23', 'DAFRA DA AMAZONIA IND E COM DE MOTOC LTD', '', 'amarildo.freitas@daframotos.com.br', 'C000939', 'S'),
(183, '09.241.710/0001-88', 'FEDERAL MOGUL INDUSTRIA DE AUTOPECAS LTD', '', 'nfe-mana@federalmogul.com', 'C000941', 'S'),
(184, '09.392.548/0001-07', 'EFIRE MANUT DE EQUIP C/ INCENDIO EIRELI', '', 'comercial@emops.com.br', 'C000942', 'S'),
(185, '09.247.550/0001-84', 'RZD COMERCIO DE VEICULOS LTDA', '', 'alisson@rezendecaminhoes.com.br', 'C000943', 'S'),
(186, '29.067.113/0226-70', 'POLIMIX CONCRETO LTDA', '', 'TRIBUTARIO@MIZU.COM.BR', 'C000944', 'S'),
(187, '04.161.047/0001-98', 'KEIHIN TECNOLOGIA DO BRASIL LTDA', '', 'JOSE-FREITAS@KEIHINBR.COM.BR', 'C000950', 'S'),
(188, '33.102.985/0001-15', 'A P MARINHO PROMOCAO DE VENDAS EIRELI', '', 'mrbubblemanaus@gmail.com', 'C000959', 'S'),
(189, '04.210.423/0001-97', 'OLIVEIRA ENERGIA S.A.', '', 'mariadores@oliveiraenergia.com.br', 'C000961', 'S'),
(190, '34.356.833/0001-01', 'JESSICA REGINA MARTINS COELHO DE OLIVEIR', '', 'jessik.regina1991@gmail.com', 'C000962', 'S'),
(191, '04.022.366/0001-12', 'AMAZONIA BOAT LTDA', '', 'amazonboat@amazonboat.com.br', 'C000964', 'S'),
(192, '01.592.818/0001-03', 'KNAUF ISOPOR DA AMAZONIA LTDA', '', 'francisco.celivaldo@knauf-isopor.com.br', 'C000965', 'S'),
(193, '84.450.212/0001-60', 'COMERCIO DE MIUDEZAS BANDEIRA LTDA', '', 'compras@tropicalmultiloja.com.br', 'C000974', 'S'),
(194, '04.160.537/0001-70', 'TEMA TRANSPORTES ESPECIAL DE MANAUS LTDA', '', 'tema@tematransportes.com.br', 'C000979', 'S'),
(195, '07.632.502/0001-84', 'EVIDENCIA LOGISTICA TRANSPORTE LTDA', '', 'salim@evidencialog.com.br', 'C000980', 'S'),
(196, '61.575.775/0037-90', 'TECHINT ENGENHARIA E CONSTRUCAO S/A', '', 'leonardo.carnelosso@techint.com.br', 'C000981', 'S'),
(197, '07.312.248/0003-07', 'RLX INDUSTRIAL IMPORTADORA LTDA', '', 'compras@rlxrefrigerantes.com.br', 'C000982', 'S'),
(198, '07.637.620/0001-85', 'SALCOMP INDUSTRIAL ELETRO DA AMAZON LTDA', '', 'helena.ferreira@salcomp.com', 'C000983', 'S'),
(199, '34.717.471/0001-37', 'RF BAR E CHOPERIA LTDA', '', 'RONEYFROTA@BOL.COM.BR', 'C000984', 'S'),
(200, '27.956.445/0001-04', 'BYD INDUSTRIA DE BATERIAS LTDA', '', 'fiscal@byd.com', 'C000986', 'S'),
(201, '08.992.254/0001-45', 'MACEDO & SOUZA LTDA', '', 'roraimaextintores@gmail.com', 'C000987', 'S'),
(202, '01.263.896/0015-60', 'MINISTERIO DA CIENCIA,TECN,INOV E COMUNI', '', ' ', 'C000990', 'S'),
(203, '07.080.050/0001-75', 'VISION CLINICA DE OLHOS LIMITADA', '', 'APDE_OLIVEIRA@HOTMAIL.COM', 'C000994', 'S'),
(204, '28.151.393/0003-15', 'XINGU FRUIT POLPAS DE FRUTAD INDUSTRIA', '', 'REGNALDO@XINGUFRUT.COM.BR', 'C000995', 'S'),
(205, '07.489.753/0001-51', 'GENIS EQUIPAMENTOS DE GINASTICA LTDA', '', 'juliano.anaquiri@genis.com.br', 'C001000', 'S'),
(206, '19.046.478/0001-80', 'S. P. NUNES', '', 'spnunes.log@outlook.com', 'C001001', 'S'),
(207, '21.390.139/0001-69', 'FABIO SANTOS DE SOUSA - EPP', '', ' ', 'C001010', 'S'),
(208, '10.631.897/0001-05', 'BALME EMPREENDIMENTOS LTDA', '', 'quantum.es.licitacao@gmail.com', 'C001011', 'S'),
(209, '04.356.309/0001-70', 'ANTONIO RODRIGUES & CIA LTDA', '', 'gerenciafinanceiro@fotonascimento.com.br', 'C001014', 'S'),
(210, '33.075.815/0002-70', 'A L E J PARQUES DE DIVERSAO LTDA', '', ' ', 'C001016', 'S'),
(211, '19.395.416/0001-84', 'A. G. C. DA SILVA EIRELI ME', '', 'tacilney@cunhacontabil.com', 'C001021', 'S'),
(212, '07.380.872/0001-71', 'JAD COMERCIO DE BIJOUTERIAS EIRELI', '', 'lafiesta.alvorada@gmail.com', 'C001022', 'S'),
(213, '84.537.141/0001-38', 'SAMEL PLANO DE SAUDE LTDA.', '', 'contabilidade@samel.com.br', 'C001023', 'S'),
(214, '34.594.316/0001-70', 'AGNALDO O FERREIRA', '', 'reutil.am@hotmail.com', 'C001025', 'S'),
(215, '63.659.346/0001-16', 'M I F PEREIRA', '', 'tiago-np@hotmail.com', 'C001027', 'S'),
(216, '20.334.035/0002-55', 'GOMES E MARTINS CIRURGIA PLASTICA LTDA', '', 'fabianopms@hotmail.com', 'C001032', 'S'),
(217, '05.646.631/0004-49', 'FRUTAL INDUSTRIA E COMERCIO LTDA', '', 'clodomir.tomaz@gmail.com', 'C001033', 'S'),
(218, '08.470.524/0001-58', 'FRUTAL INDUSTRIA E COMERCIO LTDA', '', 'clodomir.tomaz@gmail.com', 'C001036', 'S'),
(219, '04.807.608/0001-83', 'VALFILM IND E COM DE PLASTICOS LTDA', '', 'controladoria@valfilm.com.br', 'C001037', 'S'),
(220, '28.216.468/0001-37', 'ANTONIO N DA COSTA', '', 'ANTONIO.NOGUEIRA@NORTECMONTAGENS.COM.BR', 'C001039', 'S'),
(221, '02.066.866/0001-20', 'INSTITUTO DE DERMATOLOGIA DE MANAUS LTDA', '', ' ', 'C001040', 'S'),
(222, '49.383.250/0001-47', 'HISAMITSU FARMACEUTICA DO BRASIL LTDA', '', 'carla.n@salonpas.ind.br', 'C001047', 'S'),
(223, '07.047.527/0001-10', 'PERES E SANTOS LTDA', '', 'VERTEX@VERTEXENGENHARIA.COM.BR', 'C001048', 'S'),
(224, '07.519.331/0001-81', 'CORPRINT DA AMAZONIA GRAFICA E EDITORA LTDA', '', 'corprint_am@corprint.com.br', 'C001049', 'S'),
(225, '33.549.827/0001-08', 'TR COMERCIO DE ARTIGOS DE DECORACAO E FESTAS LTDA', '', 'festballoon@hotmail.com', 'C001056', 'S'),
(226, '37.739.035/0001-57', 'CONSORCIO SANCHES TRIPOLINI JATOBETON - PASSARELA', '', 'ANDREIA@SANCHESTRIPOLINI.COM.BR', 'C001057', 'S'),
(227, '05.992.464/0001-45', 'IMAM - INSTITUTO DE MAMA DO AMAZONAS', '', 'SENSUMED@VIVAX.COM.BR', 'C001059', 'S'),
(228, '09.365.007/0001-81', 'OX DA AMAZONIA INDUSTRIA DE BICICLETAS S.A', '', 'CMORA@OXBIKE.COM.BR', 'C001060', 'S'),
(229, '31.882.712/0001-05', 'AMAZON RESGATE SERVICOS MEDICOS LTDA', '', 'FERNANDO.ALMEIDA.MED@GMAIL.COM', 'C001063', 'S'),
(230, '19.979.490/0003-00', 'MOTRICE SOLUCOES EM', '', 'EVALDO.COSTA@MOTRICESE.COM.BR', 'C002335', 'S'),
(231, '18.118.064/0001-57', 'AGAH SERVICOS E LOCACAO DE EQUIPAMENTOS EIRELII', '', 'R.NOTAS.FISCAIS@GMAIL.COM', 'C002340', 'S'),
(232, '11.019.492/0001-83', 'INOX PRO INDUSTRIA COMERCIO E SERVICOS EM ACO LTDA', '', 'COMPRAS@INOXPRO.COM.BR', 'C002345', 'S'),
(233, '37.625.231/0001-09', 'SISTEMA DE SAUDE INTEGRADO DA AMAZONIA', '', 'JMARTINS@NILTONLINS.BR', 'C002346', 'S'),
(234, '37.746.603/0001-47', 'RP FLIX NAUTICA E COMERCIO DE EMBARCACOES LTDA', '', 'nautiflix@outlook.com', 'C002348', 'S'),
(235, '36.848.050/0001-70', 'VERDE BRASIL INDUSTRIA DE PRODUTOS PLASTICOS LTDA', '', 'CONTABIL@SAPPHIREOFFICE.COM.BR', 'C002350', 'S'),
(236, '17.364.487/0001-94', 'AMAZONTRAFOS FABRICACAO, SERVICOS E COMERCIO DE TRANSFORMADO', '', 'POOL@POOLENGENHARIA.COM', 'C002356', 'S'),
(237, '02.896.727/0001-24', 'COMETAIS IND E COM METAIS LTDA', '', 'nfe@cometais.com.br', 'C002363', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_produto`
--

CREATE TABLE `cliente_produto` (
  `cli_pro_id` int(11) NOT NULL,
  `cli_pro_cnpj` varchar(100) NOT NULL,
  `cli_pro_sap` varchar(100) NOT NULL,
  `cli_pro_produto` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente_produto`
--

INSERT INTO `cliente_produto` (`cli_pro_id`, `cli_pro_cnpj`, `cli_pro_sap`, `cli_pro_produto`) VALUES
(1, '07.656.227/0001-39', 'C000003', '[\"10010027\",\"10020028\",\"10020029\",\"10030001\",\"10060012\"]'),
(2, '14.855.328/0001-02', 'C000005', '[\"10010001\",\"10010006\",\"10020028\",\"10030001\",\"10050015\",\"10050016\",\"10060012\"]'),
(3, '04.571.587/0001-40', 'C000006', '[\"10010017\",\"10010028\",\"10030001\"]'),
(4, '06.044.947/0001-80', 'C000007', '[\"10010001\",\"10010005\",\"10010006\",\"10020011\",\"10020028\",\"10060010\",\"10060012\"]'),
(5, '77.294.254/0021-38', 'C000008', '[\"10010001\",\"10010004\",\"10010008\",\"10010013\",\"10010020\",\"10010025\",\"10010027\",\"10020027\",\"10020028\",\"10030001\",\"10030004\",\"10050015\",\"10060012\",\"10060013\"]'),
(6, '05.477.207/0001-75', 'C000010', '[\"10010001\",\"10010020\",\"10020028\",\"10030001\",\"10050015\",\"10060012\"]'),
(7, '08.541.798/0001-90', 'C000011', '[\"10010001\",\"10040014\",\"10050010\",\"10050016\",\"10060012\"]'),
(8, '84.526.284/0001-44', 'C000012', '[\"10010001\",\"10010006\",\"10020001\",\"10020028\",\"10030001\"]'),
(9, '07.354.898/0001-45', 'C000014', '[\"10010001\",\"10010013\",\"10010025\",\"10060012\",\"10070045\"]'),
(10, '05.932.421/0001-74', 'C000018', '[\"10010006\",\"10020010\",\"10020028\",\"10060012\"]'),
(11, '84.507.920/0001-90', 'C000019', '[\"10010001\"]'),
(12, '10.386.114/0001-75', 'C000023', '[\"10010001\",\"10020028\",\"10030001\",\"10050015\",\"10050044\",\"10060012\"]'),
(13, '13.499.467/0001-70', 'C000024', '[\"10040014\"]'),
(14, '03.296.391/0001-21', 'C000026', '[\"10010001\"]'),
(15, '02.003.331/0001-00', 'C000032', '[\"10010013\",\"10010017\",\"10010028\"]'),
(16, '33.122.466/0007-04', 'C000033', '[\"10010001\",\"10020028\",\"10020029\",\"10020030\",\"10060012\",\"10070012\",\"10070036\",\"10070040\",\"10070043\",\"10070055\"]'),
(17, '06.151.511/0001-90', 'C000035', '[\"10010001\",\"10030001\",\"10030005\",\"10060012\"]'),
(18, '16.596.915/0001-41', 'C000037', '[\"10010003\",\"10010013\",\"10010022\",\"10010028\",\"10050014\",\"10070010\"]'),
(19, '04.443.961/0001-21', 'C000038', '[\"10010001\",\"10020028\",\"10030001\"]'),
(20, '02.896.727/0003-96', 'C000039', '[\"10010001\",\"10010006\",\"10010020\",\"10020028\",\"10030001\",\"10030011\",\"10030018\",\"10040014\",\"10050015\",\"10060010\",\"10060012\"]'),
(21, '04.672.291/0001-15', 'C000042', '[\"10010001\",\"10010002\",\"10020011\",\"10020028\",\"10030001\",\"10050015\",\"10050016\",\"10060012.\",\"10060013\"]'),
(22, '11.253.034/0001-04', 'C000043', '[\"10020028\"]'),
(23, '05.089.941/0009-14', 'C000047', '[\"10010001\"]'),
(24, '13.378.697/0001-80', 'C000051', '[\"10010001\",\"10020028\",\"10030001\"]'),
(25, '10.978.993/0001-24', 'C000060', '[\"10010001\"]'),
(26, '04.176.689/0001-60', 'C000063', '[\"10010001\",\"10020028\",\"10060013\",\"10010001\"]'),
(27, '02.709.163/0001-73', 'C000064', '[\"10010001\",\"10010006\",\"10060012\"]'),
(28, '84.527.274/0001-23', 'C000065', '[\"10010001\",\"10020028\",\"10030001\",\"10060012\",\"10070001\",\"10070010\",\"10070034\"]'),
(29, '01.571.899/0001-65', 'C000077', '[\"10010001\",\"10010013\",\"10010027\",\"10020028\",\"10030001\",\"10050010\",\"10050016\",\"10050024\"]'),
(30, '15.815.491/0001-04', 'C000085', '[\"10010001\",\"10020028\",\"10030001\",\"10030018\",\"10050015\",\"10060012\",\"10070055\"]'),
(31, '04.629.853/0001-48', 'C000086', '[\"10010001\",\"10060012\"]'),
(32, '63.700.553/0001-77', 'C000096', '[\"10010001\",\"10010002\",\"10010013\",\"10010020\",\"10010028\",\"10020018\",\"10020028\",\"10030001\",\"10050013\",\"10050015\",\"10050016\"]'),
(33, '08.645.181/0001-15', 'C000099', '[\"10010013\",\"10010022\",\"10020026\",\"10020027\",\"10050006\",\"10050014\"]'),
(34, '05.158.534/0001-64', 'C000108', '[\"10010001\",\"10010006\",\"10060012\"]'),
(35, '05.526.543/0001-60', 'C000111', '[\"10010001\",\"10030001\"]'),
(36, '04.045.166/0001-85', 'C000113', '[\"10010001\",\"10030001\",\"10050016\",\"10060012\"]'),
(37, '19.255.297.0001/64', 'C000116', '[\"10010013\",\"10020026\",\"10050006\",\"10050014\",\"10050041\"]'),
(38, '14.090.727/0001-11', 'C000129', '[\"10010001\",\"10010006\"]'),
(39, '04.398.525/0001-88', 'C000130', '[\"10010001\",\"10060012\"]'),
(40, '05.057.914/0001-02', 'C000133', '[\"10010001\",\"10010027\",\"10010028\",\"10020028\",\"10030001\",\"10030006\",\"10060012\",\"10060013\"]'),
(41, '22.772.156/0001-23', 'C000138', '[\"10010001\",\"10010008\",\"10010011\",\"10010025\",\"10010028\",\"10020028\",\"10050023\"]'),
(42, '01.971.223/0001-69', 'C000139', '[\"10010001\",\"10020028\"]'),
(43, '06.030.520/0001-23', 'C000141', '[\"10010001\",\"10020001\",\"10060012\",\"10060013\"]'),
(44, '10.686.654/0001-74', 'C000150', '[\"10010001\",\"10010003\",\"10010005\",\"10010006\",\"10020007\",\"10020027\",\"10020028\",\"10020031\",\"10030001\",\"10030003\",\"10030004\",\"10030005\",\"10030012\",\"10030014\",\"10050015\",\"10050016\",\"10060012\",\"10060013\",\"10070037\"]'),
(45, '04.669.925/0001-80', 'C000155', '[\"10010001\",\"10020028\",\"10030001\",\"10060012\"]'),
(46, '04.335.535/0002-55', 'C000160', '[\"10010001\",\"10010027\",\"10020028\",\"10030001\",\"10050016\",\"10050023\",\"10050024\",\"10060012\"]'),
(47, '08.201.761/0002-02', 'C000161', '[\"10010001\",\"10010027\",\"10050015\",\"10050016\"]'),
(48, '04.023.958/0001-59', 'C000165', '[\"10010001\",\"10010004\",\"10010005\",\"10010006\",\"10020007\",\"10020011\",\"10020028\",\"10030001\",\"10060012\"]'),
(49, '84.481.373/0001-11', 'C000169', '[\"10010001\",\"10060012\"]'),
(50, '18.527.891/0001-02', 'C000171', '[\"10010001\",\"10030001\",\"10030006\"]'),
(51, '04.984.328/0001-40', 'C000172', '[\"10010001\",\"10050015\"]'),
(52, '08.741.572/0001-33', 'C000176', '[\"10020027\"]'),
(53, '07.374.179/0001-96', 'C000182', '[\"10010001\",\"10050015\"]'),
(54, '04.659.617/0001-74', 'C000186', '[\"10010001\"]'),
(55, '08.310.033/0001-40', 'C000188', '[\"10010001\",\"10010027\",\"10020001\",\"10020028\"]'),
(56, '18.073.380/0001-50', 'C000201', '[\"10010001\",\"10010020\",\"10020028\",\"10030001\",\"10050017\",\"10060012\",\"10070001\",\"10070035\",\"10070037\"]'),
(57, '04.413.977/0001-91', 'C000203', '[\"10010001\",\"10010017\",\"10010027\",\"10020027\",\"10020028\",\"10030001\",\"10050015\",\"10060012\"]'),
(58, '04.944.068/0001-80', 'C000216', '[\"10020027\",\"10030001\",\"10050005\"]'),
(59, '01.001.925/0001-10', 'C000220', '[\"10010001\",\"10060012\"]'),
(60, '00.016.040/5702-53', 'C000237', '[\"10050015\",\"10050016\"]'),
(61, '63.699.839/0001-80', 'C000244', '[\"10010001\",\"10010003\",\"10010013\",\"10010020\",\"10010022\",\"10010027\",\"10010028\",\"10020027\",\"10020028\",\"10020030\",\"10030001\",\"10040032\",\"10050018\",\"10060012\",\"10060013\",\"10070044\"]'),
(62, '09.565.801/0001-79', 'C000246', '[\"10010001\",\"10020028\",\"10030001\"]'),
(63, '34.505.214/0001-31', 'C000247', '[\"10010001\",\"10020001\",\"10020028\",\"10030001\",\"10040014\",\"10050015\",\"10060012\"]'),
(64, '05.073.228/0001-25', 'C000249', '[\"10010001\"]'),
(65, '01.568.020/0001-26', 'C000252', '[\"10010006\"]'),
(66, '07.200.194/0001-18', 'C000271', '[\"10010027\",\"10020006\",\"10020011\",\"10020027\"]'),
(67, '05.370.016/0001-00', 'C000280', '[\"10010004\",\"10010013\",\"10010022\",\"10010023\",\"10010025\",\"10010028\",\"10020018\",\"10050014\"]'),
(68, '04.563.672/0001-66', 'C000292', '[\"10010001\",\"10010004\",\"10010006\",\"10010013\",\"10020001\",\"10020028\",\"10030001\",\"10050015\"]'),
(69, '23.027.675/0001-20', 'C000293', '[\"10010001\",\"10020001\"]'),
(70, '01.771.241/0001-05', 'C000300', '[\"10010001\",\"10010028\",\"10020028\",\"10030001\",\"10030002\",\"10030011\",\"10030018\",\"10060012\"]'),
(71, '07.305.913/0001-65', 'C000302', '[\"10010001\",\"10020028\",\"10020029\",\"10030017\",\"10060012\"]'),
(72, '10.246.042/0001-60', 'C000310', '[\"10010002\",\"10010022\",\"10020018\",\"10050014\",\"10070025\"]'),
(73, '12.922.786/0001-83', 'C000311', '[\"10010001\",\"10010004\",\"10010015\",\"10010027\",\"10020028\",\"10030001\",\"10060012\"]'),
(74, '04.957.650/0001-80', 'C000312', '[\"10010001\",\"10050015\",\"10060012\"]'),
(75, '00.892.361/0001-90', 'C000319', '[\"10010001\",\"10020028\",\"10030011\",\"10060012\"]'),
(76, '06.186.733/0001-49', 'C000337', '[\"10010001\",\"10010006\",\"10030001\",\"10050002\",\"10050015\",\"10060012\"]'),
(77, '22.595.950/0001-49', 'C000345', '[\"10010001\"]'),
(78, '04.618.096/0001-07', 'C000346', '[\"10010001\",\"10030001\",\"10060012\"]'),
(79, '00.512.663/0001-95', 'C000355', '[\"10050002\",\"10050003\",\"10050016\",\"10050021\"]'),
(80, '33.174.335/0001-85', 'C000363', '[\"10010001\",\"10010027\",\"10020028\",\"10030001\",\"10060012\",\"10070035\",\"10070037\"]'),
(81, '04.403.408/0001-65', 'C000366', '[\"10010001\",\"10010012\",\"10010013\",\"10010027\",\"10010028\",\"10020007\",\"10020028\",\"10060012\",\"10070038\"]'),
(82, '16.502.282/0001-65', 'C000367', '[\"10020011\",\"10020028\",\"10030001\"]'),
(83, '84.501.873/0001-78', 'C000372', '[\"10010001\",\"10010027\",\"10030001\",\"10060012\"]'),
(84, '05.678.625/0001-20', 'C000373', '[\"10010001\",\"10010006\",\"10060012\"]'),
(85, '10.919.908/0005-80', 'C000374', '[\"10020028\"]'),
(86, '00.379.190/0001-08', 'C000403', '[\"10010001\",\"10010027\",\"10020007\",\"10020028\",\"10030001\",\"10060012\"]'),
(87, '05.149.040/0001-13', 'C000407', '[\"10010001\",\"10010006\",\"10060012\"]'),
(88, '06.996.299/0001-62', 'C000411', '[\"10010001\",\"10010005\"]'),
(89, '04.012.043/0001-48', 'C000412', '[\"10010001\",\"10010027\",\"10020007\",\"10020027\",\"10020028\",\"10030001\",\"10030011\",\"10030018\",\"10050016\",\"10060012\"]'),
(90, '84.496.066/0001-04', 'C000413', '[\"10010001\",\"10020027\",\"10020028\",\"10060012\",\"10060013\"]'),
(91, '01.125.524/0001-71', 'C000417', '[\"10010001\",\"10010005\",\"10030001\",\"10050002\",\"10050015\",\"10050016\",\"10060012\",\"10060013\"]'),
(92, '12.238.478/0001-33', 'C000422', '[\"10070010\"]'),
(93, '84.094.911/0001-15', 'C000427', '[\"10010001\",\"10060012\",\"10070023\"]'),
(94, '02.499.629/0001-53', 'C000432', '[\"10010001\",\"10020028\",\"10030001\",\"10030008\",\"10050015\",\"10050016\",\"10060012\"]'),
(95, '09.137.895/0001-85', 'C000435', '[\"10010013\",\"10010027\",\"10050015\"]'),
(96, '01.481.603/0001-15', 'C000438', '[\"10010001\",\"10030001\",\"10050016\"]'),
(97, '02.949.077/0001-38', 'C000445', '[\"10010001\",\"10010006\",\"10060012\"]'),
(98, '22.278.205/0001-76', 'C000449', '[\"10010001\",\"10050015\",\"10060012\"]'),
(99, '00.015.857/4412-34', 'C000450', '[\"10010001\",\"10010006\",\"10060012\"]'),
(100, '34.525.444/0001-62', 'C000459', '[\"10010001\",\"10010013\",\"10010027\",\"10010028\",\"10020028\",\"10030001\",\"10030011\"]'),
(101, '24.225.851/0001-09', 'C000461', '[\"10010008\"]'),
(102, '08.658.519/0001-73', 'C000488', '[\"10020007\",\"10020028\"]'),
(103, '07.379.546/0001-44', 'C000493', '[\"10010001\",\"10020007\",\"10030001\",\"10030006\",\"10040014\",\"10060010\",\"10060012\"]'),
(104, '93.688.778/0002-05', 'C000502', '[\"10010001\",\"10020028\",\"10020030\",\"10030001\",\"10060012\"]'),
(105, '34.019.992/0016-05', 'C000505', '[\"10010001\",\"10010006\",\"10010013\",\"10010020\",\"10010028\",\"10020027\",\"10020028\",\"10030001\",\"10030018\",\"10050016\",\"10060013\"]'),
(106, '84.492.198/0001-68', 'C000511', '[\"10010001\",\"10030001\",\"10050013\",\"10050016\",\"10060012\"]'),
(107, '04.547.098/0001-52', 'C000517', '[\"10020028\",\"10030001\"]'),
(108, '34.520.130/0001-77', 'C000522', '[\"10010006\",\"10050003\",\"10050016\",\"10060012\"]'),
(109, '54.612.650/0001-17', 'C000528', '[\"10010001\",\"10010027\",\"10020028\",\"10020030\",\"10060012\"]'),
(110, '11.807.269/0001-09', 'C000532', '[\"10010001\",\"10010005\",\"10060012\"]'),
(111, '00.004.345/4136-21', 'C000535', '[\"10010013\"]'),
(112, '22.140.774/0001-50', 'C000537', '[\"10070010\"]'),
(113, '84.105.477/0001-21', 'C000543', '[\"10010028\",\"10020001\",\"10020028\"]'),
(114, '05.518.782/0001-79', 'C000544', '[\"10010001\",\"10010006\",\"10050016\",\"10060012\"]'),
(115, '07.782.473/0001-37', 'C000546', '[\"10010001\",\"10020028\",\"10030001\",\"10050015\",\"10050016\",\"10050030\",\"10060012\"]'),
(116, '34.590.315/0001-58', 'C000553', '[\"10010001\",\"10010027\",\"10030001\",\"10060012\",\"10060013\"]'),
(117, '05.402.904/0015-62', 'C000557', '[\"10010027\",\"10020007\"]'),
(118, '02.104.432/0005-00', 'C000564', '[\"10020007\"]'),
(119, '02.518.679/0001-30', 'C000567', '[\"10050003\",\"10050013\"]'),
(120, '13.336.651/0001-07', 'C000571', '[\"10010001\",\"10010005\",\"10010006\",\"10030001\",\"10050016\"]'),
(121, '32.068.363/0006-60', 'C000590', '[\"10010013\",\"10010031\",\"10020007\"]'),
(122, '08.882.020/0001-45', 'C000594', '[\"10010001\",\"10010006\"]'),
(123, '19.314.893/0001-78', 'C000608', '[\"10070010\"]'),
(124, '22.141.417/0001-07', 'C000609', '[\"10070010\"]'),
(125, '15.809.486/0001-80', 'C000616', '[\"10020027\"]'),
(126, '22.768.840/0001-31', 'C000627', '[\"10010001\"]'),
(127, '13.392.705/0001-43', 'C000629', '[\"10010001\",\"10020028\",\"10060012\"]'),
(128, '03.540.153/0001-10', 'C000634', '[\"10010006\"]'),
(129, '09.379.563/0001-07', 'C000637', '[\"10010028\"]'),
(130, '00.624.964/0001-00', 'C000641', '[\"10020007\",\"10020028\",\"10030001\",\"10030006\",\"10030012\"]'),
(131, '34.599.837/0001-10', 'C000642', '[\"10020028\"]'),
(132, '21.238.016/0001-07', 'C000655', '[\"10030001\"]'),
(133, '34.582.973/0001-06', 'C000664', '[\"10010027\",\"10020028\",\"10030018\",\"10060012\",\"10070038\"]'),
(134, '05.872.087/0001-00', 'C000665', '[\"10010013\",\"10010025\",\"10050014\"]'),
(135, '15.698.838/0001-78', 'C000668', '[\"10010001\",\"10030001\",\"10050015\",\"10060012\"]'),
(136, '34.558.189/0001-54', 'C000669', '[\"10010001\",\"10060012\"]'),
(137, '26.013.023/0001-24', 'C000672', '[\"10010001\",\"10020028\",\"10030001\"]'),
(138, '74.404.229/0008-02', 'C000690', '[\"10010001\",\"10010005\",\"10020027\",\"10020028\",\"10030001\",\"10060012\",\"10070034\",\"10070035\",\"10070037\",\"10070038\"]'),
(139, '11.509.468/0001-22', 'C000702', '[\"10010013\",\"10010020\",\"10010023\",\"10010028\",\"10050014\"]'),
(140, '22.575.359/0001-20', 'C000704', '[\"10070023\",\"10070037\",\"10070048\"]'),
(141, '02.810.005/0001-05', 'C000707', '[\"10010001\",\"10030001\",\"10070006\",\"10070036\"]'),
(142, '00.265.284/0001-48', 'C000709', '[\"10010013\",\"10050014\"]'),
(143, '13.560.720/0001-53', 'C000723', '[\"10070037\"]'),
(144, '24.570.268/0001-27', 'C000726', '[\"10070023\",\"10070037\",\"10070048\"]'),
(145, '06.219.530/0001-01', 'C000733', '[\"10010001\",\"10030001\",\"10060012\"]'),
(146, '08.962.294/0001-44', 'C000746', '[\"10010028\",\"10020027\"]'),
(147, '07.303.379/0002-39', 'C000754', '[\"10070034\",\"10070038\"]'),
(148, '13.452.287/0001-32', 'C000755', '[\"10070023\",\"10070037\",\"10070048\"]'),
(149, '26.123.230/0001-31', 'C000756', '[\"10070023\",\"10070037\",\"10070048\"]'),
(150, '28.090.410/0001-90', 'C000758', '[\"10070023\",\"10070037\",\"10070048\"]'),
(151, '63.735.609/0001-29', 'C000779', '[\"10010013\",\"10050014\"]'),
(152, '00.394.429/0189-05', 'C000780', '[\"10070037\"]'),
(153, '01.208.577/0001-56', 'C000781', '[\"10010028\"]'),
(154, '23.026.776/0001-86', 'C000783', '[\"10010001\"]'),
(155, '42.565.697/0019-17', 'C000788', '[\"10070005\"]'),
(156, '28.705.216/0001-71', 'C000789', '[\"10070023\",\"10070037\",\"10070048\"]'),
(157, '02.137.093/0001-26', 'C000793', '[\"10010001\",\"10060012\"]'),
(158, '30.409.425/0001-10', 'C000797', '[\"10070023\",\"10070037\",\"10070048\"]'),
(159, '04.471.785/0001-31', 'C000812', '[\"10010001\",\"10020027\"]'),
(160, '23.351.361/0001-88', 'C000815', '[\"10070023\",\"10070037\",\"10070048\",\"10070054\"]'),
(161, '30.428.481/0001-00', 'C000816', '[\"10070023\",\"10070037\",\"10070048\"]'),
(162, '21.803.751/0001-16', 'C000817', '[\"10070023\",\"10070037\",\"10070048\"]'),
(163, '00.280.273/0001-37', 'C000819', '[\"10010001\",\"10010013\",\"10010020\",\"10020027\",\"10020028\",\"10030001\",\"10030018\",\"10030028\",\"10060012\",\"10070038\"]'),
(164, '22.798.094/0001-29', 'C000820', '[\"10020028\"]'),
(165, '26.590.347/0001-25', 'C000828', '[\"10070037\"]'),
(166, '15.705.880/0001-79', 'C000832', '[\"10070023\",\"10070037\",\"10070048\"]'),
(167, '03.665.204/0001-30', 'C000845', '[\"10010001\",\"10030001\"]'),
(168, '54.644.042/0001-94', 'C000846', '[\"10010001\",\"10020011\",\"10030001\",\"10060012\"]'),
(169, '13.405.486/0001-90', 'C000852', '[\"10010028\"]'),
(170, '47.144.548/0003-30', 'C000856', '[\"10010001\",\"10020027\",\"10020028\",\"10030001\",\"10060012\"]'),
(171, '08.214.295/0002-91', 'C000864', '[\"10070023\",\"10070037\",\"10070048\"]'),
(172, '84.115.484/0001-04', 'C000870', '[\"10010001\",\"10020028\",\"10030001\",\"10060012\"]'),
(173, '11.758.367/0001-95', 'C000887', '[\"10010001\",\"10010027\",\"10020028\",\"10050015\",\"10060012\",\"10060013\"]'),
(174, '18.139.195/0001-10', 'C000890', '[\"10010001\"]'),
(175, '07.532.752/0004-95', 'C000896', '[\"10020028\"]'),
(176, '31.356.611/0001-09', 'C000910', '[\"10010001\",\"10030001\",\"10050015\",\"10060012\"]'),
(177, '05.408.808/0001-26', 'C000915', '[\"10010022\",\"10010028\",\"10030001\",\"10050015\"]'),
(178, '23.732.890/0003-93', 'C000920', '[\"10010023\"]'),
(179, '18.983.150/0001-28', 'C000929', '[\"10010001\",\"10010006\",\"10020028\",\"10030001\",\"10050015\",\"10060012\"]'),
(180, '03.426.484/0001-23', 'C000937', '[\"10010001\",\"10020028\",\"10020030\",\"10030001\",\"10060012\",\"10070036\",\"10070040\",\"10070042\",\"10070055\"]'),
(181, '33.739.314/0001-60', 'C000938', '[\"10070023\",\"10070037\",\"10070048\"]'),
(182, '08.322.908/0001-23', 'C000939', '[\"10010001\",\"10050015\",\"10060012\"]'),
(183, '09.241.710/0001-88', 'C000941', '[\"10020028\",\"10030001\",\"10070023\",\"10070037\",\"10070048\"]'),
(184, '09.392.548/0001-07', 'C000942', '[\"10020028\"]'),
(185, '09.247.550/0001-84', 'C000943', '[\"10050015\"]'),
(186, '29.067.113/0226-70', 'C000944', '[\"10010001\",\"10050015\",\"10060012\"]'),
(187, '04.161.047/0001-98', 'C000950', '[\"10030001\",\"10030018\"]'),
(188, '33.102.985/0001-15', 'C000959', '[\"10020026\",\"10020027\"]'),
(189, '04.210.423/0001-97', 'C000961', '[\"10010001\",\"10030001\",\"10070038\"]'),
(190, '34.356.833/0001-01', 'C000962', '[\"10070037\",\"10070048\"]'),
(191, '04.022.366/0001-12', 'C000964', '[\"10030001\"]'),
(192, '01.592.818/0001-03', 'C000965', '[\"10010001\",\"10060012\"]'),
(193, '84.450.212/0001-60', 'C000974', '[\"10070037\",\"10070048\"]'),
(194, '04.160.537/0001-70', 'C000979', '[\"10010001\",\"10060012\"]'),
(195, '07.632.502/0001-84', 'C000980', '[\"10010001\"]'),
(196, '61.575.775/0037-90', 'C000981', '[\"10010001\",\"10030001\",\"10060012\"]'),
(197, '07.312.248/0003-07', 'C000982', '[\"10020028\",\"10070038\"]'),
(198, '07.637.620/0001-85', 'C000983', '[\"10010027\",\"10020028\",\"10070038\",\"10070055\"]'),
(199, '34.717.471/0001-37', 'C000984', '[\"10040032\"]'),
(200, '27.956.445/0001-04', 'C000986', '[\"10020028\"]'),
(201, '08.992.254/0001-45', 'C000987', '[\"10010001\",\"10010005\",\"10010006\",\"10020001\",\"10020028\",\"10030001\",\"10060010\"]'),
(202, '01.263.896/0015-60', 'C000990', '[\"10010013\",\"10010040\",\"10020028\",\"10070038\"]'),
(203, '07.080.050/0001-75', 'C000994', '[\"10010004\",\"10010008\",\"10010013\",\"10010022\",\"10010028\",\"10020030\",\"10050014\"]'),
(204, '28.151.393/0003-15', 'C000995', '[\"10030001\"]'),
(205, '07.489.753/0001-51', 'C001000', '[\"10010001\"]'),
(206, '19.046.478/0001-80', 'C001001', '[\"10070036\",\"10070038\",\"10070042\",\"10070055\"]'),
(207, '21.390.139/0001-69', 'C001010', '[\"10010013\",\"10010022\"]'),
(208, '10.631.897/0001-05', 'C001011', '[\"10010004\",\"10010013\",\"10010028\"]'),
(209, '04.356.309/0001-70', 'C001014', '[\"10070023\",\"10070037\",\"10070048\"]'),
(210, '33.075.815/0002-70', 'C001016', '[\"10070023\",\"10070035\",\"10070037\",\"10070048\",\"10070054\"]'),
(211, '19.395.416/0001-84', 'C001021', '[\"10010013\"]'),
(212, '07.380.872/0001-71', 'C001022', '[\"10070023\",\"10070037\"]'),
(213, '84.537.141/0001-38', 'C001023', '[\"10010001\",\"10060013\"]'),
(214, '34.594.316/0001-70', 'C001025', '[\"10010001\",\"10010006\"]'),
(215, '63.659.346/0001-16', 'C001027', '[\"10070037\"]'),
(216, '20.334.035/0002-55', 'C001032', '[\"10010013\",\"10010023\"]'),
(217, '05.646.631/0004-49', 'C001033', '[\"10030001\"]'),
(218, '08.470.524/0001-58', 'C001036', '[\"10010001\",\"10010006\"]'),
(219, '04.807.608/0001-83', 'C001037', '[\"10020030\",\"10070042\",\"10070055\"]'),
(220, '28.216.468/0001-37', 'C001039', '[\"10010001\"]'),
(221, '02.066.866/0001-20', 'C001040', '[\"10020026\"]'),
(222, '49.383.250/0001-47', 'C001047', '[\"10020030\",\"10020036\",\"10070038\",\"10070043\",\"10070055\"]'),
(223, '07.047.527/0001-10', 'C001048', '[\"10020028\",\"10030001\"]'),
(224, '07.519.331/0001-81', 'C001049', '[\"10010006\",\"10060012\"]'),
(225, '33.549.827/0001-08', 'C001056', '[\"10070037\",\"10070048\"]'),
(226, '37.739.035/0001-57', 'C001057', '[\"10010001\",\"10060012\"]'),
(227, '05.992.464/0001-45', 'C001059', '[\"10010013\",\"10010028\",\"10020030\"]'),
(228, '09.365.007/0001-81', 'C001060', '[\"10030001\",\"10050016\"]'),
(229, '31.882.712/0001-05', 'C001063', '[\"10010001\",\"10010003\",\"10010008\",\"10010011\",\"10010013\",\"10010017\",\"10010028\"]'),
(230, '19.979.490/0003-00', 'C002335', '[\"10010001\",\"10010027\",\"10030001\",\"10040032\",\"10060012\"]'),
(231, '18.118.064/0001-57', 'C002340', '[\"10050015\",\"10050016\",\"10060012\"]'),
(232, '11.019.492/0001-83', 'C002345', '[\"10030001\"]'),
(233, '37.625.231/0001-09', 'C002346', '[\"10010003\",\"10010011\",\"10010017\",\"10010028\"]'),
(234, '37.746.603/0001-47', 'C002348', '[\"10030001\"]'),
(235, '36.848.050/0001-70', 'C002350', '[\"10020028\"]'),
(236, '17.364.487/0001-94', 'C002356', '[\"10010001\",\"10010006\",\"10020007\",\"10020011\",\"10020028\",\"10050005\",\"10050044\",\"10050056\"]'),
(237, '02.896.727/0001-24', 'C002363', '[\"10010001\",\"10010006\",\"10010020\",\"10020028\",\"10030001\",\"10030011\",\"10030018\",\"10040014\",\"10050015\",\"10060010\",\"10060012\"]');

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
  `COMPRADOR_ACESSO` varchar(1) CHARACTER SET utf8 NOT NULL,
  `COMPRADOR_CODSAP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comprador`
--

INSERT INTO `comprador` (`COMPRADOR_ID`, `COMPRADOR_CNPJ`, `COMPRADOR_NOME`, `COMPRADOR_EMAIL`, `COMPRADOR_SENHA`, `COMPRADOR_STATUS`, `COMPRADOR_ACESSO`, `COMPRADOR_CODSAP`) VALUES
(5, '07.656.227/0001-39', 'Orismar Silva', 'orismar@konec.com.br', '0def7982e78c7396bfb13495e7013433', 'Ativo', 'N', 'C000003');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_comprador` varchar(100) NOT NULL,
  `log_data` date NOT NULL,
  `log_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`log_id`, `log_comprador`, `log_data`, `log_status`) VALUES
(1, 'luizfernandoluck@gmail.com', '2021-09-10', 'S'),
(2, 'luizfernandoluck@hormail.com.br', '2021-09-10', 'N'),
(3, 'luiz.c@progride.com.br', '2021-09-10', 'N'),
(4, 'luiz.c@progride.com.br', '2021-09-10', 'N'),
(5, 'orismar@progride.com.br', '2021-09-23', 'N'),
(6, 'orismar@konec.com.br', '2021-09-23', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `PEDIDO_ID` int(11) NOT NULL,
  `PEDIDO_DESC` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `PEDIDO_UNIDADE` varchar(11) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_PRODUTO` varchar(200) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_QUANTIDADE` int(200) NOT NULL,
  `PEDIDO_DATAEMISSAO` date NOT NULL,
  `PEDIDO_RAZAO` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_CODSAP` varchar(200) CHARACTER SET utf8 NOT NULL,
  `PEDIDO_NUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`PEDIDO_ID`, `PEDIDO_DESC`, `PEDIDO_UNIDADE`, `PEDIDO_PRODUTO`, `PEDIDO_QUANTIDADE`, `PEDIDO_DATAEMISSAO`, `PEDIDO_RAZAO`, `PEDIDO_CODSAP`, `PEDIDO_NUM`) VALUES
(26, '', '', 'Oxigênio Medicinal ', 2, '2021-09-15', '1', '10010038', 814215),
(27, '', '', 'Oxigênio Industrial ', 1, '2021-09-15', '1', '10010021', 220415),
(28, '', '', 'Oxigênio Medicinal ', 1, '2021-09-15', '1', '10010038', 220415),
(29, '', '', 'Oxigênio Industrial ', 3, '2021-09-15', '1', '10010021', 108415),
(30, '', '', 'Oxigênio Medicinal ', 3, '2021-09-15', '1', '10010038', 108415),
(31, '', '', 'Oxigênio Industrial ', 2, '2021-09-15', '1', '10010021', 111715),
(32, '', '', 'Oxigênio Medicinal ', 2, '2021-09-15', '1', '10010038', 111715),
(33, '', '', 'Oxigênio Industrial ', 2, '2021-09-15', '1', '10010021', 139215),
(34, '', '', 'Oxigênio Medicinal ', 4, '2021-09-15', '1', '10010038', 139215),
(35, '', '', 'Oxigênio Medicinal ', 14, '2021-09-15', '1', '10010038', 721015);

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
(1, '10010001', 'ACETILENO INDUSTRIAL - 7KG/ ONU: 1001', '', '10010001.png', '10010001.pdf', 'S'),
(2, '10010002', 'ACETILENO INDUSTRIAL - 9KG', '', '10010001.png', '10010001.pdf', 'S'),
(3, '10010003', 'ACETILENO INDUSTRIAL 5KG', '', '10010001.png', '10010001.pdf', 'S'),
(4, '10010004', 'AR COMPRIMIDO MEDICINAL 10M3/ ONU: 1002', '', '', '10010006.pdf', 'S'),
(5, '10010005', 'AR COMPRIMIDO MEDICINAL 1M3', '', '', '10010006.pdf', 'S'),
(6, '10010006', 'AR SINTETICO 5.0   -   8M3 / ONU: 1002', '', '10010006.png', '10010006.pdf', 'S'),
(7, '10010008', 'AR SINTETICO 5.0     10M3', '', '10010006.png', '10010006.pdf', 'S'),
(8, '10010011', 'AR SINTETICO 5.0 - 7,5M3/ONU:1002', '', '10010006.png', '10010006.pdf', 'S'),
(9, '10010012', 'ARGONIO 4.8 - 10M3', '', '10010017.png', '10010017.pdf', 'S'),
(10, '10010013', 'ARGONIO 5.0 10M3/ ONU: 1006', '', '10010017.png', '10010017.pdf', 'S'),
(11, '10010015', 'ARGONIO 6.0 10M3', '', '10010017.png', '10010017.pdf', 'S'),
(12, '10010017', 'ARGONIO INDUSTRIAL - 10M3/ ONU: 1006', '', '10010017.png', '10010017.pdf', 'S'),
(13, '10010020', 'ARGONIO INDUSTRIAL - 1M3/ ONU: 1006', '', '10010017.png', '10010017.pdf', 'S'),
(14, '10010022', 'ARGONIO INDUSTRIAL - 2M3', '', '10010017.png', '10010017.pdf', 'S'),
(15, '10010023', 'ARGONIO INDUSTRIAL - 3M3', '', '10010017.png', '10010017.pdf', 'S'),
(16, '10010025', 'ARGONIO INDUSTRIAL - 6M3', '', '10010017.png', '10010017.pdf', 'S'),
(17, '10010027', 'ARGONIO INDUSTRIAL - 7M3', '', '10010017.png', '10010017.pdf', 'S'),
(18, '10010028', 'ARGONIO INDUSTRIAL - 8M3', '', '10010017.png', '10010017.pdf', 'S'),
(19, '10010031', 'ARGONIO INDUSTRIAL - 9M3', '', '10010017.png', '10010017.pdf', 'S'),
(20, '10010040', 'ARGONIO INDUSTRIAL LIQUIDO-ONU:1951', '', '10010040.png', '10010040.pdf', 'S'),
(21, '10020006', 'ARGONIO ULTRA PURO - 7M3/ONU:1006', '', '10010017.png', '10010017.pdf', 'S'),
(22, '10020010', 'DIOXIDO DE CARBONO ALIMENTICIO 25KG/ ONU: 1013', '', '10020010.png', '10020010.pdf', 'S'),
(24, '10020011', 'HELIO 5.0       9M3/ ONU: 1046', '', '10020028.png', '10020028.pdf', 'S'),
(25, '10020018', 'HELIO 5.0   10M3/ ONU: 1046', '', '10020028.png', '10020028.pdf', 'S'),
(26, '10020026', 'HELIO 5.0 - 7M3 / ONU:1046', '', '10020028.png', '10020028.pdf', 'S'),
(27, '10020027', 'HELIO IND. 6M3', '', '10020028.png', '10020028.pdf', 'S'),
(28, '10020028', 'HELIO INDUSTRIAL -          7.5M3', '', '10020028.png', '10020028.pdf', 'S'),
(29, '10020029', 'HELIO INDUSTRIAL       3M3', '', '10020028.png', '10020028.pdf', 'S'),
(30, '10020030', 'HELIO INDUSTRIAL      10M3', '', '10020028.png', '10020028.pdf', 'S'),
(31, '10020031', 'HELIO INDUSTRIAL      8M3', '', '10020028.png', '10020028.pdf', 'S'),
(32, '10020036', 'HELIO INDUSTRIAL    9M3', '', '10020028.png', '10020028.pdf', 'S'),
(33, '10030001', 'HIDROGENIO  7,5M3/ ONU: 1049', '', '10030001.png', '10030001.pdf', 'S'),
(34, '10030002', 'HIDROGENIO 5.0 7,5M3 - ONU: 1049', '', '10030001.png', '10030001.pdf', 'S'),
(35, '10030003', 'HIDROGENIO 5.0-7M3/ ONU:1049', '', '10030001.png', '10030001.pdf', 'S'),
(36, '10030004', 'HIDROGENIO IND. 10M3', '', '10030001.png', '10030001.pdf', 'S'),
(37, '10030005', 'MISTURA CARBOMED 5589 1M3                ', '', '', '', 'S'),
(38, '10030006', 'MISTURA CARBOMIX  B 6M3', '', '', '1005003.pdf', 'S'),
(39, '10030008', 'MISTURA CARBOMIX A 6M3', '', '', '10030011.pdf', 'S'),
(40, '10030011', 'MISTURA CARBOMIX A 7M3', '', '', '10030011.pdf', 'S'),
(41, '10030012', 'MISTURA CARBOMIX  F - 7M3', '', '', '10030012.pdf', 'S'),
(42, '10030014', 'MISTURA CARBOMIX  B 10M3', '', '', '1005003.pdf', 'S'),
(43, '10030017', 'MISTURA CARBOMIX A - 4M3', '', '', '10030011.pdf', 'S'),
(44, '10030018', 'MISTURA CARBOMIX  A - 8M3', '', '', '10030011.pdf', 'S'),
(45, '10030028', 'MISTURA CARBOMIX  B - 8M3', '', '', '1005003.pdf', 'S'),
(46, '10050002', 'MISTURA CARBOMIX B 6M3', '', '', '1005003.pdf', 'S'),
(47, '10050003', 'MISTURA CARBOMIX B 7M3', '', '', '1005003.pdf', 'S'),
(48, '10050005', 'MISTURA CARBOMIX  C - 7M3', '', '', '', 'S'),
(49, '10050006', 'MISTURA CARBOMIX A 10M3/ ONU: 1006', '', '', '10030011.pdf', 'S'),
(50, '10050010', 'MISTURA CARBOMIX B - 4M3', '', '', '1005003.pdf', 'S'),
(51, '10050013', 'MISTURA CARBOMIX H - 10M3', '', '', '10050013.pdf', 'S'),
(52, '10050014', 'MISTURA CARBOMIX MED 5689 - 7M3', '', '', '', 'S'),
(53, '10050015', 'NITROGENIO 5.0    7M3', '', '10050018.png', '10050018.pdf', 'S'),
(54, '10050016', 'NITROGENIO 5.0   9M3/ ONU: 1066', '', '10050018.png', '10050018.pdf', 'S'),
(55, '10050017', 'NITROGENIO 5.0 - 10M3/ONU:1066', '', '10050018.png', '10050018.pdf', 'S'),
(56, '10050018', 'NITROGENIO INDUSTRIAL - 10M3/ ONU: 1066', '', '10050018.png', '10050018.pdf', 'S'),
(57, '10050021', 'NITROGENIO INDUSTRIAL - 1M3', '', '10050018.png', '10050018.pdf', 'S'),
(58, '10050023', 'NITROGENIO INDUSTRIAL - 3M3', '', '10050018.png', '10050018.pdf', 'S'),
(59, '10050024', 'NITROGENIO INDUSTRIAL - 7M3', '', '10050018.png', '10050018.pdf', 'S'),
(60, '10050030', 'NITROGENIO INDUSTRIAL - 9M3/ ONU: 1066', '', '10050018.png', '10050018.pdf', 'S'),
(61, '10050041', 'NITROGENIO INDUSTRIAL 4M3', '', '10050018.png', '10050018.pdf', 'S'),
(62, '10050044', 'NITROGENIO INDUSTRIAL 6M3/ ONU: 1066', '', '10050018.png', '10050018.pdf', 'S'),
(63, '10050056', 'NITROGENIO INDUSTRIAL LIQUIDO', '', '10050018.png', '10050018.pdf', 'S'),
(64, '10060010', 'NITROGENIO MEDICINAL  - 10M3/ ONU: 1066', '', '10050018.png', '10050018.pdf', 'S'),
(65, '10070001', 'NITROGENIO MEDICINAL LIQUIDO/ ONU: 1977', '', '10050018.png', '10050018.pdf', 'S'),
(66, '10070005', 'OXIDO NITROSO AA - 28KG', '', '10070006.png', '10070006.pdf', 'S'),
(67, '10070006', 'OXIDO NITROSO MEDICINAL - 6KG/ONU:1070', '', '10070025.png', '10070025.pdf', 'S'),
(68, '10070010', 'OXIGENIO 6.0 - 10M3/ONU:1072', '', '10070025.png', '10070025.pdf', 'S'),
(69, '10070012', 'OXIGENIO 6.0 - 9,5M3/ONU:1072', '', '10070025.png', '10070025.pdf', 'S'),
(70, '10070023', 'OXIGENIO AVIACAO   -  10M3', '', '10070025.png', '10070025.pdf', 'S'),
(71, '10070025', 'OXIGENIO INDUSTRIAL - 10M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(72, '10070034', 'OXIGENIO INDUSTRIAL - 1M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(73, '10070035', 'OXIGENIO INDUSTRIAL - 4M3', '', '10070025.png', '10070025.pdf', 'S'),
(74, '10070036', 'OXIGENIO INDUSTRIAL - 6M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(75, '10070037', 'OXIGENIO INDUSTRIAL - 7M3', '', '10070025.png', '10070025.pdf', 'S'),
(76, '10070038', 'OXIGENIO INDUSTRIAL - PPU 3M3', '', '10070025.png', '10070025.pdf', 'S'),
(77, '10070040', 'OXIGENIO INDUSTRIAL LIQUIDO/ ONU: 1073', '', '10070040.png', '10070040.pdf', 'S'),
(78, '10070042', 'OXIGENIO MEDICINAL        3,5M3 - ONU 1072', '', '10070025.png', '10070025.pdf', 'S'),
(79, '10070043', 'OXIGENIO MEDICINAL - 0,6M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(80, '10070044', 'OXIGENIO MEDICINAL - 10M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(81, '10070045', 'OXIGENIO MEDICINAL - 1M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(82, '10070048', 'OXIGENIO MEDICINAL - 2M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(83, '10070054', 'OXIGENIO MEDICINAL - 3M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(84, '10070055', 'OXIGENIO MEDICINAL - 4M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(85, '10040014', 'OXIGENIO MEDICINAL - 6M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(86, '10040032', 'OXIGENIO MEDICINAL - 8M3', '', '10070025.png', '10070025.pdf', 'S'),
(87, '10060012', 'OXIGENIO MEDICINAL 7M3/ ONU: 1072', '', '10070025.png', '10070025.pdf', 'S'),
(88, '10060013', 'OXIGENIO MEDICINAL LIQUIDO/ ONU: 1073', '', '10070040.png', '10070040.pdf', 'S');

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
(4, 'LUIZ FERNANDO PINAGÉ COUTINHO', '63a9f0ea7bb98050796b649e85481845', 'luiz.c@progride.com.br', 'S'),
(15, 'Rita de Cassia Franco Cauper', '5441bbcccb9fbddda6920e50dbcdc842', 'pedidos@carboxigases.com', 'S'),
(16, 'Fabiola Amorim', '5441bbcccb9fbddda6920e50dbcdc842', 'pedidos@carboxigases.com', 'S'),
(17, 'Fabio Wolace', '2ec5c500e0901fe0acdd3157d188ee75', 'vendas01@carboxigases.com', 'S'),
(18, 'Reinaldo Lima', '3c6cb6818654f7a1f0630728d70fa6da', 'reinaldo.lima@carboxigases.com', 'S'),
(19, 'Orismar Eloy da Silva', 'b2fa7032111cdc1ad46965c1ac01fb5d', 'orismar@progride.com.br', 'S'),
(20, 'luiz fernando pinagé coutinho', '63a9f0ea7bb98050796b649e85481845', 'luizfernandoluck@hotmail.com', 'S'),
(21, 'Bruno konec', '81dc9bdb52d04dc20036dbd8313ed055', 'bruno.l@konec.com.br', 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CLIENTE_ID`),
  ADD UNIQUE KEY `CLIENTE_CODSAP` (`CLIENTE_CODSAP`),
  ADD UNIQUE KEY `CLIENTE_CNPJ` (`CLIENTE_CNPJ`);

--
-- Índices para tabela `cliente_produto`
--
ALTER TABLE `cliente_produto`
  ADD PRIMARY KEY (`cli_pro_id`);

--
-- Índices para tabela `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`COMPRADOR_ID`),
  ADD UNIQUE KEY `COMPRADOR_EMAIL` (`COMPRADOR_EMAIL`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`PEDIDO_ID`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`PRODUTO_ID`),
  ADD UNIQUE KEY `PEDIDO_CODSAP` (`PEDIDO_CODSAP`);

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
  MODIFY `CLIENTE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT de tabela `cliente_produto`
--
ALTER TABLE `cliente_produto`
  MODIFY `cli_pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT de tabela `comprador`
--
ALTER TABLE `comprador`
  MODIFY `COMPRADOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `PEDIDO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `PRODUTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `restrito`
--
ALTER TABLE `restrito`
  MODIFY `RESTRITO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2016 às 21:44
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heavy`
--
CREATE DATABASE IF NOT EXISTS `heavy` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `heavy`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `acrescimo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `acrescimo` ()  BEGIN
UPDATE produto SET preco = preco*1.15;
END$$

DROP PROCEDURE IF EXISTS `desconto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `desconto` ()  BEGIN
UPDATE produto SET preco = preco*0.9;
END$$

DROP PROCEDURE IF EXISTS `preconormal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `preconormal` ()  BEGIN
UPDATE produto SET preco = 49.99;
END$$

DROP PROCEDURE IF EXISTS `teste`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `teste` ()  NO SQL
update estoque set p = 20,m= 20, g = 20, gg = 20$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `quantia` int(11) NOT NULL DEFAULT '1',
  `tamanho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `comprado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `id_compra` int(11) NOT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_car`, `id_user`, `id_prod`, `quantia`, `tamanho`, `comprado`, `id_compra`) VALUES(8, 1, 12, 1, 'gg', '1', 13);
INSERT INTO `carrinho` (`id_car`, `id_user`, `id_prod`, `quantia`, `tamanho`, `comprado`, `id_compra`) VALUES(9, 1, 46, 1, 'p', '1', 14);
INSERT INTO `carrinho` (`id_car`, `id_user`, `id_prod`, `quantia`, `tamanho`, `comprado`, `id_compra`) VALUES(10, 4, 55, 1, 'gg', '1', 15);
INSERT INTO `carrinho` (`id_car`, `id_user`, `id_prod`, `quantia`, `tamanho`, `comprado`, `id_compra`) VALUES(11, 4, 46, 7, 'gg', '1', 16);

--
-- Acionadores `carrinho`
--
DROP TRIGGER IF EXISTS `reduzir_estoque`;
DELIMITER $$
CREATE TRIGGER `reduzir_estoque` AFTER UPDATE ON `carrinho` FOR EACH ROW BEGIN
if OLD.tamanho = 'p' and OLD.comprado = '1' then
	update estoque SET p = p - OLD.quantia where id_prod = OLD.id_prod;
elseif OLD.tamanho = 'm' and OLD.comprado = '1' then
	update estoque SET m = m - OLD.quantia where id_prod = OLD.id_prod;
elseif OLD.tamanho = 'g' and OLD.comprado = '1' then
	update estoque SET g = g - OLD.quantia where id_prod = OLD.id_prod;
elseif OLD.tamanho = 'gg' and OLD.comprado = '1' then
	update estoque SET gg = gg - OLD.quantia where id_prod = OLD.id_prod;
end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `aprovado` tinyint(1) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `id_user`, `aprovado`, `valor`) VALUES(13, 1, 1, '50');
INSERT INTO `compra` (`id`, `id_user`, `aprovado`, `valor`) VALUES(14, 1, 1, '50');
INSERT INTO `compra` (`id`, `id_user`, `aprovado`, `valor`) VALUES(15, 4, 1, '50');
INSERT INTO `compra` (`id`, `id_user`, `aprovado`, `valor`) VALUES(16, 4, 1, '350');

--
-- Acionadores `compra`
--
DROP TRIGGER IF EXISTS `limpa_carrinho`;
DELIMITER $$
CREATE TRIGGER `limpa_carrinho` AFTER UPDATE ON `compra` FOR EACH ROW BEGIN
update carrinho set comprado = 1, id_compra = NEW.id where id_user = NEW.id_user and id_compra = '';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `p` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `g` int(11) NOT NULL,
  `gg` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(1, 1, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(2, 2, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(3, 3, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(4, 4, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(5, 5, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(6, 6, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(7, 7, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(8, 8, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(9, 9, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(10, 10, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(11, 11, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(12, 12, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(13, 13, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(14, 14, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(15, 15, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(16, 16, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(17, 17, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(18, 18, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(19, 19, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(20, 20, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(21, 21, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(22, 22, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(23, 23, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(24, 25, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(25, 26, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(26, 27, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(27, 28, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(28, 29, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(29, 30, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(30, 31, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(31, 32, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(32, 33, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(33, 34, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(34, 35, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(35, 36, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(36, 37, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(37, 38, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(38, 39, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(39, 40, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(40, 41, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(41, 42, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(42, 43, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(43, 44, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(44, 45, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(45, 46, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(46, 47, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(47, 48, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(48, 49, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(49, 50, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(50, 51, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(51, 52, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(52, 53, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(53, 54, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(54, 55, 20, 20, 20, 20);
INSERT INTO `estoque` (`id`, `id_prod`, `p`, `m`, `g`, `gg`) VALUES(55, 56, 20, 20, 20, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `descri` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(1, 'Lost Diver', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '13fc665b638e997e24776971462f393-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(2, 'Tibeta', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '7e973d45e7c29cc6c4327c981a8131-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(3, 'Furyos', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '89060d872380d5d0bb7b95ba1ba588-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(4, 'Prayer', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '48e9e6cf9093b8961969c84d4c72ae-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(5, 'Creed', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '951f6de5f37e395c6bc95cdbf288bd-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(6, 'Arizona', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '8458f871498b9bce3558879f6f1a7e-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(7, 'Octopus', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '94b37d0b88eb51773cf07ceb7f6681-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(8, 'Pride', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'eae27d2992d89b2bd9efcbcd5faf63-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(9, 'Elizadeath Queen', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '5849a3548275ff10191b5a2a4cb4457b-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(10, 'American Ball', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '0b93d4ccbc30267cbb6e591e17bf4f-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(11, 'Rebellion', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'fbd2c057ab23a7494d43d9333e69e89a-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(12, 'Molotov', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'ee99ce811bfedce429ec7dd6ec06767a-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(13, 'Porrada', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '93419792708bc642fe218b6694c5e8f-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(14, 'Chicana', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '20b6cb9cfda8828c1b6466f3c33f66e-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(15, 'PremoniÃ§Ã£o', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '0992c7bd9cf7e6f537396afb86261ae-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(16, 'Keys of Mind', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'fba2d18375b044b3c4e8d9f09201772-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(17, 'Tripa Seca', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '553f8bdc438162017b8125c25c3f2138-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(18, 'Montana', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'f9da4e184ea67e93ff1fc9279a4985b-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(19, 'Athena', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '9f62a9c25442f18807d809174b16231-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(20, 'Wood', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'e0e4ea5fa1100e390ebffbfb69565ca-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(21, 'Barba Negra', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'd63b5d07b06ac3812237b8f8f85253a-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(22, 'Tempeste', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '1e6fbb6b5dd02fd3791cb8cf4ebee7f-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(23, 'Dagger', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '7149b8d2e8ba845590d6df11b88c17-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(25, 'Aggressive', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '-66e4180a1b3641138b52c6e37c8bda89-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(26, 'Canis', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'bb934905a9cc0796c4f7383a3d93fa9f-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(27, 'Rabbit', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'd35d06a3eaad2b3dcb8aa047f4d59314-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(28, 'Skull Kill', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'ba1bb5cd86dbf0d699343294e0957b0a-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(29, 'Goat Luz', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '86d301fbb281ac505dcab8b693865d18-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(30, 'Black Sails', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'bd5f76534bfaaf48a62358e3988e88d9-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(31, 'Bad Religion', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'f85db87ca18f69756bfd7750eeb9f287-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(32, 'Strong Ties', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '20b663c3bae342fbb7bd962a4c1fc834-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(33, 'GuardiÃ£', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '22f3a1199cc4a6043062789e4861cbb4-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(34, 'PMA', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '9892670857acd4d737a70ef2de6fa55d-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(35, 'SolitÃ¡rio', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '7b57b4db7d0a65476b3deb143b71e41f-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(36, 'Santa', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '39779058f02c4761614e45d46682a19b-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(37, 'Kong', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'fff0614653c49d3f89452cf36e68c22b-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(38, 'Arabel', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '04c28c911e15cea94330094282aa0048-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(39, 'Drunk ', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'f10ad671debd98c01a504eb04ae797fd-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(40, 'Bode Ink', 'camiseta', 'masculino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '6c2af57f680038541a213aa7c902df3d-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(41, 'Aquarela', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '006ae23336684f31f6f6613296d2858-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(42, 'Alice', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '78894fd1ee599276629bec00e6d5e85-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(43, 'Mexicana', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '54a6a1839735f382e86747cf9a0033c-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(44, 'Holmes', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'f013bad0c14ab37c3a302fb182e36f8-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(45, 'ST. Muerte', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'f0602541fe19e75d3972142f2d18b0f-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(46, 'Ametista', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'eec589bb4b10f693ffc513cd8b092b9-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(47, 'Mochos', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '68881e8af0bd68f5c13326772cb618f7-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(48, 'SolitÃ¡rio', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '4230b506455ef82c4f1cb6ea6d8abf14-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(49, 'Arabel', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '00c15642d50a5a9e109708a071d86bc5-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(50, 'Santa', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '399075d18dffcce7ceb0bbf0fb99b321-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(51, 'Skull Kill', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'a7114430b9a5f5c7e6c14423256beb89-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(52, 'Rabbit', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '60f8494b63ffbc536636d3299e7396c6-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(53, 'Canis', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'd762b20a1c4bafe756c53bf276096215-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(54, 'Aggressive', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', '1ed979a8fdb8b12ba2bc56ebb7e69894-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(55, 'GuardiÃ£', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'e3db4072ed5fd8a66abd94fc48464897-640-0.jpg');
INSERT INTO `produto` (`id`, `nome`, `Categoria`, `sexo`, `descri`, `preco`, `foto`) VALUES(56, 'Caribu', 'camiseta', 'feminino', 'Cole&ccedil;&atilde;o The Animal''s Outono/Inverno<br>\r\nEstampa em silk-Screen<br>', '44.99', 'efb8f646aa97cbcd953ecead4266636e-640-0.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `top10`
--
DROP VIEW IF EXISTS `top10`;
CREATE TABLE IF NOT EXISTS `top10` (
`id` int(11)
,`email` varchar(255)
,`senha` varchar(255)
,`cpf` varchar(14)
,`nome` varchar(255)
,`end` varchar(255)
,`cep` varchar(9)
,`auto` int(11)
,`tot` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `auto` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `email`, `senha`, `cpf`, `nome`, `end`, `cep`, `auto`) VALUES(1, 'leo.mi.me@gmail.com', 'e41424639e98205a389518e768aa1746', '111.111.111-11', 'Leonardo Mendes', 'rua A,2', '11111-111', 1);
INSERT INTO `user` (`id`, `email`, `senha`, `cpf`, `nome`, `end`, `cep`, `auto`) VALUES(2, 'leo.mi.me.leo@gmail.com', 'e41424639e98205a389518e768aa1746', '111.111.111-12', 'leo', 'rua a', '11111-111', 0);
INSERT INTO `user` (`id`, `email`, `senha`, `cpf`, `nome`, `end`, `cep`, `auto`) VALUES(3, 'moreira.lusca@gmail.com', '40f5888b67c748df7efba008e7c2f9d2', '111.111.111-13', 'Lucas Moreira Pinto', 'Rua EOQ n 69', '11111-111', 1);
INSERT INTO `user` (`id`, `email`, `senha`, `cpf`, `nome`, `end`, `cep`, `auto`) VALUES(4, 'leo.mi.me9@gmail.com', '411cd305d84659e7479e5700063be2bb', '111.118.111-11', 'leo', 'Rua A cidade B bairro Foda-se e num 69', '11111-111', 0);

-- --------------------------------------------------------

--
-- Structure for view `top10`
--
DROP TABLE IF EXISTS `top10`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top10`  AS  select `u`.`id` AS `id`,`u`.`email` AS `email`,`u`.`senha` AS `senha`,`u`.`cpf` AS `cpf`,`u`.`nome` AS `nome`,`u`.`end` AS `end`,`u`.`cep` AS `cep`,`u`.`auto` AS `auto`,sum(`c`.`valor`) AS `tot` from (`compra` `c` join `user` `u` on((`c`.`id_user` = `u`.`id`))) group by `c`.`id_user` order by `c`.`valor` desc limit 10 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

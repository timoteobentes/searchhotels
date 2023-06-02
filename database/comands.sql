-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.3.0.6589
-- Autor:                        Timóteo Bentes
-- Model:                        Físico
-- Version:                      2.0
-- Project:                      Search Hotels
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para searchhotels
CREATE DATABASE IF NOT EXISTS `searchhotels`
USE `searchhotels`;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `perfil` enum('USER','ADMIN') NOT NULL,
  `senha` varchar(45) NOT NULL,
  `url` varchar(150) DEFAULT NULL,
  `endereco_cep` varchar(8) NOT NULL,
  `endereco_numero` varchar(7) DEFAULT NULL,
  `endereco_bairro` varchar(150) DEFAULT NULL,
  `endereco_logradouro` varchar(150) DEFAULT NULL,
  `endereco_cidade` varchar(150) DEFAULT NULL,
  `endereco_estado` varchar(150) DEFAULT NULL,
  `endereco_pais` varchar(150) DEFAULT NULL,
  `dados_pagamento_forma` enum('BOLETO','CARTAO','PIX') DEFAULT NULL,
  `dados_pagamento_tipo_cartao` enum('CREDITO','DEBITO') DEFAULT NULL,
  `dados_pagamento_numero_cartao` varchar(45) DEFAULT NULL,
  `dados_pagamento_codigo_cartao` int DEFAULT NULL,
  `dados_pagamento_validade_codigo` varchar(5) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cnpj` varchar(15) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `descricao` text NOT NULL,
  `quantidade_quarto` int NOT NULL,
  `classificacao` int DEFAULT NULL,
  `avaliacao` varchar(50) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `endereco_cep` varchar(8) NOT NULL,
  `endereco_numero` varchar(7) DEFAULT NULL,
  `endereco_logradouro` varchar(150) DEFAULT NULL,
  `endereco_bairro` varchar(150) DEFAULT NULL,
  `endereco_cidade` varchar(150) DEFAULT NULL,
  `endereco_estado` varchar(150) DEFAULT NULL,
  `endereco_pais` varchar(150) DEFAULT NULL,
  `comodidades` text,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `quarto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idhotel` int NOT NULL,
  `numero` varchar(7) NOT NULL,
  `descricao` text NOT NULL,
  `url` varchar(150) DEFAULT NULL,
  `valor_diaria` float NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_quarto_hotel1_idx` (`idhotel`),
  CONSTRAINT `fk_quarto_hotel1` FOREIGN KEY (`idhotel`) REFERENCES `hotel` (`id`)
);

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idusuario` int NOT NULL,
  `idquarto` int NOT NULL,
  `status` enum('ATIVA','INATIVA') NOT NULL DEFAULT 'ATIVA',
  `data_reserva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_reserva_usuario1_idx` (`idusuario`),
  KEY `fk_reserva_quarto1_idx` (`idquarto`),
  CONSTRAINT `fk_reserva_quarto1` FOREIGN KEY (`idquarto`) REFERENCES `quarto` (`id`),
  CONSTRAINT `fk_reserva_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`)
);
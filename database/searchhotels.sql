-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
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
CREATE DATABASE IF NOT EXISTS `searchhotels` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `searchhotels`;

-- Copiando estrutura para tabela searchhotels.hotel
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
  `endereco_cep` varchar(8) NOT NULL DEFAULT '',
  `endereco_numero` varchar(7) DEFAULT NULL,
  `endereco_logradouro` varchar(150) DEFAULT NULL,
  `endereco_bairro` varchar(150) DEFAULT NULL,
  `endereco_cidade` varchar(150) DEFAULT NULL,
  `endereco_estado` varchar(150) DEFAULT NULL,
  `endereco_pais` varchar(150) DEFAULT NULL,
  `comodidades` text,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela searchhotels.newsletter
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela searchhotels.quarto
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela searchhotels.reserva
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela searchhotels.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `perfil` enum('USER','ADMIN') NOT NULL,
  `senha` varchar(45) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- MySQL Workbench Synchronization
-- Generated: 2023-05-23 21:06
-- Model: Físico
-- Version: 2.0
-- Project: Search Hotels
-- Author: Timóteo Bentes

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE IF NOT EXISTS `searchhotels`.`hotel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `cnpj` VARCHAR(15) NOT NULL,
  `celular` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(150) NULL DEFAULT NULL,
  `descricao` TEXT NOT NULL,
  `quantidade_quarto` INT(11) NOT NULL,
  `endereco_cep` VARCHAR(8) NOT NULL,
  `endereco_numero` VARCHAR(7) NULL DEFAULT NULL,
  `endereco_logradouro` VARCHAR(150) NULL DEFAULT NULL,
  `endereco_bairro` VARCHAR(150) NULL DEFAULT NULL,
  `endereco_cidade` VARCHAR(150) NULL DEFAULT NULL,
  `endereco_estado` VARCHAR(150) NULL DEFAULT NULL,
  `endereco_pais` VARCHAR(150) NULL DEFAULT NULL,
  `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `searchhotels`.`newsletter` (
  `nome` VARCHAR(150) NULL DEFAULT NULL,
  `email` VARCHAR(150) NULL DEFAULT NULL,
  `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP())
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `searchhotels`.`quarto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idusuario` INT(11) NOT NULL,
  `idhotel` INT(11) NOT NULL,
  `numero` VARCHAR(7) NOT NULL,
  `descricao` TEXT NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  INDEX `fk_quarto_usuario_idx` (`idusuario` ASC) VISIBLE,
  INDEX `fk_quarto_hotel1_idx` (`idhotel` ASC) VISIBLE,
  CONSTRAINT `fk_quarto_hotel1`
    FOREIGN KEY (`idhotel`)
    REFERENCES `searchhotels`.`hotel` (`id`),
  CONSTRAINT `fk_quarto_usuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `searchhotels`.`usuario` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `searchhotels`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `celular` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(150) NULL DEFAULT NULL,
  `perfil` ENUM('USER', 'ADMIN') NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `endereco_cep` VARCHAR(8) NOT NULL,
  `endereco_numero` VARCHAR(7) NULL DEFAULT NULL,
  `endereco_logradouro` VARCHAR(150) NULL DEFAULT NULL,
  `endereco_bairro` VARCHAR(150) NULL DEFAULT NULL,
  `endereco_cidade` VARCHAR(150) NULL DEFAULT NULL,
  `endereco_estado` VARCHAR(150) NULL DEFAULT NULL,
  `endereco_pais` VARCHAR(150) NULL DEFAULT NULL,
  `dados_pagamento_forma` ENUM('BOLETO', 'CARTAO', 'PIX') NULL DEFAULT NULL,
  `dados_pagamento_tipo_cartao` ENUM('CREDITO', 'DEBITO') NULL DEFAULT NULL,
  `dados_pagamento_numero_cartao` VARCHAR(45) NULL DEFAULT NULL,
  `dados_pagamento_codigo_cartao` INT(11) NULL DEFAULT NULL,
  `dados_pagamento_validade_cartao` VARCHAR(5) NULL DEFAULT NULL,
  `data_cadastro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

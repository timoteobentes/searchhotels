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


-- Insert data

INSERT INTO hotel
	(nome, cnpj, celular, email, descricao, classificacao, quantidade_quarto, endereco_cep, endereco_numero, endereco_logradouro, endereco_bairro, endereco_cidade, endereco_estado, endereco_pais)
VALUE
	("Hotel Colline de France", "20844724000129", "(54) 3286-1924", "reservas@collinedefrance.com.br", "Quartos de inspiração francesa em um hotel sofisticado com um bistrô elegante e um spa de luxo", 5, 150, "95670000", "400", "Rua Vigilante", "Avenida Central", "Gramado", "Rio Grande do Sul", "Brasil"),
    ("Hotel Valle D`Incanto", "11740146000270", "(54) 3286-1777", "reservas@hotelvalledincanto.com", "Quartos elegantes com móveis refinados e piso de madeira, acesso Wi-Fi incluso, TV com tela plana e frigobar, além de banheiro integrado ao quarto com piso aquecido", 5, 250, "95670000", "87", "R. Júlio Hanke", "Avenida Central", "Gramado", "Rio Grande do Sul", "Brasil"),
    ("Salinas Maragogi All Inclusive Resort", "9276932000136", "(82) 3142-0702", "resort@salinas.com", "Hotel entre o rio e o mar, este resort na praia com tudo incluído fica a 0,2 km da AL-101 e a 2,6 km do município de Maragogi", 4, 350, "57955000", "101", "Rod. Al", "Norte", "Maragogi", "Alagoas", "Brasil"),
    ("Japaratinga Lounge Resort", "17022762000191", "(82) 3142-0702", "resort@japaratinga.com", "Quartos descontraídos têm ambiente tranquilo e sacada mobiliada, TV com tela plana, frigobar e sala de estar", 4, 450, "57950000", "84", "Rod. Al", "Norte", "Maragogi", "Alagoas", "Brasil"),
    ("Hotel Unique", "3109168000128", "(11) 3055-4701", "uniqueservice@hotelunique.com", "Quartos sofisticados e modernos, com mobília personalizada, oferecem vista para a cidade, Wi-Fi gratuito e TVs com tela plana, bem como banheiras de hidromassagem e artigos de banho de luxo", 5, 550, "1402002", "4700", "Av. Brigadeiro Luis Antonio", "Jardim Paulista", "São Paulo", "São Paulo", "Brasil"),
    ("Palácio Tangará - an Oetker Collection Hotel", "13735823000107", "(11) 4904-4040", "reservas.tangara@oetkercollection.com", "Situado no coração do Parque Burle Marx, uma reserva natural, este grandioso hotel de luxo com arquitetura neoclássica está a 5 km dos concertos no Citibank Hall e a 11 km do Aeroporto de Congonhas", 5, 650, "5706290", "1501", "Rua Deputado Laércio Corte", "Vila Andrade", "São Paulo", "São Paulo", "Brasil"),
    ("Juma Ópera", "8708591000168", "(92) 4904-4040", "reservas.opera@jumahoteis.com.br", "Hotel de luxo fica entre mansões históricas em frente ao imponente Teatro Amazonas, a 1 km do Porto de Manaus, a 2 km do Museu Palácio da Liberdade", 5, 750, "69010060", "481", "Rua 10 de Julho", "Centro", "Manaus", "Amazonas", "Brasil"),
    ("Iberostar Heritage Grand Amazon - All inclusive", "3911760000149", "(92) 2126-9927", "reservas@amazon.com.br", "Navege pelo Amazonas, em um hotel flutuante repleto de luxo, aproveitando a aventura e a natureza no pulmão do planeta", 5, 850, "69005050", "25", "Rua Marques de Santa Cruz", "Centro", "Manaus", "Amazonas", "Brasil"),
    ("Hotel Atlântico Tower", "29300887000115", "(21) 2042-2730", "reservas@atlanticotower.com.br", "Quartos simples dispõem de TV com tela plana, Wi-Fi gratuito e frigobar, além de cofre. Alguns quartos de categoria mais alta contam com varanda. Serviço de quarto disponível", 3, 950, "20060050", "19", "R. Pedro I", "Centro", "Rio de Janeiro", "Rio de Janeiro", "Brasil"),
    ("Copacabana Palace, A Belmond Hotel", "33374984000120", "(21) 2548-7070", "reservations.brazil@belmond.com", "De frente para a Praia de Copacabana, este hotel refinado em art déco, de 1923, fica a 10 km do Aeroporto Santos Dumont e a 13 km do icônico Cristo Redentor", 5, 1050, "22021001", "1702", "Av. Atlântica", "Copacabana", "Rio de Janeiro", "Rio de Janeiro", "Brasil"),
    ("The Murray, Hong Kong, a Niccolo Hotel", "12345678901234", "3141-8888", "contactt@murray.com", "Academia, Internet, Spa, restaurante, Estacionamento e lavanderia", 5, 1150, "22021001", "22", "Cotton Tree Dr", "Central", "Central", "Central", "Hong Kong"),
    ("Mini Hotel Causeway Bay Hong Kong", "98745632102587", "3979-1111", "contactt@causeway.com", "Internet", 3, 100, "35715945", "8", "Sun Wui Rd", "Causeway", "Causeway", "Causeway", "Hong Kong"),
    ("Hotel Regina", "75315987456321", "915 21 47 25", "contactt@regina.com", "Café da manhã incluso, Internet, Restaurante e Lavanderia", 3, 75, "35715987", "19", "C. de Alcalá", "28014", "28014", "Madrid", "Espanha"),
    ("Catalonia Plaza Mayor", "15987456321458", "913 69 44 09", "contactt@mayorplaza.com", "Academia, Lavanderia, SPA, Restaurante e Internet", 4, 150, "15987456", "36", "C. de Atocha", "28012", "28012", "Madrid", "Espanha"),
    ("L’hotel du Collectionneur Arc de Triomphe", "45698712365478", "58 36 67 00", "contactt@triomphe.com", "Babá ou creche, Internet, Restaurante, Estacionamento e Lavanderia", 5, 450, "12398745", "51-57", "Rue Courcelles", "75008", "75008", "Paris", "França"),
    ("Arty Paris porte de Versailles", "78932145698745", "40 34 40 34", "contactt@versailles.com", "Hospedagem", 1, 25, "45685219", "62", "Rue Des Morillons", "75015", "75015", "Paris", "França"),
    ("Holiday Inn Express And Suites Fisherman’s wharf", "45685219371597", "415 409 4600", "express@holiday.com", "Academia, Internet, Lavanderia e Estacionamento e Café da manhã", 3, 50, "12357456", "550", "North Point St", "San Francisco", "San Francisco", "Califórnia", "EUA")
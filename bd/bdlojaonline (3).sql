-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bdlojaonline
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bdlojaonline
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdlojaonline` DEFAULT CHARACTER SET utf8 ;
USE `bdlojaonline` ;

-- -----------------------------------------------------
-- Table `bdlojaonline`.`sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdlojaonline`.`sala` (
  `idsala` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idsala`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdlojaonline`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdlojaonline`.`pessoa` (
  `idpessoa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `dt nascimento` DATE NULL,
  `sala_idsala` INT NOT NULL,
  PRIMARY KEY (`idpessoa`),
  INDEX `fk_pessoa_sala_idx` (`sala_idsala` ASC) VISIBLE,
  CONSTRAINT `fk_pessoa_sala`
    FOREIGN KEY (`sala_idsala`)
    REFERENCES `bdlojaonline`.`sala` (`idsala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdlojaonline`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdlojaonline`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `clientecol` VARCHAR(45) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdlojaonline`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdlojaonline`.`categoria` (
  `idcategoria` INT NOT NULL,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdlojaonline`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdlojaonline`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `preco` DOUBLE NULL,
  `descricao` VARCHAR(45) NULL,
  `tamanho` VARCHAR(3) NULL,
  `categoria_idcategoria` INT NOT NULL,
  PRIMARY KEY (`idproduto`),
  INDEX `fk_produto_categoria1_idx` (`categoria_idcategoria` ASC) VISIBLE,
  CONSTRAINT `fk_produto_categoria1`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `bdlojaonline`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdlojaonline`.`forma_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdlojaonline`.`forma_pagamento` (
  `idforma_pagamento` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idforma_pagamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdlojaonline`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdlojaonline`.`venda` (
  `idvenda` INT NOT NULL AUTO_INCREMENT,
  `preco` DOUBLE NULL,
  `data` DATE NULL,
  `cliente_idcliente` INT NOT NULL,
  `forma_pagamento_idforma_pagamento` INT NOT NULL,
  PRIMARY KEY (`idvenda`),
  INDEX `fk_venda_cliente1_idx` (`cliente_idcliente` ASC) VISIBLE,
  INDEX `fk_venda_forma_pagamento1_idx` (`forma_pagamento_idforma_pagamento` ASC) VISIBLE,
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `bdlojaonline`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_forma_pagamento1`
    FOREIGN KEY (`forma_pagamento_idforma_pagamento`)
    REFERENCES `bdlojaonline`.`forma_pagamento` (`idforma_pagamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdlojaonline`.`produto_has_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdlojaonline`.`produto_has_venda` (
  `produto_idproduto` INT NOT NULL,
  `venda_idvenda` INT NOT NULL,
  PRIMARY KEY (`produto_idproduto`, `venda_idvenda`),
  INDEX `fk_produto_has_venda_venda1_idx` (`venda_idvenda` ASC) VISIBLE,
  INDEX `fk_produto_has_venda_produto1_idx` (`produto_idproduto` ASC) VISIBLE,
  CONSTRAINT `fk_produto_has_venda_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `bdlojaonline`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_venda_venda1`
    FOREIGN KEY (`venda_idvenda`)
    REFERENCES `bdlojaonline`.`venda` (`idvenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

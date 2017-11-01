CREATE DATABASE caixa_eletronico;
USE caixa_eletronico;

CREATE TABLE `contas` (
	`id` INT(2) NOT NULL AUTO_INCREMENT,
	`titular` VARCHAR(50) NOT NULL,
	`conta` SMALLINT(3) NOT NULL,
	`agencia` SMALLINT(4) NOT NULL,
	`saldo` FLOAT NOT NULL,
	`senha` VARCHAR(32) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1;

CREATE TABLE `historico` (
	`id` INT(4) NOT NULL AUTO_INCREMENT,
	`id_conta` INT(2) NOT NULL,
	`valor` FLOAT NOT NULL,
	`tipo` TINYINT(1) NOT NULL COMMENT '1-Deposito 2-Saque',
	`data_operacao` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1;


create database plantec;

use plantec;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '	',
  `id_company` INT NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(100) NULL,
  `group` INT NULL,
  `status` VARCHAR(5) NOT NULL DEFAULT 'A',
  `birth` DATE DEFAULT NULL,
  `rg` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NULL,
  `civil_status` VARCHAR(45) NULL,
  `profession` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `address_number` VARCHAR(45) NULL,
  `complement` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `neighborhood` VARCHAR(45) NULL,
  `uf` VARCHAR(45) NULL,
  `zip_code` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `species` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `status` VARCHAR(5) NOT NULL DEFAULT 'A',
  `description` text NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `plantations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_specie` INT NULL,
  `quantity` INT NULL,
  `start_time` VARCHAR(45) NULL,
  `end_time` VARCHAR(45) NULL,
  `status` VARCHAR(5) NOT NULL DEFAULT 'A',
  `description` text NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sales` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_specie` INT NULL,
  `id_user` INT NULL,
  `quantity` INT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `status` VARCHAR(5) NOT NULL DEFAULT 'A',
  `description` text NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cost_centers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_company` INT NOT NULL,
  `name` VARCHAR(30) NOT NULL,
  `status` VARCHAR(5) NOT NULL DEFAULT 'A',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cost_center_subtypes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cost_center` INT NOT NULL,
  `name` VARCHAR(30) NOT NULL,
  `status` VARCHAR(5) NOT NULL DEFAULT 'A',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_company` INT NOT NULL,
  `generate_date` DATETIME NOT NULL,
  `id_user_generated` INT NOT NULL,
  `due_date` DATE NOT NULL,
  `status` VARCHAR(5) NOT NULL DEFAULT 'A',
  `price` DECIMAL(10,2) NOT NULL,
  `paid_date` DATETIME DEFAULT NULL,
  `id_user_paid` INT DEFAULT NULL,
  `id_cost_center` INT NOT NULL,
  `id_cost_center_subtype` INT NOT NULL,
  `observation` TEXT DEFAULT NULL,
  `nfe` VARCHAR(50) DEFAULT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `phones` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `number` VARCHAR(20) NOT NULL,
  `status` VARCHAR(5) NOT NULL DEFAULT 'A',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


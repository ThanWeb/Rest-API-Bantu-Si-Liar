-- CREATE DATABASE

CREATE DATABASE `db_bantu_si_liar`;

-- CREATE ACCOUNT TABLE

CREATE TABLE `db_bantu_si_liar`.`tb_account` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(30) NOT NULL , 
    `email` VARCHAR(50) NOT NULL , 
    `password` VARCHAR(50) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- INSERT DATA TO ACCOUNT TABLE

INSERT INTO `tb_account` (
    `id`, `username`, `email`, `password`) 
    VALUES (NULL, 'admin', 'hansrio@gmail.com', 'BantuLiarAdmin198'
)

-- CREATE PROFILE TABLE

-- CREATE REPORT TABLE

-- CREATE ARTICLE TABLE
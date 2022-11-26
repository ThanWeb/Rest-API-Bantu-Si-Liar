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

CREATE TABLE `db_bantu_si_liar`.`tb_profile` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(60) NOT NULL , 
    `province` VARCHAR(60) NOT NULL , 
    `city` VARCHAR(100) NOT NULL , 
    `address` VARCHAR(200) NOT NULL , 
    `phone` VARCHAR(20) NOT NULL , 
    `picture` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- INSERT DATA TO PROFILE TABLE

INSERT INTO `tb_profile` (
    `id`, `name`, `province`, `city`, `address`, `phone`, `picture`) 
    VALUES (NULL, 'admin', 'Bali', 'Kabupaten Tabanan', 'Desa Pandak Gede, Kediri', '083115698773', 'https://img.icons8.com/color/48/null/circled-user-male-skin-type-4--v1.png'
)

-- CREATE REPORT TABLE

-- CREATE ARTICLE TABLE
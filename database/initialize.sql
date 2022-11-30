-- CREATE DATABASE

CREATE DATABASE `db_bantu_si_liar`;

-- CREATE ACCOUNT TABLE

CREATE TABLE `db_bantu_si_liar`.`tb_account` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(30) NOT NULL , 
    `email` VARCHAR(50) NOT NULL , 
    `password` VARCHAR(50) NOT NULL , 
    `name` VARCHAR(60) NOT NULL , 
    `province` VARCHAR(60) NOT NULL , 
    `city` VARCHAR(100) NOT NULL , 
    `address` VARCHAR(200) NOT NULL , 
    `phone` VARCHAR(20) NOT NULL , 
    `picture` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- INSERT DATA TO ACCOUNT TABLE

INSERT INTO `tb_account` (
    `id`, `username`, `email`, `password`, `name`, `province`, `city`, `address`, `phone`, `picture` ) 
    VALUES (NULL, 'admin', 'hansrio@gmail.com', 'BantuLiarAdmin198', 'Admin Bali', 'Bali', 'Kabupaten Tabanan', 'Desa Pandak Gede, Kediri', '083115698773', 'https://img.icons8.com/color/48/null/circled-user-male-skin-type-4--v1.png'
)

-- CREATE REPORT TABLE

-- CREATE ARTICLE TABLE

CREATE TABLE `db_bantu_si_liar`.`tb_article` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `title` VARCHAR(200) NOT NULL , 
    `writer` VARCHAR(100) NOT NULL , 
    `created` VARCHAR(30) NOT NULL , 
    `updated` VARCHAR(30) NOT NULL , 
    `body` TEXT NOT NULL , 
    `picture` VARCHAR(300) NOT NULL , 
    `reference` VARCHAR(300) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
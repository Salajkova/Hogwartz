CREATE TABLE `skola`.`student` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`first_name` VARCHAR(50) NOT NULL , 
`second_name` VARCHAR(50) NOT NULL , 
`age` INT NOT NULL , `life` TEXT NULL , 
`college` VARCHAR(50) NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;
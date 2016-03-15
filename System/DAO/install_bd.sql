CREATE SCHEMA `serma` ;

CREATE TABLE `serma`.`users` (
  `IdUser` INT NOT NULL AUTO_INCREMENT,
  `FnUser` VARCHAR(255) NULL,
  `LnUser` VARCHAR(2555) NULL,
  PRIMARY KEY (`IdUser`));

INSERT INTO `serma`.`users`(`FnUser`,`LnUser`) VALUES ('Davi','Sermarini');
INSERT INTO `serma`.`users`(`FnUser`,`LnUser`) VALUES ('First','Last');
INSERT INTO `serma`.`users`(`FnUser`,`LnUser`) VALUES ('Bill','Gates');
INSERT INTO `serma`.`users`(`FnUser`,`LnUser`) VALUES ('Steve','Jobs');
INSERT INTO `serma`.`users`(`FnUser`,`LnUser`) VALUES ('Elvis','Presley');

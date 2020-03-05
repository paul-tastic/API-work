CREATE TABLE `wines`
(
`id` 		INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` 		VARCHAR(50) NULL,
`vineyard` 	VARCHAR(50) NULL,
`vintage` 	VARCHAR(5) NULL,
`varietal` 	VARCHAR(50) NULL,
`modified`	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `wines` (`name`,`vineyard`,`vintage`,`varietal`) VALUES ('Ghost Block Zinfandel', 'Ghost Block', '2014', 'Zinfandel');
INSERT INTO `wines` (`name`,`vineyard`,`vintage`,`varietal`) VALUES ('Neal Cabernet Sauvignon', 'Neal', '2014', 'Cabernet Sauvignon');
INSERT INTO `wines` (`name`,`vineyard`,`vintage`,`varietal`) VALUES ('Juan Gil', 'Juan Gil', '2015', 'Tempranillo');
INSERT INTO `wines` (`name`,`vineyard`,`vintage`,`varietal`) VALUES ('Riff Pinot Grigio', 'Riff', '2018', 'Pinot Grigio');
INSERT INTO `wines` (`name`,`vineyard`,`vintage`,`varietal`) VALUES ('Au Bon Climat Pinot Noir', 'Au Bon Climat', '2017', 'Pinot Noir');
INSERT INTO `wines` (`name`,`vineyard`,`vintage`,`varietal`) VALUES ('ZD Cabernet Sauvignon', 'ZD', '2014', 'Cabernet Sauvignon');

CREATE TABLE `varietal`
(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`varietal` 	VARCHAR(50) NULL,
`abbrev` 	VARCHAR(10) NULL,
`modified`	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Cabernet Sauvignon', 'CS');
INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Pinot Noir', 'PN');
INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Pinot Grigio', 'PG');
INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Merlot', 'ME');
INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Malbec', 'MAL');
INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Chardonnay', 'CH');
INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Tempranillo', 'T');
INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Sauvignon Blanc', 'SB');
INSERT INTO `varietal` (`varietal`, `abbrev`) VALUES ('Cabernet Franc', 'CF');

CREATE TABLE `user` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'cp1250_general_ci',
	`surname` VARCHAR(50) NULL DEFAULT NULL COLLATE 'cp1250_general_ci',
	`birthday` VARCHAR(50) NULL DEFAULT NULL COLLATE 'cp1250_general_ci',
	`sex` VARCHAR(50) NULL DEFAULT NULL COLLATE 'cp1250_general_ci',
	`country` VARCHAR(50) NULL DEFAULT NULL COLLATE 'cp1250_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='cp1250_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

INSERT INTO user (name, surname, birthday, sex, country)
VALUES ('Tom', 'Cat', '10/11/1950', 'm', 'USA');
INSERT INTO user (name, surname, birthday, sex, country)
VALUES ('Jarry', 'Mouse', '10/11/1950', 'm', 'USA');
INSERT INTO user (name, surname, birthday, sex, country)
VALUES ('Donald', 'Duck', '08/07/1943', 'm', 'USA');
INSERT INTO user (name, surname, birthday, sex, country)
VALUES ('Duke', 'Nukem', '23/05/1969', 'm', 'USA');
INSERT INTO user (name, surname, birthday, sex, country)
VALUES ('Sara', 'Conor', '10/11/1959', 'f', 'Canada');
INSERT INTO user (name, surname, birthday, sex, country)
VALUES ('Giorgio', 'Perreca', '25/09/1965', 'm', 'Italia');
INSERT INTO user (name, surname, birthday, sex, country)
VALUES ('Fransua', 'Pinnachio', '10/11/1971', 'm', 'France');
CREATE TABLE IF NOT EXISTS `#__curriculum_item` (
	`item_id`				bigint(20)			NOT NULL AUTO_INCREMENT,
	`item_name`				varchar(255)		DEFAULT NULL,
	`item_description`		longtext,
	`item_type`				varchar(30)			DEFAULT NULL,
	`item_alias`			varchar(255)		DEFAULT NULL,
	`technique_attack`		varchar(255)		DEFAULT NULL,
	`technique_direction`	varchar(255)		DEFAULT NULL,
	`severity_id`			int(11)				DEFAULT NULL,
	`familygroup_id`		int(11)				DEFAULT NULL,
	`basic_category_id`		int(11)				DEFAULT NULL,
	`published`				tinyint(4)			DEFAULT NULL,
	`checked_out`			int(11)				DEFAULT '0',
	`checked_out_time`		datetime			DEFAULT NULL,
	PRIMARY KEY (`item_id`),
	UNIQUE KEY `item_alias` (`item_alias`)
);

CREATE TABLE IF NOT EXISTS `#__curriculum_system` (
	`system_id`				bigint(20)			NOT NULL AUTO_INCREMENT,
	`system_name`			varchar(255)		DEFAULT NULL,
	`system_description`	longtext,
	`system_alias`			varchar(255)		DEFAULT NULL,
	`published`				tinyint(4)			DEFAULT NULL,
	`checked_out`			int(11)				DEFAULT '0',
	`checked_out_time`		datetime			DEFAULT NULL,
	PRIMARY KEY (`system_id`),
	UNIQUE KEY `system_alias` (`system_alias`)
);

CREATE TABLE IF NOT EXISTS `#__curriculum_belt` (
	`belt_id`				varchar(20)			NOT NULL,
	PRIMARY KEY (`belt_id`)
);

CREATE TABLE IF NOT EXISTS `#__curriculum_systemitem` (
	`item_id`				int(11)				NOT NULL,
	`system_id`				int(11)				NOT NULL,
	`belt_id`				int(11)				NOT NULL,
	`belt_order`			tinyint(4)			DEFAULT NULL,
	PRIMARY KEY(item_id, system_id, belt_id)
);

CREATE TABLE IF NOT EXISTS `#__curriculum_type` (
	`type_id`				varchar(30)			NOT NULL,
	PRIMARY KEY (`type_id`)
);

CREATE TABLE IF NOT EXISTS `#__curriculum_itemrelationship` (
	`item_a`				bigint(20)			NOT NULL,
	`item_b`				bigint(20)			NOT NULL,
	PRIMARY KEY(item_a, item_b)
);

CREATE TABLE IF NOT EXISTS `#__curriculum_severity` (
	`severity_id`			varchar(20)			NOT NULL,
	PRIMARY KEY (`severity_id`)
);

CREATE TABLE IF NOT EXISTS `#__curriculum_familygroup` (
	`familygroup_id`		varchar(25)			NOT NULL,
	PRIMARY KEY (`familygroup_id`)
);

CREATE TABLE IF NOT EXISTS `#__curriculum_basic_category` (
	`basic_category_id`		varchar(20)			NOT NULL,
	PRIMARY KEY (`basic_category_id`)
);

INSERT INTO `#__curriculum_type` (type_id)
VALUES
	('Pledge'),
	('Basic'),
	('Technique'),
	('Form'),
	('Set'),
	('Freestyle');

INSERT INTO `#__curriculum_belt` (belt_id)
VALUES
	('Yellow'),
	('Orange'),
	('Purple'),
	('Blue'),
	('Green'),
	('3rd Brown'),
	('2nd Brown'),
	('1st Brown'),
	('1st Black'),
	('2nd Black'),
	('3rd Black');

INSERT INTO `#__curriculum_basic_category` (basic_category_id)
VALUES
	('Stance'),
	('Strike'),
	('Block'),
	('Kick'),
	('Footwork'),
	('Groundwork');

INSERT INTO `#__curriculum_severity` (severity_id)
VALUES
	('Grab and Tackle'),
	('Push'),
	('Punch'),
	('Kick'),
	('Hold and Hug'),
	('Choke and Lock'),
	('Weapon'),
	('Multiple Attack');

INSERT INTO `#__curriculum_familygroup` (familygroup_id)
VALUES
	('Push'),
	('Punch'),
	('Kick'),
	('Gun'),
	('Knife'),
	('Stick'),
	('Tackle'),
	('Wrist Grab'),
	('Hair Grab'),
	('Belt Grab'),
	('Sholder-Lapel Grab'),
	('Hand Hold'),
	('Full Nelson'),
	('Bear Hug'),
	('Choke'),
	('Lock'),
	('Multiple Attack - One Man'),
	('Multiple Attack - Two Man');
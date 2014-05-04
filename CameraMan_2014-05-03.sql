# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.33)
# Database: CameraMan
# Generation Time: 2014-05-03 21:57:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table projectList
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projectList`;

CREATE TABLE `projectList` (
  `project_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_title` varchar(200) DEFAULT NULL,
  `project_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `projectList` WRITE;
/*!40000 ALTER TABLE `projectList` DISABLE KEYS */;

INSERT INTO `projectList` (`project_id`, `project_title`, `project_desc`)
VALUES
	(1,'First project','This is a very nice and descriptive description of this project'),
	(2,'Second project','ditto to the last project description'),
	(18,'title','description');

/*!40000 ALTER TABLE `projectList` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table shotList
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shotList`;

CREATE TABLE `shotList` (
  `shot_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_shot_id` int(11) DEFAULT NULL,
  `shot_num` int(11) NOT NULL,
  `shot_type` varchar(10) NOT NULL DEFAULT '',
  `movement` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `status` int(2) NOT NULL,
  PRIMARY KEY (`shot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `shotList` WRITE;
/*!40000 ALTER TABLE `shotList` DISABLE KEYS */;

INSERT INTO `shotList` (`shot_id`, `project_shot_id`, `shot_num`, `shot_type`, `movement`, `description`, `status`)
VALUES
	(1,1,1,'ECU','static','insert description here',0),
	(2,1,2,'ECU','panning','testing edit',0),
	(3,1,3,'CFU','something','this is an edited description for the purpose of a query',0),
	(13,2,5,'TF','movement','another fabulous description',0),
	(14,2,4,'CF','zomming','something about this particular shot',0),
	(15,2,6,'CM','fluid','description here',0);

/*!40000 ALTER TABLE `shotList` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

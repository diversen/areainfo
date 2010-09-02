DROP TABLE IF EXISTS `areainfo`;
CREATE TABLE `areainfo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `regioncode` int(10),
  `regionname` varchar(1024) NOT NULL,
  `municipcode` int(10),
  `municipname` varchar(1024) NOT NULL,
  `zipcode` int(10),
  `zipname` varchar(1024) NOT NULL,
  `country` varchar(1024) NOT NULL,
  `country_short` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

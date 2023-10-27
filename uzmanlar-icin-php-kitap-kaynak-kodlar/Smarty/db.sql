CREATE TABLE user (
  id int(11) NOT NULL DEFAULT '0',
  username varchar(32) COLLATE utf8_turkish_ci DEFAULT NULL,
  fname varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  lname varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  gender enum('','XXM','XXF') COLLATE utf8_turkish_ci DEFAULT 'XXM',
  location_id bigint(20) DEFAULT '0',
  mail varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  password varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  regDate datetime DEFAULT NULL,
  status tinyint(4) DEFAULT '2',
  birthDay date DEFAULT NULL,
  UNIQUE KEY id (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

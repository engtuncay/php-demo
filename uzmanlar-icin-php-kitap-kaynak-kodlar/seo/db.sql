CREATE TABLE IF NOT EXISTS sitemap_visit (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  userAgent varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  url varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  regDate datetime DEFAULT NULL,
  ipAddress varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM;

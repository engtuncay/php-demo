SET max_heap_table_size = 1024*1024;
TABLE t1 (id INT, UNIQUE(id)) ENGINE = MEMORY;
SET max_heap_table_size = 1024*1024*2;
CREATE TABLE t2 (id INT, UNIQUE(id)) ENGINE = MEMORY;

CREATE TABLE test1 (
  id int(11) NOT NULL AUTO_INCREMENT,
  isim VARCHAR(50),
  PRIMARY KEY (`id`)
);

CREATE TABLE test1 (
  id int(11) NOT NULL AUTO_INCREMENT,
  isim VARCHAR(50),
  PRIMARY KEY (`id`)
) ENGINE=FEDERATED 
CONNECTION='mysql://user:pass@192.168.1.53:3306/test/test1';


CREATE TABLE test_uniun (
  id INT NOT NULL AUTO_INCREMENT,
  fullName VARCHAR(50),
  KEY anahtar (id)
) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci INSERT_METHOD=LAST UNION=(test1,test2);


CREATE FUNCTION html_date(theDate DATETIME)
    RETURNS varchar(10) CHARSET utf8
BEGIN
  RETURN DATE_FORMAT(theDate,'%d.%m.%Y');
END;

CREATE FUNCTION `news_file`(  _news_id INTEGER(11)  )
    RETURNS varchar(64) CHARSET utf8
BEGIN
  DECLARE _name VARCHAR(100) DEFAULT NULL;
  SELECT CONCAT(file_path,'/',file_name) INTO _name FROM news_file 
  WHERE news_id=_news_id AND news_file.`file_type`='IMG' ORDER BY id LIMIT 1;
  RETURN _name;
END;


CREATE VIEW view_message AS
SELECT
    message.from_user_id,
    message.to_user_id,
    message.regDate,
    user.username AS from_username,
    u.username AS to_username,
    message_detail.subject,
    message_detail.detail
FROM 
   message
INNER JOIN message_detail ON message.id=message_detail.message_id
INNER JOIN user ON user.id=message.from_user_id
INNER JOIN user u ON u.id=message.to_user_id
WHERE 
   message.status=true;

CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  mail varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  regDate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

CREATE TABLE user_log (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  action tinyint(4) DEFAULT NULL,
  regDate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=DYNAMIC;

CREATE TABLE user_online(
  user_id int(11) DEFAULT NULL,
  online bit(1) DEFAULT NULL,
  UNIQUE KEY user_id (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=DYNAMIC;

CREATE TRIGGER `user_after_ins_tr` AFTER INSERT ON `user`
  FOR EACH ROW
BEGIN
	INSERT INTO user_online (user_id,online) VALUES (NEW.id,true);
	INSERT INTO user_log (user_id,action,regDate) VALUES (NEW.id,1,NOW());
END;

CREATE TRIGGER `user_after_upd_tr` AFTER UPDATE ON `user`
  FOR EACH ROW
BEGIN
	INSERT INTO user_log (user_id,action,regDate) VALUES (NEW.id,2,NOW());
END;

CREATE TRIGGER user_before_del_tr AFTER DELETE ON user
  FOR EACH ROW
BEGIN
    DELETE FROM user_online WHERE user_id=OLD.id;
    INSERT INTO user_log (user_id,action,regDate) VALUES (OLD.id,3,NOW());
END;

CREATE PROCEDURE sp_deneme(IN _user_id INTEGER(11),IN _type_id TINYINT )
    SQL SECURITY INVOKER
    COMMENT 'deneme'
BEGIN	
    IF _type_id = 1 THEN 
       DELETE FROM user WHERE id=_user_id;
       SELECT 1 AS silindi;
    ELSE 
        SELECT * FROM user WHERE id=_user_id;
     END IF;
END;

CREATE PROCEDURE payment_iptal( IN _payment_session_id INTEGER(11) )
BEGIN
    DECLARE action_user_id INT;
    SET @PAYMENT_ID = _payment_session_id;
    SELECT user_id INTO action_user_id FROM payment WHERE payment_session_id=@PAYMENT_ID;

    UPDATE payment SET status=-2 WHERE payment_session_id=@PAYMENT_ID;
    UPDATE `payment_detail` SET status=-2 WHERE payment_session_id=@PAYMENT_ID;
    UPDATE property_sale SET status=-2 WHERE payment_session_id=@PAYMENT_ID;
   SELECT action_user_id;
END;


CREATE PROCEDURE sp_property_sale_detail( IN _payment_session_id INTEGER(11) )
BEGIN
    SET @PAYMENT_SESSION_ID = _payment_session_id;
    SET @SQL = "SELECT
        property.name,
        property_sale.amount,
        price.amountType
FROM 
  	property_sale
INNER JOIN property ON (property_sale.property_id=property.id)
 INNER JOIN price ON (price.id = property_sale.price_id)
WHERE property_sale.payment_session_id=?";
PREPARE stmt FROM @SQL;
EXECUTE stmt USING @PAYMENT_SESSION_ID;
END;

CREATE PROCEDURE dowhile(IN v1 INTEGER(11) )
BEGIN
  WHILE v1 > 0 DO
     INSERT INTO user (name,mail,regDate) VALUES  ('m','m@m.com',now());
     SET v1 = v1 - 1;
  END WHILE;
END;
--CALL dowhile(5000);


CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  fname varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  lname varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  mail varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  username varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  pass varchar(32) COLLATE utf8_turkish_ci DEFAULT NULL,
  gender enum('M','F') COLLATE utf8_turkish_ci DEFAULT NULL,
  regDate datetime DEFAULT NULL,
  status bit(1) DEFAULT true,
  PRIMARY KEY (id),
  KEY status (status),
  KEY username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

CREATE TRIGGER user_after_ins_tr AFTER INSERT ON user
  FOR EACH ROW
BEGIN
INSERT INTO property_sale_detail (user_id,regDate,finishDate) VALUES
 (NEW.id,NOW(),NOW());
END;

INSERT INTO user (fname,lname,mail,username,pass,gender,regDate) VALUES ('Mehmet','Şamlı','mehmet@mehmet.com','mehmet',md5(123456),'M',now()),
('Taha','Şamlı','taha@tahasamli.com','taha',md5(123456),'M',now()),
('Ülkü','Şamlı','ulku@tahasamli.com','ulku',md5(123456),'F',now()),
('Burak','Şamlı','burak@burak.com','burak',md5(123456),'M',now()),
('Canan','Şamlı','canan@burak.com','canan',md5(123456),'F',now()),
('Sevim','Şamlı','sevim@burak.com','sevim',md5(123456),'F',now()),
('Ahmet','Şamlı','ahmet@burak.com','ahmet',md5(123456),'M',now()),
('Furkan','Şamlı','furkan@furkan.com','furkan',md5(123456),'M',now());
CREATE TABLE property_sale_detail (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  regDate datetime DEFAULT NULL,
  finishDate datetime DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY user_id (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
CREATE TABLE property_sale_log (
  user_id int(11) NOT NULL,
  regDate datetime NOT NULL,
  message varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

CREATE PROCEDURE sp_promotion(IN _male SMALLINT, IN _fmale SMALLINT )
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY INVOKER
    COMMENT 'promosyon sp'
BEGIN
   DECLARE done INT DEFAULT 0;
   DECLARE user_id INT;
   DECLARE cinsiyet CHAR(1);
   DECLARE openUser CURSOR FOR SELECT id,gender FROM user WHERE status=true;
   DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;
    /* sorgu açılır */
    OPEN openUser;

    /* döngüye girilir */
    REPEAT
    	/* sabit değişkenlere sorgu sonuçları aktarılır */
    	FETCH openUser INTO user_id,cinsiyet; 
        SET @USER_ID = user_id;
        SET @GENDER = cinsiyet;
        /* cinsiyete göre kaç gün uzatılacağı set edilir */
        IF @GENDER = 'M' THEN
        	SET @DAY = _male;
        ELSE
        	SET @DAY = _fmale;
        END IF;
    /* süre uzatılır */
    SET @SQL="UPDATE property_sale_detail SET regDate=NOW(), finishDate=IF(finishDate>NOW(),DATE_ADD(finishDate, INTERVAL ? DAY), DATE_ADD(NOW(), INTERVAL ? DAY))  WHERE user_id=?";
    PREPARE stmt FROM @SQL;
    EXECUTE stmt USING @DAY,@DAY,@USER_ID;
    /* loglama yapılır */      
    SET @SQL = "INSERT INTO property_sale_log VALUES (?,NOW(),?)";
    SET @MESSAGE = CONCAT(@DAY,' gün eklendi');
    PREPARE stmt2 FROM @SQL;
    EXECUTE stmt2 USING @USER_ID,@MESSAGE;
    UNTIL done END REPEAT;    
    CLOSE openUser;
END;


CREATE TABLE events_table (
  id int(11) DEFAULT NULL,
  count int(11) DEFAULT NULL,
  UNIQUE KEY id (id)
) ENGINE=InnoDB;
INSERT INTO events_table VALUES (1,0);

CREATE EVENT yeni_event
  ON SCHEDULE EVERY '0:1:0' HOUR_SECOND STARTS '2009-03-11 11:34:44'
  ON COMPLETION NOT PRESERVE
  ENABLE
  COMMENT 'açıklama'  DO
UPDATE events_table SET count=count+1 WHERE id=1;

CREATE EVENT yeni_event
  ON SCHEDULE EVERY '0:1:0' HOUR_SECOND STARTS '2009-03-11 11:34:44' ENDS '2009-03-11 11:51:01'
  ON COMPLETION NOT PRESERVE
  ENABLE
  COMMENT ''  DO
UPDATE events_table SET count=count+1 WHERE id=1;

CREATE EVENT myevent
    ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR
    DO
UPDATE events_table set count=count+1 where id=1;


CREATE TABLE news (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  news_category_id smallint(6) DEFAULT NULL,
  index_caption tinyint(4) DEFAULT '0',
  news_source_id smallint(6) DEFAULT NULL,
  regDate datetime DEFAULT NULL,
  status tinyint(4) DEFAULT '0',
  mainPage bit(1) DEFAULT true,
  PRIMARY KEY (id),
  KEY news_category_id (news_category_id),
  KEY status (status)
) ENGINE=InnoDB;

ALTER TABLE news DROP INDEX news_category_id;
ALTER TABLE news DROP INDEX status;
ALTER TABLE news ADD INDEX birlesik_index(news_category_id,status);

CREATE TABLE IF NOT EXISTS news (
  id int(11) NOT NULL AUTO_INCREMENT,
  category_id int(11) NOT NULL,
  regDate datetime NOT NULL,
  status bit(1) NOT NULL,
  PRIMARY KEY (id),
  KEY category_id (category_id,status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS news_detail (
  news_id int(11) NOT NULL,
  title varchar(100) NOT NULL,
  detail text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (news_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

CREATE TABLE IF NOT EXISTS news_search (
  news_id int(11) NOT NULL,
  title varchar(100) NOT NULL,
  detail text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (news_id),
  FULLTEXT KEY title (title,detail)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO news_search (news_id, title, detail) VALUES
(1, 'PHP', 'PHP 5 ile yeni nesil web siteleri'),
(2, 'Tomcat', 'Lighttpd ile Tomcat''in bir arada kullanılması'),
(3, 'memcache', 'Memcache, birçok programlama dilleriyle beraber kullanılabilir.'),
(4, 'xCache', 'xCache, php için geliştirilmiş bir cache mekanizması sağlar');

--SELECT * FROM `news_search` WHERE MATCH(title,detail) AGAINST('php' IN BOOLEAN MODE);

CREATE TABLE deneme (
	id INT NOT NULL,
	fname varchar(30) not null,
	lname varchar(30) not null,
	regDate datetime
) ENGINE = MyISAM
PARTITION BY RANGE( YEAR(regDate) ) (
    PARTITION p0 VALUES LESS THAN (2006),
    PARTITION p1 VALUES LESS THAN (2007),
    PARTITION p2 VALUES LESS THAN (2008),
    PARTITION p3 VALUES LESS THAN (2009)
);

ALTER TABLE deneme ADD PARTITION (PARTITION p5 VALUES LESS THAN (2010));

ALTER TABLE deneme DROP PARTITION p0;

CREATE PROCEDURE deneme_proc(IN v1 INTEGER(11),IN theYear YEAR)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
BEGIN
WHILE v1 > 0 DO
    SET @SQL = "INSERT INTO deneme (id,fname,lname,regDate) VALUES  (?,'Taha','Şamlı',?)";
    SET v1 = v1 - 1;
    set @V = v1;
    SET @D = CONCAT(theYear,'-01-01 00:00:00');
    PREPARE stmt FROM @SQL;
    EXECUTE stmt USING @V, @D; 
END WHILE;
END;

CALL deneme_proc(50000,2005);
CALL deneme_proc(50000,2006);
ALTER TABLE deneme DROP PARTITION p0;
SELECT * FROM deneme WHERE date(regDate)< '2006-01-01';

CREATE TABLE IF NOT EXISTS user (
  id int(11) NOT NULL,
  partner_id int(11) NOT NULL,
  fname varchar(30) NOT NULL,
  lname varchar(30) NOT NULL,
  regDate datetime DEFAULT NULL,
  KEY partner (partner_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci 
PARTITION BY LIST (partner_id) (
    PARTITION p1 VALUES IN (1), 
    PARTITION p2 VALUES IN (2), 
    PARTITION p3 VALUES IN (3) 
);
CREATE PROCEDURE sp_user(IN v1 INTEGER(11), IN partner_id INTEGER(11))
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY INVOKER
    COMMENT ''
BEGIN
WHILE v1 > 0 DO
    SET @SQL = "INSERT INTO user (id,partner_id,fname,lname,regDate) VALUES  (?,?,'Taha','Şamlı',NOW())";
    SET v1 = v1 - 1;
    set @V = v1;
    SET @P = partner_id;
    PREPARE stmt FROM @SQL;
    EXECUTE stmt USING @V, @P; 
END WHILE;
END;

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT,
    partner_id int not null,
    fname varchar(30) not null,
    lname varchar(30) not null,
    regDate datetime,
    PRIMARY key(id),
    key partner(partner_id)
) ENGINE = MyISAM
PARTITION BY KEY() 
PARTITIONS 10;

CREATE TABLE user_profile (
  user_id int(11) DEFAULT NULL,
  user_profile_type_id int(11) DEFAULT NULL,
  value varchar(1000),
  KEY user_id (user_id)
) ENGINE=InnoDB
PARTITION BY HASH(user_id)
PARTITIONS 24;


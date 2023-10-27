CREATE TABLE IF NOT EXISTS bankAccount (
  id int(3) unsigned NOT NULL DEFAULT '0',
  related_id tinyint(4) DEFAULT '0',
  bankSort smallint(3) unsigned DEFAULT NULL,
  bankName varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  name varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  companyBank varchar(50) COLLATE utf8_turkish_ci DEFAULT '0',
  companyAccount varchar(20) COLLATE utf8_turkish_ci DEFAULT '0',
  companyAccountName varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  companyBranch varchar(50) COLLATE utf8_turkish_ci DEFAULT '0',
  companyBankCode varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  companyBankDesc varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  companyAccountType tinyint(2) unsigned DEFAULT NULL,
  companyAccountPaymentType tinyint(3) unsigned DEFAULT NULL,
  cgiFolder varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  cgiServer varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  currency varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  vposName varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  vposPassword varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  vposClientID varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  storekey varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  VposTerminalID varchar(20) COLLATE utf8_turkish_ci DEFAULT '0',
  vposServer varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  vposFolder varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  shop_id int(11) unsigned DEFAULT '0',
  vposDefault tinyint(4) DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
CREATE TABLE IF NOT EXISTS bankRate (
  id int(5) unsigned NOT NULL AUTO_INCREMENT,
  bankAccount_id int(5) unsigned DEFAULT '0',
  term tinyint(2) unsigned DEFAULT '0',
  rate double(21,20) DEFAULT '0.00000000000000000000',
  realRate double(21,20) DEFAULT NULL,
  location_id int(11) DEFAULT NULL,
  minAmount double(50,2) DEFAULT '0.00',
  max_rate bit(1) DEFAULT '\0' COMMENT 'true:12 taksit',
  PRIMARY KEY (id),
  KEY bankAcoount_id (bankAccount_id,term)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
 
CREATE TABLE IF NOT EXISTS payment (
  id int(11) NOT NULL AUTO_INCREMENT,
  payment_session_id varchar(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  user_id int(11) NOT NULL DEFAULT '0',
  user_info_invoice_id int(11) DEFAULT '0' COMMENT 'fatura adres id',
  user_info_delivery_id int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'teslimat adres id',
  price double(50,2) NOT NULL DEFAULT '0.00' COMMENT 'birim fiyat',
  avt double(50,2) NOT NULL DEFAULT '0.00',
  term_price double(50,2) DEFAULT '0.00' COMMENT 'vade',
  term_count smallint(3) DEFAULT '1' COMMENT 'taksit sayısı',
  total double(50,2) NOT NULL DEFAULT '0.00' COMMENT 'toplam tutar',
  regDate datetime DEFAULT '0000-00-00 00:00:00',
  status tinyint(2) NOT NULL DEFAULT '0',
  cargo_number varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL COMMENT 'kargo numarasÄ±',
  invoiceDate date DEFAULT NULL COMMENT 'faturadaki tarih',
  PRIMARY KEY (id),
  UNIQUE KEY payment_session_id (payment_session_id),
  KEY partner_id (partner_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ;
CREATE TABLE IF NOT EXISTS payment_detail (
  id int(11) NOT NULL AUTO_INCREMENT,
  payment_session_id varchar(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  transaction_type_id smallint(3) unsigned NOT NULL DEFAULT '0',
  price double(50,2) NOT NULL DEFAULT '0.00',
  avt double(50,2) NOT NULL DEFAULT '0.00',
  term_price double(50,2) DEFAULT '0.00',
  term_count smallint(3) DEFAULT '1',
  total double(50,2) NOT NULL DEFAULT '0.00',
  regDate datetime DEFAULT '0000-00-00 00:00:00',
  status int(2) NOT NULL DEFAULT '-1' COMMENT '-1:iptal 0:bekleniyor 1:tamamlandı',
  bankAccount_id int(3) unsigned DEFAULT NULL,
  note_id_last int(11) NOT NULL DEFAULT '0',
  note_flag tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY payment_session_id (payment_session_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
 
CREATE TABLE IF NOT EXISTS payment_log (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(11) unsigned NOT NULL DEFAULT '0',
  payment_session_id varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  transaction_type_id smallint(3) NOT NULL DEFAULT '0',
  bankAccount_id tinyint(3) unsigned DEFAULT NULL,
  bank_return int(2) unsigned DEFAULT '0',
  HolderName varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  regDate datetime DEFAULT '0000-00-00 00:00:00',
  ApproveCode varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  OID varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  RRN varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  TransID varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  total double(50,2) DEFAULT NULL,
  cardNumber varchar(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  errorCode varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  termCount tinyint(2) unsigned DEFAULT '1',
  termRate double(3,2) DEFAULT '1.00',
  paymentMode varchar(10) COLLATE utf8_turkish_ci DEFAULT 'AUTH',
  ip varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (id),
  KEY sessionIndex (payment_session_id),
  KEY user_id (user_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

CREATE TABLE IF NOT EXISTS payment_session (
  id bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY id (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
CREATE TABLE IF NOT EXISTS payment_transaction_type (
  id int(11) unsigned NOT NULL DEFAULT '0',
  description varchar(50) COLLATE utf8_turkish_ci DEFAULT '0',
  sort tinyint(4) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

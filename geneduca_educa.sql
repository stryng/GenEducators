-- MySQL dump 10.13  Distrib 5.1.41, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: geneduca_educa
-- ------------------------------------------------------
-- Server version	5.1.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_logindetail`
--

DROP TABLE IF EXISTS `admin_logindetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_logindetail` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `Adminfirstname` varchar(100) NOT NULL,
  `Adminlastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adderss` varchar(250) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_logindetail`
--

LOCK TABLES `admin_logindetail` WRITE;
/*!40000 ALTER TABLE `admin_logindetail` DISABLE KEYS */;
INSERT INTO `admin_logindetail` VALUES (1,'Marcus','Marcus','admin','admin','US',123654789,'admin@admin.com');
/*!40000 ALTER TABLE `admin_logindetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ap_test`
--

DROP TABLE IF EXISTS `ap_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ap_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datereceived` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ap_test`
--

LOCK TABLES `ap_test` WRITE;
/*!40000 ALTER TABLE `ap_test` DISABLE KEYS */;
/*!40000 ALTER TABLE `ap_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_master`
--

DROP TABLE IF EXISTS `category_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_master` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` enum('Active','Inactive') NOT NULL,
  `cat_created_date` datetime NOT NULL,
  `cat_modify_date` datetime NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_master`
--

LOCK TABLES `category_master` WRITE;
/*!40000 ALTER TABLE `category_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `printable_name` varchar(80) NOT NULL,
  `iso3` char(3) NOT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`iso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES ('AF','AFGHANISTAN','Afghanistan','AFG',4),('AL','ALBANIA','Albania','ALB',8),('DZ','ALGERIA','Algeria','DZA',12),('AS','AMERICAN SAMOA','American Samoa','ASM',16),('AD','ANDORRA','Andorra','AND',20),('AO','ANGOLA','Angola','AGO',24),('AI','ANGUILLA','Anguilla','AIA',660),('AQ','ANTARCTICA','Antarctica','',NULL),('AG','ANTIGUA AND BARBUDA','Antigua and Barbuda','ATG',28),('AR','ARGENTINA','Argentina','ARG',32),('AM','ARMENIA','Armenia','ARM',51),('AW','ARUBA','Aruba','ABW',533),('AU','AUSTRALIA','Australia','AUS',36),('AT','AUSTRIA','Austria','AUT',40),('AZ','AZERBAIJAN','Azerbaijan','AZE',31),('BS','BAHAMAS','Bahamas','BHS',44),('BH','BAHRAIN','Bahrain','BHR',48),('BD','BANGLADESH','Bangladesh','BGD',50),('BB','BARBADOS','Barbados','BRB',52),('BY','BELARUS','Belarus','BLR',112),('BE','BELGIUM','Belgium','BEL',56),('BZ','BELIZE','Belize','BLZ',84),('BJ','BENIN','Benin','BEN',204),('BM','BERMUDA','Bermuda','BMU',60),('BT','BHUTAN','Bhutan','BTN',64),('BO','BOLIVIA','Bolivia','BOL',68),('BA','BOSNIA AND HERZEGOVINA','Bosnia and Herzegovina','BIH',70),('BW','BOTSWANA','Botswana','BWA',72),('BV','BOUVET ISLAND','Bouvet Island','',NULL),('BR','BRAZIL','Brazil','BRA',76),('IO','BRITISH INDIAN OCEAN TERRITORY','British Indian Ocean Territory','',NULL),('BN','BRUNEI DARUSSALAM','Brunei Darussalam','BRN',96),('BG','BULGARIA','Bulgaria','BGR',100),('BF','BURKINA FASO','Burkina Faso','BFA',854),('BI','BURUNDI','Burundi','BDI',108),('KH','CAMBODIA','Cambodia','KHM',116),('CM','CAMEROON','Cameroon','CMR',120),('CA','CANADA','Canada','CAN',124),('CV','CAPE VERDE','Cape Verde','CPV',132),('KY','CAYMAN ISLANDS','Cayman Islands','CYM',136),('CF','CENTRAL AFRICAN REPUBLIC','Central African Republic','CAF',140),('TD','CHAD','Chad','TCD',148),('CL','CHILE','Chile','CHL',152),('CN','CHINA','China','CHN',156),('CX','CHRISTMAS ISLAND','Christmas Island','',NULL),('CC','COCOS (KEELING) ISLANDS','Cocos (Keeling) Islands','',NULL),('CO','COLOMBIA','Colombia','COL',170),('KM','COMOROS','Comoros','COM',174),('CG','CONGO','Congo','COG',178),('CD','CONGO, THE DEMOCRATIC REPUBLIC OF THE','Congo, the Democratic Republic of the','COD',180),('CK','COOK ISLANDS','Cook Islands','COK',184),('CR','COSTA RICA','Costa Rica','CRI',188),('CI','COTE D\'IVOIRE','Cote D\'Ivoire','CIV',384),('HR','CROATIA','Croatia','HRV',191),('CU','CUBA','Cuba','CUB',192),('CY','CYPRUS','Cyprus','CYP',196),('CZ','CZECH REPUBLIC','Czech Republic','CZE',203),('DK','DENMARK','Denmark','DNK',208),('DJ','DJIBOUTI','Djibouti','DJI',262),('DM','DOMINICA','Dominica','DMA',212),('DO','DOMINICAN REPUBLIC','Dominican Republic','DOM',214),('EC','ECUADOR','Ecuador','ECU',218),('EG','EGYPT','Egypt','EGY',818),('SV','EL SALVADOR','El Salvador','SLV',222),('GQ','EQUATORIAL GUINEA','Equatorial Guinea','GNQ',226),('ER','ERITREA','Eritrea','ERI',232),('EE','ESTONIA','Estonia','EST',233),('ET','ETHIOPIA','Ethiopia','ETH',231),('FK','FALKLAND ISLANDS (MALVINAS)','Falkland Islands (Malvinas)','FLK',238),('FO','FAROE ISLANDS','Faroe Islands','FRO',234),('FJ','FIJI','Fiji','FJI',242),('FI','FINLAND','Finland','FIN',246),('FR','FRANCE','France','FRA',250),('GF','FRENCH GUIANA','French Guiana','GUF',254),('PF','FRENCH POLYNESIA','French Polynesia','PYF',258),('TF','FRENCH SOUTHERN TERRITORIES','French Southern Territories','',NULL),('GA','GABON','Gabon','GAB',266),('GM','GAMBIA','Gambia','GMB',270),('GE','GEORGIA','Georgia','GEO',268),('DE','GERMANY','Germany','DEU',276),('GH','GHANA','Ghana','GHA',288),('GI','GIBRALTAR','Gibraltar','GIB',292),('GR','GREECE','Greece','GRC',300),('GL','GREENLAND','Greenland','GRL',304),('GD','GRENADA','Grenada','GRD',308),('GP','GUADELOUPE','Guadeloupe','GLP',312),('GU','GUAM','Guam','GUM',316),('GT','GUATEMALA','Guatemala','GTM',320),('GN','GUINEA','Guinea','GIN',324),('GW','GUINEA-BISSAU','Guinea-Bissau','GNB',624),('GY','GUYANA','Guyana','GUY',328),('HT','HAITI','Haiti','HTI',332),('HM','HEARD ISLAND AND MCDONALD ISLANDS','Heard Island and Mcdonald Islands','',NULL),('VA','HOLY SEE (VATICAN CITY STATE)','Holy See (Vatican City State)','VAT',336),('HN','HONDURAS','Honduras','HND',340),('HK','HONG KONG','Hong Kong','HKG',344),('HU','HUNGARY','Hungary','HUN',348),('IS','ICELAND','Iceland','ISL',352),('IN','INDIA','India','IND',356),('ID','INDONESIA','Indonesia','IDN',360),('IR','IRAN, ISLAMIC REPUBLIC OF','Iran, Islamic Republic of','IRN',364),('IQ','IRAQ','Iraq','IRQ',368),('IE','IRELAND','Ireland','IRL',372),('IL','ISRAEL','Israel','ISR',376),('IT','ITALY','Italy','ITA',380),('JM','JAMAICA','Jamaica','JAM',388),('JP','JAPAN','Japan','JPN',392),('JO','JORDAN','Jordan','JOR',400),('KZ','KAZAKHSTAN','Kazakhstan','KAZ',398),('KE','KENYA','Kenya','KEN',404),('KI','KIRIBATI','Kiribati','KIR',296),('KP','KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF','Korea, Democratic People\'s Republic of','PRK',408),('KR','KOREA, REPUBLIC OF','Korea, Republic of','KOR',410),('KW','KUWAIT','Kuwait','KWT',414),('KG','KYRGYZSTAN','Kyrgyzstan','KGZ',417),('LA','LAO PEOPLE\'S DEMOCRATIC REPUBLIC','Lao People\'s Democratic Republic','LAO',418),('LV','LATVIA','Latvia','LVA',428),('LB','LEBANON','Lebanon','LBN',422),('LS','LESOTHO','Lesotho','LSO',426),('LR','LIBERIA','Liberia','LBR',430),('LY','LIBYAN ARAB JAMAHIRIYA','Libyan Arab Jamahiriya','LBY',434),('LI','LIECHTENSTEIN','Liechtenstein','LIE',438),('LT','LITHUANIA','Lithuania','LTU',440),('LU','LUXEMBOURG','Luxembourg','LUX',442),('MO','MACAO','Macao','MAC',446),('MK','MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','Macedonia, the Former Yugoslav Republic of','MKD',807),('MG','MADAGASCAR','Madagascar','MDG',450),('MW','MALAWI','Malawi','MWI',454),('MY','MALAYSIA','Malaysia','MYS',458),('MV','MALDIVES','Maldives','MDV',462),('ML','MALI','Mali','MLI',466),('MT','MALTA','Malta','MLT',470),('MH','MARSHALL ISLANDS','Marshall Islands','MHL',584),('MQ','MARTINIQUE','Martinique','MTQ',474),('MR','MAURITANIA','Mauritania','MRT',478),('MU','MAURITIUS','Mauritius','MUS',480),('YT','MAYOTTE','Mayotte','',NULL),('MX','MEXICO','Mexico','MEX',484),('FM','MICRONESIA, FEDERATED STATES OF','Micronesia, Federated States of','FSM',583),('MD','MOLDOVA, REPUBLIC OF','Moldova, Republic of','MDA',498),('MC','MONACO','Monaco','MCO',492),('MN','MONGOLIA','Mongolia','MNG',496),('MS','MONTSERRAT','Montserrat','MSR',500),('MA','MOROCCO','Morocco','MAR',504),('MZ','MOZAMBIQUE','Mozambique','MOZ',508),('MM','MYANMAR','Myanmar','MMR',104),('NA','NAMIBIA','Namibia','NAM',516),('NR','NAURU','Nauru','NRU',520),('NP','NEPAL','Nepal','NPL',524),('NL','NETHERLANDS','Netherlands','NLD',528),('AN','NETHERLANDS ANTILLES','Netherlands Antilles','ANT',530),('NC','NEW CALEDONIA','New Caledonia','NCL',540),('NZ','NEW ZEALAND','New Zealand','NZL',554),('NI','NICARAGUA','Nicaragua','NIC',558),('NE','NIGER','Niger','NER',562),('NG','NIGERIA','Nigeria','NGA',566),('NU','NIUE','Niue','NIU',570),('NF','NORFOLK ISLAND','Norfolk Island','NFK',574),('MP','NORTHERN MARIANA ISLANDS','Northern Mariana Islands','MNP',580),('NO','NORWAY','Norway','NOR',578),('OM','OMAN','Oman','OMN',512),('PK','PAKISTAN','Pakistan','PAK',586),('PW','PALAU','Palau','PLW',585),('PS','PALESTINIAN TERRITORY, OCCUPIED','Palestinian Territory, Occupied','',NULL),('PA','PANAMA','Panama','PAN',591),('PG','PAPUA NEW GUINEA','Papua New Guinea','PNG',598),('PY','PARAGUAY','Paraguay','PRY',600),('PE','PERU','Peru','PER',604),('PH','PHILIPPINES','Philippines','PHL',608),('PN','PITCAIRN','Pitcairn','PCN',612),('PL','POLAND','Poland','POL',616),('PT','PORTUGAL','Portugal','PRT',620),('PR','PUERTO RICO','Puerto Rico','PRI',630),('QA','QATAR','Qatar','QAT',634),('RE','REUNION','Reunion','REU',638),('RO','ROMANIA','Romania','ROM',642),('RU','RUSSIAN FEDERATION','Russian Federation','RUS',643),('RW','RWANDA','Rwanda','RWA',646),('SH','SAINT HELENA','Saint Helena','SHN',654),('KN','SAINT KITTS AND NEVIS','Saint Kitts and Nevis','KNA',659),('LC','SAINT LUCIA','Saint Lucia','LCA',662),('PM','SAINT PIERRE AND MIQUELON','Saint Pierre and Miquelon','SPM',666),('VC','SAINT VINCENT AND THE GRENADINES','Saint Vincent and the Grenadines','VCT',670),('WS','SAMOA','Samoa','WSM',882),('SM','SAN MARINO','San Marino','SMR',674),('ST','SAO TOME AND PRINCIPE','Sao Tome and Principe','STP',678),('SA','SAUDI ARABIA','Saudi Arabia','SAU',682),('SN','SENEGAL','Senegal','SEN',686),('CS','SERBIA AND MONTENEGRO','Serbia and Montenegro','',NULL),('SC','SEYCHELLES','Seychelles','SYC',690),('SL','SIERRA LEONE','Sierra Leone','SLE',694),('SG','SINGAPORE','Singapore','SGP',702),('SK','SLOVAKIA','Slovakia','SVK',703),('SI','SLOVENIA','Slovenia','SVN',705),('SB','SOLOMON ISLANDS','Solomon Islands','SLB',90),('SO','SOMALIA','Somalia','SOM',706),('ZA','SOUTH AFRICA','South Africa','ZAF',710),('GS','SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS','South Georgia and the South Sandwich Islands','',NULL),('ES','SPAIN','Spain','ESP',724),('LK','SRI LANKA','Sri Lanka','LKA',144),('SD','SUDAN','Sudan','SDN',736),('SR','SURINAME','Suriname','SUR',740),('SJ','SVALBARD AND JAN MAYEN','Svalbard and Jan Mayen','SJM',744),('SZ','SWAZILAND','Swaziland','SWZ',748),('SE','SWEDEN','Sweden','SWE',752),('CH','SWITZERLAND','Switzerland','CHE',756),('SY','SYRIAN ARAB REPUBLIC','Syrian Arab Republic','SYR',760),('TW','TAIWAN, PROVINCE OF CHINA','Taiwan, Province of China','TWN',158),('TJ','TAJIKISTAN','Tajikistan','TJK',762),('TZ','TANZANIA, UNITED REPUBLIC OF','Tanzania, United Republic of','TZA',834),('TH','THAILAND','Thailand','THA',764),('TL','TIMOR-LESTE','Timor-Leste','',NULL),('TG','TOGO','Togo','TGO',768),('TK','TOKELAU','Tokelau','TKL',772),('TO','TONGA','Tonga','TON',776),('TT','TRINIDAD AND TOBAGO','Trinidad and Tobago','TTO',780),('TN','TUNISIA','Tunisia','TUN',788),('TR','TURKEY','Turkey','TUR',792),('TM','TURKMENISTAN','Turkmenistan','TKM',795),('TC','TURKS AND CAICOS ISLANDS','Turks and Caicos Islands','TCA',796),('TV','TUVALU','Tuvalu','TUV',798),('UG','UGANDA','Uganda','UGA',800),('UA','UKRAINE','Ukraine','UKR',804),('AE','UNITED ARAB EMIRATES','United Arab Emirates','ARE',784),('GB','UNITED KINGDOM','United Kingdom','GBR',826),('US','UNITED STATES','United States','USA',840),('UM','UNITED STATES MINOR OUTLYING ISLANDS','United States Minor Outlying Islands','',NULL),('UY','URUGUAY','Uruguay','URY',858),('UZ','UZBEKISTAN','Uzbekistan','UZB',860),('VU','VANUATU','Vanuatu','VUT',548),('VE','VENEZUELA','Venezuela','VEN',862),('VN','VIET NAM','Viet Nam','VNM',704),('VG','VIRGIN ISLANDS, BRITISH','Virgin Islands, British','VGB',92),('VI','VIRGIN ISLANDS, U.S.','Virgin Islands, U.s.','VIR',850),('WF','WALLIS AND FUTUNA','Wallis and Futuna','WLF',876),('EH','WESTERN SAHARA','Western Sahara','ESH',732),('YE','YEMEN','Yemen','YEM',887),('ZM','ZAMBIA','Zambia','ZMB',894),('ZW','ZIMBABWE','Zimbabwe','ZWE',716),('22','dffdsaf','dfdas','sdf',111);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ebook`
--

DROP TABLE IF EXISTS `ebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ebook` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `D_esc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Link` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sub_date` datetime NOT NULL,
  `license` varchar(100) NOT NULL,
  `Status` enum('Active','Inactive') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ebook`
--

LOCK TABLES `ebook` WRITE;
/*!40000 ALTER TABLE `ebook` DISABLE KEYS */;
/*!40000 ALTER TABLE `ebook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ebook_user`
--

DROP TABLE IF EXISTS `ebook_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ebook_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `bID` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `uid` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `uname` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pwd` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Active','Inactive') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ebook_user`
--

LOCK TABLES `ebook_user` WRITE;
/*!40000 ALTER TABLE `ebook_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `ebook_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_template`
--

DROP TABLE IF EXISTS `email_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_template` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `french_content` text NOT NULL,
  `german_content` text NOT NULL,
  `subject` text NOT NULL,
  `french_subject` text NOT NULL,
  `german_subject` text NOT NULL,
  `mod_date` datetime NOT NULL,
  `language` int(10) NOT NULL DEFAULT '1',
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `DeleteFlag` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_template`
--

LOCK TABLES `email_template` WRITE;
/*!40000 ALTER TABLE `email_template` DISABLE KEYS */;
INSERT INTO `email_template` VALUES (1,'Forgot Password for Member','admin@affiliworx.com','<div>\r\n	<div>\r\n		Hello xxname_of_userxx&nbsp;&nbsp;,</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		You are receiving this email because you have indicated that you have forgotten your password.</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		Your Account Information is as follows:</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		Username: xxusernamexx</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		If you want to reset your password please click here - xxloginurlxx</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		Thanks,</div>\r\n	<div>\r\n		xxsitenamexx.</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n','','','Affiliworx: Your Account Information','','','0000-00-00 00:00:00',1,'Active','No');
/*!40000 ALTER TABLE `email_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `last5day_paynot`
--

DROP TABLE IF EXISTS `last5day_paynot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `last5day_paynot` (
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `day_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stream_3_3` varchar(10) NOT NULL DEFAULT '0',
  `stream_5_3` varchar(10) NOT NULL DEFAULT '0',
  `stream_10_3` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `last5day_paynot`
--

LOCK TABLES `last5day_paynot` WRITE;
/*!40000 ALTER TABLE `last5day_paynot` DISABLE KEYS */;
/*!40000 ALTER TABLE `last5day_paynot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginlogout_detail`
--

DROP TABLE IF EXISTS `loginlogout_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginlogout_detail` (
  `loginlogout_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `login_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logout_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_active_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`loginlogout_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginlogout_detail`
--

LOCK TABLES `loginlogout_detail` WRITE;
/*!40000 ALTER TABLE `loginlogout_detail` DISABLE KEYS */;
INSERT INTO `loginlogout_detail` VALUES (1,1,'2013-01-02 11:55:49','0000-00-00 00:00:00','2013-01-02 11:55:49','d5ea8e2dbfed6d379396aa6e4c14e912'),(2,1,'2013-01-02 17:31:55','0000-00-00 00:00:00','2013-01-02 17:31:55','8b037aa0685db3fc5a28e372de144274'),(3,1,'2013-01-02 17:32:44','0000-00-00 00:00:00','2013-01-02 17:32:44','79791620a1265f37cb5c8c212c7cb16a'),(4,1,'2013-01-02 17:41:52','0000-00-00 00:00:00','2013-01-02 17:41:52','ed9f35e116e3eed83c9d2481b26a0518'),(5,1,'2013-01-03 06:17:16','0000-00-00 00:00:00','2013-01-03 06:17:16','e913681b5d111c1bbea83c9fc576beef'),(6,1,'2013-01-03 06:17:16','0000-00-00 00:00:00','2013-01-03 06:17:16','e913681b5d111c1bbea83c9fc576beef'),(7,1,'2013-01-04 03:03:18','2013-01-04 03:13:40','2013-01-04 03:03:18','2c78dfa083f62874e1cb8fec26101929'),(8,2,'2013-01-04 03:14:14','2013-01-04 05:47:41','2013-01-04 03:14:14','2c78dfa083f62874e1cb8fec26101929'),(9,2,'2013-01-04 05:48:13','2013-01-06 14:20:50','2013-01-04 05:48:13','2c78dfa083f62874e1cb8fec26101929'),(10,2,'2013-01-06 22:49:04','2013-01-07 19:48:48','2013-01-06 22:49:04','6aeac6953e51a774a62ff7bfdb23e441'),(11,1,'2013-01-07 02:47:43','0000-00-00 00:00:00','2013-01-07 02:47:43','6aeac6953e51a774a62ff7bfdb23e441');
/*!40000 ALTER TABLE `loginlogout_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_daily_payment`
--

DROP TABLE IF EXISTS `m_daily_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_daily_payment` (
  `dailypayment_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `payment_val` varchar(255) NOT NULL DEFAULT '0',
  `auto_debit` varchar(255) NOT NULL DEFAULT '0',
  `autodebit_from` varchar(100) NOT NULL DEFAULT '',
  `payment_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `you_pay` varchar(255) NOT NULL DEFAULT '0',
  `stream` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`dailypayment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_daily_payment`
--

LOCK TABLES `m_daily_payment` WRITE;
/*!40000 ALTER TABLE `m_daily_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_daily_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_earn_history`
--

DROP TABLE IF EXISTS `m_earn_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_earn_history` (
  `earn_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `earn_val` varchar(255) NOT NULL DEFAULT '0',
  `earn_from` int(11) NOT NULL DEFAULT '0',
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `earn_type` varchar(255) NOT NULL DEFAULT 'earn',
  `stream` varchar(100) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `earn_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`earn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_earn_history`
--

LOCK TABLES `m_earn_history` WRITE;
/*!40000 ALTER TABLE `m_earn_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_earn_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_inbox`
--

DROP TABLE IF EXISTS `m_inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_inbox` (
  `inbox_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_subject` varchar(255) NOT NULL,
  `msg_desc` text NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `msg_date_time` datetime NOT NULL,
  `msg_status` int(11) NOT NULL,
  `panding_review` int(11) NOT NULL DEFAULT '0',
  `urgent` int(11) NOT NULL DEFAULT '0',
  `responded` int(11) NOT NULL DEFAULT '0',
  `resolved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`inbox_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_inbox`
--

LOCK TABLES `m_inbox` WRITE;
/*!40000 ALTER TABLE `m_inbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_messages`
--

DROP TABLE IF EXISTS `m_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_subject` varchar(255) NOT NULL DEFAULT '',
  `msg_desc` text NOT NULL,
  `from_user_id` int(11) NOT NULL DEFAULT '0',
  `to_user_id` int(11) NOT NULL DEFAULT '0',
  `msg_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `msg_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_messages`
--

LOCK TABLES `m_messages` WRITE;
/*!40000 ALTER TABLE `m_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_outbox`
--

DROP TABLE IF EXISTS `m_outbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_outbox` (
  `outbox_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_subject` varchar(255) NOT NULL,
  `msg_desc` text NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `msg_date_time` datetime NOT NULL,
  `msg_status` int(11) NOT NULL,
  PRIMARY KEY (`outbox_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_outbox`
--

LOCK TABLES `m_outbox` WRITE;
/*!40000 ALTER TABLE `m_outbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_outbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_pay_history`
--

DROP TABLE IF EXISTS `m_pay_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_pay_history` (
  `payment_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `payment_val` int(11) NOT NULL DEFAULT '0',
  `balance_val` int(11) NOT NULL DEFAULT '0',
  `withdrowal_val` int(11) NOT NULL DEFAULT '0',
  `earn_val` int(11) NOT NULL DEFAULT '0',
  `earn_from_uid` int(11) NOT NULL DEFAULT '0',
  `autodebit_val` int(11) NOT NULL DEFAULT '0',
  `payment_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`payment_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_pay_history`
--

LOCK TABLES `m_pay_history` WRITE;
/*!40000 ALTER TABLE `m_pay_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_pay_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_payment_fee`
--

DROP TABLE IF EXISTS `m_payment_fee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_payment_fee` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `payment_val` int(11) NOT NULL DEFAULT '0',
  `payment_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activedeactive` varchar(15) NOT NULL DEFAULT 'active',
  `payment_done` varchar(10) NOT NULL DEFAULT 'YES',
  `activationdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_payment_fee`
--

LOCK TABLES `m_payment_fee` WRITE;
/*!40000 ALTER TABLE `m_payment_fee` DISABLE KEYS */;
INSERT INTO `m_payment_fee` VALUES (1,1,33,'2013-01-02 04:00:00','active','YES','0000-00-00 00:00:00'),(2,2,33,'2013-01-04 03:12:58','active','YES','0000-00-00 00:00:00'),(3,83,33,'2013-01-07 19:40:12','active','YES','0000-00-00 00:00:00'),(4,4,33,'2013-01-08 17:57:34','active','YES','0000-00-00 00:00:00'),(5,6,33,'2013-01-08 18:04:52','active','YES','0000-00-00 00:00:00'),(6,7,33,'2013-01-08 18:06:55','active','YES','0000-00-00 00:00:00'),(7,8,33,'2013-01-08 18:07:59','active','YES','0000-00-00 00:00:00'),(8,9,33,'2013-01-08 18:09:27','active','YES','0000-00-00 00:00:00'),(9,10,33,'2013-01-08 18:10:51','active','YES','0000-00-00 00:00:00'),(10,11,33,'2013-01-08 18:12:31','active','YES','0000-00-00 00:00:00'),(11,13,33,'2013-01-08 18:14:30','active','YES','0000-00-00 00:00:00'),(12,12,33,'2013-01-08 18:16:05','active','YES','0000-00-00 00:00:00'),(13,14,33,'2013-01-08 18:31:18','active','YES','0000-00-00 00:00:00'),(14,15,33,'2013-01-08 18:37:43','active','YES','0000-00-00 00:00:00'),(15,16,33,'2013-01-08 18:38:47','active','YES','0000-00-00 00:00:00'),(16,17,33,'2013-01-08 18:41:34','active','YES','0000-00-00 00:00:00'),(17,18,33,'2013-01-08 18:42:58','active','YES','0000-00-00 00:00:00'),(18,19,33,'2013-01-08 18:51:37','active','YES','0000-00-00 00:00:00'),(19,20,33,'2013-01-08 18:53:38','active','YES','0000-00-00 00:00:00'),(20,107,33,'2013-01-08 19:22:32','active','YES','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `m_payment_fee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_payment_fee_10_3`
--

DROP TABLE IF EXISTS `m_payment_fee_10_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_payment_fee_10_3` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `payment_val` int(11) NOT NULL DEFAULT '0',
  `payment_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activedeactive` varchar(15) NOT NULL DEFAULT 'active',
  `payment_done` varchar(10) NOT NULL DEFAULT 'YES',
  `activationdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_payment_fee_10_3`
--

LOCK TABLES `m_payment_fee_10_3` WRITE;
/*!40000 ALTER TABLE `m_payment_fee_10_3` DISABLE KEYS */;
INSERT INTO `m_payment_fee_10_3` VALUES (1,1,33,'2013-01-02 04:00:00','active','YES','0000-00-00 00:00:00'),(2,2,33,'2013-01-04 03:12:58','active','YES','0000-00-00 00:00:00'),(3,83,33,'2013-01-07 19:40:12','active','YES','0000-00-00 00:00:00'),(4,4,33,'2013-01-08 17:57:34','active','YES','0000-00-00 00:00:00'),(5,6,33,'2013-01-08 18:04:52','active','YES','0000-00-00 00:00:00'),(6,7,33,'2013-01-08 18:06:55','active','YES','0000-00-00 00:00:00'),(7,8,33,'2013-01-08 18:07:59','active','YES','0000-00-00 00:00:00'),(8,9,33,'2013-01-08 18:09:27','active','YES','0000-00-00 00:00:00'),(9,10,33,'2013-01-08 18:10:51','active','YES','0000-00-00 00:00:00'),(10,11,33,'2013-01-08 18:12:31','active','YES','0000-00-00 00:00:00'),(11,13,33,'2013-01-08 18:14:30','active','YES','0000-00-00 00:00:00'),(12,12,33,'2013-01-08 18:16:05','active','YES','0000-00-00 00:00:00'),(13,14,33,'2013-01-08 18:31:18','active','YES','0000-00-00 00:00:00'),(14,15,33,'2013-01-08 18:37:43','active','YES','0000-00-00 00:00:00'),(15,16,33,'2013-01-08 18:38:47','active','YES','0000-00-00 00:00:00'),(16,17,33,'2013-01-08 18:41:34','active','YES','0000-00-00 00:00:00'),(17,18,33,'2013-01-08 18:42:58','active','YES','0000-00-00 00:00:00'),(18,19,33,'2013-01-08 18:51:37','active','YES','0000-00-00 00:00:00'),(19,20,33,'2013-01-08 18:53:38','active','YES','0000-00-00 00:00:00'),(20,107,33,'2013-01-08 19:22:32','active','YES','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `m_payment_fee_10_3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_payment_fee_5_3`
--

DROP TABLE IF EXISTS `m_payment_fee_5_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_payment_fee_5_3` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `payment_val` int(11) NOT NULL DEFAULT '0',
  `payment_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activedeactive` varchar(15) NOT NULL DEFAULT 'active',
  `payment_done` varchar(10) NOT NULL DEFAULT 'YES',
  `activationdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_payment_fee_5_3`
--

LOCK TABLES `m_payment_fee_5_3` WRITE;
/*!40000 ALTER TABLE `m_payment_fee_5_3` DISABLE KEYS */;
INSERT INTO `m_payment_fee_5_3` VALUES (1,1,33,'2013-01-02 04:00:00','active','YES','0000-00-00 00:00:00'),(2,2,33,'2013-01-04 03:12:58','active','YES','0000-00-00 00:00:00'),(3,83,33,'2013-01-07 19:40:12','active','YES','0000-00-00 00:00:00'),(4,4,33,'2013-01-08 17:57:34','active','YES','0000-00-00 00:00:00'),(5,6,33,'2013-01-08 18:04:52','active','YES','0000-00-00 00:00:00'),(6,7,33,'2013-01-08 18:06:55','active','YES','0000-00-00 00:00:00'),(7,8,33,'2013-01-08 18:07:59','active','YES','0000-00-00 00:00:00'),(8,9,33,'2013-01-08 18:09:27','active','YES','0000-00-00 00:00:00'),(9,10,33,'2013-01-08 18:10:51','active','YES','0000-00-00 00:00:00'),(10,11,33,'2013-01-08 18:12:31','active','YES','0000-00-00 00:00:00'),(11,13,33,'2013-01-08 18:14:30','active','YES','0000-00-00 00:00:00'),(12,12,33,'2013-01-08 18:16:05','active','YES','0000-00-00 00:00:00'),(13,14,33,'2013-01-08 18:31:18','active','YES','0000-00-00 00:00:00'),(14,15,33,'2013-01-08 18:37:43','active','YES','0000-00-00 00:00:00'),(15,16,33,'2013-01-08 18:38:47','active','YES','0000-00-00 00:00:00'),(16,17,33,'2013-01-08 18:41:34','active','YES','0000-00-00 00:00:00'),(17,18,33,'2013-01-08 18:42:58','active','YES','0000-00-00 00:00:00'),(18,19,33,'2013-01-08 18:51:37','active','YES','0000-00-00 00:00:00'),(19,20,33,'2013-01-08 18:53:38','active','YES','0000-00-00 00:00:00'),(20,107,33,'2013-01-08 19:22:32','active','YES','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `m_payment_fee_5_3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_placement_req`
--

DROP TABLE IF EXISTS `m_placement_req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_placement_req` (
  `placement_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `entry` varchar(20) NOT NULL DEFAULT '',
  `entry_5_3` varchar(20) NOT NULL DEFAULT '',
  `entry_10_3` varchar(20) NOT NULL DEFAULT '',
  `inviter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`placement_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_placement_req`
--

LOCK TABLES `m_placement_req` WRITE;
/*!40000 ALTER TABLE `m_placement_req` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_placement_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_replace_request`
--

DROP TABLE IF EXISTS `m_replace_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_replace_request` (
  `replace_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `replace_u_id` int(11) NOT NULL DEFAULT '0',
  `active_u_id` int(11) NOT NULL DEFAULT '0',
  `req_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `aproval` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `by_admin` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `stream` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`replace_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_replace_request`
--

LOCK TABLES `m_replace_request` WRITE;
/*!40000 ALTER TABLE `m_replace_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_replace_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_temp_replaced_user`
--

DROP TABLE IF EXISTS `m_temp_replaced_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_temp_replaced_user` (
  `temp_rep_u_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `replace_u_id` int(11) NOT NULL DEFAULT '0',
  `node_id` int(11) NOT NULL DEFAULT '0',
  `u1` int(11) NOT NULL DEFAULT '0',
  `u2` int(11) NOT NULL DEFAULT '0',
  `u3` int(11) NOT NULL DEFAULT '0',
  `u4` int(11) NOT NULL DEFAULT '0',
  `u5` int(11) NOT NULL DEFAULT '0',
  `u6` int(11) NOT NULL DEFAULT '0',
  `u7` int(11) NOT NULL DEFAULT '0',
  `u8` int(11) NOT NULL DEFAULT '0',
  `u9` int(11) NOT NULL DEFAULT '0',
  `u10` int(11) NOT NULL DEFAULT '0',
  `rep_u_inviter_id` int(11) NOT NULL DEFAULT '0',
  `rep_by_uid` int(11) NOT NULL DEFAULT '0',
  `stream` varchar(100) NOT NULL DEFAULT '0',
  `inviteduid` text NOT NULL,
  PRIMARY KEY (`temp_rep_u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_temp_replaced_user`
--

LOCK TABLES `m_temp_replaced_user` WRITE;
/*!40000 ALTER TABLE `m_temp_replaced_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_temp_replaced_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_withdraw_history`
--

DROP TABLE IF EXISTS `m_withdraw_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_withdraw_history` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `withdraw_val` varchar(255) NOT NULL DEFAULT '0',
  `withdraw_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pay_type` varchar(100) NOT NULL DEFAULT '',
  `status` enum('NO','YES') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_withdraw_history`
--

LOCK TABLES `m_withdraw_history` WRITE;
/*!40000 ALTER TABLE `m_withdraw_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_withdraw_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_in`
--

DROP TABLE IF EXISTS `message_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_in` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `wo_a_user_id` varchar(255) NOT NULL DEFAULT '0_0',
  `token` varchar(255) NOT NULL DEFAULT '',
  `taken_status` varchar(255) NOT NULL DEFAULT '',
  `msg_sub` text NOT NULL,
  `ticket_type` varchar(50) NOT NULL,
  `msg_desc` text NOT NULL,
  `to_u_id` int(11) NOT NULL DEFAULT '0',
  `msg_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `msg_status` int(10) NOT NULL DEFAULT '1',
  `pending_status` int(10) NOT NULL DEFAULT '1',
  `priority` int(10) NOT NULL DEFAULT '0',
  `resolved_status` int(10) NOT NULL DEFAULT '0',
  `responed_status` int(10) NOT NULL DEFAULT '0',
  `delete_flg` int(11) NOT NULL DEFAULT '0',
  `del_from_uid` int(11) NOT NULL DEFAULT '0',
  `del_from_in` int(11) NOT NULL DEFAULT '0',
  `del_from_out` int(11) NOT NULL DEFAULT '0',
  `reply_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Read','Unread') NOT NULL DEFAULT 'Unread',
  `to_admin` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_in`
--

LOCK TABLES `message_in` WRITE;
/*!40000 ALTER TABLE `message_in` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nextday_earn`
--

DROP TABLE IF EXISTS `nextday_earn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nextday_earn` (
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `nextday_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stream_3_3` varchar(255) NOT NULL DEFAULT '0',
  `stream_5_3` varchar(255) NOT NULL DEFAULT '0',
  `stream_10_3` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nextday_earn`
--

LOCK TABLES `nextday_earn` WRITE;
/*!40000 ALTER TABLE `nextday_earn` DISABLE KEYS */;
/*!40000 ALTER TABLE `nextday_earn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nextday_pay`
--

DROP TABLE IF EXISTS `nextday_pay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nextday_pay` (
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `nextday_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stream_3_3` varchar(255) NOT NULL DEFAULT '0',
  `stream_5_3` varchar(255) NOT NULL DEFAULT '0',
  `stream_10_3` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nextday_pay`
--

LOCK TABLES `nextday_pay` WRITE;
/*!40000 ALTER TABLE `nextday_pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `nextday_pay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nodetree`
--

DROP TABLE IF EXISTS `nodetree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nodetree` (
  `nodetree_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `u1` int(11) NOT NULL DEFAULT '0',
  `u2` int(11) NOT NULL DEFAULT '0',
  `u3` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nodetree_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nodetree`
--

LOCK TABLES `nodetree` WRITE;
/*!40000 ALTER TABLE `nodetree` DISABLE KEYS */;
INSERT INTO `nodetree` VALUES (1,1,2,83,4),(2,2,6,9,13),(3,83,7,10,12),(4,4,8,11,14),(5,6,15,0,0),(6,9,16,107,0),(7,13,17,0,0),(8,8,18,0,0),(9,11,19,0,0),(10,14,20,0,0);
/*!40000 ALTER TABLE `nodetree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nodetree_10_3`
--

DROP TABLE IF EXISTS `nodetree_10_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nodetree_10_3` (
  `nodetree_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `u1` int(11) NOT NULL DEFAULT '0',
  `u2` int(11) NOT NULL DEFAULT '0',
  `u3` int(11) NOT NULL DEFAULT '0',
  `u4` int(11) NOT NULL DEFAULT '0',
  `u5` int(11) NOT NULL DEFAULT '0',
  `u6` int(11) NOT NULL DEFAULT '0',
  `u7` int(11) NOT NULL DEFAULT '0',
  `u8` int(11) NOT NULL DEFAULT '0',
  `u9` int(11) NOT NULL DEFAULT '0',
  `u10` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nodetree_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nodetree_10_3`
--

LOCK TABLES `nodetree_10_3` WRITE;
/*!40000 ALTER TABLE `nodetree_10_3` DISABLE KEYS */;
INSERT INTO `nodetree_10_3` VALUES (1,1,2,83,4,6,7,8,9,10,11,13),(2,2,12,0,0,0,0,0,0,0,0,0),(3,83,14,0,0,0,0,0,0,0,0,0),(4,4,15,0,0,0,0,0,0,0,0,0),(5,6,16,0,0,0,0,0,0,0,0,0),(6,7,17,0,0,0,0,0,0,0,0,0),(7,8,18,0,0,0,0,0,0,0,0,0),(8,9,19,107,0,0,0,0,0,0,0,0),(9,10,20,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `nodetree_10_3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nodetree_5_3`
--

DROP TABLE IF EXISTS `nodetree_5_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nodetree_5_3` (
  `nodetree_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `u1` int(11) NOT NULL DEFAULT '0',
  `u2` int(11) NOT NULL DEFAULT '0',
  `u3` int(11) NOT NULL DEFAULT '0',
  `u4` int(11) NOT NULL DEFAULT '0',
  `u5` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nodetree_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nodetree_5_3`
--

LOCK TABLES `nodetree_5_3` WRITE;
/*!40000 ALTER TABLE `nodetree_5_3` DISABLE KEYS */;
INSERT INTO `nodetree_5_3` VALUES (1,1,2,83,4,6,7),(2,2,8,12,18,0,0),(3,83,9,14,19,0,0),(4,4,10,15,20,0,0),(5,6,11,16,0,0,0),(6,7,13,17,0,0,0),(7,9,107,0,0,0,0);
/*!40000 ALTER TABLE `nodetree_5_3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) NOT NULL,
  `to_uid` int(11) NOT NULL,
  `sub` text NOT NULL,
  `msg` text NOT NULL,
  `all_user` enum('yes','no') NOT NULL DEFAULT 'no',
  `notification` enum('on','off') NOT NULL DEFAULT 'on',
  `is_read` enum('yes','no') NOT NULL DEFAULT 'no',
  `priority` int(2) NOT NULL DEFAULT '1',
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_content`
--

DROP TABLE IF EXISTS `page_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_content` (
  `Pag_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pag_Title` varchar(150) NOT NULL,
  `Pag_Desc` text NOT NULL,
  `Pag_MetaKeyword` varchar(250) NOT NULL,
  `Pag_MetaDesc` varchar(250) NOT NULL,
  `Parent_Id` int(11) NOT NULL,
  `Pag_Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `Pag_DeleteFlag` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`Pag_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_content`
--

LOCK TABLES `page_content` WRITE;
/*!40000 ALTER TABLE `page_content` DISABLE KEYS */;
INSERT INTO `page_content` VALUES (1,'About Us','<font style=\"font-family: Arial, Verdana; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal;\" color=\"#000000\">Edit about us</font><p style=\"font-family: Arial, Verdana; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal;\"></p><font face=\"courier new, courier, monospace\"><span style=\"font-size: 12px;\">&nbsp;</span></font><iframe src=\"http://www.slideshare.net/slideshow/embed_code/15763974\" marginwidth=\"0\" marginheight=\"0\" frameborder=\"0\" height=\"400\" scrolling=\"no\" width=\"476\"></iframe>','About Us','About Us',1,'Active','No'),(2,'Home Page','Typed under Home page <br>','Affiliworx','Affiliworx',1,'Active','No'),(3,' Creative Ideas','Creative Ideas<br>Creative Ideas<br>&nbsp;Creative Ideas<br><br>&nbsp;Creative Ideas<br><h2 class=\"color1\">Creative Ideas<br></h2>Creative Ideas<br>Creative Ideas<br>Creative Ideas<br>&nbsp;Creative Ideas<br>\r\n\r\n<iframe src=\"http://www.slideshare.net/slideshow/embed_code/15798172?rel=0\" width=\"427\" height=\"356\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" style=\"border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px\" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe> <div style=\"margin-bottom:5px\"> <strong> <a href=\"http://www.slideshare.net/geneducators/gen-founders\" title=\"Gen Educators\" target=\"_blank\">Gen Educators</a> </strong> from <strong><a href=\"http://www.slideshare.net/geneducators\" target=\"_blank\">geneducators</a></strong> </div>','meta','meta descrip',1,'Active','No'),(4,'Professional Research','Professional Research								\r\n',' ',' ',0,'Active','No'),(5,'Company Policies','<p align=\"center\">\r\n	<strong>Affilworx Policies &amp; Procedures</strong></p>\r\n<p>\r\n	<strong>Index</strong></p>\r\n<ol><li>\r\n		<strong>Privacy Policy</strong></li><li>\r\n		<strong>Refund Policy</strong></li><li>\r\n		<strong>eWallet Policy</strong></li><li>\r\n		<strong>Subscription Policy</strong></li><li>\r\n		<strong>Cancelation Policy</strong></li><li>\r\n		<strong>Earnings Disclaimer</strong></li><li>\r\n		<strong>Code of Conduct</strong></li></ol>\r\n<p align=\"center\">\r\n	<strong>Privacy Policy</strong></p>\r\n<p>\r\n	<strong>How We Use Your Information</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Affiliworx.com respects your privacy. We do not sell, rent or pass on \r\nany personal information about our clients to any third party.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	We use the information you provide about yourself when requesting \r\ninformation to complete that information request. We do not share this \r\ninformation with outside parties, except to the extent necessary to \r\ncomplete the information request.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Affilworx.com contains links to other sites. We are not responsible for\r\n the privacy practices or the content of such websites. This privacy \r\ndocument applies only to Affiliworx.com.â€¨</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Our Commitment to Childrenâ€™s Privacy</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	We never collect or maintain information at our website from those we \r\nactually know are under 18, and no part of our website is structured to \r\nattract anyone under 18 years of age.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>How to Access and/or Correct Your Information</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	You have visual access, through your back office, to all the personally identifiable information that we collect online.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	You can correct factual errors in your personally identifiable \r\ninformation by sending us a request that credibly shows error, via \r\nâ€œMessagesâ€ in your Affiliworx Back Office.&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	To protect your privacy and security, we will also take reasonable \r\nsteps to verify your identity before granting access or making \r\ncorrections.â€¨â€¨We use these procedures to better safeguard your \r\ninformation.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Our Commitment to Data Security</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	To prevent unauthorized access, maintain data accuracy, and ensure the \r\ncorrect use of information, we have put in place appropriate physical, \r\nelectronic, and managerial procedures to safeguard and secure the \r\ninformation we collect online.â€¨</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p align=\"center\">\r\n	<strong>Refund Policy</strong></p>\r\n<p>\r\n	We have a â€œNo Refundâ€ Policy.&nbsp; Membership fees are Non-Refundable.<br>\r\n	&nbsp;</p>\r\n<p align=\"center\">\r\n	<strong>eWallet Policy</strong></p>\r\n<p>\r\n	Your eWallet funds may never to be drawn below $70, using any of the following actions. &nbsp;&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<ol><li>\r\n		Withdrawalsâ€¨</li><li>\r\n		Member to Member Transfers</li><li>\r\n		Upgrades or to Join Any of Our Other Income Streams</li></ol>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Note:</strong> Any eWallet funds that you transfer to another member immediately become the property of the member who receives the funds.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Withdrawal Stipulations:</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<ol><li>\r\n		Withdrawals must be a minimum of $10</li><li>\r\n		NetSpend Process Completed &amp; Rebate Received</li><li>\r\n		Your Affiliworx â€œ$5 every 5 daysâ€ Subscription must be Set Up</li></ol>\r\n<p>\r\n	&nbsp;</p>\r\n<p align=\"center\">\r\n	<strong>Subscription Policy</strong></p>\r\n<p>\r\n	We are a Daily Subscription Membership program, therefore, as long as \r\nthere are funds enough to cover your subscription fees, in your eWallet,\r\n your Daily Membership Subscription Fees will be automatically withdrawn\r\n on a daily basis.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Each of our 3 Income Streams, all have their own Daily Membership \r\nSubscription Fee.&nbsp; To earn Daily Commissions on the â€œPaying Membersâ€ in \r\nyour Matrices, in any of the 3 Income Streams, your own Daily Membership\r\n Subscription Fee must be paid on that particular day and for that \r\nparticular Income Stream.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	If you are not actively building your business and / or your eWallet \r\nfunds should ever drop to less than what your Daily Membership Fees \r\namount to, you will have the option of paying every 5th day rather than \r\ndaily.&nbsp; This â€œEvery 5th Day Subscriptionâ€ will keep your membership \r\nactive and in good standing and retain your position in your matrices.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Subscription Set Up may be required in order to participate in any given promotion that we may offer.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Note</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	If you are paying your Membership Subscription Fee every 5th day, \r\nrather than daily, for any particular Income Stream, you will NOT earn \r\ncommissions, in that Income Stream, on the 4 days in between payments.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	In addition, you only earn commissions on members who have paid their \r\nMemberships Fees on that particular day and for that particular Income \r\nStream.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	In other words, if you have members within any of your matrices who are\r\n paying every 5th day, rather than daily, you will only earn commissions\r\n on them, on the days that they pay their Membership Fee for that \r\nparticular Matrix and NOT on the 4 days in between their payments.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Therefore, every member shall have a Subscription with one of our two \r\npayment processors (AlertPay or SolidTrustPay), for each Income Stream \r\nthey choose to participate in. These Subscriptions will be set up to \r\nfund their eWallet every 5th day to cover their Membership Fees for any \r\nof the 3 Income Streams they may be participating in. These â€œEvery 5th \r\nDay Subscriptionsâ€ are required of everyone, whether they have an \r\nexisting eWallet balance or not.</p>\r\n<p>\r\n	â€¨â€¨</p>\r\n<p align=\"center\">\r\n	<strong>Cancelation Policy</strong></p>\r\n<p>\r\n	<br>\r\n	Should you choose to cancel your membership, you simply send in an \r\neMail to cancelations@affiliworx.org from the eMail address we have on \r\nrecord for you in your profile. Please put â€œCancel My Membershipâ€ in the\r\n Subject Line and a brief note in the body of the eMail indicating you \r\nwould like to cancel your account with us.</p>\r\n<p>\r\n	Please feel free to share with us your reason for cancelling. This will help us better serve our membership base in the future.</p>\r\n<p>\r\n	Should you wish to no longer receive our eMails, simply look at bottom \r\nof any eMail you receive from us and click on â€œUnsubscribeâ€, and you \r\nwill automatically be unsubscribed from our eMail list.</p>\r\n<p>\r\n	If you have more than one account with us and wish to cancel more than \r\none or all of your accounts, please follow the procedure above for each \r\nindividual account.<br>\r\n	<br>\r\n	Any eWallet funds / earned commissions, which are the direct result of \r\nâ€œFree Weeksâ€, are NOT redeemable upon cancellation of your membership.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	â€œFree Weeksâ€ are defined as the first week your Matrices are active, as\r\n well as any â€œPromotional Free Weeksâ€ you may have received due to a \r\nspecial promotion. &nbsp;Any eWallet funds earned based on the â€œZero \r\nSponsoredâ€ feature of our compensation plan, are NOT redeemable upon \r\ncancellation.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p align=\"center\">\r\n	<strong>Earnings Disclaimer</strong></p>\r\n<p>\r\n	Any earnings or income statements, or earnings or income examples \r\nassociated with Affiliworx.com, are only estimates of what you could \r\nearn.&nbsp; There is no guarantee of income.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Whenever specific income figures have been used and attributed to an \r\nindividual or business, those persons or businesses have earned that \r\namount.&nbsp; There is no guarantee that you will have the same results.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Any and all claims or representations, as to income earnings on this website, are not to be considered as average earnings.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	There can be no assurance that any prior successes, or past results, as\r\n to income earnings, can be used as an indication of your future success\r\n or results.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Monetary and income results are based on many factors. We have no way \r\nof knowing how well you will do, as we do not know you, your background,\r\n your work ethic, or your business skills or practices. Therefore we do \r\nnot guarantee or imply any income or that you will qualify for any \r\nincentives or prizes that may be offered.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Internet business and earnings derived there from, have unknown risks \r\ninvolved, and are not suitable for everyone. Making decisions based on \r\nany information presented in our products, services, or website, should \r\nbe done only with the knowledge that you could your initial investment \r\nand not realize any income.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	All products and services by our company are for educational and \r\ninformational purposes only. Use caution and seek the advice of \r\nqualified professionals. Check with your accountant, lawyer, or \r\nprofessional advisor, before acting on this or any information.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Users of our products, services and website are advised to do their own\r\n due diligence when it comes to making business decisions and all \r\ninformation, products, and services that have been provided should be \r\nindependently verified by our own qualified professionals.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Our information, products, and services on this website should be \r\ncarefully considered and evaluated, before reaching a business decision,\r\n on whether to rely on them. All disclosures and disclaimers made herein\r\n on our site, apply equally to any offers, prizes, or incentives, which \r\nmay be made by our company.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	You agree that our company is not responsible for the success or \r\nfailure of your business decisions relating to any information presented\r\n by our company, or by our companyâ€™s products or services.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p align=\"center\">\r\n	<strong>Code of Conduct</strong></p>\r\n<p>\r\n	<br>\r\n	No solicitation of current team members to take additional positions \r\nusing friends, family or company names, will be tolerated. &nbsp;This is \r\ncalled â€œcross recruitingâ€, and is grounds for termination, which will \r\nresult in a loss of all eWallet commissions. &nbsp; This applies to any and \r\nall additional positions held by this person, either singularly or \r\njointly.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	The person who is found to have taken multiple positions, outside of \r\ntheir original sponsorâ€™s organization, could be terminated and could \r\nlose all of their eWallet commissions. &nbsp;This would apply to any and all \r\nadditional positions held by this person either singularly or jointly.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>For further information, relating to any of these matters, click on â€œContact Usâ€.</strong></p>','Company Policies','Company Policies',0,'Active','No'),(6,'Term of service','<p style=\"font-weight: normal;\">\r\n	<strong>Updated January 2013</strong></p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	Terms of Service Contents</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	1. Introduction</p>\r\n<p style=\"font-weight: normal;\">\r\n	2. Information on the Website</p>\r\n<p style=\"font-weight: normal;\">\r\n	3. Trade Marks</p>\r\n<p style=\"font-weight: normal;\">\r\n	4. External Links</p>\r\n<p style=\"font-weight: normal;\">\r\n	5. Public forums and User Submissions</p>\r\n<p style=\"font-weight: normal;\">\r\n	6. Specific Use</p>\r\n<p style=\"font-weight: normal;\">\r\n	7. Warranties</p>\r\n<p style=\"font-weight: normal;\">\r\n	8. Disclaimer of Liability</p>\r\n<p style=\"font-weight: normal;\">\r\n	9. Use of the Website</p>\r\n<ol style=\"font-weight: normal;\"><li>\r\n		General</li></ol>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<ol style=\"font-weight: normal;\"><li>\r\n		<strong>Introduction</strong></li></ol>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	The Website Owner, including subsidiaries and affiliates (â€œWebsiteâ€ or \r\nâ€œWebsite Ownerâ€ or â€œweâ€ or â€œusâ€ or â€œourâ€) provides the information \r\ncontained on this website or any of the pages comprising the website \r\n(â€œwebsiteâ€) to visitors (â€œvisitorsâ€) (cumulatively referred to as â€œyouâ€ \r\nor â€œyourâ€ hereinafter) subject to the terms and conditions set out in \r\nthese website terms and conditions, the privacy policy and any other \r\nrelevant terms and conditions, policies and notices which may be \r\napplicable to a specific section or module of this website.</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	<strong>2. Information on the Website</strong>â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	Whilst every effort is made to update the information contained on this\r\n website, neither the Website Owner nor any third party or data or \r\ncontent provider make any representations or guarantees, whether \r\nexpress, implied in law or residual, as to the sequence, accuracy, \r\ncompleteness or reliability of information, opinions, any potential \r\nearnings, research information, data and/or content contained on the \r\nwebsite (including but not limited to any information which may be \r\nprovided by any third party or data or content providers) \r\n(â€œinformationâ€) and shall not be bound in any manner by any information \r\ncontained on the website. The Website Owner reserves the right at any \r\ntime to change or discontinue without notice, any aspect or feature of \r\nthis website, compensation plan or terms of service. No information \r\nshall be construed as advice and information is offered for information \r\npurposes only. You rely on the information contained on this website at \r\nyour own risk. If you find an error or omission at this site, please let\r\n us know.</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	<strong>3. Trade Marks</strong>â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	The trade marks, names, logos and service marks (collectively â€œtrade \r\nmarksâ€) displayed on this website are registered and unregistered trade \r\nmarks of the Website Owner. Nothing contained on this website should be \r\nconstrued as granting any license or right to use any trade mark without\r\n the prior written permission of the Website Owner.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	<strong>4. External Links</strong>â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	External links may be provided for your convenience, but they are \r\nbeyond the control of the Website Owner and no representation is made as\r\n to their content. Use or reliance on any external links and the content\r\n thereon provided is at your own risk. When visiting external links you \r\nmust refer to that external websites terms and conditions of use. No \r\nhypertext links shall be created from any website controlled by you or \r\notherwise to this website without the express prior written permission \r\nof the Website Owner.&nbsp; â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	<strong>5. Public Forums and User Submissions</strong>â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	The Website Owner is not responsible for any material submitted to the \r\npublic areas by you (which include bulletin boards, hosted pages, chat \r\nrooms, or any other public area found on the website. Any material \r\n(whether submitted by you or any other user) is not endorsed, reviewed \r\nor approved by the Website Owner. The Website Owner reserves the right \r\nto remove any material submitted or posted by you in the public areas, \r\nwithout notice to you, if it becomes aware and determines, in its sole \r\nand absolute discretion that you are or there is the likelihood that you\r\n may, including but not limited to -â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	5.1 defame, abuse, harass, stalk, threaten or otherwise violate the rights of other users or any third parties;â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	5.2 publish, post, distribute or disseminate any defamatory, obscene, indecent or unlawful material or information;â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	5.3 post or upload files that contain viruses, corrupted files or any \r\nother similar software or programs that may damage the operation of the \r\nWebsite Ownerâ€™s and/or a third partyâ€™s computer system and/or network;â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	5.4 violate any copyright, trade mark, other applicable Trinidad ad Tobago, or \r\ninternational laws or intellectual property rights of the Website Owner \r\nor any other third party;â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	5.5 submit contents containing marketing or promotional material which is intended to solicit business.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	<strong>6. Specific Use</strong>â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	You further agree not to use the website or any email addresses&nbsp; or \r\nphone lines associated with this website to send or post any message or \r\nmaterial that is unlawful, harassing, defamatory, abusive, indecent, \r\nthreatening, harmful, vulgar, obscene, sexually orientated, racially \r\noffensive, profane, pornographic or violates any applicable law; and you \r\nhereby indemnify the Website Owner against any loss, liability, damage \r\nor expense of whatever nature which the Website Owner or any third party\r\n may suffer which is caused by or attributable to, whether directly or \r\nindirectly, your use of the website to send or post any such message or \r\nmaterial; and your membership will be immediately terminated.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	<strong>7. Warranties</strong>â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	The Website Owner makes no representations, statements or guarantees \r\n(whether express, implied in law or residual) regarding the website, the\r\n information contained on the website, your personal information or \r\nmaterial and information transmitted over our system.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	<strong>8. Disclaimer of Liability</strong>â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	The Website Owner shall not be responsible for and disclaims all \r\nliability for any loss, liability, damage (whether direct, indirect or \r\nconsequential), personal injury or expense of any nature whatsoever \r\nwhich may be suffered by you or any third party (including your \r\ncompany), as a result of or which may be attributable, directly or \r\nindirectly, to your access and use of the website, any information \r\ncontained on the website, your or your companyâ€™s personal information or\r\n material and information transmitted over our system. In particular, \r\nneither the Website Owner nor any third party or data or content \r\nprovider shall be liable in any way to you or to any other person, firm \r\nor corporation whatsoever for any loss, liability, damage (whether \r\ndirect or consequential), personal injury or expense of any nature \r\nwhatsoever arising from any delays, inaccuracies, errors in, or omission\r\n of any commission statements or the transmission thereof, or for any \r\nactions taken in reliance thereon or occasioned thereby or by reason of \r\nnon-performance or interruption, or termination thereof.</p>\r\n<p style=\"font-weight: normal;\">&nbsp; &nbsp;</p><p><span style=\"font-weight: bold;\">9.&nbsp;Use of the Website</span></p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	The Website Owner does not guarantee or represent that information on \r\nthe website is appropriate for use in any jurisdiction. By accessing the\r\n website, you warrant and represent to the Website Owner that you are \r\nlegally entitled to do so and to make use of information made available \r\nvia the website.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	<strong>10. General</strong>â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.1 Entire Agreement: These website terms and conditions constitute \r\nthe sole record of the agreement between you and the Website Owner in \r\nrelation to your use of the website. Neither you nor the Website Owner \r\nshall be bound by any express tacit or implied representation, \r\nguarantee, promise or the like not recorded herein. Unless otherwise \r\nspecifically stated these website terms and conditions supersede and \r\nreplace all prior commitments, undertakings or representations, whether \r\nwritten or oral, between you and the Website Owner in respect of your \r\nuse of the website.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.2 Alteration: The Website Owner may at any time modify any relevant \r\nterms and conditions, policies or notices. You acknowledge that by \r\nvisiting the website from time to time, you shall become bound to the \r\ncurrent version of the relevant terms and conditions (the â€œcurrent \r\nversionâ€) and, unless stated in the current version, all previous \r\nversions shall be superseded by the current version. You shall be \r\nresponsible for reviewing the then current version each time you visit \r\nthe website.</p>\r\n<p style=\"font-weight: normal;\">\r\n	â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.3 Conflict: Where any conflict or contradiction appears between the \r\nprovisions of these website terms and conditions and any other relevant \r\nterms and conditions, policies or notices, the other relevant terms and \r\nconditions, policies or notices which relate specifically to a \r\nparticular section or module of the website shall prevail in respect of \r\nyour use of the relevant section or module of the website.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.4 Waiver: No indulgence or extension of time which either you or the\r\n Website Owner may grant to the other will constitute a waiver of or, \r\nwhether by estoppel or otherwise, limit any of the existing or future \r\nrights of the grantor in terms hereof, save in the event or to the \r\nextent that the grantor has signed a written document expressly waiving \r\nor limiting such rights.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.5 Cession: The Website Owner shall be entitled to cede, assign and \r\ndelegate all or any of its rights and obligations in terms of any \r\nrelevant terms and conditions, policies and notices to any third party.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.6&nbsp;Sever-ability: All provisions of any relevant terms and \r\nconditions, policies and notices are, notwithstanding the manner in \r\nwhich they have been grouped together or linked grammatically, severable\r\n from each other. Any provision of any relevant terms and conditions, \r\npolicies and notices, which is or becomes unenforceable in any \r\njurisdiction, whether due to voidness, invalidity, illegality, \r\nunlawfulness or for any reason whatever, shall, in such jurisdiction \r\nonly and only to the extent that it is so unenforceable, be treated as \r\npro non script and the remaining provisions of any relevant terms and \r\nconditions, policies and notices shall remain in full force and effect.â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.7 Applicable Laws: Any relevant terms and conditions, policies and \r\nnotices shall be governed by and construed in accordance with the laws \r\nof Trinidad and Tobago without giving effect to any principles of conflict of \r\nlaw. You hereby consent to abide by all laws in respect to any disputes \r\narising in connection with the website, or any relevant terms and \r\nconditions, policies and notices or any matter related to or in \r\nconnection therewith.â€¨â€¨</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.8 Consent: Consent to use any verbal or written testimony is implied\r\n by virtue of you sharing of it.&nbsp; Conference calls and webinars are \r\nrecorded.</p>\r\n<p style=\"font-weight: normal;\">\r\n	&nbsp;</p>\r\n<p style=\"font-weight: normal;\">\r\n	10.9 Comments or Questions: If you have any questions, comments or \r\nconcerns arising from the website, the privacy policy or any other \r\nrelevant terms and conditions, policies and notices or the way in which \r\nwe are handling your personal information please contact us.</p>','Term of service','Term of service',0,'Active','No'),(7,'Welcome','<div>&nbsp;<span style=\"color: rgb(59, 59, 59); font-family: Georgia, serif; line-height: 115%; text-align: justify;\">Welcome\r\nto GENEducators.</span><span style=\"color: rgb(59, 59, 59); font-family: Georgia, serif; line-height: 115%; text-align: justify;\"> </span><span style=\"color: rgb(59, 59, 59); font-family: Georgia, serif; line-height: 115%; text-align: justify;\">&nbsp;</span></div>\r\n\r\n<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:115%\"><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">&nbsp;</span></p>\r\n\r\n<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:115%\"><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">Your\r\nuser-information has been entered. &nbsp;Your Referral Link is:<o:p></o:p></span></p>\r\n\r\n<p style=\"margin-bottom:12.0pt;text-align:justify;line-height:115%\"><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">We\r\ninvite you to complete your registration process and secure your position in\r\nthe matrix, by making payment and forwarding relevant proof within five (5)\r\ndays, via email to: <a href=\"mailto:info@genliberation.com\">info@genliberation.com</a><o:p></o:p></span></p>\r\n\r\n<p style=\"margin-bottom:12.0pt;text-align:justify;line-height:115%\"><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">Please\r\nbe advised that your information will automatically be removed from the system\r\nif payment is not made and relevant proof of payment submitted within the five\r\n(5) day period.<o:p></o:p></span></p>\r\n\r\n<p style=\"margin-bottom:12.0pt;text-align:justify;line-height:115%\"><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">We\r\ninvite you to use any of the following payment options:<o:p></o:p></span></p>\r\n\r\n<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:115%\"><b><u><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">Bank\r\nWire Transfer:<o:p></o:p></span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">Bank Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wells\r\nFargo Bank<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">Bank Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; International Operations<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-top:0in;margin-right:0in;margin-bottom:0in;\r\nmargin-left:1.0in;margin-bottom:.0001pt;text-align:justify;text-indent:.5in\"><span style=\"color:#0000CC\">P.O. Box 13860, Philadelphia, Pennsylvania,<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-top:0in;margin-right:0in;margin-bottom:0in;\r\nmargin-left:1.0in;margin-bottom:.0001pt;text-align:justify;text-indent:.5in\"><span style=\"color:#0000CC\">Zip Code 19101-3386<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-top:0in;margin-right:0in;margin-bottom:0in;\r\nmargin-left:1.0in;margin-bottom:.0001pt;text-align:justify;text-indent:.5in\"><span style=\"color:#0000CC\">USA<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">Swift Code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PNBPUS3NNYC<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">For Credit to:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; First Citizens Bank Limited<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hollis\r\n&amp; Woodford Streets, Arima, Trinidad and Tobago<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">Swift Code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FCTTTTPS<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">For Further Credit<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">To account No.&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2090624<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">Account Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Global Empowerment Network Limited<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify\"><span style=\"color:#0000CC\">Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dutch\r\nFort, Scarborough, Tobago<o:p></o:p></span></p>\r\n\r\n<p align=\"center\" style=\"margin:0in;margin-bottom:.0001pt;text-align:center;\r\nline-height:115%\"><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:=\"\" arial;color:#3b3b3b;mso-bidi-font-weight:bold\"=\"\">Please forward a copy of the\r\ntransaction receipt via email to <a href=\"mailto:info@genliberation.com\">info@genliberation.com</a><o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><o:p>&nbsp;</o:p></p>\r\n\r\n<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:115%\"><b><u><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">Bank\r\nDeposit in Trinidad and Tobago<o:p></o:p></span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Bank Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; First\r\nCitizens Bank Limited<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Account No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2090623\r\n(TT Currency)<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>OR<o:p></o:p></u></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2090624\r\n(US Currency)<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Account Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Global\r\nEmpowerment Network Limited<o:p></o:p></span></p>\r\n\r\n<p align=\"center\" style=\"margin:0in;margin-bottom:.0001pt;text-align:center;\r\nline-height:115%\"><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:=\"\" arial;color:#3b3b3b;mso-bidi-font-weight:bold\"=\"\">Please forward a copy of the\r\ndeposit receipt/slip to the Office or via email to <a href=\"mailto:info@genliberation.com\">info@genliberation.com</a><o:p></o:p></span></p>\r\n\r\n<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:115%\"><b><u><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">&nbsp;</span></u></b></p>\r\n\r\n<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:115%\"><b><u><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">Payza<o:p></o:p></span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\"><a href=\"mailto:kbtservant@yahoo.co.uk\">kbtservant@yahoo.co.uk</a><o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\">Please ensure that you forward a copy of the\r\ntransaction/payza receipt to <a href=\"mailto:info@genliberation.com\">info@genliberation.com</a><o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\">In the subject area, please insert your name and username\r\nwhich you entered when you enrolled.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\"><o:p>&nbsp;</o:p></p>\r\n\r\n<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:115%\"><b><u><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">MoneyGram<o:p></o:p></span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Darelle\r\nGrant<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mt.\r\nPelier Trace<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Glen\r\nRoad<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scarborough<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trinidad\r\nand Tobago, W.I.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 18687216554<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\">Please ensure that you forward a copy of the\r\ntransaction/receipt to <a href=\"mailto:info@genliberation.com\">info@genliberation.com</a><o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\">In the subject area, please insert your name and username\r\nwhich you entered when you enrolled.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\"><o:p>&nbsp;</o:p></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\"><o:p>&nbsp;</o:p></p>\r\n\r\n<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:115%\"><b><u><span style=\"font-family:\" georgia\",\"serif\";mso-bidi-font-family:arial;color:#3b3b3b\"=\"\">Western\r\nUnion<o:p></o:p></span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lois\r\nWilliams-Moore<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 27\r\nReid Lane<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dabadie<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Arima<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trinidad\r\nand Tobago, W.I.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><span style=\"color:#0000CC\">Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 18686782619<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\">Please ensure that you forward a copy of the\r\ntransaction/receipt to <a href=\"mailto:info@genliberation.com\">info@genliberation.com</a><o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\">In the subject area, please insert the Western Union MTCN\r\nCode, <o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\ntext-align:center\">your name and username which you entered when you enrolled.<o:p></o:p></p><font face=\"Arial, Verdana\"><span style=\"font-size: 12px;\"><left></left></span></font>','welcom','welcom',0,'Active','No'),(8,'Pay Plan',' ','pay plan','pay plan',0,'Active','No'),(9,'Webinars/Calls','<!-- BEGIN ProvideSupport.com No-Script Code -->\r\n<a href=\"http://messenger.providesupport.com/messenger/0eesnosom64bt01pvcy5dphiow.html\" target=\"_blank\"><img src=\"http://image.providesupport.com/image/0eesnosom64bt01pvcy5dphiow/current\" border=\"0\"></a><br><br><br><!-- END ProvideSupport.com No-Script Code -->\r\n\r\n<iframe src=\"http://www.slideshare.net/slideshow/embed_code/15858479\" width=\"476\" height=\"400\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\"></iframe>\r\n\r\n<!-- copy and paste. Modify height and width if desired. -->\r\n       <object id=\"scPlayer\"  width=\"640\" height=\"480\" type=\"application/x-shockwave-flash\" data=\"http://content.screencast.com/users/mcmmarketing/folders/Genliberation/media/443782bf-8c4a-450c-8f07-53364ad65d0c/scplayer.swf\" >\r\n<param name=\"movie\" value=\"http://content.screencast.com/users/mcmmarketing/folders/Genliberation/media/443782bf-8c4a-450c-8f07-53364ad65d0c/scplayer.swf\" />\r\n<param name=\"quality\" value=\"high\" />\r\n<param name=\"bgcolor\" value=\"#FFFFFF\" />\r\n<param name=\"flashVars\" value=\"thumb=http://content.screencast.com/users/mcmmarketing/folders/Genliberation/media/443782bf-8c4a-450c-8f07-53364ad65d0c/FirstFrame.jpg&containerwidth=640&containerheight=480&xmp=sc.xmp&content=http://content.screencast.com/users/mcmmarketing/folders/Genliberation/media/443782bf-8c4a-450c-8f07-53364ad65d0c/Untitled.mp4&blurover=false\" />\r\n<param name=\"allowFullScreen\" value=\"true\" />\r\n<param name=\"scale\" value=\"showall\" />\r\n<param name=\"allowScriptAccess\" value=\"always\" />\r\n<param name=\"base\" value=\"http://content.screencast.com/users/mcmmarketing/folders/Genliberation/media/443782bf-8c4a-450c-8f07-53364ad65d0c/\" />\r\n<iframe type=\"text/html\" frameborder=\"0\" scrolling=\"no\" style=\"overflow:hidden;\" src=\"http://www.screencast.com/users/mcmmarketing/folders/Genliberation/media/443782bf-8c4a-450c-8f07-53364ad65d0c/embed\" height=\"480\" width=\"640\" ></iframe>\r\n</object> ','webinars','calls',0,'Active','No'),(10,'Admin welcome','Typed about Welcome Administrator<br>','adminwelcome','adminwelcome',0,'Active','No'),(11,'Thank You','Thank you for registering with Geneducators. <br><br>You have already received a confirmation email which will activate your position and place you in the matrices of your inviter. If you do not see your email confirmation check your spam area of your email. If you still do not see this information you can register again with a different email this willÂ  not be a double sign up as you have not been activated unless you click on the confirmation email.<br><br>Thank you and enjoy your Gen Educators experience.','Thanks','thanks',0,'Active','No');
/*!40000 ALTER TABLE `page_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_userdetail`
--

DROP TABLE IF EXISTS `pre_userdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_userdetail` (
  `UserId` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `BirthDate` date NOT NULL,
  `suffix` varchar(100) NOT NULL DEFAULT '',
  `ssn` varchar(255) NOT NULL DEFAULT '',
  `POB` varchar(100) NOT NULL,
  `POC` varchar(100) NOT NULL,
  `CountryId` int(10) NOT NULL,
  `Mothername` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(255) NOT NULL DEFAULT '0',
  `Cellphone` varchar(255) NOT NULL DEFAULT '0',
  `Addressl1` varchar(250) NOT NULL,
  `Addressl2` varchar(250) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Zipcode` int(10) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `login` varchar(255) NOT NULL DEFAULT '',
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `inviter` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `entry` varchar(255) NOT NULL DEFAULT '',
  `usercode` int(11) NOT NULL DEFAULT '0',
  `usercode_5_3` int(11) NOT NULL DEFAULT '0',
  `entry_5_3` varchar(255) NOT NULL DEFAULT '',
  `inviter_5_3` int(11) NOT NULL DEFAULT '0',
  `usercode_10_3` int(11) NOT NULL DEFAULT '0',
  `entry_10_3` varchar(255) NOT NULL DEFAULT '',
  `inviter_10_3` int(11) NOT NULL DEFAULT '0',
  `Sponser` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `Placement` varchar(100) NOT NULL DEFAULT '',
  `Stream` varchar(10) NOT NULL DEFAULT '0',
  `scheme` varchar(255) NOT NULL DEFAULT '',
  `stp` varchar(255) NOT NULL DEFAULT '',
  `ap` varchar(255) NOT NULL DEFAULT '',
  `joindate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_userdetail`
--

LOCK TABLES `pre_userdetail` WRITE;
/*!40000 ALTER TABLE `pre_userdetail` DISABLE KEYS */;
INSERT INTO `pre_userdetail` VALUES (1,'Gen','m','Trainer','0000-00-00','','','Des Moines','USA',0,'Brewer','mobitxtadz@gmail.com','','','5105 NE 23RD AVE UNIT 1205','','pleasant hill','IA',50327,'US','pastorbrewer','mobitxtadz@gmail.com','teacher','f5d8fa7e5f0f296e0923256fa85cfc32','Male',1,0,'',16379,234380,'',1,7185412,'',1,'NO','','0','','seocash','marcus@atravelwebsite.com','2013-01-04 03:11:19'),(2,'Garry','a','Salunga','0000-00-00','','','a','a',0,'a','gsalunga@gmail.com','','','a','','','',0,'AF','','gsalunga@gmail.com','gsalunga','202cb962ac59075b964b07152d234b70','Male',1,0,'',73093,297101,'',0,2220037,'',0,'NO','','0','','','','2013-01-04 11:52:57'),(3,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','0','','1','1','2013-01-07 19:03:43'),(4,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','sample@email.tst','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',93224,924897,'',1,4213150,'',1,'NO','','0','','1','1','2013-01-07 19:03:44'),(5,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','sample@email.tst','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',59987,224926,'',1,5654877,'',1,'NO','','0','','1','1','2013-01-07 19:03:44'),(6,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','sample@email.tst','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',90496,352973,'',1,4236600,'',1,'NO','','0','','1','1','2013-01-07 19:03:47'),(7,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','sample@email.tst','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',27595,404182,'',1,9108029,'',1,'NO','','0','','1','1','2013-01-07 19:03:47'),(8,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',93847,721594,'',1,6033207,'',1,'NO','','0','','1','1','2013-01-07 19:03:51'),(9,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','sample@email.tst','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',98756,740211,'',1,1786329,'',1,'NO','','0','','1','1','2013-01-07 19:03:51'),(10,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','sample@email.tst','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',11195,149385,'',1,5816191,'',1,'NO','','0','','1','1','2013-01-07 19:03:52'),(11,'Amar','','Yash','0000-00-00','','','','',0,'','amardeepsikander39@gmail.com','','','zxcxcvxcv','','','',0,'BS','','amardeepsikander39@gmail.com','amaryash','e10adc3949ba59abbe56e057f20f883e','Male',1,0,'',11344,672080,'',1,8584993,'',1,'NO','','0','','','','2013-01-07 19:37:34'),(12,'gswkbebk','gswkbebk','gswkbebk','0000-00-00','1','','','',0,'','sample@email.tst&n907949=v935864','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','sample@email.tst&n907949=v935864','gswkbebk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',53060,933517,'',1,7293898,'',1,'NO','','0','','1','1','2013-01-07 19:47:24'),(13,'wfqvtteu','wfqvtteu','wfqvtteu','0000-00-00','1','','','',0,'','${99693+99943}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${99693+99943}','wfqvtteu','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',51090,385061,'',1,5021151,'',1,'NO','','0','','1','1','2013-01-07 19:48:33'),(14,'wfqvtteu','wfqvtteu','wfqvtteu','0000-00-00','1','','','',0,'','${99605+99967}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','${99605+99967}','wfqvtteu','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',63992,827799,'',1,4595765,'',1,'NO','','0','','1','1','2013-01-07 19:48:34'),(15,'wfqvtteu','wfqvtteu','wfqvtteu','0000-00-00','1','','','',0,'','${100387+100477}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','${100387+100477}','wfqvtteu','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',16971,622868,'',1,1530920,'',1,'NO','','0','','1','1','2013-01-07 19:48:36'),(16,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','${99277+99520}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${99277+99520}','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',51530,506599,'',1,9263769,'',1,'NO','','0','','1','1','2013-01-07 19:48:37'),(17,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','${100279+99179}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${100279+99179}','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',58767,627823,'',1,6453240,'',1,'NO','','0','','1','1','2013-01-07 19:48:38'),(18,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','${100314+99361}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${100314+99361}','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',21982,874088,'',1,7577108,'',1,'NO','','0','','1','1','2013-01-07 19:48:40'),(19,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','${99241+99404}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${99241+99404}','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',25089,533947,'',1,9071165,'',1,'NO','','0','','1','1','2013-01-07 19:48:41'),(20,'qoovfmte','qoovfmte','qoovfmte','0000-00-00','1','','','',0,'','Array','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','Array','qoovfmte','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',68097,278759,'',1,4991656,'',1,'NO','','0','','1','1','2013-01-07 19:51:16'),(21,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\r\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r\n SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',26385,138175,'',1,7268877,'',1,'NO','','0','','1','1','2013-01-07 19:51:16'),(22,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\n SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',97608,893729,'',1,8383297,'',1,'NO','','0','','1','1','2013-01-07 19:51:18'),(23,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\r SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',11580,912340,'',1,9157271,'',1,'NO','','0','','1','1','2013-01-07 19:51:19'),(24,'qoovfmte','qoovfmte','qoovfmte','0000-00-00','1','','','',0,'','Array','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','Array','qoovfmte','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',65580,105954,'',1,1439848,'',1,'NO','','0','','1','1','2013-01-07 19:51:20'),(25,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\r\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','\r\n SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',23627,835186,'',1,8168002,'',1,'NO','','0','','1','1','2013-01-07 19:51:21'),(26,'qoovfmte','qoovfmte','qoovfmte','0000-00-00','1','','','',0,'','Array','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','Array','qoovfmte','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',95444,761274,'',1,2614747,'',1,'NO','','0','','1','1','2013-01-07 19:51:22'),(27,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','\n SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',98488,490405,'',1,7592659,'',1,'NO','','0','','1','1','2013-01-07 19:51:23'),(28,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\r SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','\r SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',68781,205945,'',1,9956142,'',1,'NO','','0','','1','1','2013-01-07 19:51:24'),(29,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\r\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','\r\n SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',56332,944600,'',1,8983664,'',1,'NO','','0','','1','1','2013-01-07 19:51:25'),(30,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','Array','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','Array','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',22137,405984,'',1,9500303,'',1,'NO','','0','','1','1','2013-01-07 19:51:27'),(31,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','\n SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',60613,265510,'',1,1680428,'',1,'NO','','0','','1','1','2013-01-07 19:51:27'),(32,'morxkqmj','morxkqmj','morxkqmj','0000-00-00','1','','','',0,'','\r SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','\r SomeCustomInjectedHeader:injected_by_wvs','morxkqmj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',45580,130794,'',1,8734589,'',1,'NO','','0','','1','1','2013-01-07 19:51:28'),(33,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','\r\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r\n SomeCustomInjectedHeader:injected_by_wvs','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',12128,444288,'',1,6424547,'',1,'NO','','0','','1','1','2013-01-07 19:51:30'),(34,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','Array','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','Array','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',87114,176203,'',1,5821534,'',1,'NO','','0','','1','1','2013-01-07 19:51:30'),(35,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'',')','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1',')','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',28531,213530,'',1,3189453,'',1,'NO','','0','','1','1','2013-01-07 19:51:30'),(36,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'','!(()&&!|*|*|','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','!(()&&!|*|*|','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',20638,144007,'',1,4405636,'',1,'NO','','0','','1','1','2013-01-07 19:51:31'),(37,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\n SomeCustomInjectedHeader:injected_by_wvs','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',51279,398788,'',1,8130255,'',1,'NO','','0','','1','1','2013-01-07 19:51:32'),(38,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'','^(#$!@#$)(()))******','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','^(#$!@#$)(()))******','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',29483,324894,'',1,4788013,'',1,'NO','','0','','1','1','2013-01-07 19:51:33'),(39,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','Array','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','Array','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',41436,461077,'',1,3191769,'',1,'NO','','0','','1','1','2013-01-07 19:51:33'),(40,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','\r SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r SomeCustomInjectedHeader:injected_by_wvs','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',23766,475136,'',1,8792726,'',1,'NO','','0','','1','1','2013-01-07 19:51:33'),(41,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','\r\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r\n SomeCustomInjectedHeader:injected_by_wvs','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',49155,123068,'',1,8423302,'',1,'NO','','0','','1','1','2013-01-07 19:51:35'),(42,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'',')','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1',')','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',16476,397416,'',1,4432531,'',1,'NO','','0','','1','1','2013-01-07 19:51:35'),(43,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\n SomeCustomInjectedHeader:injected_by_wvs','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',54325,694484,'',1,9160956,'',1,'NO','','0','','1','1','2013-01-07 19:51:36'),(44,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'','!(()&&!|*|*|','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','!(()&&!|*|*|','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',66882,476085,'',1,3407459,'',1,'NO','','0','','1','1','2013-01-07 19:51:36'),(45,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','\r SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r SomeCustomInjectedHeader:injected_by_wvs','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',80575,749848,'',1,9226588,'',1,'NO','','0','','1','1','2013-01-07 19:51:37'),(46,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'','^(#$!@#$)(()))******','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','^(#$!@#$)(()))******','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',91378,495504,'',1,5975140,'',1,'NO','','0','','1','1','2013-01-07 19:51:37'),(47,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','Array','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','Array','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',87203,453032,'',1,7213848,'',1,'NO','','0','','1','1','2013-01-07 19:51:38'),(48,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',38556,305263,'',1,2892587,'',1,'NO','','0','','1','1','2013-01-07 19:51:38'),(49,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','\r\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r\n SomeCustomInjectedHeader:injected_by_wvs','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',93940,449231,'',1,4905280,'',1,'NO','','0','','1','1','2013-01-07 19:51:38'),(50,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'',')','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1',')','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',92558,942249,'',1,5297935,'',1,'NO','','0','','1','1','2013-01-07 19:51:39'),(51,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','1some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','1some_inexistent_file_with_long_name','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',94356,218463,'',1,2736956,'',1,'NO','','0','','1','1','2013-01-07 19:51:39'),(52,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\n SomeCustomInjectedHeader:injected_by_wvs','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',73279,548596,'',1,3632862,'',1,'NO','','0','','1','1','2013-01-07 19:51:40'),(53,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'','!(()&&!|*|*|','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','!(()&&!|*|*|','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',27998,829412,'',1,1093041,'',1,'NO','','0','','1','1','2013-01-07 19:51:41'),(54,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','http://testasp.vulnweb.com/t/fit.txt?','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://testasp.vulnweb.com/t/fit.txt?','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',27139,930552,'',1,4338421,'',1,'NO','','0','','1','1','2013-01-07 19:51:42'),(55,'flninxvr','flninxvr','flninxvr','0000-00-00','1','','','',0,'','^(#$!@#$)(()))******','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','^(#$!@#$)(()))******','flninxvr','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',43131,423552,'',1,1588246,'',1,'NO','','0','','1','1','2013-01-07 19:51:43'),(56,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','\r SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r SomeCustomInjectedHeader:injected_by_wvs','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',82510,922180,'',1,3513099,'',1,'NO','','0','','1','1','2013-01-07 19:51:43'),(57,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',71798,469594,'',1,5279327,'',1,'NO','','0','','1','1','2013-01-07 19:51:43'),(58,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'',')','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1',')','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',83680,630968,'',1,3325332,'',1,'NO','','0','','1','1','2013-01-07 19:51:44'),(59,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','!(()&&!|*|*|','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','!(()&&!|*|*|','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',56255,334345,'',1,1896725,'',1,'NO','','0','','1','1','2013-01-07 19:51:45'),(60,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','1some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','1some_inexistent_file_with_long_name','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',65028,145965,'',1,9463590,'',1,'NO','','0','','1','1','2013-01-07 19:51:45'),(61,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','\r\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r\n SomeCustomInjectedHeader:injected_by_wvs','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',77305,213940,'',1,7541303,'',1,'NO','','0','','1','1','2013-01-07 19:51:45'),(62,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','^(#$!@#$)(()))******','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','^(#$!@#$)(()))******','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',43110,442893,'',1,1208344,'',1,'NO','','0','','1','1','2013-01-07 19:51:46'),(63,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','http://testasp.vulnweb.com/t/fit.txt?','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','http://testasp.vulnweb.com/t/fit.txt?','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',48782,622766,'',1,8328749,'',1,'NO','','0','','1','1','2013-01-07 19:51:47'),(64,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'',')','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1',')','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',99299,735272,'',1,4002190,'',1,'NO','','0','','1','1','2013-01-07 19:51:47'),(65,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','!(()&&!|*|*|','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','!(()&&!|*|*|','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',99242,160584,'',1,9670194,'',1,'NO','','0','','1','1','2013-01-07 19:51:48'),(66,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',48025,330978,'',1,3702829,'',1,'NO','','0','','1','1','2013-01-07 19:51:48'),(67,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','^(#$!@#$)(()))******','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','^(#$!@#$)(()))******','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',53663,579666,'',1,5677213,'',1,'NO','','0','','1','1','2013-01-07 19:51:48'),(68,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','\n SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\n SomeCustomInjectedHeader:injected_by_wvs','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',64846,604304,'',1,4761833,'',1,'NO','','0','','1','1','2013-01-07 19:51:49'),(69,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'',')','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1',')','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',30196,565082,'',1,5919771,'',1,'NO','','0','','1','1','2013-01-07 19:51:51'),(70,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','\r SomeCustomInjectedHeader:injected_by_wvs','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\r SomeCustomInjectedHeader:injected_by_wvs','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',20658,746265,'',1,9322821,'',1,'NO','','0','','1','1','2013-01-07 19:51:51'),(71,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','1some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','1some_inexistent_file_with_long_name','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',57675,486453,'',1,7718490,'',1,'NO','','0','','1','1','2013-01-07 19:51:52'),(72,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','!(()&&!|*|*|','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','!(()&&!|*|*|','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',49228,570802,'',1,9256249,'',1,'NO','','0','','1','1','2013-01-07 19:51:52'),(73,'htacyrom','htacyrom','htacyrom','0000-00-00','1','','','',0,'','http://testasp.vulnweb.com/t/fit.txt?','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','http://testasp.vulnweb.com/t/fit.txt?','htacyrom','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',72914,902471,'',1,9423308,'',1,'NO','','0','','1','1','2013-01-07 19:51:53'),(74,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','^(#$!@#$)(()))******','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','^(#$!@#$)(()))******','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',60396,722579,'',1,1261660,'',1,'NO','','0','','1','1','2013-01-07 19:51:54'),(75,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',18448,242151,'',1,3647623,'',1,'NO','','0','','1','1','2013-01-07 19:51:55'),(76,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'',')','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1',')','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',28802,481522,'',1,2589347,'',1,'NO','','0','','1','1','2013-01-07 19:51:56'),(77,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','1some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','1some_inexistent_file_with_long_name','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',68144,607139,'',1,9340907,'',1,'NO','','0','','1','1','2013-01-07 19:51:56'),(78,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','!(()&&!|*|*|','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','!(()&&!|*|*|','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',59140,870196,'',1,7657952,'',1,'NO','','0','','1','1','2013-01-07 19:51:57'),(79,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','http://testasp.vulnweb.com/t/fit.txt?','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://testasp.vulnweb.com/t/fit.txt?','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',31665,159851,'',1,4380761,'',1,'NO','','0','','1','1','2013-01-07 19:51:57'),(80,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','^(#$!@#$)(()))******','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','^(#$!@#$)(()))******','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',12741,135483,'',1,7142205,'',1,'NO','','0','','1','1','2013-01-07 19:51:58'),(81,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',47044,497966,'',1,4130101,'',1,'NO','','0','','1','1','2013-01-07 19:51:59'),(82,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','1some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','1some_inexistent_file_with_long_name','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',29234,298305,'',1,5719133,'',1,'NO','','0','','1','1','2013-01-07 19:52:00'),(83,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','http://testasp.vulnweb.com/t/fit.txt?','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://testasp.vulnweb.com/t/fit.txt?','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',34506,782884,'',1,7649821,'',1,'NO','','0','','1','1','2013-01-07 19:52:02'),(84,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',34560,999015,'',1,7290994,'',1,'NO','','0','','1','1','2013-01-07 19:52:03'),(85,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','1some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','1some_inexistent_file_with_long_name','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',25555,483426,'',1,9826263,'',1,'NO','','0','','1','1','2013-01-07 19:52:04'),(86,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','http://testasp.vulnweb.com/t/fit.txt?','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://testasp.vulnweb.com/t/fit.txt?','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',46008,206062,'',1,4790623,'',1,'NO','','0','','1','1','2013-01-07 19:52:05'),(87,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://some-inexistent-website.acu/some_inexistent_file_with_long_name','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',69109,715667,'',1,4930711,'',1,'NO','','0','','1','1','2013-01-07 19:52:06'),(88,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','1some_inexistent_file_with_long_name','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','1some_inexistent_file_with_long_name','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',47049,178875,'',1,5399781,'',1,'NO','','0','','1','1','2013-01-07 19:52:08'),(89,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','http://testasp.vulnweb.com/t/fit.txt?','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','http://testasp.vulnweb.com/t/fit.txt?','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',42405,678708,'',1,6966170,'',1,'NO','','0','','1','1','2013-01-07 19:52:09'),(90,'nxwqwnjj','nxwqwnjj','nxwqwnjj','0000-00-00','1','','','',0,'','print(md5(acunetix_wvs_security_test));die();/*','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','print(md5(acunetix_wvs_security_test));die();/*','nxwqwnjj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',57340,927731,'',1,5559823,'',1,'NO','','0','','1','1','2013-01-07 19:52:48'),(91,'nxwqwnjj','nxwqwnjj','nxwqwnjj','0000-00-00','1','','','',0,'','${@print(md5(acunetix_wvs_security_test))}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${@print(md5(acunetix_wvs_security_test))}','nxwqwnjj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',98104,267843,'',1,7197455,'',1,'NO','','0','','1','1','2013-01-07 19:52:50'),(92,'nxwqwnjj','nxwqwnjj','nxwqwnjj','0000-00-00','1','','','',0,'','print(md5(acunetix_wvs_security_test));die();/*','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','print(md5(acunetix_wvs_security_test));die();/*','nxwqwnjj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',74484,309220,'',1,3895908,'',1,'NO','','0','','1','1','2013-01-07 19:52:52'),(93,'nxwqwnjj','nxwqwnjj','nxwqwnjj','0000-00-00','1','','','',0,'','${@print(md5(acunetix_wvs_security_test))}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','${@print(md5(acunetix_wvs_security_test))}','nxwqwnjj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',76613,759338,'',1,4755540,'',1,'NO','','0','','1','1','2013-01-07 19:52:53'),(94,'nxwqwnjj','nxwqwnjj','nxwqwnjj','0000-00-00','1','','','',0,'','print(md5(acunetix_wvs_security_test));die();/*','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','print(md5(acunetix_wvs_security_test));die();/*','nxwqwnjj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',64924,958620,'',1,1991152,'',1,'NO','','0','','1','1','2013-01-07 19:52:55'),(95,'nxwqwnjj','nxwqwnjj','nxwqwnjj','0000-00-00','1','','','',0,'','${@print(md5(acunetix_wvs_security_test))}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','${@print(md5(acunetix_wvs_security_test))}','nxwqwnjj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',91198,125295,'',1,9464222,'',1,'NO','','0','','1','1','2013-01-07 19:52:56'),(96,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','print(md5(acunetix_wvs_security_test));die();/*','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','print(md5(acunetix_wvs_security_test));die();/*','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',25434,262255,'',1,6732085,'',1,'NO','','0','','1','1','2013-01-07 19:53:01'),(97,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','${@print(md5(acunetix_wvs_security_test))}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${@print(md5(acunetix_wvs_security_test))}','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',89267,193302,'',1,2335089,'',1,'NO','','0','','1','1','2013-01-07 19:53:02'),(98,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','print(md5(acunetix_wvs_security_test));die();/*','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','print(md5(acunetix_wvs_security_test));die();/*','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',62144,538132,'',1,7342023,'',1,'NO','','0','','1','1','2013-01-07 19:53:06'),(99,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','${@print(md5(acunetix_wvs_security_test))}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${@print(md5(acunetix_wvs_security_test))}','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',45193,213866,'',1,7549528,'',1,'NO','','0','','1','1','2013-01-07 19:53:07'),(100,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','print(md5(acunetix_wvs_security_test));die();/*','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','print(md5(acunetix_wvs_security_test));die();/*','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',24806,401302,'',1,7120455,'',1,'NO','','0','','1','1','2013-01-07 19:53:11'),(101,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','${@print(md5(acunetix_wvs_security_test))}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${@print(md5(acunetix_wvs_security_test))}','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',85714,110256,'',1,9791979,'',1,'NO','','0','','1','1','2013-01-07 19:53:15'),(102,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','print(md5(acunetix_wvs_security_test));die();/*','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','print(md5(acunetix_wvs_security_test));die();/*','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',99807,902814,'',1,3051692,'',1,'NO','','0','','1','1','2013-01-07 19:53:18'),(103,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','${@print(md5(acunetix_wvs_security_test))}','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','${@print(md5(acunetix_wvs_security_test))}','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',16714,991073,'',1,7379604,'',1,'NO','','0','','1','1','2013-01-07 19:53:19'),(104,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','&cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','&cat /etc/passwd','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',26198,264471,'',1,3917713,'',1,'NO','','0','','1','1','2013-01-07 19:59:53'),(105,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','&cat /etc/passwd&','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','&cat /etc/passwd&','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',89931,761397,'',1,5112095,'',1,'NO','','0','','1','1','2013-01-07 19:59:55'),(106,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','\ncat /etc/passwd\n','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\ncat /etc/passwd\n','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',54614,458179,'',1,6554823,'',1,'NO','','0','','1','1','2013-01-07 19:59:57'),(107,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','`cat /etc/passwd`','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','`cat /etc/passwd`','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',69280,623102,'',1,2434756,'',1,'NO','','0','','1','1','2013-01-07 19:59:59'),(108,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','|cat /etc/passwd#','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','|cat /etc/passwd#','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',19153,548179,'',1,4883584,'',1,'NO','','0','','1','1','2013-01-07 20:00:01'),(109,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'',';cat /etc/passwd;','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1',';cat /etc/passwd;','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',73376,542721,'',1,8143176,'',1,'NO','','0','','1','1','2013-01-07 20:00:02'),(110,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','||cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','||cat /etc/passwd','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',29018,517670,'',1,5958097,'',1,'NO','','0','','1','1','2013-01-07 20:00:05'),(111,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','&cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','&cat /etc/passwd','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',33437,554189,'',1,1577954,'',1,'NO','','0','','1','1','2013-01-07 20:00:06'),(112,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','&cat /etc/passwd&','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','&cat /etc/passwd&','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',20934,613003,'',1,5733614,'',1,'NO','','0','','1','1','2013-01-07 20:00:09'),(113,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','\ncat /etc/passwd\n','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','\ncat /etc/passwd\n','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',66704,497912,'',1,8563220,'',1,'NO','','0','','1','1','2013-01-07 20:00:10'),(114,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','`cat /etc/passwd`','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','`cat /etc/passwd`','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',88863,968243,'',1,6292448,'',1,'NO','','0','','1','1','2013-01-07 20:00:12'),(115,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','|cat /etc/passwd#','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','|cat /etc/passwd#','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',12640,697810,'',1,6478022,'',1,'NO','','0','','1','1','2013-01-07 20:00:13'),(116,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'',';cat /etc/passwd;','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1',';cat /etc/passwd;','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',56886,807178,'',1,9213218,'',1,'NO','','0','','1','1','2013-01-07 20:00:14'),(117,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','||cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AL','1','||cat /etc/passwd','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',28018,747346,'',1,7640687,'',1,'NO','','0','','1','1','2013-01-07 20:00:16'),(118,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','&cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','&cat /etc/passwd','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',50855,936901,'',1,4230450,'',1,'NO','','0','','1','1','2013-01-07 20:00:17'),(119,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','&cat /etc/passwd&','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','&cat /etc/passwd&','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',94744,604669,'',1,7301216,'',1,'NO','','0','','1','1','2013-01-07 20:00:19'),(120,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','\ncat /etc/passwd\n','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','\ncat /etc/passwd\n','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',35402,122805,'',1,4158856,'',1,'NO','','0','','1','1','2013-01-07 20:00:21'),(121,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','`cat /etc/passwd`','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','`cat /etc/passwd`','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',38041,147177,'',1,8297807,'',1,'NO','','0','','1','1','2013-01-07 20:00:23'),(122,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','|cat /etc/passwd#','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','|cat /etc/passwd#','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',53346,517151,'',1,1286127,'',1,'NO','','0','','1','1','2013-01-07 20:00:26'),(123,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'',';cat /etc/passwd;','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1',';cat /etc/passwd;','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',31840,258342,'',1,9303352,'',1,'NO','','0','','1','1','2013-01-07 20:00:29'),(124,'sbcgilix','sbcgilix','sbcgilix','0000-00-00','1','','','',0,'','||cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','||cat /etc/passwd','sbcgilix','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',51520,314520,'',1,3077535,'',1,'NO','','0','','1','1','2013-01-07 20:00:30'),(125,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','&cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','&cat /etc/passwd','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',47783,370658,'',1,3775883,'',1,'NO','','0','','1','1','2013-01-07 20:00:32'),(126,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','&cat /etc/passwd&','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','&cat /etc/passwd&','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',26728,142239,'',1,4158200,'',1,'NO','','0','','1','1','2013-01-07 20:00:34'),(127,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','\ncat /etc/passwd\n','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\ncat /etc/passwd\n','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',78029,818490,'',1,6106091,'',1,'NO','','0','','1','1','2013-01-07 20:00:36'),(128,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','`cat /etc/passwd`','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','`cat /etc/passwd`','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',66245,176432,'',1,9472200,'',1,'NO','','0','','1','1','2013-01-07 20:00:38'),(129,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','|cat /etc/passwd#','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','|cat /etc/passwd#','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',33316,821244,'',1,1715811,'',1,'NO','','0','','1','1','2013-01-07 20:00:39'),(130,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'',';cat /etc/passwd;','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1',';cat /etc/passwd;','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',20246,485902,'',1,1709052,'',1,'NO','','0','','1','1','2013-01-07 20:00:41'),(131,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','||cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','||cat /etc/passwd','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',98434,336481,'',1,5765158,'',1,'NO','','0','','1','1','2013-01-07 20:00:45'),(132,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','&cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','&cat /etc/passwd','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',35724,159608,'',1,2572062,'',1,'NO','','0','','1','1','2013-01-07 20:00:47'),(133,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','&cat /etc/passwd&','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','&cat /etc/passwd&','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',21201,921220,'',1,8380903,'',1,'NO','','0','','1','1','2013-01-07 20:00:49'),(134,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','\ncat /etc/passwd\n','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\ncat /etc/passwd\n','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',35436,483250,'',1,3510042,'',1,'NO','','0','','1','1','2013-01-07 20:00:52'),(135,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','`cat /etc/passwd`','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','`cat /etc/passwd`','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',86374,651835,'',1,2485210,'',1,'NO','','0','','1','1','2013-01-07 20:00:54'),(136,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','|cat /etc/passwd#','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','|cat /etc/passwd#','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',90065,310742,'',1,9411912,'',1,'NO','','0','','1','1','2013-01-07 20:00:56'),(137,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'',';cat /etc/passwd;','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1',';cat /etc/passwd;','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',58094,464031,'',1,9793178,'',1,'NO','','0','','1','1','2013-01-07 20:00:58'),(138,'ovmljxvu','xmjxyvxc','iifsvfed','0000-00-00','1','','','',0,'','||cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','||cat /etc/passwd','bamkahta','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',90494,175824,'',1,1329124,'',1,'NO','','0','','1','1','2013-01-07 20:01:01'),(139,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','&cat /etc/passwd','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','&cat /etc/passwd','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',39110,737831,'',1,6723793,'',1,'NO','','0','','1','1','2013-01-07 20:01:03'),(140,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','&cat /etc/passwd&','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','&cat /etc/passwd&','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',36346,119517,'',1,6835197,'',1,'NO','','0','','1','1','2013-01-07 20:01:05'),(141,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','\ncat /etc/passwd\n','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','\ncat /etc/passwd\n','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',11563,435575,'',1,7686693,'',1,'NO','','0','','1','1','2013-01-07 20:01:07'),(142,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','`cat /etc/passwd`','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','`cat /etc/passwd`','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',79624,935310,'',1,7273782,'',1,'NO','','0','','1','1','2013-01-07 20:01:08'),(143,'saphgxgl','oahaxkcy','ubnjkttj','0000-00-00','1','','','',0,'','|cat /etc/passwd#','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'AF','1','|cat /etc/passwd#','ulracdvj','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',95221,992891,'',1,9653507,'',1,'NO','','0','','1','1','2013-01-07 20:01:09'),(144,'Collette','','Haynes','0000-00-00','','','','',0,'',' collettejhaynes@gmail.com','','','a','','','',0,'AF','',' collettejhaynes@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',8,0,'',18917,683997,'',8,1521264,'',8,'NO','','0','','','','2013-01-08 18:46:15'),(145,'Bertril','','Baird','0000-00-00','','','','',0,'','bertrilbaird@gmail.com','','','a','','','',0,'AF','','bertrilbaird@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',7,0,'',80751,672044,'',7,1595807,'',7,'NO','','0','','','','2013-01-08 18:54:30'),(146,'Adelaide','','Baptiste','0000-00-00','','','','',0,'','adelaide.baptiste@gmail.com','','','a','','','',0,'AF','','adelaide.baptiste@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','F',10,0,'',56965,135864,'',10,8144592,'',10,'NO','','0','','','','2013-01-08 18:56:27'),(147,'Patricia','','Thomas-Clarke','0000-00-00','','','','',0,'','pattclarke@yahoo.com','','','a','','','',0,'AF','','pattclarke@yahoo.com','','81dc9bdb52d04dc20036dbd8313ed055','M',10,0,'',59254,114248,'',10,5380294,'',10,'NO','','0','','','','2013-01-08 18:58:57'),(148,'Stanley','','Hoyte','0000-00-00','','','','',0,'','stanleytrends@gmail.com','','','a','','','',0,'AF','','stanleytrends@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',9,0,'',71574,869963,'',9,9988074,'',9,'NO','','0','','','','2013-01-08 19:08:28'),(149,'Rakesh','','Maharaj','0000-00-00','','','','',0,'','resrak@hotmail.com','','','a','','','',0,'AF','','resrak@hotmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',12,0,'',45385,218454,'',12,6255181,'',12,'NO','','0','','','','2013-01-08 19:11:01'),(150,'Wendy','','Matthew','0000-00-00','','','','',0,'','wmatthew44@gmail.com','','','a','','','',0,'AF','','wmatthew44@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',7,0,'',30686,931003,'',7,5138559,'',7,'NO','','0','','','','2013-01-08 19:13:40'),(151,'Semone','','Grant','0000-00-00','','','','',0,'','jas_grant@live.co.uk','','','a','','','',0,'AF','','jas_grant@live.co.uk','','81dc9bdb52d04dc20036dbd8313ed055','M',8,0,'',28459,782124,'',8,9907860,'',8,'NO','','0','','','','2013-01-08 19:21:01'),(152,'Fidel','','Greenidge','0000-00-00','','','','',0,'','fl_greenidge@hotmail.com','','','a','','','',0,'AF','','fl_greenidge@hotmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',7,0,'',40408,187051,'',7,6553482,'',7,'NO','','0','','','','2013-01-08 19:26:05'),(153,'Marlon','','Moore','0000-00-00','','','','',0,'','cmoore54.tt@gmail.com','','','a','','','',0,'AF','','cmoore54.tt@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',7,0,'',43314,139094,'',7,4055319,'',7,'NO','','0','','','','2013-01-08 19:30:09'),(154,'Gillian','','Lewis','0000-00-00','','','','',0,'','sparklett2213@yahoo.com','','','a','','','',0,'AF','','sparklett2213@yahoo.com','','81dc9bdb52d04dc20036dbd8313ed055','M',8,0,'',36367,707812,'',8,6904093,'',8,'NO','','0','','','','2013-01-08 19:32:09');
/*!40000 ALTER TABLE `pre_userdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_master`
--

DROP TABLE IF EXISTS `product_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_master` (
  `pro_id` int(5) NOT NULL AUTO_INCREMENT,
  `cat_id` int(5) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_description` text NOT NULL,
  `pro_image_1` varchar(50) NOT NULL,
  `pro_image_2` varchar(50) NOT NULL,
  `pro_image_3` varchar(50) NOT NULL,
  `pro_adm_price` float NOT NULL,
  `pro_ewall_price` float NOT NULL,
  `pro_final_price` float NOT NULL,
  `pro_quantity` int(5) NOT NULL,
  `pro_stock` int(5) NOT NULL,
  `pro_status` enum('Active','Inactive') NOT NULL,
  `pro_create_date` datetime NOT NULL,
  `pro_modify_date` datetime NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_master`
--

LOCK TABLES `product_master` WRITE;
/*!40000 ALTER TABLE `product_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_right`
--

DROP TABLE IF EXISTS `user_right`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_right` (
  `right_detail` varchar(255) NOT NULL DEFAULT '',
  `userids` text NOT NULL,
  `right_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_right`
--

LOCK TABLES `user_right` WRITE;
/*!40000 ALTER TABLE `user_right` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_right` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_right_placementtools`
--

DROP TABLE IF EXISTS `user_right_placementtools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_right_placementtools` (
  `right_detail` varchar(255) NOT NULL DEFAULT '',
  `userids` text NOT NULL,
  `right_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_right_placementtools`
--

LOCK TABLES `user_right_placementtools` WRITE;
/*!40000 ALTER TABLE `user_right_placementtools` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_right_placementtools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetail`
--

DROP TABLE IF EXISTS `userdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdetail` (
  `UserId` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `BirthDate` date NOT NULL,
  `suffix` varchar(100) NOT NULL DEFAULT '',
  `ssn` varchar(255) NOT NULL DEFAULT '',
  `POB` varchar(100) NOT NULL,
  `POC` varchar(100) NOT NULL,
  `CountryId` int(10) NOT NULL,
  `Mothername` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(255) NOT NULL DEFAULT '0',
  `Cellphone` varchar(255) NOT NULL DEFAULT '0',
  `Addressl1` varchar(250) NOT NULL,
  `Addressl2` varchar(250) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Zipcode` int(10) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `login` varchar(255) NOT NULL DEFAULT '',
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `inviter` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `entry` varchar(255) NOT NULL DEFAULT '',
  `usercode` int(11) NOT NULL DEFAULT '0',
  `usercode_5_3` int(11) NOT NULL DEFAULT '0',
  `entry_5_3` varchar(255) NOT NULL DEFAULT '',
  `inviter_5_3` int(11) NOT NULL DEFAULT '0',
  `usercode_10_3` int(11) NOT NULL DEFAULT '0',
  `entry_10_3` varchar(255) NOT NULL DEFAULT '',
  `inviter_10_3` int(11) NOT NULL DEFAULT '0',
  `Sponser` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `Placement` varchar(100) NOT NULL DEFAULT '',
  `Stream` varchar(10) NOT NULL DEFAULT '0',
  `scheme` varchar(255) NOT NULL DEFAULT '',
  `stp` varchar(255) NOT NULL DEFAULT '',
  `ap` varchar(255) NOT NULL DEFAULT '',
  `joindate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetail`
--

LOCK TABLES `userdetail` WRITE;
/*!40000 ALTER TABLE `userdetail` DISABLE KEYS */;
INSERT INTO `userdetail` VALUES (1,'Kenneth','Barrington','Thomas','2012-12-20','Mr','123567','Vadodara','Trinidad',0,'xyz','admin@geneducators.com','9875421578','9854785621','Shushil Park','Near akota garden',' ','Trinidad',390005,'TT','servantleader','admin@geneducators.com','administrator','21232f297a57a5a743894a0e4a801fc3','M',0,1,'prepaid',1111,222222,'prepaid',0,3333333,'prepaid',0,'NO','','0','','','','0000-00-00 00:00:00'),(2,'Gen','m','Trainer','0000-00-00','','','Des Moines','USA',0,'Brewer','mobitxtadz@gmail.com','','','5105 NE 23RD AVE UNIT 1205','','pleasant hill','IA',50327,'US','pastorbrewer','mobitxtadz@gmail.com','teacher','01ee9547a3f708f8fd986216bffd1eb7','Male',1,1,'prepaid',16379,234380,'prepaid',1,7185412,'prepaid',1,'NO','','','','seocash','marcus@atravelwebsite.com','2013-01-04 03:11:19'),(3,'Garry','a','Salunga','0000-00-00','','','a','a',0,'a','gsalunga@gmail.com','','','a','','','',0,'AF','','gsalunga@gmail.com','gsalunga','202cb962ac59075b964b07152d234b70','Male',1,0,'',73093,297101,'',0,2220037,'',0,'NO','','','','','','2013-01-04 11:52:57'),(4,'Michelle','a','Richardson','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','F',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(5,'Michelle','A','Leader','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(6,'Jeremy','itpbietb','Barnett','0000-00-00','1','','a','a',0,'','jbmarketing@gmail.com','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','jbmarketing@gmail.com','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(7,'Lois','itpbietb','Williams-Moore','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(8,'Darelle','itpbietb','Thorne','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','F',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(9,'Garth','itpbietb','Sinnette','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(10,'John','itpbietb','Thomas','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(11,'Steve','itpbietb','Carter','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(12,'Carol','itpbietb','Thomas','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(13,'Julius Jack','itpbietb','Armstrong','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(14,'Jason','itpbietb','Mitchell','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(15,'Darren','itpbietb','Jones','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(16,'Claude','itpbietb','Berkley','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(17,'Darryl','itpbietb','Daniel','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(18,'Patrick','itpbietb','Couchman','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(19,'Joel','itpbietb','Browne','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(20,'Raoul','itpbietb','Praan','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,1,'prepaid',10403,557063,'prepaid',1,8077436,'prepaid',1,'NO','','','','1','1','2013-01-07 19:03:43'),(21,'Collette','itpbietb','Haynes','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(22,'Bertril','itpbietb','Baird','0000-00-00','1','','a','a',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','M',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(23,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(24,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(25,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(26,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(27,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(28,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(29,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(30,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(31,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(32,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(33,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(34,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(35,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(36,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(37,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(38,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(39,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(40,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(41,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(42,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(43,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(44,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(45,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(46,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(47,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(48,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(49,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(50,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(51,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(52,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(53,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(54,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(55,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(56,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(57,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(58,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(59,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(60,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(61,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(62,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(63,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(64,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(65,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(66,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(67,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(68,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(69,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(70,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(71,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(72,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(73,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(74,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(75,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(76,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(77,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(78,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(79,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(80,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(81,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(82,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(83,'Scott','a','Ross','0000-00-00','','','a','a',0,'','amardeepsikander39@gmail.com','a','a','zxcxcvxcv','a','a','a',0,'BS','a','amardeepsikander39@gmail.com','pigsfly1','e10adc3949ba59abbe56e057f20f883e','M',1,1,'prepaid',11344,672080,'prepaid',1,8584993,'prepaid',1,'NO','','','','a','a','2013-01-07 19:37:34'),(84,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(85,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(86,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(87,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(88,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(89,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(90,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(91,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(92,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(93,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(94,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(95,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(96,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(97,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(98,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(99,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(100,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(101,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(102,'fxipjpge','itpbietb','ijrklwoh','0000-00-00','1','','','',0,'','sample@email.tst','555-666-0606','555-666-0606','3137 Laguna Street','3137 Laguna Street','San Francisco','NY',94102,'DZ','1','sample@email.tst','oygcwksk','1f1767b5696e79116b11ecc7f2882783','Male',1,0,'',10403,557063,'',1,8077436,'',1,'NO','','','','1','1','2013-01-07 19:03:43'),(103,'Collette','A','Haynes','0000-00-00','','','a','a',0,'','collettejhaynes@yahoo.com','','','a','','','',0,'AF','','collettejhaynes@yahoo.com','collettejhaynes','81dc9bdb52d04dc20036dbd8313ed055','M',8,0,'',18917,683997,'',8,1521264,'',8,'NO','','','','','','2013-01-08 18:46:15'),(104,'Bertril','','Baird','0000-00-00','','','','',0,'','bertrilbaird@gmail.com','','','a','','','',0,'AF','','bertrilbaird@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',7,0,'',80751,672044,'',7,1595807,'',7,'NO','','','','','','2013-01-08 18:54:30'),(105,'Adelaide','','Baptiste','0000-00-00','','','','',0,'','adelaide.baptiste@gmail.com','','','a','','','',0,'AF','','adelaide.baptiste@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','F',10,0,'',56965,135864,'',10,8144592,'',10,'NO','','','','','','2013-01-08 18:56:27'),(106,'Patricia','','Thomas-Clarke','0000-00-00','','','','',0,'','pattclarke@yahoo.com','','','a','','','',0,'AF','','pattclarke@yahoo.com','','81dc9bdb52d04dc20036dbd8313ed055','M',10,0,'',59254,114248,'',10,5380294,'',10,'NO','','','','','','2013-01-08 18:58:57'),(107,'Stanley','','Hoyte','0000-00-00','','','','',0,'','stanleytrends@gmail.com','','','a','','','',0,'AF','','stanleytrends@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',9,1,'prepaid',71574,869963,'prepaid',9,9988074,'prepaid',9,'NO','','','','','','2013-01-08 19:08:28'),(108,'Rakesh','','Maharaj','0000-00-00','','','','',0,'','resrak@hotmail.com','','','a','','','',0,'AF','','resrak@hotmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',12,0,'',45385,218454,'',12,6255181,'',12,'NO','','','','','','2013-01-08 19:11:01'),(109,'Wendy','','Matthew','0000-00-00','','','','',0,'','wmatthew44@gmail.com','','','a','','','',0,'AF','','wmatthew44@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',7,0,'',30686,931003,'',7,5138559,'',7,'NO','','','','','','2013-01-08 19:13:40'),(110,'Semone','','Grant','0000-00-00','','','','',0,'','jas_grant@live.co.uk','','','a','','','',0,'AF','','jas_grant@live.co.uk','','81dc9bdb52d04dc20036dbd8313ed055','M',8,0,'',28459,782124,'',8,9907860,'',8,'NO','','','','','','2013-01-08 19:21:01'),(111,'Fidel','','Greenidge','0000-00-00','','','','',0,'','fl_greenidge@hotmail.com','','','a','','','',0,'AF','','fl_greenidge@hotmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',7,0,'',40408,187051,'',7,6553482,'',7,'NO','','','','','','2013-01-08 19:26:05'),(112,'Marlon','','Moore','0000-00-00','','','','',0,'','cmoore54.tt@gmail.com','','','a','','','',0,'AF','','cmoore54.tt@gmail.com','','81dc9bdb52d04dc20036dbd8313ed055','M',7,0,'',43314,139094,'',7,4055319,'',7,'NO','','','','','','2013-01-08 19:30:09'),(113,'Gillian','','Lewis','0000-00-00','','','','',0,'','sparklett2213@yahoo.com','','','a','','','',0,'AF','','sparklett2213@yahoo.com','','81dc9bdb52d04dc20036dbd8313ed055','M',8,0,'',36367,707812,'',8,6904093,'',8,'NO','','','','','','2013-01-08 19:32:09');
/*!40000 ALTER TABLE `userdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vbal`
--

DROP TABLE IF EXISTS `vbal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vbal` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `payment_val` varchar(255) NOT NULL DEFAULT '0',
  `auto_debit` varchar(255) NOT NULL DEFAULT '0',
  `autodebit_from` varchar(100) NOT NULL DEFAULT '',
  `payment_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `you_pay` varchar(255) NOT NULL DEFAULT '0',
  `stream` varchar(100) NOT NULL DEFAULT '',
  `week` varchar(50) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vbal`
--

LOCK TABLES `vbal` WRITE;
/*!40000 ALTER TABLE `vbal` DISABLE KEYS */;
/*!40000 ALTER TABLE `vbal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vedio`
--

DROP TABLE IF EXISTS `vedio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vedio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `D_esc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Link` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `vid_order` varchar(25) NOT NULL,
  `sub_date` datetime NOT NULL,
  `license` varchar(100) NOT NULL,
  `Status` enum('Active','Inactive') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vedio`
--

LOCK TABLES `vedio` WRITE;
/*!40000 ALTER TABLE `vedio` DISABLE KEYS */;
INSERT INTO `vedio` VALUES (11,'Domains & Sub Domains','<p>\r\n	Trainings about Domains</p>\r\n','../upload/videos/thumb_1_preview.jpg','../upload/videos/Domains and Sub-Domains.flv','4','2012-01-11 17:38:14','affiliworx','Active'),(12,'Sign Up Process','<p>\r\n	Sign Up Process</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Here you can insert all the test describing this Video.</p>\r\n','../upload/videos/thumb_1_preview.jpg','../upload/videos/thumb_16_drop box logo.png','3','2012-01-11 17:38:53','affiliworx','Active'),(13,'Understanding Your Matrice','<p>\r\n	Understanding your Matrice</p>\r\n','../upload/videos/thumb_1_preview.jpg','../upload/videos/Understanding Your Matrice.flv','5','2012-01-11 17:41:26','Affiliworx','Active'),(14,'Spread Sheet Training','<p>\r\n	Spread Sheet Training</p>\r\n','../upload/videos/thumb_1_preview.jpg','../upload/videos/Spread Sheet Training.flv','6','2012-01-11 17:42:00','Affiliworx','Active'),(15,'Working Your LMS System','<p>\r\n	Working Your LMS System</p>\r\n','../upload/videos/thumb_1_preview.jpg','../upload/videos/Working Your LMS System.flv','7','2012-01-11 18:22:37','Affiliworx','Active'),(9,'Click image to watch our 1st Video of 2012','<p>An Overview</p>\r\n\r\n','image.jpg','../upload/videos/thumb_9_image.jpg','1','2012-01-07 14:52:22','Affiliworx','Active'),(5,'launch','<p>\r\n	Lauch</p>\r\n','../upload/videos/thumb_1_preview.jpg','../upload/videos/income 2.flv','4','2011-12-26 12:31:39','mst','Inactive');
/*!40000 ALTER TABLE `vedio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yesterday_paynot`
--

DROP TABLE IF EXISTS `yesterday_paynot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yesterday_paynot` (
  `usertb_id` int(11) NOT NULL DEFAULT '0',
  `day_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stream_3_3` varchar(10) NOT NULL DEFAULT '0',
  `stream_5_3` varchar(10) NOT NULL DEFAULT '0',
  `stream_10_3` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yesterday_paynot`
--

LOCK TABLES `yesterday_paynot` WRITE;
/*!40000 ALTER TABLE `yesterday_paynot` DISABLE KEYS */;
/*!40000 ALTER TABLE `yesterday_paynot` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-08  9:02:26

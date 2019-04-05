/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.14-log : Database - dxbb
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dxbb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dxbb`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`,`type`) values ('001','123456','YWY'),('002','123456','JHY'),('003','123456','CWY'),('004','123456','GLY');

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `AareaID` varchar(20) NOT NULL,
  `Aname` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`AareaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `area` */

insert  into `area`(`AareaID`,`Aname`) values ('000','江西本部'),('740','江西景德镇'),('750','江西南昌'),('751','江西吉安'),('752','江西赣州'),('753','江西新余'),('754','江西鹰潭'),('755','江西九江'),('756','江西宜春'),('757','江西上饶'),('758','江西萍乡'),('759','江西抚州');

/*Table structure for table `cardincome` */

DROP TABLE IF EXISTS `cardincome`;

CREATE TABLE `cardincome` (
  `CFlowID` varchar(20) NOT NULL,
  `Ctime` date NOT NULL,
  `AareaID` varchar(20) NOT NULL,
  `ProductID` varchar(20) NOT NULL,
  `Ccardnumber` int(20) NOT NULL,
  `Cmoney` int(20) NOT NULL,
  `Audit` int(5) DEFAULT NULL,
  PRIMARY KEY (`CFlowID`),
  KEY `AareaID` (`AareaID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `cardincome_ibfk_1` FOREIGN KEY (`AareaID`) REFERENCES `area` (`AareaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cardincome_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cardincome` */

insert  into `cardincome`(`CFlowID`,`Ctime`,`AareaID`,`ProductID`,`Ccardnumber`,`Cmoney`,`Audit`) values ('1542715781','2018-11-01','000','320113',1,200,1),('1542716514','2018-11-01','000','320113',2,400,1),('1542717215','2018-11-01','000','320113',3,600,0),('1543900636','2018-12-10','000','320113',100,20000,1);

/*Table structure for table `outincome` */

DROP TABLE IF EXISTS `outincome`;

CREATE TABLE `outincome` (
  `OFlowID` varchar(20) NOT NULL,
  `Otime` date NOT NULL,
  `AareaID` varchar(20) NOT NULL,
  `ProductID` varchar(20) NOT NULL,
  `OtypeID` varchar(20) NOT NULL,
  `Omoney` int(10) NOT NULL,
  `Audit` int(5) DEFAULT NULL,
  PRIMARY KEY (`OFlowID`),
  KEY `AareaID` (`AareaID`),
  KEY `OtypeID` (`OtypeID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `outincome_ibfk_1` FOREIGN KEY (`AareaID`) REFERENCES `area` (`AareaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `outincome_ibfk_2` FOREIGN KEY (`OtypeID`) REFERENCES `outtype` (`OtypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `outincome_ibfk_3` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `outincome` */

insert  into `outincome`(`OFlowID`,`Otime`,`AareaID`,`ProductID`,`OtypeID`,`Omoney`,`Audit`) values ('1','2018-11-01','000','110101','4001',100,1),('10','2018-11-01','000','110101','4001',100,1),('123789','2018-11-01','000','110101','4001',100,1),('1542531773','2018-11-01','740','120502','4001',100,1),('1542531785','2018-11-01','000','120502','4001',100,1),('1542532204','2018-11-09','000','320114','4010',100,1),('1542532538','2018-11-02','752','320114','4010',100,0),('1542595605','2018-11-01','740','120502','4001',100,1),('1542595890','2018-11-01','000','120502','4001',100,1),('1542596519','2018-11-01','000','120502','4001',100,1),('1542596863','2018-11-01','000','120502','4001',100,1),('1542597018','2018-11-01','000','120502','4001',100,1),('1542597038','2018-11-01','740','120502','4001',100,1),('1542597133','2018-11-01','000','120502','4001',100,1),('1542597337','2018-11-03','000','120502','4001',100,1),('1542634611','2018-11-01','000','320113','4009',100,1),('1542639596','2018-11-19','000','120502','4001',500,1),('1542719288','2018-11-01','759','110503','4001',100,1),('1542719407','2018-11-01','756','110503','4001',100,1),('1542899256','2018-11-01','000','120502','4001',100,1),('1542899301','2018-11-01','000','120502','4001',70,1),('1542899364','2018-11-01','740','120502','4001',80,1),('1542899458','2018-11-01','000','120502','4001',80,1),('1542899495','2018-11-01','740','120502','4001',60,0),('1542899680','2018-11-01','000','120502','4001',50,1),('1542899685','2018-11-01','000','120502','4001',20,0),('1542899725','2018-11-01','000','120502','4001',90,1),('1542899743','2018-11-01','000','120502','4001',10,0),('1542899762','2018-11-01','740','120502','4001',70,0),('1542899812','2018-11-01','000','120502','4001',60,1),('1542899933','2018-11-01','000','120502','4001',40,0),('1542899985','2018-11-01','740','120502','4001',50,1),('1542900118','2018-11-01','000','120502','4001',30,0),('1542900191','2018-11-01','740','120502','4001',100,0),('1542900267','2018-11-01','740','120502','4001',90,0),('1542979706','2018-11-01','000','120502','4001',80,0),('1542980233','2018-11-01','000','120502','4001',100,1),('1542980295','2018-11-01','000','120502','4001',90,0),('1543158723','2018-11-06','000','120502','4011',1,1),('1543838386','2018-12-01','000','120502','4001',2,1),('1543838509','2018-12-01','000','120502','4001',1,NULL),('1543900584','2018-12-10','000','120502','4001',100,NULL),('1543900881','2018-12-01','000','120502','4001',100,NULL),('2','2018-11-01','000','110101','4001',100,1),('3','2018-11-01','000','110101','4001',100,1),('45621','2018-11-01','000','110101','4001',5,1),('45654','2018-11-01','000','110101','4001',5,1),('465699','2018-11-01','000','110101','4001',100,1),('525','2018-11-01','000','110101','4001',4,1),('52527','2018-11-01','000','110101','4002',5,1),('527','2018-11-01','000','110101','4001',55,1),('534','2018-11-01','000','110101','4001',4,0),('53573','2018-11-01','000','110101','4001',5,1),('5375','2018-11-01','000','110101','4001',2,0),('5456465','2018-11-01','000','110101','4001',500,0),('57','2018-11-01','000','110101','4001',50,1),('57375357','2018-11-01','000','110101','4001',1,0),('5753','2018-11-01','000','110101','4001',5,0),('7','2018-11-01','000','110101','4001',100,1),('789456','2018-11-01','000','110101','4001',100,1),('8','2018-11-01','000','110101','4001',100,1),('852527','2018-11-01','000','110101','4001',5,1),('9','2018-11-01','000','110101','4001',100,1);

/*Table structure for table `outtype` */

DROP TABLE IF EXISTS `outtype`;

CREATE TABLE `outtype` (
  `OtypeID` varchar(20) NOT NULL,
  `OtypeName` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`OtypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `outtype` */

insert  into `outtype`(`OtypeID`,`OtypeName`) values ('4001','主营业务收入-公众客户-月租费收入'),('4002','主营业务收入-公众客户-本地区内通话费'),('4003','主营业务收入-公众客户-本地区间通话费'),('4004','主营业务收入-公众客户-本地拨号上网通信费'),('4005','主营业务收入-公众客户-国内长途通信费'),('4006','主营业务收入-公众客户-国际长途通信费'),('4007','主营业务收入-公众客户-港澳台长途通信费'),('4008','主营业务收入-公众客户-IP国内长途通信费'),('4009','主营业务收入-公众客户-IP国际长途通信费'),('4010','主营业务收入-公众客户-IP港澳台长途通信费'),('4011','主营业务收入-公众客户-装移机工料费收入'),('4012','主营业务收入-公众客户-开户费收入'),('4013','主营业务收入-公众客户-网络使用费'),('4014','主营业务收入-公众客户-一次性费用'),('4015','主营业务收入-公众客户-标准资费收入'),('4020','主营业务收入-公众客户-增值业务收入'),('4021','主营业务收入-公众客户-其他类收入'),('4022','主营业务收入-公众客户-折扣与折让');

/*Table structure for table `preincome` */

DROP TABLE IF EXISTS `preincome`;

CREATE TABLE `preincome` (
  `PFlowID` varchar(20) NOT NULL,
  `Ptime` date NOT NULL,
  `AareaID` varchar(20) NOT NULL,
  `ProductID` varchar(20) NOT NULL,
  `PtypeID` varchar(20) NOT NULL,
  `Pmoney` int(20) NOT NULL,
  `Audit` int(5) DEFAULT NULL,
  PRIMARY KEY (`PFlowID`),
  KEY `AareaID` (`AareaID`),
  KEY `PtypeID` (`PtypeID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `preincome_ibfk_1` FOREIGN KEY (`AareaID`) REFERENCES `area` (`AareaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `preincome_ibfk_2` FOREIGN KEY (`PtypeID`) REFERENCES `pretype` (`PtypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `preincome_ibfk_3` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `preincome` */

insert  into `preincome`(`PFlowID`,`Ptime`,`AareaID`,`ProductID`,`PtypeID`,`Pmoney`,`Audit`) values ('1542982150','2018-11-01','000','120502','P100',90,0),('1542982322','2018-11-01','000','120502','P100',100,1),('1542982916','2018-11-01','000','120502','P100',80,1);

/*Table structure for table `pretype` */

DROP TABLE IF EXISTS `pretype`;

CREATE TABLE `pretype` (
  `PtypeID` varchar(20) NOT NULL,
  `PtypeName` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`PtypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pretype` */

insert  into `pretype`(`PtypeID`,`PtypeName`) values ('P100','预收账款-用户预存款'),('P110','预收账款-缴费卡款'),('P120','预收账款-预付费卡款-面值'),('P130','预收账款-预付费卡款-销售折扣'),('P140','预收账款-预收出租商品租金'),('P150','预收账款-预收代办工程款'),('P160','预收账款-其他-其他');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `ProductID` varchar(20) NOT NULL,
  `ProductName` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`ProductID`,`ProductName`) values ('110101','固话-基础业务-普通电话'),('110503','固话-基础业务-公用电话-公话超市电话'),('120502','固话-增值业务-800-国内'),('320113','卡类-IP卡-省内IP电话卡-200卡'),('320114','卡类-IP卡-省内IP电话卡-300卡'),('420201','数据业务-互联网接入服务-宽带接入-ADSL虚拟拨号'),('420301','数据业务-互联网接入服务-互联网普通专线接入'),('430101','数据业务-平台业务-IDC-主机托管');

/*Table structure for table `reportincome` */

DROP TABLE IF EXISTS `reportincome`;

CREATE TABLE `reportincome` (
  `RFlowID` varchar(20) NOT NULL,
  `Rtime` date NOT NULL,
  `AareaID` varchar(20) NOT NULL,
  `ProductID` varchar(20) NOT NULL,
  `RtypeID` varchar(20) NOT NULL,
  `Rmoney` int(20) NOT NULL,
  `Audit` int(5) DEFAULT NULL,
  PRIMARY KEY (`RFlowID`),
  KEY `RtypeID` (`RtypeID`),
  KEY `AareaID` (`AareaID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `reportincome_ibfk_1` FOREIGN KEY (`RtypeID`) REFERENCES `reporttype` (`RtypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reportincome_ibfk_2` FOREIGN KEY (`AareaID`) REFERENCES `area` (`AareaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reportincome_ibfk_3` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reportincome` */

insert  into `reportincome`(`RFlowID`,`Rtime`,`AareaID`,`ProductID`,`RtypeID`,`Rmoney`,`Audit`) values ('1542983497','2018-11-01','000','110101','I0001',70,1),('1543844052','2018-12-01','000','110101','I0001',1,1),('1543844614','2018-12-01','000','110101','I0001',2,NULL),('1543844788','2018-12-01','000','110101','I0001',1,2);

/*Table structure for table `reporttype` */

DROP TABLE IF EXISTS `reporttype`;

CREATE TABLE `reporttype` (
  `RtypeID` varchar(20) NOT NULL,
  `RtypeName` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`RtypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reporttype` */

insert  into `reporttype`(`RtypeID`,`RtypeName`) values ('I0001','主业-公众-装移机工料费-普通电话'),('I0009','主业-公众-装移机工料费-公用电话-公话超市电话'),('I0014','主业-公众-装移机工料费-宽带-ADSL虚拟拨号'),('I0024','主业-公众-装移机工料费-IDC-主机托管'),('I0027','主业-公众-开户费-普通电话'),('I0035','主业-公众-开户费-公用电话-公话超市电话'),('I0040','主业-公众-开户费-宽带-ADSL虚拟拨号'),('I0050','主业-公众-开户费-IDC-主机托管'),('I0053','主业-公众-一次性费用-普通电话'),('I0061','主业-公众-一次性费用-公用电话-公话超市电话'),('I0067','主业-公众-一次性费用-宽带-ADSL虚拟拨号'),('I0232','主业-公众-一次性费用-IDC-主机托管'),('I0239','预收账款-用户预存款-普通电话'),('I0247','预收账款-用户预存款-公用电话-公话超市电话'),('I0262','预收账款-预付费卡款-面值-200卡'),('I0264','预收账款-预付费卡款-面值-300卡'),('I0267','预收账款-预付费卡款-销售折扣-200卡'),('I0269','预收账款-预付费卡款-销售折扣-300卡');

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `Scode` varchar(10) NOT NULL,
  `SID` varchar(10) NOT NULL,
  `Spass` varchar(20) NOT NULL,
  `Sname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Sflag` int(1) NOT NULL,
  `AareaID` varchar(20) NOT NULL,
  PRIMARY KEY (`Scode`),
  UNIQUE KEY `SID` (`SID`),
  KEY `SareaID` (`AareaID`),
  CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`AareaID`) REFERENCES `area` (`AareaID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

/*Table structure for table `webincome` */

DROP TABLE IF EXISTS `webincome`;

CREATE TABLE `webincome` (
  `WFlowID` varchar(20) NOT NULL,
  `Wtime` date NOT NULL,
  `AareaID` varchar(20) NOT NULL,
  `ProductID` varchar(20) NOT NULL,
  `WoperatorID` varchar(20) NOT NULL,
  `WtypeID` varchar(20) NOT NULL,
  `Wmoney` int(20) NOT NULL,
  `Audit` int(5) DEFAULT NULL,
  PRIMARY KEY (`WFlowID`),
  KEY `webincome_ibfk_1` (`WtypeID`),
  KEY `WoperatorID` (`WoperatorID`),
  KEY `AareaID` (`AareaID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `webincome_ibfk_1` FOREIGN KEY (`WtypeID`) REFERENCES `webtype` (`WtypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `webincome_ibfk_2` FOREIGN KEY (`WoperatorID`) REFERENCES `weboperator` (`WoperatorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `webincome_ibfk_3` FOREIGN KEY (`AareaID`) REFERENCES `area` (`AareaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `webincome_ibfk_4` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `webincome` */

insert  into `webincome`(`WFlowID`,`Wtime`,`AareaID`,`ProductID`,`WoperatorID`,`WtypeID`,`Wmoney`,`Audit`) values ('1542639873','2018-11-02','000','120502','1','1',12,1),('1542984324','2018-11-01','000','120502','1','1',90,1),('1542984974','2018-11-01','000','120502','1','1',100,1),('1543902516','2018-12-01','000','120502','1','1',100,1),('1543902607','2018-12-01','000','120502','1','2',100,2),('1543902617','2018-12-01','000','120502','1','1',100,NULL),('1543902735','2018-12-01','000','120502','1','2',100,1),('1543902892','2018-12-01','000','120502','1','2',100,NULL),('1543902990','2018-12-01','000','120502','1','1',100,1),('1543903309','2018-12-01','000','120502','1','2',100,NULL),('1543903380','2018-12-01','000','120502','1','2',100,NULL),('1544969762','2018-12-31','000','120502','1','2',1,NULL),('1544970310','2018-12-31','000','120502','1','1',1,NULL);

/*Table structure for table `weboperator` */

DROP TABLE IF EXISTS `weboperator`;

CREATE TABLE `weboperator` (
  `WoperatorID` varchar(20) NOT NULL,
  `WoperatorName` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`WoperatorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `weboperator` */

insert  into `weboperator`(`WoperatorID`,`WoperatorName`) values ('1','电信'),('2','移动'),('3','联通');

/*Table structure for table `webtype` */

DROP TABLE IF EXISTS `webtype`;

CREATE TABLE `webtype` (
  `WtypeID` varchar(20) NOT NULL,
  `WtypeName` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`WtypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `webtype` */

insert  into `webtype`(`WtypeID`,`WtypeName`) values ('1','结算支出'),('2','结算收入');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Adminer 4.8.0 MySQL 5.5.5-10.5.8-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

CREATE TABLE `ads_like_dislike` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ads_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `audio_url` (
  `id` int(11) NOT NULL,
  `audio_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `copyright_infringement` (
  `INFRINGEMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SONG_ID` int(11) NOT NULL,
  `RDON_ID` varchar(13) NOT NULL,
  `USER_1` varchar(255) NOT NULL,
  `USER_2` varchar(255) NOT NULL,
  `INFRINGEMENT_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `STATUS` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`INFRINGEMENT_ID`),
  KEY `SONG_ID` (`SONG_ID`),
  CONSTRAINT `copyright_infringement_ibfk_1` FOREIGN KEY (`SONG_ID`) REFERENCES `song` (`SONG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `custom_transction_history` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `transferer_user` varchar(255) NOT NULL,
  `receiver_user` varchar(255) NOT NULL,
  `transfer_amount` double NOT NULL DEFAULT 0,
  `converted_amount` double NOT NULL DEFAULT 0,
  `TRANSCTION_DATE_TIME` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;


CREATE TABLE `download_per_session` (
  `ID` int(11) NOT NULL,
  `SESSION_ID` int(11) NOT NULL,
  `USER_NAME` int(11) NOT NULL,
  `VOTE_DATE_TIME` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `express_ads` (
  `express_ads_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `express_ads_title` text NOT NULL,
  `express_ads_website` text NOT NULL,
  `express_ads_message` text NOT NULL,
  `express_ads_dashboard` int(11) NOT NULL DEFAULT 0,
  `express_ads_home_page` int(11) NOT NULL DEFAULT 0,
  `express_ads_main_home_page` int(11) NOT NULL DEFAULT 0,
  `express_ads_audio_commercial` int(11) NOT NULL DEFAULT 0,
  `express_ads_audio_commercial_val` int(11) NOT NULL DEFAULT 1,
  `express_ads_impressions` int(11) NOT NULL DEFAULT 0,
  `express_ads_p_impress` int(11) NOT NULL DEFAULT 0,
  `TOTAL_CLICK` int(11) NOT NULL DEFAULT 0,
  `express_ads_date1` date NOT NULL,
  `express_ads_date2` date NOT NULL,
  `express_ads_time_begin` time NOT NULL,
  `express_ads_time_ends` time NOT NULL,
  `express_ads_post_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `express_ads_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`express_ads_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


CREATE TABLE `invest_on_song` (
  `ID` int(11) NOT NULL,
  `USER_NAME` text NOT NULL,
  `SONG_ID` int(11) NOT NULL,
  `INVESTER_PERSENT` int(11) NOT NULL DEFAULT 0,
  `STATUS` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT '',
  `details` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(46) NOT NULL DEFAULT '',
  `session` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=3540 DEFAULT CHARSET=utf8;


CREATE TABLE `pre_vote` (
  `ID` int(11) NOT NULL,
  `SONG_ID` int(11) NOT NULL,
  `USER_NAME` text NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sitelok` (
  `Selected` varchar(3) NOT NULL DEFAULT '',
  `Created` varchar(6) NOT NULL DEFAULT '',
  `Username` varchar(100) NOT NULL,
  `Passphrase` varchar(255) NOT NULL DEFAULT '',
  `Enabled` varchar(3) NOT NULL DEFAULT '',
  `Name` varchar(100) NOT NULL DEFAULT '',
  `Email` varchar(100) NOT NULL DEFAULT '',
  `Usergroups` varchar(255) NOT NULL DEFAULT '',
  `Custom1` varchar(255) NOT NULL DEFAULT '',
  `Custom2` varchar(255) NOT NULL DEFAULT 'no-image.jpg',
  `Custom3` varchar(255) NOT NULL DEFAULT '',
  `Custom4` varchar(255) NOT NULL DEFAULT '',
  `Custom5` varchar(255) NOT NULL DEFAULT '',
  `Custom6` varchar(255) NOT NULL DEFAULT '',
  `Custom7` varchar(255) NOT NULL DEFAULT '',
  `Custom8` varchar(255) NOT NULL DEFAULT '',
  `Custom9` varchar(255) NOT NULL DEFAULT '',
  `Custom10` varchar(255) NOT NULL DEFAULT '',
  `Custom11` varchar(255) NOT NULL DEFAULT '',
  `Custom12` varchar(255) NOT NULL DEFAULT '',
  `Custom13` varchar(255) NOT NULL DEFAULT '',
  `Custom14` varchar(255) NOT NULL DEFAULT '',
  `Custom15` varchar(255) NOT NULL DEFAULT '',
  `Custom16` varchar(255) NOT NULL DEFAULT '',
  `Custom17` varchar(255) NOT NULL DEFAULT '',
  `Custom18` varchar(255) NOT NULL DEFAULT '',
  `Custom19` varchar(255) NOT NULL DEFAULT '',
  `Custom20` varchar(255) NOT NULL DEFAULT '',
  `Custom21` varchar(255) NOT NULL DEFAULT '',
  `Custom22` varchar(255) NOT NULL DEFAULT '',
  `Custom23` varchar(255) NOT NULL DEFAULT '',
  `Custom24` varchar(255) NOT NULL DEFAULT '',
  `Custom25` varchar(255) NOT NULL DEFAULT '',
  `Custom26` varchar(255) NOT NULL DEFAULT '',
  `Custom27` varchar(255) NOT NULL DEFAULT '',
  `Custom28` varchar(255) NOT NULL DEFAULT '',
  `Custom29` varchar(255) NOT NULL DEFAULT '',
  `Custom30` varchar(255) NOT NULL DEFAULT '',
  `Custom31` varchar(255) NOT NULL DEFAULT '',
  `Custom32` varchar(255) NOT NULL DEFAULT '',
  `Custom33` varchar(255) NOT NULL DEFAULT '',
  `Custom34` varchar(255) NOT NULL DEFAULT '',
  `Custom35` varchar(255) NOT NULL DEFAULT '',
  `Custom36` varchar(255) NOT NULL DEFAULT '',
  `Custom37` varchar(255) NOT NULL DEFAULT '',
  `Custom38` varchar(255) NOT NULL DEFAULT '',
  `Custom39` varchar(255) NOT NULL DEFAULT '',
  `Custom40` varchar(255) NOT NULL DEFAULT '',
  `Custom41` varchar(255) NOT NULL DEFAULT '',
  `Custom42` varchar(255) NOT NULL DEFAULT '',
  `Custom43` varchar(255) NOT NULL DEFAULT '',
  `Custom44` varchar(255) NOT NULL DEFAULT '',
  `Custom45` varchar(255) NOT NULL DEFAULT '',
  `Custom46` varchar(255) NOT NULL DEFAULT '',
  `Custom47` varchar(255) NOT NULL DEFAULT '',
  `Custom48` varchar(255) NOT NULL DEFAULT '',
  `Custom49` varchar(255) NOT NULL DEFAULT '',
  `Custom50` varchar(255) NOT NULL DEFAULT '',
  `Session` varchar(255) NOT NULL DEFAULT '',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;


CREATE TABLE `slconfig` (
  `confignum` int(11) NOT NULL DEFAULT 1,
  `version` varchar(5) NOT NULL DEFAULT '',
  `sitename` varchar(255) NOT NULL DEFAULT 'Members Area',
  `siteemail` varchar(255) NOT NULL DEFAULT 'you@yoursite.com',
  `dateformat` varchar(6) NOT NULL DEFAULT 'DDMMYY',
  `logoutpage` varchar(255) NOT NULL DEFAULT 'http://www.yoursite.com/index.html',
  `siteloklocation` varchar(255) NOT NULL DEFAULT '',
  `siteloklocationurl` varchar(255) NOT NULL DEFAULT '',
  `emaillocation` varchar(255) NOT NULL DEFAULT '',
  `emailurl` varchar(255) NOT NULL DEFAULT '',
  `filelocation` mediumtext DEFAULT NULL,
  `siteloklog` varchar(255) NOT NULL DEFAULT '',
  `logdetails` varchar(50) NOT NULL DEFAULT 'YYYYYYYYYYYYYYYY',
  `sitekey` varchar(50) NOT NULL DEFAULT '',
  `logintype` varchar(10) NOT NULL DEFAULT 'NORMAL',
  `turinglogin` int(11) NOT NULL DEFAULT 0,
  `turingregister` int(11) NOT NULL DEFAULT 0,
  `maxsessiontime` int(11) NOT NULL DEFAULT 0,
  `maxinactivitytime` int(11) NOT NULL DEFAULT 0,
  `cookielogin` int(11) NOT NULL DEFAULT 0,
  `logintemplate` varchar(255) NOT NULL DEFAULT '',
  `expiredpage` varchar(255) NOT NULL DEFAULT '',
  `wronggrouppage` varchar(255) NOT NULL DEFAULT '',
  `messagetemplate` varchar(255) NOT NULL DEFAULT '',
  `forgottenemail` varchar(255) NOT NULL DEFAULT '',
  `newuseremail` varchar(255) NOT NULL DEFAULT 'newuser.htm',
  `showrows` int(11) NOT NULL DEFAULT 10,
  `randompasswordmask` varchar(50) NOT NULL DEFAULT 'cccc##',
  `md5passwords` int(11) NOT NULL DEFAULT 0,
  `concurrentlogin` int(11) NOT NULL DEFAULT 1,
  `logviewoffset` int(11) NOT NULL DEFAULT 9999,
  `logvieworder` varchar(4) NOT NULL DEFAULT 'ASC',
  `logviewdetails` varchar(50) NOT NULL DEFAULT 'YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY',
  `sortfield` varchar(100) NOT NULL DEFAULT '',
  `sortdirection` varchar(4) NOT NULL DEFAULT '',
  `customtitle1` varchar(255) NOT NULL DEFAULT 'Custom1',
  `customtitle2` varchar(255) NOT NULL DEFAULT 'Custom2',
  `customtitle3` varchar(255) NOT NULL DEFAULT 'Custom3',
  `customtitle4` varchar(255) NOT NULL DEFAULT 'Custom4',
  `customtitle5` varchar(255) NOT NULL DEFAULT 'Custom5',
  `customtitle6` varchar(255) NOT NULL DEFAULT 'Custom6',
  `customtitle7` varchar(255) NOT NULL DEFAULT 'Custom7',
  `customtitle8` varchar(255) NOT NULL DEFAULT 'Custom8',
  `customtitle9` varchar(255) NOT NULL DEFAULT 'Custom9',
  `customtitle10` varchar(255) NOT NULL DEFAULT 'Custom10',
  `customtitle11` varchar(255) NOT NULL DEFAULT '',
  `customtitle12` varchar(255) NOT NULL DEFAULT '',
  `customtitle13` varchar(255) NOT NULL DEFAULT '',
  `customtitle14` varchar(255) NOT NULL DEFAULT '',
  `customtitle15` varchar(255) NOT NULL DEFAULT '',
  `customtitle16` varchar(255) NOT NULL DEFAULT '',
  `customtitle17` varchar(255) NOT NULL DEFAULT '',
  `customtitle18` varchar(255) NOT NULL DEFAULT '',
  `customtitle19` varchar(255) NOT NULL DEFAULT '',
  `customtitle20` varchar(255) NOT NULL DEFAULT '',
  `customtitle21` varchar(255) NOT NULL DEFAULT '',
  `customtitle22` varchar(255) NOT NULL DEFAULT '',
  `customtitle23` varchar(255) NOT NULL DEFAULT '',
  `customtitle24` varchar(255) NOT NULL DEFAULT '',
  `customtitle25` varchar(255) NOT NULL DEFAULT '',
  `customtitle26` varchar(255) NOT NULL DEFAULT '',
  `customtitle27` varchar(255) NOT NULL DEFAULT '',
  `customtitle28` varchar(255) NOT NULL DEFAULT '',
  `customtitle29` varchar(255) NOT NULL DEFAULT '',
  `customtitle30` varchar(255) NOT NULL DEFAULT '',
  `customtitle31` varchar(255) NOT NULL DEFAULT '',
  `customtitle32` varchar(255) NOT NULL DEFAULT '',
  `customtitle33` varchar(255) NOT NULL DEFAULT '',
  `customtitle34` varchar(255) NOT NULL DEFAULT '',
  `customtitle35` varchar(255) NOT NULL DEFAULT '',
  `customtitle36` varchar(255) NOT NULL DEFAULT '',
  `customtitle37` varchar(255) NOT NULL DEFAULT '',
  `customtitle38` varchar(255) NOT NULL DEFAULT '',
  `customtitle39` varchar(255) NOT NULL DEFAULT '',
  `customtitle40` varchar(255) NOT NULL DEFAULT '',
  `customtitle41` varchar(255) NOT NULL DEFAULT '',
  `customtitle42` varchar(255) NOT NULL DEFAULT '',
  `customtitle43` varchar(255) NOT NULL DEFAULT '',
  `customtitle44` varchar(255) NOT NULL DEFAULT '',
  `customtitle45` varchar(255) NOT NULL DEFAULT '',
  `customtitle46` varchar(255) NOT NULL DEFAULT '',
  `customtitle47` varchar(255) NOT NULL DEFAULT '',
  `customtitle48` varchar(255) NOT NULL DEFAULT '',
  `customtitle49` varchar(255) NOT NULL DEFAULT '',
  `customtitle50` varchar(255) NOT NULL DEFAULT '',
  `custom1validate` int(11) NOT NULL DEFAULT 0,
  `custom2validate` int(11) NOT NULL DEFAULT 0,
  `custom3validate` int(11) NOT NULL DEFAULT 0,
  `custom4validate` int(11) NOT NULL DEFAULT 0,
  `custom5validate` int(11) NOT NULL DEFAULT 0,
  `custom6validate` int(11) NOT NULL DEFAULT 0,
  `custom7validate` int(11) NOT NULL DEFAULT 0,
  `custom8validate` int(11) NOT NULL DEFAULT 0,
  `custom9validate` int(11) NOT NULL DEFAULT 0,
  `custom10validate` int(11) NOT NULL DEFAULT 0,
  `custom11validate` int(11) NOT NULL DEFAULT 0,
  `custom12validate` int(11) NOT NULL DEFAULT 0,
  `custom13validate` int(11) NOT NULL DEFAULT 0,
  `custom14validate` int(11) NOT NULL DEFAULT 0,
  `custom15validate` int(11) NOT NULL DEFAULT 0,
  `custom16validate` int(11) NOT NULL DEFAULT 0,
  `custom17validate` int(11) NOT NULL DEFAULT 0,
  `custom18validate` int(11) NOT NULL DEFAULT 0,
  `custom19validate` int(11) NOT NULL DEFAULT 0,
  `custom20validate` int(11) NOT NULL DEFAULT 0,
  `custom21validate` int(11) NOT NULL DEFAULT 0,
  `custom22validate` int(11) NOT NULL DEFAULT 0,
  `custom23validate` int(11) NOT NULL DEFAULT 0,
  `custom24validate` int(11) NOT NULL DEFAULT 0,
  `custom25validate` int(11) NOT NULL DEFAULT 0,
  `custom26validate` int(11) NOT NULL DEFAULT 0,
  `custom27validate` int(11) NOT NULL DEFAULT 0,
  `custom28validate` int(11) NOT NULL DEFAULT 0,
  `custom29validate` int(11) NOT NULL DEFAULT 0,
  `custom30validate` int(11) NOT NULL DEFAULT 0,
  `custom31validate` int(11) NOT NULL DEFAULT 0,
  `custom32validate` int(11) NOT NULL DEFAULT 0,
  `custom33validate` int(11) NOT NULL DEFAULT 0,
  `custom34validate` int(11) NOT NULL DEFAULT 0,
  `custom35validate` int(11) NOT NULL DEFAULT 0,
  `custom36validate` int(11) NOT NULL DEFAULT 0,
  `custom37validate` int(11) NOT NULL DEFAULT 0,
  `custom38validate` int(11) NOT NULL DEFAULT 0,
  `custom39validate` int(11) NOT NULL DEFAULT 0,
  `custom40validate` int(11) NOT NULL DEFAULT 0,
  `custom41validate` int(11) NOT NULL DEFAULT 0,
  `custom42validate` int(11) NOT NULL DEFAULT 0,
  `custom43validate` int(11) NOT NULL DEFAULT 0,
  `custom44validate` int(11) NOT NULL DEFAULT 0,
  `custom45validate` int(11) NOT NULL DEFAULT 0,
  `custom46validate` int(11) NOT NULL DEFAULT 0,
  `custom47validate` int(11) NOT NULL DEFAULT 0,
  `custom48validate` int(11) NOT NULL DEFAULT 0,
  `custom49validate` int(11) NOT NULL DEFAULT 0,
  `custom50validate` int(11) NOT NULL DEFAULT 0,
  `emailtype` int(11) NOT NULL DEFAULT 0,
  `emailreplyto` varchar(255) NOT NULL DEFAULT '',
  `emailusername` varchar(255) NOT NULL DEFAULT '',
  `emailpassword` varchar(255) NOT NULL DEFAULT '',
  `emailserver` varchar(255) NOT NULL DEFAULT '',
  `emailport` varchar(6) NOT NULL DEFAULT '25',
  `emailauth` int(11) NOT NULL DEFAULT 1,
  `emailserversecurity` varchar(6) NOT NULL DEFAULT '',
  `emaildelay` int(11) NOT NULL DEFAULT 0,
  `modifyuseremail` varchar(255) NOT NULL DEFAULT 'updateuser.htm',
  `noaccesspage` varchar(255) NOT NULL DEFAULT '',
  `dbupdate` int(11) NOT NULL DEFAULT 0,
  `siteemail2` varchar(255) NOT NULL DEFAULT '',
  `allowsearchengine` int(11) NOT NULL DEFAULT 0,
  `searchenginegroup` varchar(255) NOT NULL DEFAULT 'ALL',
  `profilepassrequired` int(11) NOT NULL DEFAULT 0,
  `emailconfirmrequired` int(11) NOT NULL DEFAULT 0,
  `emailconfirmtemplate` varchar(255) NOT NULL DEFAULT '',
  `emailunique` int(11) NOT NULL DEFAULT 0,
  `loginwithemail` int(11) NOT NULL DEFAULT 0,
  `columnorder` varchar(120) NOT NULL DEFAULT '',
  `backuplocation` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`confignum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_adminconfig` (
  `confignum` int(11) NOT NULL DEFAULT 1,
  `sendnewuseremail` tinyint(4) NOT NULL DEFAULT 0,
  `sendedituseremail` tinyint(4) NOT NULL DEFAULT 0,
  `emaildedupe` tinyint(4) NOT NULL DEFAULT 1,
  `emaildeselect` tinyint(4) NOT NULL DEFAULT 1,
  `exportfilename` varchar(100) NOT NULL DEFAULT 'sitelokusers.csv',
  `exportuseheader` tinyint(4) NOT NULL DEFAULT 0,
  `exporttype` tinyint(4) NOT NULL DEFAULT 0,
  `exportfields` varchar(120) NOT NULL DEFAULT 'CRUSPWENNMEMUG01020304050607080910',
  `importheader` tinyint(4) NOT NULL DEFAULT 0,
  `importuseemailas` varchar(15) NOT NULL DEFAULT 'emailnever',
  `importaddusers` tinyint(4) NOT NULL DEFAULT 1,
  `importrandpass` varchar(15) NOT NULL DEFAULT 'randnewonly',
  `importusergroups` text NOT NULL,
  `importslctadded` tinyint(4) NOT NULL DEFAULT 0,
  `importexistusers` tinyint(4) NOT NULL DEFAULT 1,
  `importblank` varchar(15) NOT NULL DEFAULT 'allowblank',
  `importslctexist` tinyint(4) NOT NULL DEFAULT 0,
  `mtfontsize` tinyint(4) NOT NULL DEFAULT 14,
  `emailasoption` varchar(20) NOT NULL DEFAULT 'sitename-siteemail1',
  `emailcustomfromname` varchar(100) NOT NULL DEFAULT '',
  `emailcustomreplyto` varchar(100) NOT NULL DEFAULT '',
  `userpagelayoutud` varchar(110) NOT NULL DEFAULT '',
  `userpagelayoutcf` varchar(100) NOT NULL DEFAULT '',
  `showfromreply` tinyint(4) NOT NULL DEFAULT 0,
  `copycpemailtype` tinyint(4) NOT NULL DEFAULT 0,
  `copycpemail` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`confignum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


SET NAMES utf8mb4;

CREATE TABLE `sl_blab` (
  `blabid` int(11) NOT NULL AUTO_INCREMENT,
  `blabtime` int(11) NOT NULL,
  `blabuserid` int(11) NOT NULL,
  `blabgroups` varchar(255) NOT NULL,
  `blabtouserid` int(11) NOT NULL DEFAULT 0,
  `blabmessage` varchar(1000) NOT NULL,
  `blababout` varchar(30) NOT NULL DEFAULT '',
  `blabunread` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`blabid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `sl_contactforms` (
  `id` int(11) NOT NULL DEFAULT 0,
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `fonttype` varchar(255) NOT NULL DEFAULT '',
  `labelcolor` varchar(6) NOT NULL DEFAULT '',
  `labelsize` tinyint(4) NOT NULL DEFAULT 0,
  `labelstyle` varchar(25) NOT NULL DEFAULT '',
  `inputtextcolor` varchar(6) NOT NULL DEFAULT '',
  `inputtextsize` tinyint(4) NOT NULL DEFAULT 0,
  `inputtextstyle` varchar(25) NOT NULL DEFAULT '',
  `inputbackcolor` varchar(6) NOT NULL DEFAULT '',
  `bordersize` tinyint(4) NOT NULL DEFAULT 0,
  `bordercolor` varchar(6) NOT NULL DEFAULT '',
  `borderradius` tinyint(4) NOT NULL DEFAULT 0,
  `inputpaddingv` varchar(5) NOT NULL DEFAULT '',
  `inputpaddingh` varchar(5) NOT NULL DEFAULT '',
  `rqdfieldlabel` varchar(255) NOT NULL DEFAULT '',
  `rqdfieldcolor` varchar(6) NOT NULL DEFAULT '',
  `rqdfieldsize` tinyint(4) NOT NULL DEFAULT 0,
  `rqdfieldstyle` varchar(25) NOT NULL DEFAULT '',
  `messagecolor` varchar(6) NOT NULL DEFAULT '',
  `messagesize` tinyint(4) NOT NULL DEFAULT 0,
  `messagestyle` varchar(25) NOT NULL DEFAULT '',
  `sendemail` varchar(255) NOT NULL DEFAULT '',
  `redirect` varchar(255) NOT NULL DEFAULT '',
  `useremailvisitor` varchar(255) NOT NULL DEFAULT '',
  `adminemailvisitor` varchar(255) NOT NULL DEFAULT '',
  `useremailmember` varchar(255) NOT NULL DEFAULT '',
  `adminemailmember` varchar(255) NOT NULL DEFAULT '',
  `fromnameuser` varchar(255) NOT NULL DEFAULT '',
  `replytouser` varchar(255) NOT NULL DEFAULT '',
  `attachmenttypes` varchar(255) NOT NULL DEFAULT '',
  `sendasuser` varchar(1) NOT NULL DEFAULT '',
  `attachmentsize` int(11) NOT NULL,
  `sitelokfield` varchar(10) NOT NULL DEFAULT '',
  `inputtype` varchar(10) NOT NULL DEFAULT '',
  `labeltext` varchar(255) NOT NULL DEFAULT '',
  `placetext` varchar(255) NOT NULL DEFAULT '',
  `validation` varchar(20) NOT NULL DEFAULT '',
  `errormsg` varchar(255) NOT NULL DEFAULT '',
  `fieldwidth` tinyint(4) NOT NULL DEFAULT 0,
  `value` text NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
  `bottommargin` tinyint(4) NOT NULL DEFAULT 0,
  `showrequired` varchar(1) NOT NULL DEFAULT '',
  `useas` varchar(1) NOT NULL DEFAULT '',
  `showfieldfor` varchar(1) NOT NULL DEFAULT '',
  `btncolortype` varchar(8) NOT NULL DEFAULT '',
  `btncolorfrom` varchar(6) NOT NULL DEFAULT '',
  `btncolorto` varchar(6) NOT NULL DEFAULT '',
  `btnradius` tinyint(4) NOT NULL DEFAULT 0,
  `btnlabel` varchar(100) NOT NULL DEFAULT '',
  `btnlabelcolor` varchar(6) NOT NULL DEFAULT '',
  `btnlabelsize` tinyint(4) NOT NULL DEFAULT 0,
  `btnlabelfont` varchar(255) NOT NULL DEFAULT '',
  `btnlabelstyle` varchar(25) NOT NULL DEFAULT '',
  `btnbordercolor` varchar(6) NOT NULL DEFAULT '',
  `btnbordersize` tinyint(4) NOT NULL DEFAULT 0,
  `btnborderstyle` varchar(8) NOT NULL DEFAULT '',
  `btnpaddingv` tinyint(4) NOT NULL DEFAULT 0,
  `btnpaddingh` tinyint(4) NOT NULL DEFAULT 0,
  `formerrormsg` varchar(255) NOT NULL DEFAULT '',
  `formerrormsgcolor` varchar(6) NOT NULL DEFAULT '',
  `formerrormsgsize` tinyint(4) NOT NULL DEFAULT 0,
  `formerrormsgstyle` varchar(25) NOT NULL DEFAULT '',
  `maxformwidth` int(11) NOT NULL DEFAULT 0,
  `backcolor` varchar(6) NOT NULL DEFAULT '',
  `validationtype` varchar(20) NOT NULL DEFAULT '',
  `validation1` text NOT NULL,
  `validation2` varchar(20) NOT NULL DEFAULT '',
  `validation3` varchar(20) NOT NULL DEFAULT '',
  `validationmsg` varchar(255) NOT NULL DEFAULT '',
  `textarearows` tinyint(4) NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`,`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_cron` (
  `name` varchar(20) NOT NULL,
  `schedule` varchar(4) NOT NULL,
  `function` varchar(50) NOT NULL,
  `actualts` int(11) DEFAULT NULL,
  `plannedts` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_crontasks` (
  `taskid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `actionts` int(11) NOT NULL,
  `taskdata` varchar(255) NOT NULL,
  `taskdatalong` mediumtext NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`taskid`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;


CREATE TABLE `sl_loginforms` (
  `id` int(11) NOT NULL,
  `mainfont` varchar(255) NOT NULL DEFAULT '',
  `messagecolor` varchar(6) NOT NULL DEFAULT '',
  `messagesize` tinyint(4) NOT NULL DEFAULT 0,
  `messagestyle` varchar(25) NOT NULL DEFAULT '',
  `usernamelabel` varchar(255) NOT NULL DEFAULT '',
  `usernameplaceholder` varchar(255) NOT NULL,
  `passwordlabel` varchar(255) NOT NULL DEFAULT '',
  `passwordplaceholder` varchar(255) NOT NULL,
  `includecaptcha` varchar(1) NOT NULL DEFAULT '',
  `captchalabel` varchar(255) NOT NULL DEFAULT '',
  `captchaplaceholder` varchar(255) NOT NULL,
  `includeremember` varchar(1) NOT NULL DEFAULT '',
  `rememberlabel` varchar(255) NOT NULL DEFAULT '',
  `includeautologin` varchar(1) NOT NULL DEFAULT '',
  `autologinlabel` varchar(255) NOT NULL DEFAULT '',
  `labelcolor` varchar(6) NOT NULL DEFAULT '',
  `labelsize` tinyint(4) NOT NULL DEFAULT 0,
  `labelstyle` varchar(25) NOT NULL DEFAULT '',
  `inputtextcolor` varchar(6) NOT NULL DEFAULT '',
  `inputtextsize` tinyint(4) NOT NULL DEFAULT 0,
  `inputtextstyle` varchar(25) NOT NULL DEFAULT '',
  `inputbackcolor` varchar(6) NOT NULL DEFAULT '',
  `bordersize` tinyint(4) NOT NULL DEFAULT 0,
  `bordercolor` varchar(6) NOT NULL DEFAULT '',
  `borderradius` tinyint(4) NOT NULL DEFAULT 0,
  `inputpaddingv` varchar(5) NOT NULL DEFAULT '',
  `inputpaddingh` varchar(5) NOT NULL DEFAULT '',
  `logintext` varchar(100) NOT NULL DEFAULT '',
  `logintextfont` varchar(255) NOT NULL DEFAULT 'Arial, Helvetica, sans-serif',
  `logintextstyle` varchar(25) NOT NULL DEFAULT 'normal normal bold',
  `logintextcolor` varchar(6) NOT NULL DEFAULT '',
  `logintextsize` tinyint(4) NOT NULL DEFAULT 0,
  `loginfilltype` varchar(8) NOT NULL DEFAULT '',
  `logincolorfrom` varchar(6) NOT NULL DEFAULT '',
  `logincolorto` varchar(6) NOT NULL DEFAULT '',
  `loginshape` tinyint(4) NOT NULL DEFAULT 0,
  `btnbordercolor` varchar(6) NOT NULL DEFAULT 'FFFFFF',
  `btnbordersize` tinyint(4) NOT NULL DEFAULT 0,
  `btnborderstyle` varchar(8) NOT NULL DEFAULT 'solid',
  `btnpaddingv` tinyint(4) NOT NULL DEFAULT 0,
  `btnpaddingh` tinyint(4) NOT NULL DEFAULT 0,
  `includeforgot` varchar(1) NOT NULL DEFAULT '',
  `forgottext` varchar(255) NOT NULL DEFAULT '',
  `forgotcolor` varchar(6) NOT NULL DEFAULT '',
  `forgotsize` tinyint(4) NOT NULL DEFAULT 0,
  `forgotstyle` varchar(25) NOT NULL DEFAULT '',
  `includesignup` varchar(1) NOT NULL DEFAULT '',
  `signuptext` varchar(255) NOT NULL DEFAULT '',
  `signupurl` varchar(255) NOT NULL DEFAULT '',
  `signupcolor` varchar(6) NOT NULL DEFAULT '',
  `signupsize` tinyint(4) NOT NULL DEFAULT 0,
  `signupstyle` varchar(25) NOT NULL DEFAULT '',
  `bottommargin` tinyint(4) NOT NULL DEFAULT 0,
  `maxformwidth` int(11) NOT NULL DEFAULT 0,
  `backgroundcolor` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_logintemplate` (
  `id` int(11) NOT NULL DEFAULT 0,
  `backcolor` varchar(6) NOT NULL DEFAULT '',
  `backimage` varchar(100) NOT NULL DEFAULT '',
  `backimagerp` varchar(9) NOT NULL DEFAULT '',
  `mainfont` varchar(100) NOT NULL DEFAULT '',
  `boxcolortype` varchar(8) NOT NULL DEFAULT '',
  `boxcolorfrom` varchar(6) NOT NULL DEFAULT '',
  `boxcolorto` varchar(6) NOT NULL DEFAULT '',
  `boxradius` tinyint(4) NOT NULL DEFAULT 0,
  `boxshadow` tinyint(4) NOT NULL DEFAULT 0,
  `title` varchar(100) NOT NULL DEFAULT '',
  `titlecolor` varchar(6) NOT NULL DEFAULT '',
  `titlesize` tinyint(4) NOT NULL DEFAULT 0,
  `titlealign` varchar(6) NOT NULL DEFAULT '',
  `titlefont` varchar(100) NOT NULL DEFAULT '',
  `msgcolor` varchar(6) NOT NULL DEFAULT '',
  `msgsize` tinyint(4) NOT NULL DEFAULT 0,
  `msgalign` varchar(6) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `captcha` varchar(50) NOT NULL DEFAULT '',
  `remember` varchar(50) NOT NULL DEFAULT '',
  `autologin` varchar(50) NOT NULL DEFAULT '',
  `labelcolor` varchar(6) NOT NULL DEFAULT '',
  `labelsize` tinyint(4) NOT NULL DEFAULT 0,
  `inputcolor` varchar(6) NOT NULL DEFAULT '',
  `inputsize` tinyint(4) NOT NULL DEFAULT 0,
  `inputbackcolor` varchar(6) NOT NULL DEFAULT '',
  `showicons` tinyint(4) NOT NULL DEFAULT 0,
  `btnlbltext` varchar(50) NOT NULL DEFAULT '',
  `btnlblfont` varchar(255) NOT NULL DEFAULT 'Arial, Helvetica, sans-serif',
  `btnlblcolor` varchar(6) NOT NULL DEFAULT '',
  `btnlblsize` tinyint(4) NOT NULL DEFAULT 0,
  `btnlblstyle` varchar(25) NOT NULL DEFAULT 'normal normal bold',
  `btncolortype` varchar(8) NOT NULL DEFAULT '',
  `btncolorfrom` varchar(6) NOT NULL DEFAULT '',
  `btncolorto` varchar(6) NOT NULL DEFAULT '',
  `btnradius` tinyint(4) NOT NULL DEFAULT 0,
  `btnbordercolor` varchar(6) NOT NULL DEFAULT 'FFFFFF',
  `btnbordersize` tinyint(4) NOT NULL DEFAULT 0,
  `btnborderstyle` varchar(8) NOT NULL DEFAULT 'solid',
  `forgottxt` varchar(50) NOT NULL DEFAULT '',
  `forgotcolor` varchar(6) NOT NULL DEFAULT '',
  `forgotsize` tinyint(4) NOT NULL DEFAULT 0,
  `signuptext` varchar(100) NOT NULL DEFAULT '',
  `signupurl` varchar(100) NOT NULL DEFAULT '',
  `signupcolor` varchar(6) NOT NULL DEFAULT '',
  `signupsize` tinyint(4) NOT NULL DEFAULT 0,
  `signupalign` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_ordercontrol` (
  `orderno` varchar(255) NOT NULL,
  `timest` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`orderno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enabled` varchar(3) NOT NULL DEFAULT 'No',
  `version` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `settings` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


CREATE TABLE `sl_registerforms` (
  `id` int(11) NOT NULL DEFAULT 0,
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `fonttype` varchar(255) NOT NULL DEFAULT '',
  `labelcolor` varchar(6) NOT NULL DEFAULT '',
  `labelsize` tinyint(4) NOT NULL DEFAULT 0,
  `labelstyle` varchar(25) NOT NULL DEFAULT '',
  `inputtextcolor` varchar(6) NOT NULL DEFAULT '',
  `inputtextsize` tinyint(4) NOT NULL DEFAULT 0,
  `inputtextstyle` varchar(25) NOT NULL DEFAULT '',
  `inputbackcolor` varchar(6) NOT NULL DEFAULT '',
  `bordersize` tinyint(4) NOT NULL DEFAULT 0,
  `bordercolor` varchar(6) NOT NULL DEFAULT '',
  `borderradius` tinyint(4) NOT NULL DEFAULT 0,
  `inputpaddingv` varchar(5) NOT NULL DEFAULT '',
  `inputpaddingh` varchar(5) NOT NULL DEFAULT '',
  `rqdfieldlabel` varchar(255) NOT NULL DEFAULT '',
  `rqdfieldcolor` varchar(6) NOT NULL DEFAULT '',
  `rqdfieldsize` tinyint(4) NOT NULL DEFAULT 0,
  `rqdfieldstyle` varchar(25) NOT NULL DEFAULT '',
  `messagecolor` varchar(6) NOT NULL DEFAULT '',
  `messagesize` tinyint(4) NOT NULL DEFAULT 0,
  `messagestyle` varchar(25) NOT NULL DEFAULT '',
  `usergroup` varchar(255) NOT NULL DEFAULT '',
  `expiry` varchar(255) NOT NULL DEFAULT '',
  `redirect` varchar(255) NOT NULL DEFAULT '',
  `useremail` varchar(255) NOT NULL DEFAULT '',
  `adminemail` varchar(255) NOT NULL DEFAULT '',
  `enabled` varchar(3) NOT NULL DEFAULT '',
  `sitelokfield` varchar(10) NOT NULL DEFAULT '',
  `inputtype` varchar(10) NOT NULL DEFAULT '',
  `labeltext` varchar(255) NOT NULL DEFAULT '',
  `placetext` varchar(255) NOT NULL DEFAULT '',
  `validation` varchar(20) NOT NULL DEFAULT '',
  `errormsg` varchar(255) NOT NULL DEFAULT '',
  `fieldwidth` tinyint(4) NOT NULL DEFAULT 0,
  `value` text NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
  `bottommargin` tinyint(4) NOT NULL DEFAULT 0,
  `showrequired` varchar(1) NOT NULL DEFAULT '',
  `btncolortype` varchar(8) NOT NULL DEFAULT '',
  `btncolorfrom` varchar(6) NOT NULL DEFAULT '',
  `btncolorto` varchar(6) NOT NULL DEFAULT '',
  `btnradius` tinyint(4) NOT NULL DEFAULT 0,
  `btnlabel` varchar(100) NOT NULL DEFAULT '',
  `btnlabelcolor` varchar(6) NOT NULL DEFAULT '',
  `btnlabelsize` tinyint(4) NOT NULL DEFAULT 0,
  `btnlabelfont` varchar(255) NOT NULL DEFAULT '',
  `btnlabelstyle` varchar(25) NOT NULL DEFAULT '',
  `btnbordercolor` varchar(6) NOT NULL DEFAULT '',
  `btnbordersize` tinyint(4) NOT NULL DEFAULT 0,
  `btnborderstyle` varchar(8) NOT NULL DEFAULT '',
  `btnpaddingv` tinyint(4) NOT NULL DEFAULT 0,
  `btnpaddingh` tinyint(4) NOT NULL DEFAULT 0,
  `formerrormsg` varchar(255) NOT NULL DEFAULT '',
  `formerrormsgcolor` varchar(6) NOT NULL DEFAULT '',
  `formerrormsgsize` tinyint(4) NOT NULL DEFAULT 0,
  `formerrormsgstyle` varchar(25) NOT NULL DEFAULT '',
  `maxformwidth` int(11) NOT NULL DEFAULT 0,
  `backcolor` varchar(6) NOT NULL DEFAULT '',
  `validationtype` varchar(20) NOT NULL DEFAULT '',
  `validation1` text NOT NULL,
  `validation2` varchar(20) NOT NULL DEFAULT '',
  `validation3` varchar(20) NOT NULL DEFAULT '',
  `validationmsg` varchar(255) NOT NULL DEFAULT '',
  `textarearows` tinyint(4) NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`,`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sdate` date NOT NULL,
  `type` tinyint(4) NOT NULL,
  `typeid` varchar(255) NOT NULL DEFAULT '',
  `value1` int(11) NOT NULL DEFAULT 0,
  `value2` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`sdate`,`type`,`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=2368 DEFAULT CHARSET=utf8;


CREATE TABLE `sl_updateforms` (
  `id` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `fonttype` varchar(255) NOT NULL DEFAULT '',
  `labelcolor` varchar(6) NOT NULL DEFAULT '',
  `labelsize` tinyint(4) NOT NULL DEFAULT 0,
  `labelstyle` varchar(25) NOT NULL DEFAULT '',
  `inputtextcolor` varchar(6) NOT NULL DEFAULT '',
  `inputtextsize` tinyint(4) NOT NULL DEFAULT 0,
  `inputtextstyle` varchar(25) NOT NULL DEFAULT '',
  `inputbackcolor` varchar(6) NOT NULL DEFAULT '',
  `bordersize` tinyint(4) NOT NULL DEFAULT 0,
  `bordercolor` varchar(6) NOT NULL DEFAULT '',
  `borderradius` tinyint(4) NOT NULL DEFAULT 0,
  `inputpaddingv` varchar(5) NOT NULL DEFAULT '',
  `inputpaddingh` varchar(5) NOT NULL DEFAULT '',
  `rqdfieldlabel` varchar(255) NOT NULL DEFAULT '',
  `rqdfieldcolor` varchar(6) NOT NULL DEFAULT '',
  `rqdfieldsize` tinyint(4) NOT NULL DEFAULT 0,
  `rqdfieldstyle` varchar(25) NOT NULL DEFAULT '',
  `messagecolor` varchar(6) NOT NULL DEFAULT '',
  `messagesize` tinyint(4) NOT NULL DEFAULT 0,
  `messagestyle` varchar(25) NOT NULL DEFAULT '',
  `redirect` varchar(255) NOT NULL DEFAULT '',
  `useremail` varchar(255) NOT NULL DEFAULT '',
  `adminemail` varchar(255) NOT NULL DEFAULT '',
  `sitelokfield` varchar(10) NOT NULL DEFAULT '',
  `inputtype` varchar(10) NOT NULL DEFAULT '',
  `labeltext` varchar(255) NOT NULL DEFAULT '',
  `placetext` varchar(255) NOT NULL DEFAULT '',
  `validation` varchar(20) NOT NULL DEFAULT '',
  `errormsg` varchar(255) NOT NULL DEFAULT '',
  `fieldwidth` tinyint(4) NOT NULL DEFAULT 0,
  `value` text NOT NULL,
  `emailaction` tinyint(4) NOT NULL DEFAULT 0,
  `bottommargin` tinyint(4) NOT NULL DEFAULT 0,
  `showrequired` varchar(1) NOT NULL DEFAULT '',
  `btncolortype` varchar(8) NOT NULL DEFAULT '',
  `btncolorfrom` varchar(6) NOT NULL DEFAULT '',
  `btncolorto` varchar(6) NOT NULL DEFAULT '',
  `btnradius` tinyint(4) NOT NULL DEFAULT 0,
  `btnlabel` varchar(100) NOT NULL DEFAULT '',
  `btnlabelcolor` varchar(6) NOT NULL DEFAULT '',
  `btnlabelsize` tinyint(4) NOT NULL DEFAULT 0,
  `btnlabelfont` varchar(255) NOT NULL DEFAULT '',
  `btnlabelstyle` varchar(25) NOT NULL DEFAULT '',
  `btnbordercolor` varchar(6) NOT NULL DEFAULT '',
  `btnbordersize` tinyint(4) NOT NULL DEFAULT 0,
  `btnborderstyle` varchar(8) NOT NULL DEFAULT '',
  `btnpaddingv` tinyint(4) NOT NULL DEFAULT 0,
  `btnpaddingh` tinyint(4) NOT NULL DEFAULT 0,
  `formerrormsg` varchar(255) NOT NULL DEFAULT '',
  `formerrormsgcolor` varchar(6) NOT NULL DEFAULT '',
  `formerrormsgsize` tinyint(4) NOT NULL DEFAULT 0,
  `formerrormsgstyle` varchar(25) NOT NULL DEFAULT '',
  `maxformwidth` int(11) NOT NULL DEFAULT 0,
  `backcolor` varchar(6) NOT NULL DEFAULT '',
  `validationtype` varchar(20) NOT NULL DEFAULT '',
  `validation1` text NOT NULL,
  `validation2` varchar(20) NOT NULL DEFAULT '',
  `validation3` varchar(20) NOT NULL DEFAULT '',
  `validationmsg` varchar(255) NOT NULL DEFAULT '',
  `prefill` tinyint(4) NOT NULL DEFAULT 1,
  `textarearows` tinyint(4) NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`,`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_usersgroupnames` (
  `userid` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `st` datetime DEFAULT NULL,
  `ex` datetime DEFAULT NULL,
  `rnst` datetime DEFAULT NULL,
  UNIQUE KEY `userid` (`userid`,`groupname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_usersgroups` (
  `userid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `lastfuemail` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastfucount` int(11) NOT NULL DEFAULT -2,
  UNIQUE KEY `userid` (`userid`,`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sl_whoisonline` (
  `userid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `page` varchar(1024) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `song` (
  `SONG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RDON_ID` varchar(15) NOT NULL,
  `NUMBER_ID` varchar(5) NOT NULL,
  `COUNTRY_CODE` varchar(2) NOT NULL,
  `USER_NAME` varchar(255) NOT NULL,
  `SONG_NAME` text NOT NULL,
  `SONG_GENRE` varchar(50) NOT NULL,
  `ARTIST_NAME` text NOT NULL,
  `ALBUM_NAME` text NOT NULL,
  `YEAR` int(4) NOT NULL,
  `RECORD_LABEL` text NOT NULL,
  `COPYRIGHT` text NOT NULL,
  `COPYRIGHT_STATUS` int(11) NOT NULL DEFAULT 0,
  `COPYRIGHT_1` int(11) NOT NULL DEFAULT 0,
  `WANT_INVESTOR` int(11) NOT NULL DEFAULT 0,
  `INVEST_RADIO` double NOT NULL DEFAULT 0,
  `TOTAL_STREAM` int(11) NOT NULL DEFAULT 0,
  `PLAY_TIMEDATE` datetime DEFAULT NULL,
  `SONG_SUBMIT_DATE` datetime NOT NULL,
  `SONG_STATUS` int(11) NOT NULL DEFAULT 0,
  `NFT` text NOT NULL DEFAULT '',
  `TOKEN_ID` int(11) NOT NULL DEFAULT -1,
  `IPFS_CID` text NOT NULL DEFAULT '',
  `EDITION_ID` int(11) NOT NULL DEFAULT -1,
  `QUANTITY` int(11) NOT NULL DEFAULT 0,
  `SOLD` int(11) NOT NULL DEFAULT 0,
  `PRICE` float NOT NULL DEFAULT 0,
  `EDITION_LICENSE` text NOT NULL,
  `EDITION_CID` text NOT NULL,
  PRIMARY KEY (`SONG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;


CREATE TABLE `song_downloads` (
  `DOWNLOAD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SONG_ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PRICE_XTZ` float NOT NULL,
  `PRICE_USD` float NOT NULL,
  `OPERATION` varchar(255) NOT NULL,
  PRIMARY KEY (`DOWNLOAD_ID`),
  KEY `SONG_ID` (`SONG_ID`),
  CONSTRAINT `song_downloads_ibfk_1` FOREIGN KEY (`SONG_ID`) REFERENCES `song` (`SONG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;


CREATE TABLE `song_like` (
  `SONG_LIKE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SONG_ID` int(11) NOT NULL,
  `SONG_LIKE_USERNAME` text DEFAULT NULL,
  `SONG_LIKE_STATUS` int(11) DEFAULT 0,
  PRIMARY KEY (`SONG_LIKE_ID`,`SONG_ID`),
  KEY `fk_SONG_LIKE_SONG_idx` (`SONG_ID`),
  CONSTRAINT `fk_SONG_LIKE_SONG` FOREIGN KEY (`SONG_ID`) REFERENCES `song` (`SONG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;


CREATE TABLE `song_love` (
  `SONG_LOVE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SONG_ID` int(11) NOT NULL,
  `SONG_LOVE_USERNAME` text DEFAULT NULL,
  `SONG_LOVE_STATUS` int(11) DEFAULT 1,
  PRIMARY KEY (`SONG_LOVE_ID`,`SONG_ID`),
  KEY `fk_SONG_LOVE_SONG1_idx` (`SONG_ID`),
  CONSTRAINT `fk_SONG_LOVE_SONG1` FOREIGN KEY (`SONG_ID`) REFERENCES `song` (`SONG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;


CREATE TABLE `song_play` (
  `SONG_PLAY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SONG_ID` int(11) NOT NULL,
  `SONG_PLAY_USERNAME` text NOT NULL,
  `SONG_PLAY_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`SONG_PLAY_ID`),
  KEY `SONG_ID` (`SONG_ID`),
  CONSTRAINT `song_play_ibfk_1` FOREIGN KEY (`SONG_ID`) REFERENCES `song` (`SONG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=362 DEFAULT CHARSET=utf8;


CREATE TABLE `song_play_session` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MUSIC_ID` bigint(20) NOT NULL,
  `PLAY_DATE_TIME` datetime NOT NULL,
  `PLAY_STATUS` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `song_purchase` (
  `SONG_PURCHASE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SONG_ID` int(11) NOT NULL,
  `SONG_PURCHASE_USERNAME` text DEFAULT NULL,
  `SONG_PURCHASE_STATUS` int(11) DEFAULT 1,
  PRIMARY KEY (`SONG_PURCHASE_ID`,`SONG_ID`),
  KEY `fk_SONG_PURCHASE_SONG1_idx` (`SONG_ID`),
  CONSTRAINT `fk_SONG_PURCHASE_SONG1` FOREIGN KEY (`SONG_ID`) REFERENCES `song` (`SONG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `song_share` (
  `SONG_SHARE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SONG_ID` int(11) NOT NULL,
  `SONG_SHARE_USERNAME` text DEFAULT NULL,
  `SONG_SHARE_STATUS` int(11) DEFAULT 1,
  PRIMARY KEY (`SONG_SHARE_ID`,`SONG_ID`),
  KEY `fk_SONG_SHARE_SONG1_idx` (`SONG_ID`),
  CONSTRAINT `fk_SONG_SHARE_SONG1` FOREIGN KEY (`SONG_ID`) REFERENCES `song` (`SONG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


CREATE TABLE `usergroups` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `loginaction` varchar(255) NOT NULL DEFAULT '',
  `loginvalue` varchar(255) NOT NULL DEFAULT '',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


CREATE TABLE `vote_per_session` (
  `ID` bigint(20) NOT NULL,
  `SESSION_ID` bigint(20) NOT NULL,
  `USER_NAME` varchar(255) NOT NULL,
  `VOTE_DATE_TIME` datetime NOT NULL,
  `VOTE_STATUS` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2021-05-14 14:47:30

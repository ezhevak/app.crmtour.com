CREATE TABLE `Account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id юр. лица',
  `Name` varchar(200) DEFAULT NULL COMMENT 'Название организации',
  `OfficeAddress` varchar(255) DEFAULT NULL COMMENT 'Адрес организации (юридический)',
  `FactAddress` varchar(255) DEFAULT NULL COMMENT 'Адрес организации (фактический)',
  `OfficePhone` varchar(50) DEFAULT NULL COMMENT 'Телефон организации',
  `OfficeFax` varchar(50) DEFAULT NULL COMMENT 'Факс органихации',
  `OfficeMobile` varchar(50) DEFAULT NULL COMMENT 'Мобильный в организации',
  `OfficeEmail` varchar(50) DEFAULT NULL COMMENT 'Email организации',
  `BankName` varchar(50) DEFAULT NULL COMMENT 'Название банка',
  `BankAccount` varchar(50) DEFAULT NULL COMMENT 'Р/р в банке',
  `BankMFO` varchar(50) DEFAULT NULL COMMENT 'МФО банка',
  `BankCode` varchar(50) DEFAULT NULL COMMENT 'Код ЕДРПОУ',
  `LicenseNum` varchar(50) DEFAULT NULL COMMENT 'Сурия номер лицензии',
  `LicenseDate` date DEFAULT NULL COMMENT 'Дата выдачи лицензии',
  `DirectorName` varchar(50) DEFAULT NULL COMMENT 'ФИО директора',
  `ReffererId` int(11) DEFAULT NULL COMMENT 'Id Account по реферальной ссылке.',
  `Salt` varchar(10) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  `LastLogIn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Последний вход в систему',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=336 DEFAULT CHARSET=utf8 COMMENT='Таблица всех клиентов.';

CREATE TABLE `AccountBranches` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id отделения',
  `AccId` int(11) NOT NULL COMMENT 'Id юридического лица',
  `BranchName` varchar(200) DEFAULT NULL COMMENT 'Название отделения',
  `BranchJurAddress` varchar(255) DEFAULT NULL COMMENT 'Адрес организации (юридический)',
  `BranchFactAddress` varchar(255) DEFAULT NULL COMMENT 'Адрес организации (фактический)',
  `BranchPhone` varchar(50) DEFAULT NULL COMMENT 'Телефон организации',
  `BranchFax` varchar(50) DEFAULT NULL COMMENT 'Факс органихации',
  `BranchMobile` varchar(50) DEFAULT NULL COMMENT 'Мобильный в организации',
  `BranchEmail` varchar(50) DEFAULT NULL COMMENT 'Email организации',
  `BranchBankName` varchar(50) DEFAULT NULL COMMENT 'Название банка',
  `BranchBankAccount` varchar(50) DEFAULT NULL COMMENT 'Р/р в банке',
  `BranchBankIban` varchar(35) DEFAULT NULL COMMENT 'Международный счёт Iban',
  `BranchBankMFO` varchar(50) DEFAULT NULL COMMENT 'МФО банка',
  `BranchBankCode` varchar(50) DEFAULT NULL COMMENT 'Код ЕДРПОУ',
  `BranchLicenseNum` varchar(50) DEFAULT NULL COMMENT 'Сурия номер лицензии',
  `BranchLicenseDate` date DEFAULT NULL COMMENT 'Дата выдачи лицензии',
  `BranchDirectorName` varchar(50) DEFAULT NULL COMMENT 'ФИО директора',
  `Inactive` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-действующее, 1-закрытое отделение',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  KEY `Idx` (`AccId`)
) ENGINE=MyISAM AUTO_INCREMENT=254 DEFAULT CHARSET=utf8 COMMENT='Таблица филиалов';

CREATE TABLE `AccountOptions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `AccId` int(11) NOT NULL COMMENT 'Id юр. лица',
  `OptionName` varchar(100) NOT NULL COMMENT 'Название опции',
  `OptionVal` varchar(500) NOT NULL COMMENT 'Название опции',
  `Comments` varchar(255) DEFAULT NULL COMMENT 'Коментарий',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`AccId`,`OptionName`),
  KEY `idx` (`AccId`,`OptionName`)
) ENGINE=MyISAM AUTO_INCREMENT=1356 DEFAULT CHARSET=utf8 COMMENT='Таблица платежей по юр лицам';

CREATE TABLE `Actions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) DEFAULT NULL,
  `ModelType` varchar(50) DEFAULT NULL,
  `ModelId` int(11) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Text` text,
  `Status` varchar(255) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`ModelType`,`ModelId`)
) ENGINE=MyISAM AUTO_INCREMENT=9159 DEFAULT CHARSET=utf8 COMMENT='Таблицв действий с клиентами';

CREATE TABLE `Address` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id адреса',
  `AccId` int(11) NOT NULL COMMENT 'Id юр. лица',
  `ContactId` int(11) NOT NULL COMMENT 'Id Контакта',
  `LegalId` int(11) NOT NULL COMMENT 'Id юр. лица',
  `Type` varchar(20) NOT NULL COMMENT 'Тип Адреса',
  `Address` varchar(50) NOT NULL COMMENT 'Сам адрес',
  `Active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Активный контакт',
  `Send` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Рассылать сообщения',
  `Comments` varchar(2000) NOT NULL COMMENT 'Комментарий к адресу',
  `IntegrationId` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `UserId` int(11) NOT NULL COMMENT 'Id пользователя который добавил запись',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  `UpdateUserId` int(11) NOT NULL COMMENT 'Пользователь последний обновивший запись',
  `LastAdd` tinyint(4) NOT NULL DEFAULT '1',
  `NextSync` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата следующей синхронизации MailChimp',
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`ContactId`,`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=33982 DEFAULT CHARSET=utf8 COMMENT='Таблица телефонов и Email';

CREATE TABLE `Airport` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id записи',
  `DirectionId` int(11) NOT NULL COMMENT 'id страны',
  `AirportCode` varchar(10) NOT NULL COMMENT 'Международный код аэропорта',
  `AirportName` varchar(255) NOT NULL COMMENT 'Название аэропорта',
  `AirportCity` varchar(255) NOT NULL COMMENT 'Город',
  `AirportPhone` varchar(255) DEFAULT NULL,
  `AirportFax` varchar(255) DEFAULT NULL,
  `AirportEmail` varchar(255) DEFAULT NULL,
  `AirportSite` varchar(255) DEFAULT NULL COMMENT 'Ссылка на сайт или онлайн табло',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `AirportCode` (`AirportCode`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=205 DEFAULT CHARSET=utf8 COMMENT='Таблица аэропортов';

CREATE TABLE `Contacts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Клиента',
  `AccId` int(11) NOT NULL COMMENT 'Id юр. лица',
  `FirstName` varchar(50) NOT NULL COMMENT 'Имя',
  `LastName` varchar(50) NOT NULL COMMENT 'Фамилия',
  `MiddleName` varchar(50) DEFAULT NULL COMMENT 'Отчество',
  `UserId` int(11) NOT NULL COMMENT 'Id пользователя',
  `DateBirth` date NOT NULL COMMENT 'Дата рождения',
  `Sex` varchar(30) NOT NULL COMMENT 'Пол клиента',
  `Segment` varchar(30) DEFAULT 'NoSegment' COMMENT 'Сегмент лиента Перспективный, Активный, ВИП',
  `TaxCode` varchar(15) DEFAULT NULL COMMENT 'ИНН клиента',
  `Address` varchar(255) DEFAULT NULL COMMENT 'Адрес клиента',
  `Comments` varchar(2000) DEFAULT NULL COMMENT 'Комментарий',
  `IntegrationId` int(11) NOT NULL COMMENT 'Id для интеграции',
  `BlackList` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Клиент внесёл в чёрный список',
  `Source` varchar(20) DEFAULT NULL COMMENT 'Источник обращения: Dictionaries:LeadSource',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  KEY `idxAccId` (`AccId`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=38793 DEFAULT CHARSET=utf8 COMMENT='Все контакты в системе';

CREATE TABLE `ContactToContact` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id связи',
  `AccId` int(11) NOT NULL,
  `ContactId` int(11) NOT NULL COMMENT 'Контакт который связан',
  `ParrContactId` int(11) NOT NULL COMMENT 'Контакты связанные',
  `LinkType` varchar(50) DEFAULT NULL COMMENT 'Описание типа связи между контактами',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`ContactId`,`ParrContactId`)
) ENGINE=MyISAM AUTO_INCREMENT=26464 DEFAULT CHARSET=utf8 COMMENT='Таблица связей контакты к контактам.';

CREATE TABLE `DealParticipants` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id записи',
  `AccId` int(11) NOT NULL COMMENT 'Id организации',
  `DealId` int(11) NOT NULL COMMENT 'Id сделки',
  `ContactId` int(11) NOT NULL COMMENT 'Id Контакта',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добовления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`AccId`,`DealId`,`ContactId`),
  KEY `idx` (`AccId`,`DealId`,`ContactId`)
) ENGINE=MyISAM AUTO_INCREMENT=26233 DEFAULT CHARSET=utf8 COMMENT='Участники по сделке';

CREATE TABLE `Deals` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id сделки',
  `AccId` int(11) NOT NULL COMMENT 'Id организации',
  `ContactId` int(11) NOT NULL COMMENT 'Id контакта',
  `LegalId` int(11) NOT NULL DEFAULT '0' COMMENT 'Id юр. лица',
  `LeadId` int(11) NOT NULL DEFAULT '0' COMMENT 'Id запроса из которого получилась сделка',
  `DealType` varchar(30) NOT NULL COMMENT 'Тип сделки',
  `DealNo` varchar(30) NOT NULL COMMENT 'Номер сделки',
  `DealDate` date NOT NULL COMMENT 'Дата сделки',
  `DealSum` decimal(10,2) NOT NULL COMMENT 'Сума сделки',
  `DealSumFact` decimal(10,2) NOT NULL COMMENT 'Окончательная стоимость сделки',
  `DealCurrency` varchar(5) NOT NULL COMMENT 'Валюта сделки',
  `DealSumEquivalent` decimal(10,2) NOT NULL COMMENT 'Сума сделки в указанной валюте',
  `PrePaySum` decimal(10,2) NOT NULL COMMENT 'Сума предоплаты',
  `PrePayPercent` decimal(10,2) NOT NULL COMMENT 'Процент предоплаты',
  `DateFullPay` date NOT NULL COMMENT 'Дата полной оплаты',
  `CommercialCourse` decimal(10,2) NOT NULL COMMENT 'Коммерческий курс',
  `PercentDiscount` int(11) NOT NULL COMMENT 'Процент скидки',
  `DirectionId` int(11) NOT NULL COMMENT 'Id направления',
  `RegionId` int(11) NOT NULL COMMENT 'Id курорта',
  `PlacingId` varchar(30) NOT NULL COMMENT 'Id размещение',
  `HotelId` int(11) NOT NULL COMMENT 'Id отеля',
  `DateArrival` date NOT NULL COMMENT 'Дата начала тура',
  `DateDeparture` date NOT NULL COMMENT 'Дата окончания тура',
  `AmountNight` smallint(6) NOT NULL COMMENT 'Количество ночей',
  `FeedId` varchar(30) NOT NULL COMMENT 'Id питания',
  `FlatTypeId` varchar(30) NOT NULL COMMENT 'Id тип номера',
  `TransferId` varchar(30) NOT NULL COMMENT 'Id nрансферf',
  `Transport` varchar(255) NOT NULL COMMENT 'Трансворт авто/ автобус',
  `Insurance` tinyint(1) NOT NULL COMMENT 'Страховка Да/Нет',
  `OperatorId` int(11) NOT NULL COMMENT 'Id оператора',
  `Comments` varchar(2000) NOT NULL COMMENT 'Комментарий',
  `Visa` varchar(30) NOT NULL COMMENT 'Виза',
  `DocIssued` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Документы выданы или нет 0/1',
  `RoomViewId` varchar(30) NOT NULL COMMENT 'Id вид из номера',
  `OperatorInvoceNum` varchar(30) NOT NULL COMMENT '№ счёта оператора',
  `OperatorInvoceSum` decimal(10,2) NOT NULL COMMENT 'Сума счёта оператора',
  `OperatorInvoceDate` date NOT NULL COMMENT 'Дата счёта оператора',
  `FlightA` varchar(30) NOT NULL COMMENT 'Рейс А',
  `FlightACityArrivalId` varchar(50) NOT NULL COMMENT 'Рейс А город вылета',
  `FlightAArrivalDate` datetime NOT NULL COMMENT 'Рейс А вылет',
  `FlightACityDepartureId` varchar(50) NOT NULL COMMENT 'Рейс А город прилёта',
  `FlightADepartureDate` datetime NOT NULL COMMENT 'Рейс А прилёт',
  `FlightAComments` varchar(2000) DEFAULT NULL COMMENT 'Рейс А комментарий',
  `FlightB` varchar(30) NOT NULL COMMENT 'Рейс В',
  `FlightBCityArrivalId` varchar(50) NOT NULL COMMENT 'Рейс B город вылета',
  `FlightBArrivalDate` datetime NOT NULL COMMENT 'Рейс В вылет',
  `FlightBCityDepartureId` varchar(50) NOT NULL COMMENT 'Рейс B город прилёта',
  `FlightBDepartureDate` datetime NOT NULL COMMENT 'Рейс В прилёт',
  `FlightBComments` varchar(2000) DEFAULT NULL COMMENT 'Рейс B комментарий',
  `Act` varchar(30) NOT NULL COMMENT 'Акт',
  `ActDate` date NOT NULL COMMENT 'Дата акта',
  `AgentClient` varchar(30) NOT NULL DEFAULT 'Клиент' COMMENT 'Агент/клиент безнал/нал',
  `Invoice` varchar(30) NOT NULL COMMENT 'Счёт фактура',
  `UserId` int(11) NOT NULL COMMENT 'Id менеджера',
  `AdditionalServices` varchar(2000) DEFAULT NULL COMMENT 'Дополнительные услуги',
  `IntegrationId` int(11) DEFAULT NULL COMMENT 'Id для интеграции',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  KEY `idxMain` (`AccId`,`ContactId`,`LegalId`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=21072 DEFAULT CHARSET=utf8 COMMENT='Таблица сделок';

CREATE TABLE `Dictionaries` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL COMMENT 'Id организации',
  `Type` varchar(20) NOT NULL COMMENT 'Тип справочника',
  `SubType` varchar(30) NOT NULL COMMENT 'Подтип. Например. Тип Телефон, подтип, мобильный, домашний',
  `Name` varchar(40) NOT NULL COMMENT 'Значение справочника',
  `Lang` varchar(5) NOT NULL DEFAULT 'ru_RU',
  `LIC` varchar(20) NOT NULL COMMENT 'Независимый код от локали. Необходим для функции LookupValue',
  `OrderBy` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Сортировка',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  `Active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `idx_unique` (`AccId`,`Type`,`Lang`,`LIC`) USING BTREE,
  KEY `idxx` (`AccId`,`LIC`)
) ENGINE=MyISAM AUTO_INCREMENT=49521 DEFAULT CHARSET=utf8 COMMENT='Таблица справочников';

CREATE TABLE `dimDirection` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `DirectionName` varchar(255) NOT NULL COMMENT 'Название страны',
  `DirectionFullName` varchar(255) NOT NULL COMMENT 'Полное название страны',
  `DirectionRusName` varchar(255) NOT NULL,
  `DirectionAlpha2` varchar(2) NOT NULL,
  `DirectionAlpha3` varchar(3) NOT NULL,
  `DirectionISO` varchar(3) NOT NULL,
  `DiractionLocation` varchar(255) NOT NULL,
  `IntergationId` int(11) NOT NULL COMMENT 'Id Интеграции',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`DirectionName`)
) ENGINE=MyISAM AUTO_INCREMENT=286 DEFAULT CHARSET=utf8;

CREATE TABLE `dimHotels` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id отеля',
  `AccId` int(11) NOT NULL COMMENT 'Id организации',
  `DirectionId` int(11) NOT NULL COMMENT 'Id направления',
  `RegionId` int(11) NOT NULL DEFAULT '0' COMMENT 'Id региона',
  `HotelName` varchar(255) NOT NULL COMMENT 'Название отеля',
  `HotelStars` varchar(30) NOT NULL DEFAULT 'HotelStarsNull' COMMENT 'Количество звёзд',
  `HotelPhone` varchar(50) DEFAULT NULL COMMENT 'Телефон в отеле',
  `HotelFax` varchar(50) DEFAULT NULL COMMENT 'Fax в отеле',
  `HotelEmail` varchar(50) DEFAULT NULL COMMENT 'Email в отеле',
  `HotelWebSite` varchar(100) DEFAULT NULL COMMENT 'WebSite отеля',
  `HotelBeach` varchar(100) DEFAULT NULL COMMENT 'Пляж отеля',
  `HotelRating` varchar(30) DEFAULT NULL COMMENT 'Оценка отеля. ENGINE=HotelRating',
  `HotelType` varchar(50) DEFAULT NULL COMMENT 'Тип отеля',
  `HotelBeachLine` varchar(50) DEFAULT NULL COMMENT 'Линия от пляжа',
  `HotelTripAdvisor` varchar(50) DEFAULT NULL COMMENT 'Рейтинг tripadvisor',
  `TripAdvisorLink` varchar(100) DEFAULT NULL COMMENT 'Ссылка  tripadvisor',
  `HotelJurAddress` varchar(255) DEFAULT NULL COMMENT 'Юридический адрес отеля',
  `HotelJurName` varchar(255) DEFAULT NULL COMMENT 'Юридический название отеля',
  `Comments` varchar(2000) DEFAULT NULL COMMENT 'Комментарий',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`AccId`,`DirectionId`,`HotelName`),
  KEY `idx` (`AccId`,`DirectionId`,`RegionId`)
) ENGINE=MyISAM AUTO_INCREMENT=83302 DEFAULT CHARSET=utf8 COMMENT='Справочник отелей по странам';

CREATE TABLE `dimOperators` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id оператора',
  `AccId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL COMMENT 'Название оператора',
  `Phone` varchar(255) DEFAULT NULL COMMENT 'Телефон',
  `Email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `Commision` varchar(30) DEFAULT NULL COMMENT 'Размер коммисии',
  `WebSite` varchar(100) DEFAULT NULL COMMENT 'Ссылка на Web Site',
  `Address` varchar(255) DEFAULT NULL COMMENT 'Адрес оператора',
  `Comments` varchar(2000) DEFAULT NULL COMMENT 'Комментарий',
  `Login` varchar(50) DEFAULT NULL,
  `Pass` varchar(50) DEFAULT NULL,
  `DealNum` varchar(30) DEFAULT NULL COMMENT 'Номер договора',
  `DealDateStart` date DEFAULT NULL COMMENT 'Дата подписания договора',
  `DealDateEnd` date DEFAULT NULL COMMENT 'Дата окончания действия договора',
  `Active` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Действующий',
  `DirectPartners` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Принимающая сторона',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`AccId`,`Name`),
  KEY `idx` (`AccId`)
) ENGINE=MyISAM AUTO_INCREMENT=20000 DEFAULT CHARSET=utf8;

CREATE TABLE `dimRegion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL,
  `DirectionId` int(11) NOT NULL COMMENT 'Id страны',
  `RegionName` varchar(255) NOT NULL COMMENT 'Название направления',
  `RegionRating` varchar(30) DEFAULT NULL COMMENT 'Рейтинг региона',
  `Comments` varchar(2000) DEFAULT NULL COMMENT 'Комментарий',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`AccId`,`DirectionId`,`RegionName`),
  KEY `idx` (`AccId`,`DirectionId`)
) ENGINE=MyISAM AUTO_INCREMENT=65889 DEFAULT CHARSET=utf8;

CREATE TABLE `Documents` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL,
  `IntegrationId` int(11) DEFAULT NULL,
  `ContactId` int(11) NOT NULL,
  `DocType` varchar(10) NOT NULL COMMENT 'Тип документа в таблице dictionaries DocType',
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `SeriaNum` varchar(10) NOT NULL COMMENT 'Серия номер',
  `RecordNo` varchar(15) DEFAULT NULL COMMENT 'Запись №',
  `Valid` date NOT NULL COMMENT 'для укр паспорта дата выдачи, для иностранного дата действия',
  `IssuedBy` varchar(255) NOT NULL COMMENT 'Кем Выдан',
  `IssuedDate` date DEFAULT NULL COMMENT 'Дата Выдачи',
  `Biometric` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Биометрический да/нет',
  `Comments` varchar(2000) DEFAULT NULL COMMENT 'Комментарий к документу',
  `LastAdd` tinyint(1) DEFAULT '1',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`ContactId`)
) ENGINE=MyISAM AUTO_INCREMENT=36010 DEFAULT CHARSET=utf8;

CREATE TABLE `Embassy` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL,
  `DirectionId` varchar(100) NOT NULL,
  `EmbassyPhone` varchar(30) NOT NULL,
  `EmbassyEmail` varchar(50) NOT NULL,
  `EmbassyWebSite` varchar(255) NOT NULL,
  `EmbassyAddress` varchar(255) NOT NULL,
  `Comments` varchar(2000) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`DirectionId`,`AccId`),
  KEY `idx` (`AccId`,`DirectionId`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COMMENT='Информация по посольствам';

CREATE TABLE `Leads` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `AccId` int(11) NOT NULL COMMENT 'Id юр. лица',
  `BranchId` int(11) NOT NULL DEFAULT '0' COMMENT 'Id офиса',
  `DealId` int(11) NOT NULL DEFAULT '0' COMMENT 'Сделка созданная из запроса',
  `ContactId` int(11) DEFAULT '0' COMMENT 'Id карточки контакта в базе',
  `LeadDate` date NOT NULL COMMENT 'Текущая дата/время',
  `LeadStatus` varchar(20) NOT NULL DEFAULT 'New' COMMENT 'Статус запроса. Dic:LeadStatus',
  `LeadType` varchar(20) NOT NULL COMMENT 'Тип запроса Dic:LeadType',
  `LeadSource` varchar(20) NOT NULL COMMENT 'Источник обращения: Dic:LeadSource',
  `LeadPriority` varchar(11) NOT NULL DEFAULT 'Urgent' COMMENT 'Приоритет запроса Обычный/Важный/Срочный',
  `LastName` varchar(50) DEFAULT NULL COMMENT 'Фамилия',
  `FirstName` varchar(50) DEFAULT NULL COMMENT 'Имя',
  `MiddleName` varchar(50) DEFAULT NULL COMMENT 'Отчество',
  `Sex` varchar(20) NOT NULL COMMENT 'Пол Мужской/Женский',
  `Phone` varchar(20) DEFAULT NULL COMMENT 'Контактный телефон',
  `Email` varchar(40) DEFAULT NULL COMMENT 'Контактный Email',
  `LeadText` mediumtext COMMENT 'Запрос клиента',
  `ManagerText` mediumtext COMMENT 'Ответ менеджера',
  `PartnerId` int(11) DEFAULT NULL COMMENT 'От кого пришёл клиент',
  `UserId` int(11) DEFAULT NULL COMMENT 'Id пользователя на котором находится запрос клиента.',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`BranchId`)
) ENGINE=MyISAM AUTO_INCREMENT=12953 DEFAULT CHARSET=utf8 COMMENT='Таблица содержит предварительные данные по клиентам ';

CREATE TABLE `Legals` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Юр. лица',
  `AccId` int(11) NOT NULL,
  `LegalName` varchar(100) NOT NULL COMMENT 'Название Юр. Лица',
  `LegalCode` varchar(25) NOT NULL COMMENT 'ЕДРПОУ организации',
  `TaxNumber` varchar(10) NOT NULL COMMENT 'Налоговый номер организации',
  `TaxForm` varchar(25) NOT NULL COMMENT 'Форма плательщика налога',
  `SignerFIO` varchar(255) NOT NULL COMMENT 'ФИО подписанта',
  `SignerPosition` varchar(255) NOT NULL COMMENT 'Должность подписанта',
  `SignerBasis` varchar(255) NOT NULL COMMENT 'Основание для подписи (Статут, довененость и т.д.)',
  `AccountantFIO` varchar(255) NOT NULL COMMENT 'ФИО бухгалтера',
  `VATcertificateNumber` varchar(25) NOT NULL COMMENT 'Номер свидетельства НДС',
  `LegalOfficeAddress` varchar(255) NOT NULL COMMENT 'Юридический адрес организации',
  `LegalFactAddress` varchar(255) NOT NULL COMMENT 'Фактический адрес организации',
  `LegalOfficePhone` varchar(50) NOT NULL COMMENT 's',
  `LegalOfficeFax` varchar(50) NOT NULL,
  `LegalOfficeMobile` varchar(50) NOT NULL,
  `LegalOfficeEmail` varchar(50) NOT NULL,
  `LegalBankName` varchar(50) NOT NULL COMMENT 'Название банка',
  `LegalAccountNum` varchar(15) NOT NULL COMMENT 'Номер счета',
  `LegalBankIban` varchar(35) DEFAULT NULL COMMENT 'Международный счёт Iban',
  `LegalMFO` varchar(6) NOT NULL COMMENT 'МФО банка',
  `LegalDealStart` date NOT NULL,
  `LegalDealEnd` date NOT NULL,
  `LegalComments` varchar(2000) NOT NULL COMMENT 'Коментарий',
  `UserId` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`)
) ENGINE=MyISAM AUTO_INCREMENT=759 DEFAULT CHARSET=utf8;

CREATE TABLE `LegalToContact` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL,
  `LegalId` int(11) NOT NULL COMMENT 'Юр лицо связанное',
  `ContactId` int(11) NOT NULL COMMENT 'Контакты связанные',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  `LinkType` varchar(50) DEFAULT NULL COMMENT 'Тип связи',
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`LegalId`,`ContactId`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

CREATE TABLE `Notes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `UserId` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=utf8 COMMENT='Заметки менеджера';

CREATE TABLE `OperatorsDirections` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id записи',
  `AccId` int(11) NOT NULL COMMENT 'Id организации',
  `OperatorId` int(11) NOT NULL COMMENT 'Id оператора',
  `DirectionId` int(11) NOT NULL COMMENT 'Id направления',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добовления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`OperatorId`,`DirectionId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Направления которые продают операторы';

CREATE TABLE `Payments` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id записи',
  `AccId` int(11) DEFAULT NULL COMMENT 'Id компании в системе',
  `DealId` int(11) DEFAULT NULL COMMENT 'Id сделки',
  `PayType` varchar(10) NOT NULL COMMENT 'Тип платежа (приход, расход)',
  `PaySum` decimal(10,2) DEFAULT NULL COMMENT 'Сума платежа',
  `PayCource` decimal(10,2) DEFAULT NULL COMMENT 'Курс платежа',
  `PayCurrency` varchar(50) DEFAULT NULL COMMENT 'Валюта платежа',
  `PayEquivalent` decimal(10,2) DEFAULT NULL COMMENT 'Эквивалент в валюте',
  `PayDate` date DEFAULT NULL COMMENT 'Дата платежа',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  `Comments` varchar(255) NOT NULL COMMENT 'Комментарий к платежу',
  `Payer` varchar(255) NOT NULL COMMENT 'ФИО плательщика',
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`DealId`)
) ENGINE=MyISAM AUTO_INCREMENT=17988 DEFAULT CHARSET=utf8 COMMENT='Платежи по сделкам';

CREATE TABLE `SessionLog` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SessionId` varchar(30) NOT NULL,
  `UserId` int(11) NOT NULL,
  `LogIn` datetime NOT NULL,
  `LogOut` datetime DEFAULT NULL,
  `Browser` varchar(100) DEFAULT NULL,
  `Platform` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `idx` (`UserId`,`LogOut`,`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=46343 DEFAULT CHARSET=utf8;

CREATE TABLE `SrvTasks` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL,
  `CreatorId` int(11) NOT NULL,
  `Params` varchar(2000) NOT NULL,
  `Start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `End` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Status` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`CreatorId`)
) ENGINE=MyISAM AUTO_INCREMENT=5910 DEFAULT CHARSET=utf8;

CREATE TABLE `Tasks` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL,
  `CreatorId` int(11) NOT NULL,
  `UserId` varchar(255) NOT NULL,
  `Start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `End` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Title` varchar(100) NOT NULL,
  `Task` varchar(255) DEFAULT NULL,
  `Done` char(1) NOT NULL DEFAULT 'N',
  `ModelType` varchar(50) DEFAULT NULL,
  `ModelId` int(11) DEFAULT NULL,
  `SendEmail` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Отправлять = 1 не отправлять = 0 email на пользователя.',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `idxAccId` (`AccId`)
) ENGINE=MyISAM AUTO_INCREMENT=58145 DEFAULT CHARSET=utf8;

CREATE TABLE `Templates` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL,
  `Module` varchar(10) NOT NULL COMMENT 'Модуль',
  `Name` varchar(255) NOT NULL COMMENT 'Название шаблона',
  `Template` mediumtext NOT NULL COMMENT 'Сам шаблон',
  `Active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1/0 активный/не активный',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`AccId`,`Module`,`Name`),
  KEY `idx` (`AccId`,`Module`,`Active`)
) ENGINE=MyISAM AUTO_INCREMENT=1640 DEFAULT CHARSET=utf8;

CREATE TABLE `Uploads` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id записи',
  `AccId` int(11) NOT NULL COMMENT 'Id организации',
  `ModelType` varchar(50) NOT NULL COMMENT 'Тип модели данных contact/legal/leads/deals',
  `ModelId` int(11) NOT NULL COMMENT 'Id модели данных contact/legal/leads/deals',
  `FileName` varchar(255) NOT NULL COMMENT 'Имя файла',
  `FileType` varchar(50) NOT NULL COMMENT 'Тип файла',
  `FileSize` int(11) NOT NULL COMMENT 'Размер файла в байтах',
  `FilePath` varchar(2000) NOT NULL COMMENT 'Ссылка на место хранение файла',
  `Comments` varchar(255) NOT NULL DEFAULT '' COMMENT 'Комментарий',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `idx` (`AccId`,`ModelType`,`ModelId`)
) ENGINE=MyISAM AUTO_INCREMENT=3839 DEFAULT CHARSET=utf8 COMMENT='Таблица файлов';

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `AccId` int(11) NOT NULL COMMENT 'Id юр. лица',
  `BranchId` int(11) NOT NULL DEFAULT '0' COMMENT 'Id отделения',
  `Login` varchar(50) DEFAULT NULL COMMENT 'Login пользователя',
  `Pass` char(32) NOT NULL,
  `Role` varchar(50) NOT NULL COMMENT 'Роль пользователя "admin", "user"',
  `FirstName` varchar(20) NOT NULL COMMENT 'Имя',
  `LastName` varchar(20) NOT NULL COMMENT 'Фамилия',
  `Phone` varchar(20) NOT NULL COMMENT 'Телефон',
  `Email` varchar(50) NOT NULL COMMENT 'Email',
  `Lang` varchar(5) NOT NULL DEFAULT 'ru_RU' COMMENT 'Язык пользователя',
  `Commission` int(11) NOT NULL DEFAULT '0' COMMENT 'Персональная коммисия менеджера',
  `Inactive` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Уволеный, не уволеный сотрудник',
  `TaskColor` varchar(50) NOT NULL DEFAULT '#3a87ad',
  `TelegramChatId` varchar(10) NOT NULL COMMENT 'Telegram ChatId',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления записи',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Login` (`Login`),
  KEY `AccId` (`AccId`,`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1508 DEFAULT CHARSET=utf8 COMMENT='Сотрудники организациии';

CREATE TABLE `UsersBranches` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccId` int(11) NOT NULL DEFAULT '0',
  `UserId` int(11) DEFAULT '0',
  `BranchId` int(11) DEFAULT '0',
  `Comments` varchar(255) DEFAULT '0',
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=535 DEFAULT CHARSET=utf8;

CREATE TABLE `UsersToken` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `Token` varchar(50) NOT NULL COMMENT 'Token пользователя',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления записи',
  `Email` varchar(50) NOT NULL,
  `Login` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
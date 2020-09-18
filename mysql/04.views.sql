DROP VIEW IF EXISTS `vUsers`;
CREATE VIEW `vUsers`
AS SELECT
   `Users`.`Id` AS `Id`,
   `Users`.`AccId` AS `AccId`,
   `Users`.`BranchId` AS `BranchId`,
   `Users`.`Login` AS `Login`,
   `Users`.`Pass` AS `Pass`,
   `Users`.`Role` AS `Role`,
   `Users`.`FirstName` AS `FirstName`,
   `Users`.`LastName` AS `LastName`,
   `Users`.`Phone` AS `Phone`,
   `Users`.`Email` AS `Email`,
   `Users`.`Lang` AS `Lang`,
   `Users`.`Commission` AS `Commission`,concat(ifnull(`Users`.`LastName`,''),' ',ifnull(`Users`.`FirstName`,'')) AS `ManagerName`,
   `Users`.`Inactive` AS `Inactive`,
   `Users`.`TaskColor` AS `TaskColor`,
   `Users`.`TelegramChatId` AS `TelegramChatId`
FROM `Users`;

DROP VIEW IF EXISTS `vDocuments`;
CREATE VIEW `vDocuments`
AS SELECT
   `d`.`Id` AS `Id`,
   `d`.`AccId` AS `AccId`,
   `d`.`ContactId` AS `ContactId`,
   `d`.`DocType` AS `DocType`,
   `ds`.`Name` AS `DocTypeName`,
   `d`.`FirstName` AS `FirstName`,
   `d`.`LastName` AS `LastName`,
   `d`.`RecordNo` AS `RecordNo`,
   `d`.`SeriaNum` AS `SeriaNum`,date_format(`d`.`Valid`,'%d.%m.%Y') AS `Valid`,
   `d`.`IssuedBy` AS `IssuedBy`,date_format(`d`.`IssuedDate`,'%d.%m.%Y') AS `IssuedDate`,
   `d`.`Created` AS `Created`,
   `d`.`Comments` AS `Comments`,
   `d`.`Biometric` AS `Biometric`,
   `d`.`LastAdd` AS `LastAdd`,(case when (`up`.`Id` is not null) then 1 else 0 end) AS `ScanExists`
FROM ((`Documents` `d` join `Dictionaries` `ds` on(((`d`.`DocType` = `ds`.`LIC`) and (`d`.`AccId` = `ds`.`AccId`) and (`ds`.`Lang` = 'ru_RU')))) left join `Uploads` `up` on(((`d`.`AccId` = `up`.`AccId`) and (`d`.`Id` = `up`.`ModelId`) and (`up`.`ModelType` = 'documents'))));

DROP VIEW IF EXISTS `vAddress`;
CREATE VIEW `vAddress`
AS SELECT
   `ad`.`Id` AS `Id`,
   `ad`.`AccId` AS `AccId`,
   `ad`.`ContactId` AS `ContactId`,
   `ad`.`LegalId` AS `LegalId`,
   `ad`.`Type` AS `Type`,
   `dic`.`Name` AS `TypeName`,
   `dic`.`SubType` AS `SubType`,
   `ad`.`Address` AS `Address`,
   `ad`.`Comments` AS `Comments`,
   `ad`.`Active` AS `Active`,
   `ad`.`Send` AS `Send`,
   `ad`.`UserId` AS `UserId`,
   `ad`.`UpdateUserId` AS `UpdateUserId`,
   `ad`.`LastAdd` AS `LastAdd`
FROM (`Address` `ad` join `Dictionaries` `dic` on(((`ad`.`AccId` = `dic`.`AccId`) and (`ad`.`Type` = `dic`.`LIC`) and (`dic`.`Type` = 'AddressType') and (`dic`.`Lang` = 'ru_RU'))));

DROP VIEW IF EXISTS `vContacts`;
CREATE VIEW `vContacts`
AS SELECT
   `c`.`Id` AS `Id`,
   `c`.`AccId` AS `AccId`,
   `c`.`LastName` AS `LastName`,
   `c`.`FirstName` AS `FirstName`,
   `c`.`MiddleName` AS `MiddleName`,
   `c`.`UserId` AS `UserId`,
   `u`.`ManagerName` AS `ManagerName`,
   `c`.`DateBirth` AS `DateBirthOriginal`,date_format(`c`.`DateBirth`,'%d.%m.%Y') AS `DateBirth`,concat(convert(date_format(`c`.`DateBirth`,'%d.%m.%Y') using utf8mb4),' (',timestampdiff(YEAR,`c`.`DateBirth`,curdate()),')') AS `DateBirthAge`,
   `c`.`Comments` AS `Comments`,
   `c`.`Sex` AS `Sex`,
   `sex`.`Name` AS `SexName`,
   `c`.`Segment` AS `Segment`,
   `ds`.`Name` AS `SegmentName`,
   `c`.`TaxCode` AS `TaxCode`,
   `c`.`Address` AS `Address`,
   `c`.`BlackList` AS `BlackList`,
   `c`.`Created` AS `Created`,
   `c`.`LastUpdate` AS `LastUpdate`,
   `doc`.`FirstName` AS `docFirstName`,
   `doc`.`LastName` AS `docLastName`,
   `doc`.`SeriaNum` AS `docSeriaNum`,
   `doc`.`IssuedBy` AS `docIssuedBy`,
   `doc`.`IssuedDate` AS `docIssuedDate`,
   `doc`.`Valid` AS `docValid`,
   `doc`.`Biometric` AS `docBiometric`,
   `p`.`Address` AS `PhoneMob`,
   `e`.`Address` AS `EmailHome`,
   `c`.`Source` AS `Source`,
   `dso`.`Name` AS `SourceName`
FROM (((((((`Contacts` `c` left join `vUsers` `u` on((`c`.`UserId` = `u`.`Id`))) left join `Dictionaries` `dso` on(((`c`.`Source` = `dso`.`LIC`) and (`c`.`AccId` = `dso`.`AccId`) and (`dso`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `ds` on(((`c`.`Segment` = `ds`.`LIC`) and (`c`.`AccId` = `ds`.`AccId`) and (`ds`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `sex` on(((`c`.`Sex` = `sex`.`LIC`) and (`c`.`AccId` = `sex`.`AccId`) and (`sex`.`Lang` = `u`.`Lang`)))) left join `vDocuments` `doc` on(((`c`.`AccId` = `doc`.`AccId`) and (`c`.`Id` = `doc`.`ContactId`) and (`doc`.`DocType` = 'intPass') and (`doc`.`LastAdd` = 1)))) left join `vAddress` `p` on(((`c`.`AccId` = `p`.`AccId`) and (`c`.`Id` = `p`.`ContactId`) and (`p`.`Type` = 'PhoneMob') and (`p`.`LastAdd` = 1)))) left join `vAddress` `e` on(((`c`.`AccId` = `e`.`AccId`) and (`c`.`Id` = `e`.`ContactId`) and (`e`.`Type` = 'EmailHome') and (`e`.`LastAdd` = 1))));

DROP VIEW IF EXISTS `vAirport`;
CREATE VIEW `vAirport`
AS SELECT
   `ap`.`Id` AS `Id`,
   `ap`.`DirectionId` AS `DirectionId`,
   `dd`.`DirectionName` AS `AirportCountry`,
   `ap`.`AirportCode` AS `AirportCode`,
   `ap`.`AirportName` AS `AirportName`,
   `ap`.`AirportCity` AS `AirportCity`,
   `ap`.`AirportPhone` AS `AirportPhone`,
   `ap`.`AirportFax` AS `AirportFax`,
   `ap`.`AirportEmail` AS `AirportEmail`,
   `ap`.`AirportSite` AS `AirportSite`,(case when (`ap`.`Id` = 1) then '' else concat(`dd`.`DirectionName`,', ',`ap`.`AirportCity`,', ',`ap`.`AirportName`,', (',`ap`.`AirportCode`,')') end) AS `AirportConcat`
FROM (`Airport` `ap` left join `dimDirection` `dd` on((`ap`.`DirectionId` = `dd`.`Id`)));

DROP VIEW IF EXISTS `printDeals`;
CREATE VIEW `printDeals`
AS SELECT
   `d`.`Id` AS `Id`,
   `d`.`AccId` AS `AccId`,
   `d`.`ContactId` AS `ContactId`,concat(ifnull(`c`.`LastName`,''),' ',ifnull(`c`.`FirstName`,''),' ',ifnull(`c`.`MiddleName`,'')) AS `ContactFullName`,
   `c`.`TaxCode` AS `TaxCode`,
   `c`.`Address` AS `Address`,
   `c`.`DateBirth` AS `DateBirth`,
   `c`.`PhoneMob` AS `PhoneMob`,
   `c`.`EmailHome` AS `EmailHome`,
   `d`.`LegalId` AS `LegalId`,
   `d`.`DealType` AS `DealType`,
   `dt`.`Name` AS `DealTypeName`,
   `d`.`DealNo` AS `DealNo`,date_format(`d`.`DealDate`,'%d.%m.%Y') AS `DealDate`,dayofmonth(`d`.`DealDate`) AS `DealDay`,(case when (month(`d`.`DealDate`) = 1) then 'Січень' when (month(`d`.`DealDate`) = 2) then 'Лютий' when (month(`d`.`DealDate`) = 3) then 'Березень' when (month(`d`.`DealDate`) = 4) then 'Квітень' when (month(`d`.`DealDate`) = 5) then 'Травень' when (month(`d`.`DealDate`) = 6) then 'Червень' when (month(`d`.`DealDate`) = 7) then 'Липень' when (month(`d`.`DealDate`) = 8) then 'Серпень' when (month(`d`.`DealDate`) = 9) then 'Вересень' when (month(`d`.`DealDate`) = 10) then 'Жовтень' when (month(`d`.`DealDate`) = 11) then 'Листопад' when (month(`d`.`DealDate`) = 12) then 'Грудень' else 'Невідомо' end) AS `DealMonth`,year(`d`.`DealDate`) AS `DealYear`,
   `d`.`DealSum` AS `DealSum`,round((`d`.`DealSum` - `d`.`OperatorInvoceSum`),2) AS `DealSumPremia`,round(((`d`.`DealSum` - `d`.`OperatorInvoceSum`) / 6),2) AS `VAT`,
   `fin2str_ukr`((`d`.`DealSum` - `d`.`OperatorInvoceSum`)) AS `DealSumPremiaString`,
   `fin2str_ukr`(`d`.`DealSum`) AS `DealSumString`,
   `d`.`DealSumFact` AS `DealSumFact`,round((`d`.`DealSumFact` - `d`.`OperatorInvoceSum`),2) AS `DealSumFactPremia`,round(((`d`.`DealSumFact` - `d`.`OperatorInvoceSum`) / 6),2) AS `VATFact`,
   `fin2str_ukr`((`d`.`DealSumFact` - `d`.`OperatorInvoceSum`)) AS `DealSumFactPremiaString`,
   `fin2str_ukr`(`d`.`DealSumFact`) AS `DealSumFactString`,
   `d`.`PrePaySum` AS `PrePaySum`,
   `fin2str_ukr`(`d`.`PrePaySum`) AS `PrePaySumString`,
   `d`.`PrePayPercent` AS `PrePayPercent`,
   `d`.`DateFullPay` AS `DateFullPay`,
   `d`.`DealSumEquivalent` AS `DealSumEquivalent`,
   `d`.`CommercialCourse` AS `CommercialCourse`,
   `d`.`PercentDiscount` AS `PercentDiscount`,
   `d`.`DirectionId` AS `DirectionId`,
   `dir`.`DirectionName` AS `DirectionName`,
   `d`.`RegionId` AS `RegionId`,
   `reg`.`RegionName` AS `RegionName`,
   `d`.`HotelId` AS `HotelId`,
   `hot`.`HotelName` AS `HotelName`,
   `hot`.`HotelStars` AS `HotelStars`,
   `hot`.`HotelJurAddress` AS `HotelJurAddress`,
   `hot`.`HotelJurName` AS `HotelJurName`,
   `st`.`Name` AS `HotelStarsName`,
   `d`.`PlacingId` AS `PlacingId`,
   `pt`.`Name` AS `PlacingTypeName`,
   `d`.`UserId` AS `UserId`,
   `u`.`ManagerName` AS `ManagerName`,date_format(`d`.`DateArrival`,'%d.%m.%Y') AS `DateArrival`,date_format(`d`.`DateDeparture`,'%d.%m.%Y') AS `DateDeparture`,
   `d`.`AmountNight` AS `AmountNight`,
   `d`.`FeedId` AS `FeedId`,
   `df`.`Name` AS `FeedName`,
   `d`.`FlatTypeId` AS `FlatTypeId`,
   `dft`.`Name` AS `FlatTypeName`,
   `d`.`TransferId` AS `TransferId`,
   `tr`.`Name` AS `TransferName`,
   `d`.`Transport` AS `Transport`,(case when (`d`.`Insurance` = 1) then 'ТАК' else 'НІ' end) AS `Insurance`,
   `d`.`OperatorId` AS `OperatorId`,
   `op`.`Name` AS `OperatorName`,
   `op`.`Phone` AS `OperatorPhone`,
   `op`.`Email` AS `OperatorEmail`,
   `op`.`Address` AS `OperatorAddress`,
   `op`.`DealNum` AS `OperatorDealNum`,date_format(`op`.`DealDateStart`,'%d.%m.%Y') AS `DealDateStart`,date_format(`op`.`DealDateEnd`,'%d.%m.%Y') AS `DealDateEnd`,
   `d`.`Comments` AS `Comments`,
   `d`.`Visa` AS `Visa`,
   `d`.`DocIssued` AS `DocIssued`,
   `d`.`RoomViewId` AS `RoomViewId`,
   `rw`.`Name` AS `RoomViewName`,
   `d`.`OperatorInvoceSum` AS `OperatorInvoceSum`,
   `d`.`OperatorInvoceNum` AS `OperatorInvoceNum`,date_format(`d`.`OperatorInvoceDate`,'%d.%m.%Y') AS `OperatorInvoceDate`,
   `d`.`FlightA` AS `FlightA`,date_format(`d`.`FlightAArrivalDate`,'%d.%m.%Y %H:%i:%s') AS `FlightAArrivalDate`,date_format(`d`.`FlightADepartureDate`,'%d.%m.%Y %H:%i:%s') AS `FlightADepartureDate`,
   `d`.`FlightB` AS `FlightB`,date_format(`d`.`FlightBArrivalDate`,'%d.%m.%Y %H:%i:%s') AS `FlightBArrivalDate`,date_format(`d`.`FlightBDepartureDate`,'%d.%m.%Y %H:%i:%s') AS `FlightBDepartureDate`,
   `d`.`Act` AS `Act`,date_format(`d`.`ActDate`,'%d.%m.%Y') AS `ActDate`,
   `d`.`AgentClient` AS `AgentClient`,
   `ac`.`Name` AS `AgentClientName`,
   `d`.`Invoice` AS `Invoice`,date_format(`d`.`Created`,'%d.%m.%Y') AS `Created`,
   `d`.`DealCurrency` AS `DealCurrency`,
   `dcc`.`Name` AS `DealCurrencyName`,
   `doc`.`SeriaNum` AS `ukrSeriaNum`,
   `doc`.`IssuedDate` AS `ukrIssuedDate`,
   `doc`.`IssuedBy` AS `ukrIssuedBy`,
   `aa`.`AirportConcat` AS `FlightAArrivalAirport`,
   `ad`.`AirportConcat` AS `FlightACityDepartureAirport`,
   `ba`.`AirportConcat` AS `FlightBCityArrivalAirport`,
   `bd`.`AirportConcat` AS `FlightBCityDepartureAirport`,
   `d`.`AdditionalServices` AS `AdditionalServices`
FROM ((((((((((((((((((((`Deals` `d` join `vContacts` `c` on(((`d`.`AccId` = `c`.`AccId`) and (`d`.`ContactId` = `c`.`Id`)))) join `vUsers` `u` on(((`d`.`UserId` = `u`.`Id`) and (`d`.`AccId` = `u`.`AccId`)))) left join `vDocuments` `doc` on(((`c`.`Id` = `doc`.`ContactId`) and (`c`.`AccId` = `doc`.`AccId`) and (`doc`.`DocType` = 'ukrPass') and (`doc`.`LastAdd` = 1)))) join `Dictionaries` `dt` on(((`d`.`DealType` = `dt`.`LIC`) and (`d`.`AccId` = `dt`.`AccId`) and (`dt`.`Lang` = `u`.`Lang`)))) join `Dictionaries` `dcc` on(((`d`.`DealCurrency` = `dcc`.`LIC`) and (`d`.`AccId` = `dcc`.`AccId`) and (`dcc`.`Lang` = `u`.`Lang`)))) join `Dictionaries` `df` on(((`d`.`FeedId` = `df`.`LIC`) and (`d`.`AccId` = `df`.`AccId`) and (`df`.`Lang` = `u`.`Lang`)))) join `Dictionaries` `dft` on(((`d`.`FlatTypeId` = `dft`.`LIC`) and (`d`.`AccId` = `dft`.`AccId`) and (`dft`.`Lang` = `u`.`Lang`)))) join `Dictionaries` `tr` on(((`d`.`TransferId` = `tr`.`LIC`) and (`d`.`AccId` = `tr`.`AccId`) and (`tr`.`Lang` = `u`.`Lang`)))) join `Dictionaries` `rw` on(((`d`.`RoomViewId` = `rw`.`LIC`) and (`d`.`AccId` = `rw`.`AccId`) and (`rw`.`Lang` = `u`.`Lang`)))) join `Dictionaries` `ac` on(((`d`.`AgentClient` = `ac`.`LIC`) and (`d`.`AccId` = `ac`.`AccId`) and (`ac`.`Lang` = `u`.`Lang`)))) join `Dictionaries` `pt` on(((`d`.`PlacingId` = `pt`.`LIC`) and (`d`.`AccId` = `pt`.`AccId`) and (`pt`.`Lang` = `u`.`Lang`)))) left join `dimDirection` `dir` on((`d`.`DirectionId` = `dir`.`Id`))) left join `dimRegion` `reg` on(((`d`.`AccId` = `reg`.`AccId`) and (`d`.`RegionId` = `reg`.`Id`)))) left join `dimHotels` `hot` on(((`d`.`AccId` = `hot`.`AccId`) and (`d`.`HotelId` = `hot`.`Id`)))) left join `Dictionaries` `st` on(((`hot`.`HotelStars` = `st`.`LIC`) and (`d`.`AccId` = `st`.`AccId`) and (`st`.`Lang` = `u`.`Lang`)))) left join `dimOperators` `op` on(((`d`.`AccId` = `op`.`AccId`) and (`d`.`OperatorId` = `op`.`Id`)))) left join `vAirport` `aa` on((`d`.`FlightACityArrivalId` = `aa`.`Id`))) left join `vAirport` `ad` on((`d`.`FlightACityDepartureId` = `ad`.`Id`))) left join `vAirport` `ba` on((`d`.`FlightBCityArrivalId` = `ba`.`Id`))) left join `vAirport` `bd` on((`d`.`FlightBCityDepartureId` = `bd`.`Id`)));

DROP VIEW IF EXISTS `rDeals`;
CREATE ALGORITHM=UNDEFINED DEFINER=`zhevak_tmp`@`%` SQL SECURITY DEFINER VIEW `rDeals`
AS SELECT
   `d`.`Id` AS `Id`,
   `d`.`AccId` AS `AccId`,
   `d`.`DealDate` AS `DealDate`,
   `d`.`DealNo` AS `DealNo`,
   `d`.`ContactId` AS `ContactId`,(case when (month(`d`.`DealDate`) = 1) then 'Січень' when (month(`d`.`DealDate`) = 2) then 'Лютий' when (month(`d`.`DealDate`) = 3) then 'Березень' when (month(`d`.`DealDate`) = 4) then 'Квітень' when (month(`d`.`DealDate`) = 5) then 'Травень' when (month(`d`.`DealDate`) = 6) then 'Червень' when (month(`d`.`DealDate`) = 7) then 'Липень' when (month(`d`.`DealDate`) = 8) then 'Серпень' when (month(`d`.`DealDate`) = 9) then 'Вересень' when (month(`d`.`DealDate`) = 10) then 'Жовтень' when (month(`d`.`DealDate`) = 11) then 'Листопад' when (month(`d`.`DealDate`) = 12) then 'Грудень' else 'Невідомо' end) AS `DealMonthName`,year(`d`.`DealDate`) AS `DealYear`,(case when (month(`d`.`DealDate`) < 10) then concat('0',month(`d`.`DealDate`)) else month(`d`.`DealDate`) end) AS `DealMonth`,
   `d`.`DealSum` AS `DealSum`,round((`d`.`DealSum` - `d`.`OperatorInvoceSum`),2) AS `DealSumPremia`,
   `d`.`DealSumEquivalent` AS `DealSumEquivalent`,
   `d`.`AgentClient` AS `AgentClient`,
   `d`.`UserId` AS `UserId`,
   `u`.`ManagerName` AS `ManagerName`,
   `u`.`Commission` AS `Commission`,round(((`d`.`DealSum` - `d`.`OperatorInvoceSum`) * (`u`.`Commission` / 100)),2) AS `ManagerPremia`,
   `d`.`DirectionId` AS `DirectionId`,
   `dir`.`DirectionName` AS `DirectionName`,
   `d`.`OperatorId` AS `OperatorId`,
   `op`.`Name` AS `OperatorName`,
   `d`.`OperatorInvoceSum` AS `OperatorInvoceSum`
FROM (((`Deals` `d` join `vUsers` `u` on(((`d`.`UserId` = `u`.`Id`) and (`d`.`AccId` = `u`.`AccId`)))) left join `dimDirection` `dir` on((`d`.`DirectionId` = `dir`.`Id`))) left join `dimOperators` `op` on(((`d`.`AccId` = `op`.`AccId`) and (`d`.`OperatorId` = `op`.`Id`))));



DROP VIEW IF EXISTS `vAddressMaxDate`;
CREATE VIEW `vAddressMaxDate`
AS SELECT
   `Address`.`AccId` AS `AccId`,
   `Address`.`ContactId` AS `ContactId`,
   `Address`.`Type` AS `Type`,max(`Address`.`Created`) AS `maxDateAdd`
FROM `Address` group by `Address`.`AccId`,`Address`.`ContactId`,`Address`.`Type`;


DROP VIEW IF EXISTS `vContactToContact`;
CREATE VIEW `vContactToContact`
AS SELECT
   `cc`.`Id` AS `Id`,
   `cc`.`AccId` AS `AccId`,
   `cc`.`ContactId` AS `ContactId`,
   `cc`.`ParrContactId` AS `ParrContactId`,
   `cl`.`FirstName` AS `ParrFirstName`,
   `cl`.`LastName` AS `ParrLastName`,
   `cl`.`MiddleName` AS `ParrMiddleName`,
   `cl`.`UserId` AS `ParrUseId`,
   `cl`.`ManagerName` AS `ParrManagerName`,
   `cc`.`LinkType` AS `LinkType`
FROM (`ContactToContact` `cc` join `vContacts` `cl` on(((`cc`.`ParrContactId` = `cl`.`Id`) and (`cc`.`AccId` = `cl`.`AccId`))));

DROP VIEW IF EXISTS `vDealParticipants`;
CREATE VIEW `vDealParticipants`
AS SELECT
   `dp`.`Id` AS `Id`,
   `dp`.`AccId` AS `AccId`,
   `dp`.`DealId` AS `DealId`,
   `dp`.`ContactId` AS `ContactId`,
   `cl`.`FirstName` AS `FirstName`,
   `cl`.`LastName` AS `LastName`,
   `cl`.`MiddleName` AS `MiddleName`,
   `cl`.`TaxCode` AS `TaxCode`,
   `cl`.`DateBirth` AS `DateBirth`,
   `cl`.`DateBirthAge` AS `DateBirthAge`,
   `cl`.`docFirstName` AS `docFirstName`,
   `cl`.`docLastName` AS `docLastName`,
   `cl`.`docSeriaNum` AS `docSeriaNum`,
   `cl`.`docValid` AS `docValid`,
   `cl`.`docBiometric` AS `docBiometric`,
   `dp`.`Created` AS `PartCreated`,
   `dp`.`LastUpdate` AS `PartLastUpdate`
FROM (`DealParticipants` `dp` join `vContacts` `cl` on(((`dp`.`ContactId` = `cl`.`Id`) and (`dp`.`AccId` = `cl`.`AccId`))));

DROP VIEW IF EXISTS `vDeals`;
CREATE VIEW `vDeals`
AS SELECT
   `d`.`Id` AS `Id`,
   `d`.`AccId` AS `AccId`,
   `d`.`ContactId` AS `ContactId`,concat(ifnull(`c`.`LastName`,''),' ',ifnull(`c`.`FirstName`,''),' ',ifnull(`c`.`MiddleName`,'')) AS `ContactFullName`,
   `d`.`LegalId` AS `LegalId`,
   `l`.`LegalName` AS `LegalName`,
   `l`.`LegalCode` AS `LegalCode`,
   `d`.`DealType` AS `DealType`,
   `dt`.`Name` AS `DealTypeName`,
   `d`.`DealNo` AS `DealNo`,
   `d`.`DealDate` AS `DealDateOriginal`,date_format(`d`.`DealDate`,'%d.%m.%Y') AS `DealDate`,
   `d`.`DealSum` AS `DealSum`,
   `d`.`DealSumFact` AS `DealSumFact`,
   `d`.`DealSumEquivalent` AS `DealSumEquivalent`,
   `fin2str_ukr`(`d`.`DealSum`) AS `DealSumString`,
   `d`.`PrePaySum` AS `PrePaySum`,
   `d`.`PrePayPercent` AS `PrePayPercent`,date_format(`d`.`DateFullPay`,'%d.%m.%Y') AS `DateFullPay`,
   `d`.`CommercialCourse` AS `CommercialCourse`,
   `d`.`PercentDiscount` AS `PercentDiscount`,
   `d`.`DirectionId` AS `DirectionId`,
   `dir`.`DirectionName` AS `DirectionName`,
   `d`.`RegionId` AS `RegionId`,
   `reg`.`RegionName` AS `RegionName`,
   `d`.`HotelId` AS `HotelId`,
   `hot`.`HotelName` AS `HotelName`,
   `hot`.`HotelStars` AS `HotelStars`,
   `d`.`PlacingId` AS `PlacingId`,
   `pt`.`Name` AS `PlacingTypeName`,
   `d`.`UserId` AS `UserId`,
   `u`.`ManagerName` AS `ManagerName`,date_format(`d`.`DateArrival`,'%d.%m.%Y') AS `DateArrival`,
   `d`.`DateArrival` AS `DateArrivalOriginal`,date_format(`d`.`DateDeparture`,'%d.%m.%Y') AS `DateDeparture`,
   `d`.`DateDeparture` AS `DateDepartureOriginal`,
   `d`.`AmountNight` AS `AmountNight`,
   `d`.`FeedId` AS `FeedId`,
   `df`.`Name` AS `FeedName`,
   `d`.`FlatTypeId` AS `FlatTypeId`,
   `dft`.`Name` AS `FlatTypeName`,
   `d`.`TransferId` AS `TransferId`,
   `tr`.`Name` AS `TransferName`,
   `d`.`Transport` AS `Transport`,
   `d`.`Insurance` AS `Insurance`,
   `d`.`OperatorId` AS `OperatorId`,
   `op`.`Name` AS `OperatorName`,
   `d`.`Comments` AS `Comments`,
   `d`.`Visa` AS `Visa`,
   `d`.`DocIssued` AS `DocIssued`,
   `d`.`RoomViewId` AS `RoomViewId`,
   `rw`.`Name` AS `RoomViewName`,
   `d`.`OperatorInvoceSum` AS `OperatorInvoceSum`,
   `d`.`OperatorInvoceNum` AS `OperatorInvoceNum`,date_format(`d`.`OperatorInvoceDate`,'%d.%m.%Y') AS `OperatorInvoceDate`,
   `d`.`FlightA` AS `FlightA`,date_format(`d`.`FlightAArrivalDate`,'%d.%m.%Y %H:%i:%s') AS `FlightAArrivalDate`,date_format(`d`.`FlightADepartureDate`,'%d.%m.%Y %H:%i:%s') AS `FlightADepartureDate`,
   `d`.`FlightAComments` AS `FlightAComments`,
   `d`.`FlightB` AS `FlightB`,date_format(`d`.`FlightBArrivalDate`,'%d.%m.%Y %H:%i:%s') AS `FlightBArrivalDate`,date_format(`d`.`FlightBDepartureDate`,'%d.%m.%Y %H:%i:%s') AS `FlightBDepartureDate`,
   `d`.`FlightBComments` AS `FlightBComments`,
   `d`.`Act` AS `Act`,date_format(`d`.`ActDate`,'%d.%m.%Y') AS `ActDate`,
   `d`.`AgentClient` AS `AgentClient`,
   `ac`.`Name` AS `AgentClientName`,
   `d`.`Invoice` AS `Invoice`,date_format(`d`.`Created`,'%d.%m.%Y') AS `Created`,
   `d`.`DealCurrency` AS `DealCurrency`,
   `dcc`.`Name` AS `DealCurrencyName`,
   `d`.`AdditionalServices` AS `AdditionalServices`,
   `d`.`FlightACityArrivalId` AS `FlightACityArrivalId`,
   `d`.`FlightACityDepartureId` AS `FlightACityDepartureId`,
   `d`.`FlightBCityArrivalId` AS `FlightBCityArrivalId`,
   `d`.`FlightBCityDepartureId` AS `FlightBCityDepartureId`,
   `aa`.`AirportConcat` AS `FlightACityArrivalName`,
   `ad`.`AirportConcat` AS `FlightACityDepartureName`,
   `ba`.`AirportConcat` AS `FlightBCityArrivalName`,
   `bd`.`AirportConcat` AS `FlightBCityDepartureName`
FROM (((((((((((((((((((`Deals` `d` left join `vContacts` `c` on(((`d`.`AccId` = `c`.`AccId`) and (`d`.`ContactId` = `c`.`Id`)))) left join `Legals` `l` on(((`d`.`AccId` = `l`.`AccId`) and (`d`.`LegalId` = `l`.`Id`)))) left join `vUsers` `u` on(((`d`.`UserId` = `u`.`Id`) and (`d`.`AccId` = `u`.`AccId`)))) left join `Dictionaries` `dt` on(((`d`.`DealType` = `dt`.`LIC`) and (`d`.`AccId` = `dt`.`AccId`) and (`dt`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `dcc` on(((`d`.`DealCurrency` = `dcc`.`LIC`) and (`d`.`AccId` = `dcc`.`AccId`) and (`dcc`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `df` on(((`d`.`FeedId` = `df`.`LIC`) and (`d`.`AccId` = `df`.`AccId`) and (`df`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `dft` on(((`d`.`FlatTypeId` = `dft`.`LIC`) and (`d`.`AccId` = `dft`.`AccId`) and (`dft`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `tr` on(((`d`.`TransferId` = `tr`.`LIC`) and (`d`.`AccId` = `tr`.`AccId`) and (`tr`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `rw` on(((`d`.`RoomViewId` = `rw`.`LIC`) and (`d`.`AccId` = `rw`.`AccId`) and (`rw`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `ac` on(((`d`.`AgentClient` = `ac`.`LIC`) and (`d`.`AccId` = `ac`.`AccId`) and (`ac`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `pt` on(((`d`.`PlacingId` = `pt`.`LIC`) and (`d`.`AccId` = `pt`.`AccId`) and (`pt`.`Lang` = `u`.`Lang`)))) left join `dimDirection` `dir` on((`d`.`DirectionId` = `dir`.`Id`))) left join `dimRegion` `reg` on(((`d`.`AccId` = `reg`.`AccId`) and (`d`.`RegionId` = `reg`.`Id`)))) left join `dimHotels` `hot` on(((`d`.`AccId` = `hot`.`AccId`) and (`d`.`HotelId` = `hot`.`Id`)))) left join `dimOperators` `op` on(((`d`.`AccId` = `op`.`AccId`) and (`d`.`OperatorId` = `op`.`Id`)))) left join `vAirport` `aa` on((`d`.`FlightACityArrivalId` = `aa`.`Id`))) left join `vAirport` `ad` on((`d`.`FlightACityDepartureId` = `ad`.`Id`))) left join `vAirport` `ba` on((`d`.`FlightBCityArrivalId` = `ba`.`Id`))) left join `vAirport` `bd` on((`d`.`FlightBCityDepartureId` = `bd`.`Id`)));

DROP VIEW IF EXISTS `vPaymentsGroup`;
CREATE VIEW `vPaymentsGroup`
AS SELECT
   `Payments`.`AccId` AS `AccId`,
   `Payments`.`DealId` AS `DealId`,
   `Payments`.`PayType` AS `PayType`,count(`Payments`.`Id`) AS `PayCount`,sum(`Payments`.`PaySum`) AS `PaySum`
FROM `Payments` group by `Payments`.`AccId`,`Payments`.`DealId`,`Payments`.`PayType`;

DROP VIEW IF EXISTS `vDealsList`;
CREATE VIEW `vDealsList`
AS SELECT
   `d`.`Id` AS `Id`,
   `d`.`AccId` AS `AccId`,
   `d`.`ContactId` AS `ContactId`,
   `d`.`DealNo` AS `DealNo`,
   `d`.`DealDate` AS `DealDateOriginal`,date_format(`d`.`DealDate`,'%d.%m.%Y') AS `DealDate`,
   `d`.`DealSum` AS `DealSum`,
   `d`.`UserId` AS `UserId`,
   `u`.`ManagerName` AS `ManagerName`,
   `d`.`DirectionId` AS `DirectionId`,
   `dir`.`DirectionName` AS `DirectionName`,
   `d`.`RegionId` AS `RegionId`,
   `reg`.`RegionName` AS `RegionName`,'Клиент' AS `ParticipantType`,
   `d`.`DealType` AS `DealType`,
   `dt`.`Name` AS `DealTypeName`,
   `d`.`OperatorId` AS `OperatorId`,
   `op`.`Name` AS `OperatorName`,
   `vpg`.`PayCount` AS `PayCount`,
   `vpg`.`PaySum` AS `PaySum`,(case when (`d`.`DealSum` <= `vpg`.`PaySum`) then 1 else 0 end) AS `NotPaidDeal`
FROM ((((((`Deals` `d` join `vUsers` `u` on(((`d`.`UserId` = `u`.`Id`) and (`d`.`AccId` = `u`.`AccId`)))) left join `dimDirection` `dir` on((`d`.`DirectionId` = `dir`.`Id`))) left join `dimRegion` `reg` on(((`d`.`AccId` = `reg`.`AccId`) and (`d`.`RegionId` = `reg`.`Id`)))) left join `Dictionaries` `dt` on(((`d`.`DealType` = `dt`.`LIC`) and (`d`.`AccId` = `dt`.`AccId`) and (`dt`.`Lang` = `u`.`Lang`)))) left join `dimOperators` `op` on(((`d`.`AccId` = `op`.`AccId`) and (`d`.`OperatorId` = `op`.`Id`)))) left join `vPaymentsGroup` `vpg` on(((`d`.`AccId` = `vpg`.`AccId`) and (`d`.`Id` = `vpg`.`DealId`)))) union all select `dp`.`DealId` AS `Id`,`dp`.`AccId` AS `AccId`,`dp`.`ContactId` AS `ContactId`,`d`.`DealNo` AS `DealNo`,`d`.`DealDate` AS `DealDateOriginal`,date_format(`d`.`DealDate`,'%d.%m.%Y') AS `DealDate`,`d`.`DealSum` AS `DealSum`,`d`.`UserId` AS `UserId`,`u`.`ManagerName` AS `ManagerName`,`d`.`DirectionId` AS `DirectionId`,`dir`.`DirectionName` AS `DirectionName`,`d`.`RegionId` AS `RegionId`,`reg`.`RegionName` AS `RegionName`,'Участник' AS `ParticipantType`,`d`.`DealType` AS `DealType`,`dt`.`Name` AS `DealTypeName`,`d`.`OperatorId` AS `OperatorId`,`op`.`Name` AS `OperatorName`,`vpg`.`PayCount` AS `PayCount`,`vpg`.`PaySum` AS `PaySum`,(case when (`d`.`DealSum` <= `vpg`.`PaySum`) then 1 else 0 end) AS `NotPaidDeal` from ((((((((`vDealParticipants` `dp` join `Deals` `d` on(((`dp`.`AccId` = `d`.`AccId`) and (`dp`.`DealId` = `d`.`Id`)))) join `vUsers` `u` on(((`d`.`AccId` = `u`.`AccId`) and (`d`.`UserId` = `u`.`Id`)))) left join `dimDirection` `dir` on((`d`.`DirectionId` = `dir`.`Id`))) left join `dimRegion` `reg` on(((`d`.`AccId` = `reg`.`AccId`) and (`d`.`RegionId` = `reg`.`Id`)))) left join `Deals` `dd` on(((`dp`.`DealId` = `dd`.`Id`) and (`dp`.`ContactId` = `dd`.`ContactId`) and (`dp`.`AccId` = `dd`.`AccId`)))) left join `Dictionaries` `dt` on(((`d`.`DealType` = `dt`.`LIC`) and (`d`.`AccId` = `dt`.`AccId`) and (`dt`.`Lang` = `u`.`Lang`)))) left join `dimOperators` `op` on(((`d`.`AccId` = `op`.`AccId`) and (`d`.`OperatorId` = `op`.`Id`)))) left join `vPaymentsGroup` `vpg` on(((`d`.`AccId` = `vpg`.`AccId`) and (`d`.`Id` = `vpg`.`DealId`)))) where isnull(`dd`.`Id`);

DROP VIEW IF EXISTS `vDocumentsMaxDate`;
CREATE VIEW `vDocumentsMaxDate`
AS SELECT
   `Documents`.`AccId` AS `AccId`,
   `Documents`.`ContactId` AS `ContactId`,
   `Documents`.`DocType` AS `DocType`,max(`Documents`.`Created`) AS `maxDateAdd`
FROM `Documents` group by `Documents`.`AccId`,`Documents`.`ContactId`,`Documents`.`DocType`;


DROP VIEW IF EXISTS `vEmbassy`;
CREATE VIEW `vEmbassy`
AS SELECT
   `e`.`Id` AS `Id`,
   `e`.`AccId` AS `AccId`,
   `e`.`DirectionId` AS `DirectionId`,
   `dir`.`DirectionName` AS `EmbassyName`,
   `e`.`EmbassyPhone` AS `EmbassyPhone`,
   `e`.`EmbassyEmail` AS `EmbassyEmail`,
   `e`.`EmbassyWebSite` AS `EmbassyWebSite`,
   `e`.`EmbassyAddress` AS `EmbassyAddress`,
   `e`.`Comments` AS `Comments`
FROM (`Embassy` `e` join `dimDirection` `dir` on((`e`.`DirectionId` = `dir`.`Id`)));

DROP VIEW IF EXISTS `vHotels`;
CREATE VIEW `vHotels`
AS SELECT
   `h`.`Id` AS `Id`,
   `h`.`AccId` AS `AccId`,
   `h`.`DirectionId` AS `DirectionId`,
   `d`.`DirectionName` AS `DirectionName`,
   `h`.`RegionId` AS `RegionId`,
   `r`.`RegionName` AS `RegionName`,
   `h`.`HotelName` AS `HotelName`,
   `h`.`HotelStars` AS `HotelStars`,
   `st`.`Name` AS `HotelStarsName`,
   `h`.`HotelPhone` AS `HotelPhone`,
   `h`.`HotelFax` AS `HotelFax`,
   `h`.`HotelEmail` AS `HotelEmail`,
   `h`.`HotelWebSite` AS `HotelWebSite`,
   `h`.`HotelRating` AS `HotelRating`,
   `dic`.`Name` AS `HotelRatingName`,
   `h`.`HotelBeach` AS `HotelBeach`,
   `dh`.`Name` AS `HotelBeachName`,
   `h`.`Comments` AS `Comments`,
   `h`.`HotelType` AS `HotelType`,
   `dht`.`Name` AS `HotelTypeName`,
   `h`.`HotelBeachLine` AS `HotelBeachLine`,
   `dhbl`.`Name` AS `HotelBeachLineName`,
   `h`.`HotelTripAdvisor` AS `HotelTripAdvisor`,
   `dhta`.`Name` AS `HotelTripAdvisorName`,
   `h`.`TripAdvisorLink` AS `TripAdvisorLink`,
   `h`.`HotelJurAddress` AS `HotelJurAddress`,
   `h`.`HotelJurName` AS `HotelJurName`,(case when (`up`.`Id` is not null) then 1 else 0 end) AS `ScanExists`
FROM (((((((((`dimHotels` `h` join `dimDirection` `d` on((`h`.`DirectionId` = `d`.`Id`))) left join `dimRegion` `r` on((`h`.`RegionId` = `r`.`Id`))) left join `Uploads` `up` on(((`h`.`AccId` = `up`.`AccId`) and (`h`.`Id` = `up`.`ModelId`) and (`up`.`ModelType` = 'hotels')))) left join `Dictionaries` `st` on(((`h`.`AccId` = `st`.`AccId`) and (`h`.`HotelStars` = `st`.`LIC`) and (`st`.`Type` = 'HotelStars') and (`st`.`Lang` = 'ru_RU')))) left join `Dictionaries` `dic` on(((`h`.`AccId` = `dic`.`AccId`) and (`h`.`HotelRating` = `dic`.`LIC`) and (`dic`.`Type` = 'Rating') and (`dic`.`Lang` = 'ru_RU')))) left join `Dictionaries` `dh` on(((`h`.`AccId` = `dh`.`AccId`) and (`h`.`HotelBeach` = `dh`.`LIC`) and (`dh`.`Type` = 'HotelBeach') and (`dh`.`Lang` = 'ru_RU')))) left join `Dictionaries` `dht` on(((`h`.`AccId` = `dht`.`AccId`) and (`h`.`HotelType` = `dht`.`LIC`) and (`dht`.`Type` = 'HotelType') and (`dht`.`Lang` = 'ru_RU')))) left join `Dictionaries` `dhbl` on(((`h`.`AccId` = `dhbl`.`AccId`) and (`h`.`HotelBeachLine` = `dhbl`.`LIC`) and (`dhbl`.`Type` = 'HotelBeachLine') and (`dhbl`.`Lang` = 'ru_RU')))) left join `Dictionaries` `dhta` on(((`h`.`AccId` = `dhta`.`AccId`) and (`h`.`HotelTripAdvisor` = `dhta`.`LIC`) and (`dhta`.`Type` = 'HotelTripAdvisor') and (`dhta`.`Lang` = 'ru_RU'))));

DROP VIEW IF EXISTS `vLeads`;
CREATE VIEW `vLeads`
AS SELECT
   `l`.`Id` AS `Id`,
   `l`.`AccId` AS `AccId`,
   `l`.`BranchId` AS `BranchId`,
   `l`.`DealId` AS `DealId`,
   `l`.`LeadDate` AS `LeadDate`,
   `l`.`LeadStatus` AS `LeadStatus`,
   `ds`.`Name` AS `LeadStatusName`,
   `l`.`LeadType` AS `LeadType`,
   `dt`.`Name` AS `LeadTypeName`,
   `l`.`LeadSource` AS `LeadSource`,
   `dso`.`Name` AS `LeadSourceName`,
   `l`.`LastName` AS `LastName`,
   `l`.`FirstName` AS `FirstName`,
   `l`.`MiddleName` AS `MiddleName`,
   `l`.`Phone` AS `Phone`,
   `l`.`Email` AS `Email`,
   `l`.`LeadText` AS `LeadText`,
   `l`.`ManagerText` AS `ManagerText`,
   `l`.`PartnerId` AS `PartnerId`,
   `l`.`LeadPriority` AS `LeadPriority`,
   `dp`.`Name` AS `LeadPriorityName`,
   `dp`.`OrderBy` AS `LeadPriorityOrderBy`,
   `l`.`UserId` AS `UserId`,
   `u`.`ManagerName` AS `ManagerName`,
   `l`.`Sex` AS `Sex`,
   `dg`.`Name` AS `SexName`,
   `l`.`ContactId` AS `ContactId`,
   `vc`.`LastName` AS `ConLastName`,
   `vc`.`FirstName` AS `ConFirstName`,
   `vp`.`LastName` AS `partnerLastName`,
   `vp`.`FirstName` AS `partnerFirstName`
FROM ((((((((`Leads` `l` left join `vUsers` `u` on(((`l`.`UserId` = `u`.`Id`) and (`l`.`AccId` = `u`.`AccId`)))) left join `Dictionaries` `ds` on(((`l`.`LeadStatus` = `ds`.`LIC`) and (`l`.`AccId` = `ds`.`AccId`) and (`ds`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `dt` on(((`l`.`LeadType` = `dt`.`LIC`) and (`l`.`AccId` = `dt`.`AccId`) and (`dt`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `dso` on(((`l`.`LeadSource` = `dso`.`LIC`) and (`l`.`AccId` = `dso`.`AccId`) and (`dso`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `dp` on(((`l`.`LeadPriority` = `dp`.`LIC`) and (`l`.`AccId` = `dp`.`AccId`) and (`dp`.`Lang` = `u`.`Lang`)))) left join `Dictionaries` `dg` on(((`l`.`Sex` = `dg`.`LIC`) and (`l`.`AccId` = `dg`.`AccId`) and (`dg`.`Lang` = `u`.`Lang`)))) left join `vContacts` `vc` on(((`l`.`ContactId` = `vc`.`Id`) and (`l`.`AccId` = `vc`.`AccId`)))) left join `vContacts` `vp` on(((`l`.`PartnerId` = `vp`.`Id`) and (`l`.`AccId` = `vp`.`AccId`))));

DROP VIEW IF EXISTS `vLegalToContact`;
CREATE VIEW `vLegalToContact`
AS SELECT
   `lc`.`Id` AS `Id`,
   `lc`.`AccId` AS `AccId`,
   `lc`.`LegalId` AS `LegalId`,
   `lc`.`ContactId` AS `ContactId`,
   `leg`.`LegalName` AS `LegalName`,
   `leg`.`LegalCode` AS `LegalCode`,
   `cl`.`FirstName` AS `FirstName`,
   `cl`.`LastName` AS `LastName`,
   `cl`.`MiddleName` AS `MiddleName`,
   `cl`.`UserId` AS `ContactUseId`,
   `cl`.`ManagerName` AS `ContactManagerName`,
   `lc`.`LinkType` AS `LinkType`
FROM ((`LegalToContact` `lc` join `vContacts` `cl` on(((`lc`.`ContactId` = `cl`.`Id`) and (`lc`.`AccId` = `cl`.`AccId`)))) join `Legals` `leg` on(((`lc`.`LegalId` = `leg`.`Id`) and (`lc`.`AccId` = `leg`.`AccId`))));

DROP VIEW IF EXISTS `vOperators`;
CREATE VIEW `vOperators`
AS SELECT
   `dimOperators`.`Id` AS `Id`,
   `dimOperators`.`AccId` AS `AccId`,
   `dimOperators`.`Name` AS `Name`,
   `dimOperators`.`Phone` AS `Phone`,
   `dimOperators`.`Email` AS `Email`,
   `dimOperators`.`Commision` AS `Commision`,
   `dimOperators`.`WebSite` AS `WebSite`,
   `dimOperators`.`Address` AS `Address`,
   `dimOperators`.`Comments` AS `Comments`,
   `dimOperators`.`Login` AS `Login`,
   `dimOperators`.`Pass` AS `Pass`,
   `dimOperators`.`DealNum` AS `DealNum`,date_format(`dimOperators`.`DealDateStart`,'%d.%m.%Y') AS `DealDateStart`,date_format(`dimOperators`.`DealDateEnd`,'%d.%m.%Y') AS `DealDateEnd`,
   `dimOperators`.`Active` AS `Active`,
   `dimOperators`.`DirectPartners` AS `DirectPartners`
FROM `dimOperators`;

DROP VIEW IF EXISTS `vPayments`;
CREATE VIEW `vPayments`
AS SELECT
   `p`.`Id` AS `Id`,
   `p`.`AccId` AS `AccId`,
   `p`.`DealId` AS `DealId`,
   `p`.`PayType` AS `PayType`,
   `ptype`.`Name` AS `PayTypeName`,
   `p`.`PaySum` AS `PaySum`,
   `fin2str_ukr`(`p`.`PaySum`) AS `PaySumString`,
   `p`.`PayDate` AS `PayDate`,date_format(`p`.`PayDate`,'%d.%m.%Y') AS `PayDateMod`,
   `p`.`Payer` AS `Payer`,
   `p`.`PayCource` AS `PayCource`,
   `p`.`PayEquivalent` AS `PayEquivalent`,
   `p`.`PayCurrency` AS `PayCurrency`,
   `p`.`Comments` AS `Comments`
FROM (`Payments` `p` left join `Dictionaries` `ptype` on(((`p`.`AccId` = `ptype`.`AccId`) and (`p`.`PayType` = `ptype`.`LIC`) and (`ptype`.`Type` = 'DealPayType'))));

DROP VIEW IF EXISTS `vRegions`;
CREATE VIEW `vRegions`
AS SELECT
   `r`.`Id` AS `Id`,
   `r`.`AccId` AS `AccId`,
   `r`.`DirectionId` AS `DirectionId`,
   `d`.`DirectionName` AS `DirectionName`,
   `r`.`RegionName` AS `RegionName`,
   `r`.`RegionRating` AS `RegionRating`,
   `dic`.`Name` AS `RegionRatingName`,
   `r`.`Comments` AS `Comments`
FROM ((`dimRegion` `r` join `dimDirection` `d` on((`r`.`DirectionId` = `d`.`Id`))) left join `Dictionaries` `dic` on(((`r`.`AccId` = `dic`.`AccId`) and (`r`.`RegionRating` = `dic`.`LIC`) and (`dic`.`Type` = 'Rating') and (`dic`.`Lang` = 'ru_RU'))));

DROP VIEW IF EXISTS `vSessionLog`;
CREATE VIEW `vSessionLog`
AS SELECT
   `sl`.`Id` AS `Id`,
   `sl`.`SessionId` AS `SessionId`,
   `sl`.`UserId` AS `UserId`,
   `u`.`ManagerName` AS `ManagerName`,date_format(`sl`.`LogIn`,'%d.%m.%Y %H:%i:%s') AS `LogIn`,date_format(`sl`.`LogOut`,'%d.%m.%Y %H:%i:%s') AS `LogOut`,
   `sl`.`LogIn` AS `LogInOriginal`,
   `sl`.`LogOut` AS `LogOutOriginal`,
   `sl`.`Browser` AS `Browser`,
   `sl`.`Platform` AS `Platform`,
   `u`.`AccId` AS `AccId`,
   `ac`.`Name` AS `AccountName`
FROM ((`SessionLog` `sl` join `vUsers` `u` on((`sl`.`UserId` = `u`.`Id`))) join `Account` `ac` on((`u`.`AccId` = `ac`.`Id`)));

DROP VIEW IF EXISTS `vSysDealNum`;
CREATE VIEW `vSysDealNum`
AS SELECT
   `Deals`.`AccId` AS `AccId`,date_format(`Deals`.`DealDate`,'%Y') AS `mYear`,concat(convert(date_format(now(),'%Y') using utf8mb4),'/',(max(cast(substr(`Deals`.`DealNo`,(locate('/',`Deals`.`DealNo`) + 1),length(`Deals`.`DealNo`)) as unsigned)) + 1)) AS `mNum`
FROM `Deals` where (date_format(`Deals`.`DealDate`,'%Y') = date_format(now(),'%Y')) group by `Deals`.`AccId`,date_format(`Deals`.`DealDate`,'%Y');

DROP VIEW IF EXISTS `vTasks`;
CREATE VIEW `vTasks`
AS SELECT
   `t`.`Id` AS `Id`,
   `t`.`AccId` AS `AccId`,
   `t`.`CreatorId` AS `CreatorId`,
   `t`.`UserId` AS `UserId`,
   `t`.`Start` AS `Start`,
   `t`.`End` AS `End`,
   `t`.`Title` AS `Title`,
   `t`.`Task` AS `Task`,
   `t`.`Done` AS `Done`,
   `t`.`ModelType` AS `ModelType`,
   `t`.`ModelId` AS `ModelId`,(case when (locate(',',`t`.`UserId`) = 0) then `t`.`UserId` else substr(`t`.`UserId`,1,(locate(',',`t`.`UserId`) - 1)) end) AS `FirstUserId`,
   `t`.`SendEmail` AS `SendEmail`,
   `t`.`Created` AS `Created`,
   `t`.`LastUpdate` AS `LastUpdate`
FROM `Tasks` `t`;

DROP VIEW IF EXISTS `vTemplates`;
CREATE VIEW `vTemplates`
AS SELECT
   `t`.`Id` AS `Id`,
   `t`.`AccId` AS `AccId`,
   `t`.`Module` AS `Module`,
   `dt`.`Name` AS `ModulName`,
   `t`.`Name` AS `Name`,
   `t`.`Template` AS `Template`,
   `t`.`Active` AS `Active`
FROM (`Templates` `t` join `Dictionaries` `dt` on(((`t`.`Module` = `dt`.`LIC`) and (`t`.`AccId` = `dt`.`AccId`) and (`dt`.`Lang` = 'ru_RU'))));

DROP VIEW IF EXISTS `vHotelDeals`;
CREATE VIEW `vHotelDeals`
AS SELECT
   `d`.`HotelId` AS `HotelId`, count(`d`.`Id`) AS `DealsAmount`
FROM `Deals` `d` group by `d`.`HotelId`;

DROP VIEW IF EXISTS `vOperatorDeals`;
CREATE VIEW `vOperatorDeals`
AS SELECT
   `d`.`OperatorId` AS `OperatorId`,count(`d`.`Id`) AS `DealsAmount`
FROM `Deals` `d` 
group by `d`.`OperatorId`;
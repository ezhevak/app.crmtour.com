DROP PROCEDURE IF EXISTS prBilling;
DELIMITER ;;
CREATE PROCEDURE `prBilling`()
    COMMENT 'Ежедневная процедура расчёта задолжености пользователей системы'
BEGIN

insert into AccountPayments(AccId,PayType,AmountUSD,Course,Date,Comments)
select cost.AccId,
'Order' as PayType,
case 
	when ActiveUsers > 3 then ActiveUsers * -100
	else ActiveUsers * -120
end AmountUSD,
1 as Course,
CURDATE() as Date,

concat('Автоматическое начисление системы за период с ',DATE_ADD(CURDATE(), INTERVAL -1 month ),' по ',CURDATE()) as Comments
from (select AccId, count(1) AS `ActiveUsers`
		from (select `u`.`AccId` AS `AccId`,
			  `ac`.`Name` AS `AccountName`,
			  `sl`.`UserId` AS `UserId`,
		     `u`.`ManagerName` AS `ManagerName`,
			   count(`sl`.`Id`) AS `CountLogInUsers`
				from `SessionLog` `sl` 
				join `vUsers` `u` on (`sl`.`UserId` = `u`.`Id`)
				join `Account` `ac` on (`u`.`AccId` = `ac`.`Id` and Day(ac.Created) = day(CURDATE()) 
												and CURDATE() >= DATE(DATE_ADD(ac.Created, INTERVAL 2 month )))
				where DATE(sl.LogIn) between DATE_ADD(CURDATE(), INTERVAL -1 month ) and CURDATE()
				and ac.Id not in (1,19)
				group by
				   `u`.`AccId`,
				   `ac`.`Name`,
				   `sl`.`UserId`,
				   `u`.`ManagerName`
				having count(`sl`.`Id`) > 3) as actASesions
		group by AccId) as cost;

insert into AccountPayments (AccId, PayType, AmountUSD, Date,Course, ParentId,Comments)
select acc.ReffererId as AccId,
		 'Refference' as PayType, 
		 pay.AmountUSD*0.5 as AmountUSD,
		 CURDATE() as Date,

		 pay.Course,
		 pay.Id as ParentId,
		 CONCAT ('Начисление по реферальным ссылкам. Компания ', acc.Name) as Comments
		 
from AccountPayments as pay
join Account as acc on (pay.AccId = acc.Id)
join (select AccId, min(Created) as MinPayDate
		 from AccountPayments
	   where PayENGINE= 'Pay'
		group by AccId) as mpay on (pay.AccId = mpay.AccId and pay.Created = mpay.MinPayDate)
left join AccountPayments as parpay on (pay.Id = parpay.ParentId)
where parpay.Id is null
and acc.ReffererId !=0;
		
END;;
DELIMITER ;

DROP PROCEDURE IF EXISTS sysSchedulerDaily;
DELIMITER ;;
CREATE PROCEDURE `sysSchedulerDaily`()
BEGIN
	
	delete from DealParticipants
	where Created < SUBDATE(CURDATE(), 1)
	and DealId <1;	
	
	
	insert into Tasks (AccId, CreatorId, UserId, Start, End, Title, Task, Done, ModelType, ModelId, SendEmail)
		
   SELECT cl.AccId as AccId,
	fGetAccAdminId(cl.AccId) as Creator,
	case when cl.UserId != fGetAccAdminId(cl.AccId) then concat(cl.UserId,',',fGetAccAdminId(cl.AccId)) else cl.UserId end UserId,
	DATE_ADD(DATE_ADD(date(NOW()),INTERVAL 11 HOUR),interval 30 minute) as Start,
	DATE_ADD(date(NOW()),INTERVAL 18 HOUR) as End,
	'Паспорт' as Title,
	concat('У клиента ',cl.FirstName,' ',cl.LastName,' через 6-ть месяцев закончится загран паспорт!') as Title,
	0 as Done,
	'Contact' as ModelType,
	cl.Id as ModelId,
	1 as SendEmail
	
	FROM `Contacts` as cl
	join (select dd.AccId, dd.ContactId
			from Documents as dd
	      left join AccountOptions as ao on (dd.AccId = ao.AccId and ao.OptionName = 'DayToPassport')
			where dd.DocType= 'intPass'
			  and dd.Valid = DATE_ADD(DATE(NOW()), INTERVAL case when ifnull(ao.OptionVal,'') = '' then 180 else ao.OptionVal end DAY)) as doc on (cl.AccId = doc.AccId
	 																				        							     and cl.Id = doc.ContactId);

	 																				        							     
	delete
	from Tasks
	where Title in ('День рождения','Паспорт')
	and Start <= ADDDATE(curdate(),INTERVAL -7 DAY);																			        							     
	 																				        							     
	
	insert into Tasks (AccId, CreatorId, UserId, Start, End, Title, Task, Done, ModelType, ModelId, SendEmail)
	SELECT cl.AccId as AccId, 
			fGetAccAdminId(cl.AccId) as Creator,
			case when cl.UserId != fGetAccAdminId(cl.AccId) then concat(cl.UserId,',',fGetAccAdminId(cl.AccId)) else cl.UserId end UserId,
			ADDTIME(DATE_ADD(CURDATE() , INTERVAL case when ifnull(ao.OptionVal,'') = '' then 7 else ao.OptionVal end DAY),'11:00:00.00') as Start,
			ADDTIME(DATE_ADD(CURDATE() , INTERVAL case when ifnull(ao.OptionVal,'') = '' then 7 else ao.OptionVal end DAY),'18:00:00.00') as End,
			'День рождения' as Title,
			concat('День рождения', ' ',
			case when FirstName is not null then ifnull(FirstName,'') else '' end,' ', 
			case when LastName is not null then ifnull(LastName,'') else '' end,' ',  
			case when PhoneMob is not null then concat('телефон:',ifnull(PhoneMob,'')) else '' end,' ', 
			case when EmailHome is not null then concat('Email:',ifnull(EmailHome,'')) else '' end,' '
			) as Task,
			0 as Done,
			'Contact' as ModelType,
			cl.Id as ModelId,
			1 as SendEmail
	FROM vContacts as cl
	left join AccountOptions as ao on (cl.AccId = ao.AccId and ao.OptionName = 'DayToBirthday')
	where MONTH(cl.DateBirthOriginal) = MONTH(DATE_ADD(DATE(NOW()), INTERVAL case when ifnull(ao.OptionVal,'') = '' then 7 else ao.OptionVal end DAY))
	  and DAY(cl.DateBirthOriginal) = DAY(DATE_ADD(DATE(NOW()), INTERVAL case when ifnull(ao.OptionVal,'') = '' then 7 else ao.OptionVal end DAY));
		  

insert into Tasks (AccId, CreatorId, UserId, Start, End, Title, Task, Done, ModelType, ModelId, SendEmail)

select cost.AccId as AccId,
	fGetAccAdminId(cost.AccId) as Creator,
	fGetAccAdminId(cost.AccId) as UserId,
	DATE_ADD(date(CURDATE()),INTERVAL 12 HOUR) as Start,
	DATE_ADD(date(CURDATE()),INTERVAL 13 HOUR) as End,
	'Оплата CRM Tour' as Title,
	concat('Добрый день уважаемый пользователь системы CRM Tour! За предыдущий месяц в системе работало ', ActiveUsers ,'  пользователь(я). Поддержите разработчика и пополните карту Приват банка 5363 5420 1802 9299. Рекомендуемая сумма ',case when ActiveUsers > 3 then ActiveUsers * 100 else ActiveUsers * 120 end, ' грн'
	) as Title,
	0 as Done,
	null as ModelType,
	null as ModelId,
	1 as SendEmail
from (select AccId, count(1) AS `ActiveUsers`
		from (select `u`.`AccId` AS `AccId`,
			  `ac`.`Name` AS `AccountName`,
			  `sl`.`UserId` AS `UserId`,
		     `u`.`ManagerName` AS `ManagerName`,
			   count(`sl`.`Id`) AS `CountLogInUsers`
				from `SessionLog` `sl` 
				join `vUsers` `u` on (`sl`.`UserId` = `u`.`Id`)
				join `Account` `ac` on (`u`.`AccId` = `ac`.`Id` and Day(ac.Created) = day(DATE_ADD(CURDATE(), INTERVAL 1 day)) 
												and DATE_ADD(CURDATE(), INTERVAL 1 day) >= DATE(DATE_ADD(ac.Created, INTERVAL 2 month )))
				where DATE(sl.LogIn) between DATE_ADD(DATE_ADD(CURDATE(), INTERVAL 1 day), INTERVAL -1 month ) and DATE_ADD(CURDATE(), INTERVAL 1 day)
				and ac.Id not in (1,19)
				group by
				   `u`.`AccId`,
				   `ac`.`Name`,
				   `sl`.`UserId`,
				   `u`.`ManagerName`
				having count(`sl`.`Id`) > 3) as actASesions
		group by AccId) as cost;
END;;
DELIMITER ;


DROP PROCEDURE IF EXISTS sysSchedulerHourly;
DELIMITER ;;
CREATE PROCEDURE `sysSchedulerHourly`()
BEGIN

update Contacts as cl
		join AccountOptions as ao on (cl.AccId = ao.AccId and ao.OptionName = 'StandartSegment' = 1)
		left join (select listDeals.AccId, ContactId, count(listDeals.DealId) as CountDeals
						from (select AccId, DealId, ContactId
								 from DealParticipants
								union
								select AccId, Id as DealId, ContactId
								 from Deals) as listDeals
							   group by listDeals.AccId, listDeals.ContactId) as d on (cl.AccId = d.AccId and cl.Id = d.ContactId)
set cl.Segment = case  
						when cl.Segment = 'VIP' then 'VIP' 
						when d.CountDeals = 1 then 'Prospective'
						when d.CountDeals > 1 then 'Active'
					   else 'NoSegment'
				  end;		
END;;
DELIMITER ;

DROP PROCEDURE IF EXISTS sysSchedulerQuarterHour;
DELIMITER ;;
CREATE PROCEDURE `sysSchedulerQuarterHour`()
BEGIN
	
	
END;;
DELIMITER ;
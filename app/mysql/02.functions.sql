CREATE DEFINER=`zhevak_tmp`@`%` FUNCTION `fGetAccAdminId`(
	`inAccId` int


) RETURNS int(11)
    DETERMINISTIC
BEGIN
 DECLARE lvl int;
 
 select Id into lvl from vUsers where AccId = inAccId and Role ='admin' limit 1;
 
 RETURN (lvl);
END;


CREATE DEFINER=`zhevak_tmp`@`%` FUNCTION `fGetRegion`(
	`inAccId` int,
	`inDirectionId` INT,
	`inRegionName` VARCHAR(50)
) RETURNS varchar(10) CHARSET utf8
    DETERMINISTIC
BEGIN
 DECLARE lvl varchar(10);
 
 select Id into lvl from dimRegion where AccId = 1 and DirectionId = inDirectionId and RegionName = inRegionName;
 
 RETURN (lvl);
END;


CREATE DEFINER=`zhevak_tmp`@`%` FUNCTION `fin2str_ukr`( num DECIMAL(20,2) ) RETURNS varchar(1000) CHARSET utf8
BEGIN
    DECLARE grn BIGINT; 
    declare kop bigint; 
 
    declare namegrn varchar(20);  
    declare namekop varchar(20);  
 
    declare result varchar(1000);
    declare sgrn varchar(1000);
    declare skop varchar(4);
 
    declare z1,z2 BIGINT; 
 
    SET grn = Floor( num );
    SET kop = floor( (num * 100) - (grn * 100) );
 
    
    SET z1 = FLOOR(MOD(grn,10));
    SET z2 = FLOOR(MOD(grn/10,10));
 
    
    if ( z2 = 1 ) Then
      SET namegrn = 'гривень';
    
    else
      CASE
        WHEN (z1=1)
        THEN SET namegrn = 'гривня';
        WHEN (z1=2) or (z1=3) or (z1=4)
        THEN SET namegrn = 'гривнi';
      ELSE
        
        SET namegrn = 'гривень';
      end case;
    end If;
 
    
    SET z1 = FLOOR(MOD(kop,10));
    SET z2 = FLOOR(MOD(kop/10,10));
 
    
    if ( z2 = 1 ) Then
      SET namekop = 'копiйок';
    
    else
      CASE
        WHEN (z1=1)
        THEN SET namekop = 'копiйка';
        WHEN (z1=2) or (z1=3) or (z1=4)
        THEN SET namekop = 'копiйки';
      ELSE
        
        SET namekop = 'копiйок';
      end case;
    end if;
 
    
    SET sgrn = num2str_ukr( grn , 'f' );
 
    
    SET skop = kop;
    if ( kop < 10 ) then
      SET skop = CONCAT('0',kop );
    end if;
 
    
    SET result = CONCAT(sgrn,' ',namegrn, ' ', skop,' ',namekop);
    RETURN CONCAT(UPPER(LEFT(result, 1)), SUBSTRING(result, 2));
  END;

  CREATE DEFINER=`zhevak_tmp`@`%` FUNCTION `num2str_ukr`(Number BIGINT, sex varchar(2) ) RETURNS varchar(1000) CHARSET utf8
BEGIN
    DECLARE result VARCHAR(1000);
 
    DECLARE maxi BIGINT; 
    DECLARE ost100 BIGINT; 
    DECLARE ost10 BIGINT; 
    DECLARE ost BIGINT; 
    DECLARE f BIGINT; 
    DECLARE nvNumber BIGINT; 
    DECLARE rd VARCHAR(30);
 
    SET result = '';
    
    SET nvNumber = ABS(Number);
 
    
    SET rd = sex;
 
    sloop: LOOP
      
      IF (nvNumber > 0)
      THEN
        
        SET f = FLOOR( FLOOR( LOG(10, nvNumber)) / 3) * 3;
 
        SET maxi = floor(nvNumber / power(10, f));
        SET nvNumber = mod(nvNumber, power(10, f));
 
        
        SET ost100 = floor(maxi / 100);
        SET ost10 = floor((maxi - ost100 * 100) / 10);
        
        SET ost = (maxi - (ost10 * 10)) - (ost100 * 100);
 
        
        CASE ost100
          WHEN 1
          THEN SET result = CONCAT(result,' сто');
          WHEN 2
          THEN SET result = CONCAT(result,' двісті');
          WHEN 3
          THEN SET result = CONCAT(result,' триста');
          WHEN 4
          THEN SET result = CONCAT(result, ' чотириста');
          WHEN 5
          THEN SET result = CONCAT(result, ' п’ятсот');
          WHEN 6
          THEN SET result = CONCAT(result, ' шістсот');
          WHEN 7
          THEN SET result = CONCAT(result, ' сімсот');
          WHEN 8
          THEN SET result = CONCAT(result, ' вісімсот');
          WHEN 9
          THEN SET result = CONCAT(result, ' дев’ятсот');
        ELSE BEGIN END;
        END CASE;
 
        
        CASE ost10
          WHEN 1
          THEN
            BEGIN
              
              CASE ost
                WHEN 1
                THEN SET result = CONCAT(result,' одинадцять');
                WHEN 2
                THEN SET result = CONCAT(result,' дванадцять');
                WHEN 3
                THEN SET result = CONCAT(result,' тринадцять');
                WHEN 4
                THEN SET result = CONCAT(result,' чотирнадцять');
                WHEN 5
                THEN SET result = CONCAT(result,' п’ятнадцять');
                WHEN 6
                THEN SET result = CONCAT(result,' шістнадцять');
                WHEN 7
                THEN SET result = CONCAT(result,' сімнадцять');
                WHEN 8
                THEN SET result = CONCAT(result,' вісімнадцять');
                WHEN 9
                THEN SET result = CONCAT(result,' дев’ятнадцять');
                WHEN 0
                THEN SET result = CONCAT(result,' десять');
              ELSE BEGIN END;
              END CASE;
            END;
 
          WHEN 2
          THEN SET result = CONCAT(result,' двадцять');
          WHEN 3
          THEN SET result = CONCAT(result,' тридцять');
          WHEN 4
          THEN SET result = CONCAT(result,' сорок');
          WHEN 5
          THEN SET result = CONCAT(result,' п’ятдесят');
          WHEN 6
          THEN SET result = CONCAT(result,' шістдесят');
          WHEN 7
          THEN SET result = CONCAT(result,' сімдесят');
          WHEN 8
          THEN SET result = CONCAT(result,' вісімдесят');
          WHEN 9
          THEN SET result = CONCAT(result,' дев’яносто');
        ELSE BEGIN END;
        END CASE;
 
        
        IF ost10 <> 1
        THEN
          CASE ost
            WHEN 1
            THEN
              BEGIN
                IF f = 3
                THEN
                  SET result = CONCAT(result,' одна');
                ELSE
                  IF f = 0
                  THEN
                    CASE rd
                      WHEN 'm'
                      THEN SET result = CONCAT(result,' один');
                      WHEN 'f'
                      THEN SET result = CONCAT(result,' одна');
                      WHEN 's'
                      THEN SET result = CONCAT(result,' одно');
 
                    ELSE SET result = CONCAT(result,' один');
                    END CASE;
                  ELSE
                    SET result = CONCAT(result,' один');
                  END IF;
                END IF;
              END;
            WHEN 2
            THEN
              BEGIN
                IF (f = 3)
                THEN
                  SET result = CONCAT(result, ' дві');
                ELSE
                  IF f = 0
                  THEN
                    CASE rd
                      WHEN 'm'
                      THEN SET result = CONCAT(result,' два');
                      WHEN 'f'
                      THEN SET result = CONCAT(result,' дві');
                      WHEN 's'
                      THEN SET result = CONCAT(result,' два');
                    ELSE SET result = CONCAT(result,' два');
                    END CASE;
                  ELSE
                    SET result = CONCAT(result,' два');
                  END IF;
                END IF;
              END;
            WHEN 3
            THEN SET result = CONCAT(result,' три');
            WHEN 4
            THEN SET result = CONCAT(result,' чотири');
            WHEN 5
            THEN SET result = CONCAT(result,' п’ять');
            WHEN 6
            THEN SET result = CONCAT(result,' шість');
            WHEN 7
            THEN SET result = CONCAT(result,' сім');
            WHEN 8
            THEN SET result = CONCAT(result,' вісім');
            WHEN 9
            THEN SET result = CONCAT(result,' дев’ять');
          ELSE BEGIN END;
          END CASE;
        END IF;
 
      ELSE
        LEAVE sloop;
      END IF;
 
      IF (f >= 36)
      THEN
        SET result = 'Занадто велике число!';
        LEAVE sloop;
      END IF;
 
      IF (f >= 6 AND f < 36)
      THEN
        CASE f
          WHEN 33
          THEN SET result = CONCAT(result,' декальйон');
          WHEN 30
          THEN SET result = CONCAT(result,' нональйон');
          WHEN 27
          THEN SET result = CONCAT(result,' октальйон');
          WHEN 24
          THEN SET result = CONCAT(result,' септільйон');
          WHEN 21
          THEN SET result = CONCAT(result,' секстільйон');
          WHEN 18
          THEN SET result = CONCAT(result,' квінтильйон');
          WHEN 15
          THEN SET result = CONCAT(result,' квадрильйон');
          WHEN 12
          THEN SET result = CONCAT(result,' трильйон');
          WHEN 9
          THEN SET result = CONCAT(result,' мільярд');
          WHEN 6
          THEN SET result = CONCAT(result,' мільйон');
        END CASE;
 
        CASE
          WHEN (ost = 0) OR (ost = 1 AND ost10 = 1) OR (ost >= 2 AND ost <= 4 AND ost10=1) OR (ost >= 5 AND ost <= 9)
          THEN SET result = CONCAT( result, 'ів');
        
        
 
          WHEN (ost >= 2 AND ost <= 4 AND ost10 <> 1)
          THEN SET result = CONCAT(result, 'а');
        ELSE BEGIN END;
        END CASE;
      END IF;
 
      
      IF (f >= 3 AND f < 6)
      THEN
        CASE
          WHEN (ost = 0) OR (ost = 1 AND ost10 = 1) OR (ost >= 2 AND ost <= 4 AND ost10 = 1) OR (ost >= 5 AND ost <= 9)
          THEN SET result = CONCAT(result,' тисяч');
          WHEN (ost = 1 AND ost10 <> 1)
          THEN SET result = CONCAT(result,' тисяча');
          WHEN (ost >= 2 AND ost <= 4 AND ost10 <> 1)
          THEN SET result = CONCAT(result, ' тисячі');
        ELSE BEGIN END;
        END CASE;
      END IF;
 
      SET f = f - 3;
 
      if( f < 0 ) THEN
        LEAVE sloop;
      END IF;
 
    END LOOP;
 
    RETURN TRIM(result);
  END;

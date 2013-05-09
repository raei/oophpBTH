//Skapa tabellerna

CREATE TABLE `raer12`.`rum` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`namn` VARCHAR( 100 ) NOT NULL ,
`beskrivning` TEXT NOT NULL ,
`grafik` TEXT NULL
) ENGINE = MYISAM;
 
CREATE TABLE `raer12`.`Rumkoppling` 
( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
`id_Rum1` INT NOT NULL , `id_Rum2` INT NOT NULL , 
`namn` VARCHAR( 100 ) NOT NULL ) 
ENGINE = MYISAM;



//Insert data till Rum tabellen

INSERT INTO `rum` (`namn`, `beskrivning`, `grafik`) VALUES
('Hamnen', 'Du �r strandsatt p� en �de �. B�ten som kan ta dig hem �r l�st med ett stort h�ngl�s. En s�ker d�d v�ntar dig om du inte lyckas hitta nyckeln. Lycka till!', '<embed type="image/svg+xml" src="img/stranden.svg" width="707" height="480" />'),
( 'V�gkorsning', 'Du kommer till en v�gkorsning. H�r m�ste du fundera noga p� vilken v�g du ska ta. ', '<embed type="image/svg+xml" src="img/crossroad.svg" width="707" height="480" />'),
( 'Grott�ppning', 'Framf�r dig finns en lucka av tr� i marken. N�r du �ppnar den ser du trappsteg som leder ner i en grotta. Det ser m�rkt och kallt ut i grottan, men �nd� lite sp�nnande. Se upp du vet aldrig vad som v�ntar i m�rkret.', '<embed type="image/svg+xml" src="img/utgrotta.svg" width="707" height="480" />'),
( 'Grotta', 'Du �r mitt i den djupa grottan. Du ser inte s�rskilt bra. Endast ett svagt ljussken lyser bakom dig fr�n en gammal oljelampa. Det �r b�st att sticka innan n�got hemskt h�nder.', '<embed type="image/svg+xml" src="img/cave.svg" width="707" height="480" />'),
( 'Eldplatsen', 'Du finner mat vid eldstaden framf�r passa p� att vila.', '<embed type="image/svg+xml" src="img/eldplatsen.svg" width="707\n" height="480" />'),
( 'Djupa skogen', 'Du �r mitt i skogen och ser lite vilsen ut. Det ser n�stan ut som om det b�rjar m�rkna, men kanske �r det bara ett moln... Du ser dig om och funderar �t vilket h�ll som du b�r forts�tta... Nu g�ller det...', '<embed type="image/svg+xml" src="img/djupa_skogen.svg" width="707" height="480" />'),
( 'Stranden', 'Du kommer fram till stranden. Det �r en vacker plats och du s�tter dig p� b�nken och funderar �ver var nyckeln kan finnas s� du kan �ka hem. Pl�tsligt ser du en liten l�da. Du �ppnar den och hittar n�gra t�rningar och ett brev. D�r st�r: Kasta t�rningarna om du vill komma hem. H�lsningar En V�n!', '<embed type="image/svg+xml" src="img/havet.svg" width="707" height="480" />'),
( 'Hemliga staden', 'Du kommer fram till en v�ldigt konstig stad. Se dig omkring. ', '<embed type="image/svg+xml" src="img/hemligstad.svg" width="707" height="480" />'),
( 'Spelstigen', 'Du vandrar l�ngs v�gen och ser en man. Han ser ut att ha en kortlek. Han vill nog spela kort med dig. ', '<embed type="image/svg+xml" src="img/tokigafarbrorn.svg" width="707" height="480" />'),
( 'Borgen', 'Du st�r i en gl�nta mitt framf�r en historisk och magisk borg. Den h�r platsen verkar sp�nnande. H�r kanske nyckeln finns. Det st�r en flaska vatten i gr�set.', '<embed type="image/svg+xml" src="img/borgen.svg" width="707" height="480" />'),
( 'Hemresa', 'Tack f�r hj�lpen nu seglar jag hem.', '<embed type="image/svg+xml" src="img/slut.svg" width="707" height="480" />'),
( 'Kortspel', 'H�r ska det spelas high and low\r\ndu f�r tre f�rs�k p� dig.', NULL);



//Rumskopplingar
INSERT INTO `rumkoppling` (`id_Rum1`, `id_Rum2`, `namn`) VALUES
(1, 2, 'F�lj stigen in i skogen'),
(2, 3, 'V�nster'),
(2, 6, 'Raktfram'),
(3, 4, 'G� in i grottan'),
(4, 3, 'Grott�ppningen'),
(3, 2, 'V�gkorsningen'),
(1, 7, 'Stranden'),
(7, 1, 'Hamnen'),
(7, 8, 'Hemliga staden'),
(8, 7, 'Stranden'),
(8, 9, 'Spelstigen'),
(9, 8, 'Hemliga staden'),
(9, 6, 'Djupa skogen'),
(6, 10, 'Borgen'),
(10, 6, 'Djupa skogen'),
(5, 8, 'Hemliga staden'),
(2, 5, 'H�ger'),
(2, 1, 'Tillbaka'),
(5, 2, 'V�gkorsningen'),
(6, 2, 'V�gkorsningen'),
(6, 9, 'Spelstigen'),
(3, 1, 'Hamnen');


// Kolla koppling Rum där id_Rum1 = 1

SELECT * 
FROM `Rumkoppling` 
WHERE id_Rum1 = 1


CREATE TABLE `action` (
  `id` int(11) NOT NULL auto_increment,
  `namn` varchar(100) NOT NULL,
  `event` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`))

INSERT INTO `action` (`namn`, `event`) VALUES
('Drick vatten ur flaskan', 'increaseHealthBy5'),
('�t ett p�ron', 'eatFruit'),
('Spela kort', 'playGameHighLow'),
('�t en banan', 'eatFruit'),
('�t en jordgubbe', 'eatFruit'),
('Till startsidan', 'start');



CREATE TABLE `rumaction` (
  `id` int(11) NOT NULL auto_increment,
  `id_Rum` int(11) NOT NULL,
  `id_Action` int(11) NOT NULL,
  PRIMARY KEY  (`id`))


INSERT INTO `rumaction` (`id_Rum`, `id_Action`) VALUES
(7, 4),
(10, 1),
(5, 2),
(9, 3),
(6, 5),
(11, 6);
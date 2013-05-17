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
('Hamnen', 'Du är strandsatt på en öde ö. Båten som kan ta dig hem är låst med ett stort hänglås. En säker död väntar dig om du inte lyckas hitta nyckeln. Lycka till!', '<embed type="image/svg+xml" src="img/stranden.svg" width="707" height="480" />'),
( 'Vägkorsning', 'Du kommer till en vägkorsning. Här måste du fundera noga på vilken väg du ska ta. ', '<embed type="image/svg+xml" src="img/crossroad.svg" width="707" height="480" />'),
( 'Grottöppning', 'Framför dig finns en lucka av trä i marken. När du öppnar den ser du trappsteg som leder ner i en grotta. Det ser mörkt och kallt ut i grottan, men ändå lite spännande. Se upp du vet aldrig vad som väntar i mörkret.', '<embed type="image/svg+xml" src="img/utgrotta.svg" width="707" height="480" />'),
( 'Grotta', 'Du är mitt i den djupa grottan. Du ser inte särskilt bra. Endast ett svagt ljussken lyser bakom dig från en gammal oljelampa. Det är bäst att sticka innan något hemskt händer.', '<embed type="image/svg+xml" src="img/cave.svg" width="707" height="480" />'),
( 'Eldplatsen', 'Du finner mat vid eldstaden framför passa på att vila.', '<embed type="image/svg+xml" src="img/eldplatsen.svg" width="707\n" height="480" />'),
( 'Djupa skogen', 'Du är mitt i skogen och ser lite vilsen ut. Det ser nästan ut som om det börjar mörkna, men kanske är det bara ett moln... Du ser dig om och funderar åt vilket håll som du bör fortsätta... Nu gäller det...', '<embed type="image/svg+xml" src="img/djupa_skogen.svg" width="707" height="480" />'),
( 'Stranden', 'Du kommer fram till stranden. Det är en vacker plats och du sätter dig på bänken och funderar över var nyckeln kan finnas så du kan åka hem. Plötsligt ser du en liten låda. Du öppnar den och hittar några tärningar och ett brev. Där står: Kasta tärningarna om du vill komma hem. Hälsningar En Vän!', '<embed type="image/svg+xml" src="img/havet.svg" width="707" height="480" />'),
( 'Hemliga staden', 'Du kommer fram till en väldigt konstig stad. Se dig omkring. ', '<embed type="image/svg+xml" src="img/hemligstad.svg" width="707" height="480" />'),
( 'Spelstigen', 'Du vandrar längs vägen och ser en man. Han ser ut att ha en kortlek. Han vill nog spela kort med dig. ', '<embed type="image/svg+xml" src="img/tokigafarbrorn.svg" width="707" height="480" />'),
( 'Borgen', 'Du står i en glänta mitt framför en historisk och magisk borg. Den här platsen verkar spännande. Här kanske nyckeln finns. Det står en flaska vatten i gräset.', '<embed type="image/svg+xml" src="img/borgen.svg" width="707" height="480" />'),
( 'Hemresa', 'Tack för hjälpen nu seglar jag hem.', '<embed type="image/svg+xml" src="img/slut.svg" width="707" height="480" />'),
( 'Kortspel', 'Här ska det spelas high and low\r\ndu får tre försök på dig.', NULL);



//Rumskopplingar
INSERT INTO `rumkoppling` (`id_Rum1`, `id_Rum2`, `namn`) VALUES
(1, 2, 'Följ stigen in i skogen'),
(2, 3, 'Vänster'),
(2, 6, 'Raktfram'),
(3, 4, 'Gå in i grottan'),
(4, 3, 'Grottöppningen'),
(3, 2, 'Vägkorsningen'),
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
(2, 5, 'Höger'),
(2, 1, 'Tillbaka'),
(5, 2, 'Vägkorsningen'),
(6, 2, 'Vägkorsningen'),
(6, 9, 'Spelstigen'),
(3, 1, 'Hamnen');


// Kolla koppling Rum dÃ¤r id_Rum1 = 1

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
('Ät ett päron', 'eatFruit'),
('Spela kort', 'playGameHighLow'),
('Ät en banan', 'eatFruit'),
('Ät en jordgubbe', 'eatFruit'),
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
-- I did not get a chance to store all the MySQL commands I have executed in this project, but here are a few of them to give you an idea.

-- Creating table airports:
CREATE TABLE `airports` (
 `ID` int(11) NOT NULL,
 `city` varchar(30) NOT NULL,
 `airport_name` varchar(40) NOT NULL,
 PRIMARY KEY (`ID`),
 KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

-- Creating table passenger to stored the passenger's information from the form
CREATE TABLE `passenger` (
 `ID` int(11) NOT NULL,
 `firstname` varchar(40) NOT NULL,
 `lastname` varchar(40) NOT NULL,
 `dob` date NOT NULL,
 `category` varchar(40) NOT NULL,
 `guest` int(5) NOT NULL,
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


--Creating Table to store information on Flights

CREATE TABLE `flightsearch`.`flights` ( `ID` INT NOT NULL , `to_arpt` INT NOT NULL , `from_arpt` INT NOT NULL ,
  `departure_date` DATE NOT NULL , `departure_time` TIME NOT NULL , `dest_arr_time` TIME NOT NULL ,
  `total_duration` INT NOT NULL , `price` INT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;


--Inserting values in airport
INSERT INTO `airports` (`ID`, `city`, `airport_name`) VALUES ('1', 'Bangalore', 'KIA Airport'),
('2', 'Mumbai', 'Chatrapati Shivaji Airport'),
 ('3', 'Delhi', 'Indira Gandhi Int Aiport'),
 ('4', 'Chennai', 'Chennai International Airport'),
  ('5', 'Kolkata', 'NSCB International Airport')

-- Inserting values into table flights
INSERT INTO `flights` (`ID`, `to_arpt`, `from_arpt`, `departure_date`, `departure_time`, `dest_arr_time`, `total_duration`, `price`) VALUES
('101','1', '2',  '2018-07-23', '12:00:00', '14:00:00', '120','3000' ),
('102',  '2', '1',  '2018-08-17','16:00:00', '18:00:00','120', '4000'),
('103','3', '1', '2018-07-20', '09:00:00', '12:00:00', '180', '5000'),
('104',  '3', '4',  '2018-09-11','13:00:00', '16:00:00','180','3500'),
('105','1', '4', '2018-07-27', '01:00:00', '04:00:00', '240','4500'),
('106', '3', '4', '2018-07-28','12:00:00', '16:00:00','120','5500'),
('107','4', '3',  '2018-08-30','15:00:00', '19:00:00', '240','10000'),
('108',  '3', '1',  '2018-07-31','13:00:00', '17:00:00','240','7000');


-- Adding indexes for foriegn key
ALTER TABLE `flights` ADD INDEX(`from_arpt`);

ALTER TABLE `airports` ADD INDEX(`ID`);


-- Adding Foriegn Keys constraints
ALTER TABLE `flights` ADD CONSTRAINT `toapfk` FOREIGN KEY (`to_arpt`) REFERENCES `airports`(`ID`) ON DELETE RESTRICT
ON UPDATE RESTRICT; ALTER TABLE `flights`
ADD CONSTRAINT `frapfk` FOREIGN KEY (`from_arpt`) REFERENCES `airports`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Query to reterive data
SELECT `ID`, `flight_name`, `to_arpt`, `from_arpt`, `departure_date`, `departure_time`, `dest_arr_time`, `total_duration`, `price` FROM `flights` WHERE `to_arpt` = 3 AND `from_arpt`=4


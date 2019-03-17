/*
Damler, Lucas
z1761739
CSCI466
Assign7
*/

/*1.) Drops all tables and views created*/
drop view ownerView;
drop table Pet;
drop table Owner;

/*2.) Creates table for Owner with ID and first and last name*/
create table Owner(
	ownerID int unsigned not null auto_increment primary key,
	fName char (255) not null,
	lName char(255) not null);
	
/*3.) Inserts 5 records into Owner table*/
insert into Owner (fName, lName) values
	('Proud','Mary'),
	('Jean-Marc','Oliver'),
	('Ryan','Walkup'),
	('Little','Richard'),
	('Maxwell','Silverhammer');

/*4.) Displays records in Owner table*/
select * from Owner;

/*5.) Creates Pet table with pet name, petID, pet DOB, and foreign key owenrID */
create table Pet(
	petID int unsigned not null auto_increment primary key,
	petName char(255),
	petDOB char(255) NOT NULL,
	ownerID int unsigned not null,
	foreign key (ownerID) references Owner(ownerID));
	
/*6.) Inserts at least 5 records into pet table with 2 pets owned by 1 owner*/
insert into Pet (petName, ownerID) values
	('Jack',1),
	('Max',1),
	('Pipa',2),
	('Baby J',3),
	('Max III',4),
	('King Max IV',5);

/*7.) Displays everything in Pet table*/
select * from Pet;

/*8.) Adds pet type to Pet table*/
alter table Pet add petType char(255);

/*9.) Updates pet type for Pet table*/
update Pet set petType = 'dog' where ownerID = 1 or ownerID = 2;
update Pet set petType = 'bird' where ownerID = 3;
update Pet set petType = 'lizard' where ownerID = 4;
update Pet set petType = 'cat' where ownerID = 5;

/*10.) Updates DOB for Pet table*/
update Pet set petDOB = '12 MAY 2010' where ownerID = 1;
update Pet set petDOB = '03 JAN 2013' where ownerID = 2;
update Pet set petDOB = '19 DEC 2014' where ownerID = 3;
update Pet set petDOB = '16 MAR 2007' where ownerID = 4;
update Pet set petDOB = '08 MAR 2017' where ownerID = 5;

/*11.) Displays all records in Pet table*/
select * from Pet;

/*12.) Creates ownerView with owner name and pet name*/
create view ownerView as select
	fName as 'Owner First Name',
	lName as 'Owner Last Name',
	petName as 'Pet'
	from Owner, Pet where Owner.ownerID = Pet.ownerID;
	
/*13.) Displays everything in ownerView*/
select * from ownerView;

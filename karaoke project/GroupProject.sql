/*
* Zac Mikkelson
* Lucas Damler
* Mitchell Andros
* Andrew Slade
* Kevin Pallikunnel
* Lehuta
* CSCI 466
*/

/*drop all of the tables*/
drop table if exists ContributorTo;
drop table if exists Contributors;
drop table if exists InQueue;
drop table if exists Files;
drop table if exists Songs;
drop table if exists Queue;
drop table if exists Users;

/*create all of the tables*/

/*
song table
has: ID#, title, artist
*/
create table Songs(
 SongIdNum int auto_increment PRIMARY KEY,
 title char(255),
 artist char(255)
);

/*
queue table
has: time signed up, payment amount, type, place#
*/
create table Queue(
 PlaceNum int auto_increment PRIMARY KEY,
 QueueType char(255) not null,
 payment float(5,2),
 signedTime time not null
);

/*
user table
has: ID#, name
*/
create table Users(
 UserIdNum int auto_increment PRIMARY KEY,
 name char(255)
);

/*
files table
has: ID#, name, song id#
references: Songs
*/
create table Files(
 FileIdNum int auto_increment PRIMARY KEY,
 SongType char(255),
 SongIdNum int not null,
 foreign key (SongIdNum) references Songs(SongIdNum)
);

/*
contributor table
has: Contibutor ID#, name, group, job, 
references: songs
*/
create table Contributors(
 ContributorIdNum int auto_increment PRIMARY KEY,
 name char(255),
 band char(255),
 job char(255)
);

/*
contributor to table
has: contribution num, contributor ID#, song ID#
references: songs, contributors
*/
create table ContributorTo(
 CtNum int auto_increment PRIMARY KEY,
 ContributorIdNum int,
 SongIdNum int,
 foreign key (SongIdNum) references Songs(SongIdNum),
 foreign key (ContributorIdNum) references Contributors(ContributorIdNum)
);

/*
in queue table
has: Place number, queue type, user ID#, song ID#, user ID#, file ID#
references: users, songs, files, queue
*/
create table InQueue(
 QueuePlace int auto_increment PRIMARY KEY,
 PlaceNum int,
 FileIdNum int not null,
 UserIdNum int not null,
 foreign key (UserIdNum) references Users(UserIdNum), 
 foreign key (FileIdNum) references Files(FileIdNum),
 foreign key (PlaceNum) references Queue(PlaceNum)
);

insert into Songs(title, artist) values
	('Dream On', 'Aerosmith'),
	('Bohemian Rhapsody', 'Queen'),
	('I Will Survive', 'Gloria Gaynor'),
	('I Will Survive', 'Cake'),
	('Love Shack', 'The B-52s'),
	('Jump', 'Van Halen'),
	('Jump', 'The Pointer Sisters');

insert into Contributors (name, band, job) values
	('Steven Tyler', 'Aerosmith', 'Writer, Singer'),
	('Joe Perry', 'Aerosmith', 'Lead Guitar'),
	('Ray Tabano', 'Aerosmith', 'Rhythm Guitar'),
	('Tom Hamilton', 'Aerosmith', 'Bass'),
	('Joey Kramer', 'Aerosmith', 'Drums'),
	('Freddie Mercury', 'Queen', 'Writer, Singer, Piano'),
	('Brian May', 'Queen', 'Guitar'),
	('Roger Taylor', 'Queen', 'Drums'),
	('John Deacon', 'Queen', 'Bass'),
	('Freddie Perren', 'Gloria Gaynor', 'Writer'),
	('Dino Fekaris', 'Gloria Gaynor', 'Writer'),
	('Gloria Gaynor', 'Gloria Gaynor', 'Singer'),
	('John McCrea', 'Cake', 'Singer'),
	('Vince DiFiore', 'Cake', 'Trumpet'),
	('Xan McCurdy', 'Cake', 'Guitar'),
	('Daniel McCallum', 'Cake', 'Bass'),
	('Todd Roper', 'Cake', 'Drums'),
	('Kate Pierson', 'The B-52s', 'Keyboard, Writer'),
	('Fred Schneider', 'The B-52s', 'Writer, Singer'),
	('Keith Strickland', 'The B-52s', 'Writer, Guitar'),
	('Cindy Wilson', 'The B-52s', 'Writer, Percussion'),
	('Eddie Van Halen', 'Van Halen', 'Writer, Guitar'),
	('Alex Van Halen', 'Van Halen', 'Writer, Drums'),
	('Michael Anthony', 'Van Halen', 'Writer, Bass'),
	('David Lee Roth', 'Van Halen', 'Writer, Singer'),
	('Stephen Mitchell', 'The Pointer Sisters', 'Writer'),
	('Marti Sharron', 'The Pointer Sisters', 'Writer'),
	('Gary Skardina', 'The Pointer Sisters', 'Writer'),
	('Ruth Pointer', 'The Pointer Sisters', 'Singer'),
	('Issa Pointer', 'The Pointer Sisters', 'Singer'),
	('Sadako Pointer', 'The Pointer Sisters', 'Singer');

insert into ContributorTo (ContributorIdNum, SongIdNum) values
(1,1),(2,1),(3,1),(4,1),(5,1),(6,2),(7,2),(8,2),(9,2),(10,3),(11,3),(12,3),(13,4),(14,4),(15,4),(16,4),(17,4),(18,5),(19,5),(20,5),(21,5),(22,6),(23,6),(24,6),(25,6),(26,7),(27,7),(28,7),(29,7),(30,7),(31,7);

insert into Files (SongType, SongIdNum) values
('regular', 1),
('regular', 2),
('regular', 3),
('regular', 4),
('regular', 5),
('regular', 6),
('regular', 7),
('acoustic', 1),
('piano', 2),
('piano', 1);

insert into Users (name) values
	('Anabell'),
	('Darek'),
	('Tyler'),
	('Alice'),
	('Martin'),
	('Omar'),
	('Hammed'),
	('Celia'),
	('Vera'),
	('Vlad'),
	('Ana');

insert into Queue (QueueType, payment, signedTime) values
	('free', 0.00, '13:00:00'),
	('paid', 5.00, '13:05:00'),
	('free', 0.00, '13:30:50'),
	('free', 0.00, '13:41:04'),
	('paid', 10.00, '14:29:11'),
	('paid', 6.00, '14:39:10'),
	('paid', 1.00, '14:41:10'),
	('paid', 0.50, '14:42:11'),
	('free', 0.00, '14:43:50'),
	('free', 0.00, '15:00:00'),
	('free', 0.00, '15:00:01');

insert into InQueue (PlaceNum, FileIdNum, UserIdNum) values
	(1,1,1),
	(2,3,9),
	(3,5,1),
	(4,8,8),
	(5,1,8),
	(6,6,2),
	(7,5,11),
	(8,2,7),
	(9,7,5),
	(10,9,4),
	(11,10,3);

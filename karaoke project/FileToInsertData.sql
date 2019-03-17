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
drop table if exists Songs;
drop table if exists Queue;
drop table if exists Users;
drop table if exists Files;
drop table if exists Contributors;
drop table if exists ContributorTo;
drop table if exists InQueue;

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
 signedTime TIME NULL
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
has: contributor ID#, song ID#
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
 PlaceNum int auto_increment PRIMARY KEY,
 FileIdNum int not null,
 UserIdNum int not null,
 foreign key (UserIdNum) references Users(UserIdNum), 
 foreign key (FileIdNum) references Files(FileIdNum),
 foreign key (PlaceNum) references Queue(PlaceNum)
);


/*Begin inserting data here */

/*Songs table*/


insert into Songs(title, artist) values

('Dream On', 'Aerosmith'),
	
('Bohemian Rhapsody', 'Queen'),
	
('I Will Survive', 'Gloria Gaynor'),
	
('I Will Survive', 'Cake'),
	
('Love Shack', 'The B-52s'),
	
('Love Shack', 'The B-52s'),

('Jump', 'Van Halen'),
	
('Jump', 'The Pointer Sisters');



/*Contributor Table*/
insert into Contributors(name, band, job) values
	

/*Contributors to Dream On*/
	
('Steven Tyler', 'Aerosmith', 'Writer'),
	
('Steven Tyler', 'Aerosmith', 'Singer'),

('Joe Perry', 'Aerosmith', 'Lead Guitar'),
	
('Ray Tabano', 'Aerosmith', 'Rhythm Guitar'),
	
('Tom Hamilton', 'Aerosmith', 'Bass'),
	
('Joey Kramer', 'Aerosmith', 'Drums'),
	

/*Contributors to Bohemian Rhapsody*/
	
('Freddie Mercury', 'Queen', 'Writer'),
	
('Freddie Mercury', 'Queen', 'Singer'),
	
('Freddie Mercury', 'Queen', 'Piano'),
	
('Brian May', 'Queen', 'Guitar'),
	
('Roger Taylor', 'Queen', 'Drums'),
	
('John Deacon', 'Queen', 'Bass'),
	

/*Contributors to I Will Survive (Original)*/
	
('Freddie Perren', 'Gloria Gaynor', 'Writer'),
	
('Dino Fekaris', 'Gloria Gaynor', 'Writer'),
	
('Gloria Gaynor', 'Gloria Gaynor', 'Singer'),
	

/*Contributors to I Will Survive (Cover)
*/	
('Freddie Perren', 'Gloria Gaynor', 'Writer'),
        
('Dino Fekaris', 'Gloria Gaynor', 'Writer'),
	
/*I'm not sure how we want to handle contributors who aren't in the band they're contributing to*/
	
('John McCrea', 'Cake', 'Singer'),
	
('Vince DiFiore', 'Cake', 'Trumpet'),
	
('Xan McCurdy', 'Cake', 'Guitar'),
	
('Daniel McCallum', 'Cake', 'Bass'),
	
('Todd Roper', 'Cake', 'Drums'),
	

/*Contributors to Love Shack (Album Version)*/
	
('Kate Pierson', 'The B-52s', 'Writer'),
	
('Fred Schneider', 'The B-52s', 'Writer'),
	
('Keith Strickland', 'The B-52s', 'Writer'),
	
('Cindy Wilson', 'The B-52s', 'Writer'),
	
('Fred Schneider', 'The B-52s', 'Singer'),
	
('Kate Pierson', 'The B-52s', 'Keyboard'),
	
('Cindy Wilson', 'The B-52s', 'Percussion'),
	
('Keith Strickland', 'The B-52s', 'Guitar'),
	

/*Contributors to Love Shack (Single Version)*/
        
('Kate Pierson', 'The B-52s', 'Writer'),
        
('Fred Schneider', 'The B-52s', 'Writer'),
        
('Keith Strickland', 'The B-52s', 'Writer'),
        
('Cindy Wilson', 'The B-52s', 'Writer'),
        
('Fred Schneider', 'The B-52s', 'Singer'),
        
('Kate Pierson', 'The B-52s', 'Keyboard'),
        
('Cindy Wilson', 'The B-52s', 'Percussion'),
        
('Keith Strickland', 'The B-52s', 'Guitar'),
	

/*Contributors to Jump (Van Halen)*/
	
('Eddie Van Halen', 'Van Halen', 'Writer'),
	
('Alex Van Halen', 'Van Halen', 'Writer'),
	
('Michael Anthony', 'Van Halen', 'Writer'),
	
('David Lee Roth', 'Van Halen', 'Writer'),
	
('David Lee Roth', 'Van Halen', 'Singer'),
	
('Eddie Van Halen', 'Van Halen', 'Guitar'),
	
('Alex Van Halen', 'Van Halen', 'Drums'),
	
('Michael Anthony', 'Van Halen', 'Bass'),
	

/*Contributors to Jump (The Pointer Sisters)*/
	
('Stephen Mitchell', 'The Pointer Sisters', 'Writer'),
	
('Marti Sharron', 'The Pointer Sisters', 'Writer'),
	
('Gary Skardina', 'The Pointer Sisters', 'Writer'),
	
('Ruth Pointer', 'The Pointer Sisters', 'Singer'),
	
('Issa Pointer', 'The Pointer Sisters', 'Singer'),
	
('Sadako Pointer', 'The Pointer Sisters', 'Singer');

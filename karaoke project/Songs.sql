
insert into Songs(title, artist) values
	('Dream On', 'Aerosmith'),
	('Bohemian Rhapsody', 'Queen'),
	('I Will Survive', 'Gloria Gaynor'),
	('I Will Survive', 'Cake'),
	('Love Shack', 'The B-52s'),
	('Love Shack', 'The B-52s'),
	('Jump', 'Van Halen'),
	('Jump', 'The Pointer Sisters');

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
	('Freddie Perren', 'Gloria Gaynor', 'Writer'),
        ('Dino Fekaris', 'Gloria Gaynor', 'Writer'),
	I'm not sure how we want to handle contributors who aren't in the band they're contributing to*/
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

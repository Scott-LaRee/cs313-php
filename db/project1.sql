/* meetings table holds data about when and what kind of meeting is held. */

CREATE TABLE meetings
(
	id 				SERIAL NOT NULL PRIMARY KEY
,	meeting_date 	DATE NOT NULL
,	meeting_type 	VARCHAR(10) NOT NULL
);

/*events table holds data about when and what event is held*/
CREATE TABLE events
(
	id 			SERIAL NOT NULL PRIMARY KEY
, 	event_date	DATE NOT NULL
,	event_title	VARCHAR(80) NOT NULL
);

/*student table holds information about the student*/
CREATE TABLE student
(
	id 					SERIAL NOT NULL PRIMARY KEY
,	student_first_name	VARCHAR(100) NOT NULL
,	student_last_name	VARCHAR(100) NOT NULL
,	grad_year			INTEGER 
,	membership			VARCHAR(10)	
,	office				VARCHAR(15)	
);

/*meeting_attendance table lists which student attended which meeting*/
CREATE TABLE meeting_attendance
(
	meeting_id	INT NOT NULL REFERENCES meetings(id)
,	student_id  INT NOT NULL REFERENCES student(id)
);

/*event_attendance table lists which student attended which event*/
CREATE TABLE event_attendance
(
	event_id 	INT NOT NULL REFERENCES events(id)
,	student_id	INT NOT NULL REFERENCES student(id)
);

/*insert statements for some test data*/
INSERT INTO student (student_first_name, student_last_name,
	grad_year, membership, office) VALUES ('John','Doe',2020,'N','president');
	
INSERT INTO student (student_first_name, student_last_name,
	grad_year, membership, office) VALUES ('Jane','Doe',2021,'N','');
	
INSERT INTO student (student_first_name, student_last_name,
	grad_year, membership, office) VALUES ('John','Smith',2020,'L','');
	
INSERT INTO student (student_first_name, student_last_name,
	grad_year, membership, office) VALUES ('Alex','Smith',2021,'N','vice-pres');
	
INSERT INTO student (student_first_name, student_last_name,
	grad_year, membership, office) VALUES ('Manny','Boone',2020,'','treasurer');
	
INSERT INTO student (student_first_name, student_last_name,
	grad_year, membership, office) VALUES ('Amanda','Collins',2020,'N','secretary');
	
INSERT INTO student (student_first_name, student_last_name,
	grad_year, membership, office) VALUES ('Henry','Shmidt',2020,'','');
	
INSERT INTO meetings (meeting_date, meeting_type) 
	VALUES
	('2019-10-11', 'O');

INSERT INTO meetings (meeting_date, meeting_type) 
	VALUES
	('2019-10-18', 'G');	
	
INSERT INTO events (event_date, event_title)
	VALUES
	('2019-10-19', 'parade');

/*insert into many to many*/
SELECT id FROM meetings WHERE meetings.meeting_date = '2019-10-11';
SELECT id FROM student WHERE student.student_first_name = 'John' AND
			student.student_last_name = 'Doe';
			
INSERT INTO meeting_attendance (meeting_id, student_id)
	VALUES (/*value from above, value from above*/);
	
SELECT * FROM student WHERE student.student_first_name = 'John' AND
			student.student_last_name = 'Doe';
			
/*join displays all columns from student, meeting_attendance, and meetings
 where the id's match for the date provided*/
SELECT * FROM meeting_attendance
	INNER JOIN student
		ON student.id = meeting_attendance.student_id
	INNER JOIN meetings
		ON meeting_attendance.meeting_id = meetings.id
	WHERE 
		meetings.meeting_date = '2019-10-11';

/*Join displays only student first and last name for meetings with the matching date*/		
SELECT student_first_name, student_last_name FROM student
	INNER JOIN meeting_attendance
		ON student.id = meeting_attendance.student_id
	INNER JOIN meetings
		ON meeting_attendance.meeting_id = meetings.id
	WHERE
		meetings.meeting_date = '2019-10-11';

/*displays students who attend events on a certain date*/		
SELECT student_first_name, student_last_name FROM student
	INNER JOIN event_attendance
		ON student.id = event_attendance.student_id
	INNER JOIN events
		ON event_attendance.event_id = event_id
	WHERE
		events.event_date = '2019-10-19';

/*displays students who attend meeting with a certain title*/		
SELECT student_first_name, student_last_name FROM student
	INNER JOIN event_attendance
		ON student.id = event_attendance.student_id
	INNER JOIN events
		ON event_attendance.event_id = event_id
	WHERE
		events.event_title = 'parade';
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
,	grad_year			INTEGER NOT NULL
,	membership			VARCHAR(10)	
,	office				VARCHAR(10)	
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


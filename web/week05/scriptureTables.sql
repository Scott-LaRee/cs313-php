CREATE TABLE scriptures 
(
	id SERIAL 	PRIMARY KEY
,	book 		VARCHAR(25) NOT NULL
, 	chapter 	INTEGER NOT NULL
,	verse 		INTEGER NOT NULL
,	content  	VARCHAR(255)
);

INSERT INTO scrpitures (book, chapter, verse, content)
VALUES
(
	'John'
,	1
,	5
,	'And the light shineth in darkness; and the darkness comprehended it not.'
);

INSERT INTO scriptures (book, chapter, verse, content)
VALUES
(
	'Doctrine and Covenants'
,	88
,	49
,	'The light shineth in darkness, an the darkenss comprehendit it not; nevertheless
	, the day shall come when you shall comprehend even God, being quickened in him and by him.'
);

INSERT INTO scriptures (book, chapter, verse, content)
VALUES
(
	'Doctrine and Covenants'
,	93
,	28
,	'He that keepeth his commendments receiveth truth and light, until he is glorified 
	in truth and knowth all things.'
);

INSERT INTO scriptures (book, chapter, verse, content)
VALUES
(
	'Mosiah'
,	16
,	9
,	'He is the light and the lif of the world; yea, a light that is endless, that can never be darkened;
	yea, and also a life which is endless, that there can be no more death.'
);

CREATE TABLE topic
(
	id SERIAL PRIMARY KEY
,	name varchar(80)
);

INSERT INTO topic (name)
	VALUES (Faith), (Sacrifice), (Charity);
	
CREATE TABLE sripture_topic
(
	topic_id 		INT NOT NULL REFERENCES topic(id)
,	scriptures_id 	INT NOT NULL REFERENCES scriptures(id)
);





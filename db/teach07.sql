CREATE TABLE users
(	id SERIAL NOT NULL PRIMARY KEY
,	username varchar(80) UNIQUE NOT NULL
,	password varchar(255) NOT NULL
);

CREATE USER ta_user WITH PASSWORD 'ta_pass';

GRANT SELECT, INSERT, UPDATE ON users TO ta_user;

GRANT USAGE, SELECT ON login_id_seqf TO ta_user;


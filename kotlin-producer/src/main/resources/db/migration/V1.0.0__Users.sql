CREATE TABLE users (
	user_id serial PRIMARY KEY,
	name VARCHAR ( 50 ) NOT NULL,
	password VARCHAR ( 255 ) NOT NULL,
	email VARCHAR ( 255 ) UNIQUE NOT NULL
);
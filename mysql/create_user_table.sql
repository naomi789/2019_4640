USE main_db;
CREATE TABLE IF NOT EXISTS user(
	first_name VARCHAR(30),
	email VARCHAR(30) NOT NULL,
	pwd VARCHAR(2000),
	CONSTRAINT PK_user PRIMARY KEY (email)
);
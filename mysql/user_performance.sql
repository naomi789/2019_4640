USE main_db;

CREATE TABLE IF NOT EXISTS user_performance(
	time_date NVARCHAR(100) NOT NULL,
	time_thinking NVARCHAR(100) NOT NULL,
	list_name NVARCHAR(100),
	correct BOOLEAN NOT NULL,
	ent_seq INT NOT NULL,
	email NVARCHAR(100),
	CONSTRAINT PK_JMdict PRIMARY KEY (ent_seq, list_name, email)
);

ALTER TABLE user_performance CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

ALTER TABLE user_performance ADD FOREIGN KEY (ent_seq) REFERENCES JMdict(ent_seq);
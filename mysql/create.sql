DROP DATABASE main_db;
CREATE DATABASE main_db;
USE main_db;
ALTER DATABASE main_db CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS JMdict(
ent_seq INT NOT NULL,    #unique identifier
keb NVARCHAR(250),                      #kanji
reb NVARCHAR(250),                      #hiragana or katakana
is_foreign BOOLEAN,
CONSTRAINT PK_JMdict PRIMARY KEY (ent_seq)
);
ALTER TABLE JMdict CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE JMdict CHANGE keb keb VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE JMdict CHANGE reb reb VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS gloss
(gloss_ID VARCHAR(36) NOT NULL, gloss_def NVARCHAR(600),
CONSTRAINT PK_gloss PRIMARY KEY (gloss_ID) );
ALTER TABLE gloss CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE gloss CHANGE gloss_ID gloss_ID VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE gloss CHANGE gloss_def gloss_def VARCHAR(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS gloss_word
(ent_seq INT NOT NULL, gloss_ID VARCHAR(36) NOT NULL,
CONSTRAINT PK_gloss_word PRIMARY KEY (ent_seq, gloss_ID) );
ALTER TABLE gloss_word CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE gloss_word CHANGE gloss_ID gloss_ID VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS list
(list_name NVARCHAR(200) NOT NULL, list_description NVARCHAR(2000), list_creator VARCHAR(30),
CONSTRAINT PK_list PRIMARY KEY (list_name) );
ALTER TABLE list CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE list CHANGE list_name list_name VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE list CHANGE list_description list_description VARCHAR(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS list_word
(ent_seq INT NOT NULL, list_name NVARCHAR(200) NOT NULL,
CONSTRAINT PK_list_word PRIMARY KEY (ent_seq, list_name) );
ALTER TABLE list_word CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE list_word CHANGE list_name list_name VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS pos(
pos_ID VARCHAR(36) NOT NULL,
pos_type NVARCHAR(100),
CONSTRAINT PK_pos PRIMARY KEY (pos_ID)
);
ALTER TABLE pos CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE pos CHANGE pos_ID pos_ID VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE pos CHANGE pos_type pos_type VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS pos_word(
ent_seq INT NOT NULL,
pos_ID VARCHAR(36) NOT NULL,
CONSTRAINT PK_pos_word PRIMARY KEY (ent_seq, pos_ID)
);
ALTER TABLE pos_word CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE pos_word CHANGE pos_ID pos_ID VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS JMdict_foreign(
ent_seq INT NOT NULL,
orig_lang NVARCHAR(200),
orig_word NVARCHAR(200),
waseieigo NVARCHAR(20),
CONSTRAINT PK_JMdict_foreign PRIMARY KEY (ent_seq)
);
ALTER TABLE JMdict_foreign CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE JMdict_foreign CHANGE orig_lang orig_lang VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE JMdict_foreign CHANGE orig_word orig_word VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE JMdict_foreign CHANGE waseieigo waseieigo VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


ALTER TABLE pos_word
ADD FOREIGN KEY (ent_seq) REFERENCES JMdict(ent_seq);
ALTER TABLE pos_word
ADD FOREIGN KEY (pos_ID) REFERENCES pos(pos_ID);

ALTER TABLE gloss_word
ADD FOREIGN KEY (ent_seq) REFERENCES JMdict(ent_seq);
ALTER TABLE gloss_word
ADD FOREIGN KEY (gloss_ID) REFERENCES gloss(gloss_ID);

ALTER TABLE list_word
ADD FOREIGN KEY (ent_seq) REFERENCES JMdict(ent_seq);
ALTER TABLE list_word
ADD FOREIGN KEY (list_name) REFERENCES list(list_name);

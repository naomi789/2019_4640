/*create views*/

/*view used for showing result after search*/
DROP VIEW IF EXISTS brief_result;
CREATE VIEW brief_result AS
SELECT gloss_word.gloss_ID, gloss_word.ent_seq, JMdict.keb, JMdict.reb, gloss.gloss_def
FROM  gloss_word
LEFT JOIN gloss
ON gloss_word.gloss_ID = gloss.gloss_ID
LEFT JOIN JMdict
ON gloss_word.ent_seq = JMdict.ent_seq
ORDER BY gloss_word.ent_seq;

SELECT * FROM brief_result;

/*view for word detail page*/
DROP VIEW IF EXISTS word_detail;
CREATE VIEW word_detail AS
SELECT gloss_word.gloss_ID, gloss_word.ent_seq, pos_word.pos_ID, JMdict.keb, JMdict.reb, gloss.gloss_def, JMdict.is_foreign, JMdict_foreign.orig_lang, JMdict_foreign.orig_word, JMdict_foreign.waseieigo, pos.pos_type
FROM  gloss_word
LEFT JOIN gloss
ON gloss_word.gloss_ID = gloss.gloss_ID
LEFT JOIN JMdict
ON gloss_word.ent_seq = JMdict.ent_seq
LEFT JOIN JMdict_foreign
ON gloss_word.ent_seq = JMdict_foreign.ent_seq
LEFT JOIN pos_word
ON gloss_word.ent_seq = pos_word.ent_seq
LEFT JOIN pos
ON pos_word.pos_ID = pos.pos_ID
ORDER BY gloss_word.ent_seq;
SELECT * FROM word_detail;

/*view for showing all words in lists*/
DROP VIEW IF EXISTS words_in_lists;
CREATE VIEW words_in_lists AS
SELECT gloss_word.gloss_ID, gloss_word.ent_seq, JMdict.keb, JMdict.reb, gloss.gloss_def, pos.pos_type, list.list_name, list.list_description
FROM list
INNER JOIN list_word
ON list_word.list_name = list.list_name
INNER JOIN JMdict
ON list_word.ent_seq = JMdict.ent_seq
LEFT JOIN gloss_word
ON gloss_word.ent_seq = list_word.ent_seq
LEFT JOIN gloss
ON gloss_word.gloss_ID = gloss.gloss_ID
LEFT JOIN pos_word
ON gloss_word.ent_seq = pos_word.ent_seq
LEFT JOIN pos
ON pos_word.pos_ID = pos.pos_ID
ORDER BY gloss_word.ent_seq;
SELECT * FROM words_in_lists;

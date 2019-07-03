# 2019_4640
Summer project in web development class

## Resources we found helpful:
0. Although "r_ele", "reb", "k_ele", and "keb" all seem like weird variable names, these are standardized in the community of ~200 active computer scientists who use Jim Breen's Japanese dictionay. 'R' stands for 'reading' and 'K' stands for 'kanji'. More information is available at:
https://www.edrdg.org/wiki/index.php/JMdict-EDICT_Dictionary_Project

1. CSS to make the index card look cute:
https://codepen.io/teddyzetterlund/pen/YPjEzP

2. Help getting whitespace between words:
https://stackoverflow.com/questions/339923/set-cellpadding-and-cellspacing-in-css#3209434

3. Looking for inspiration on for 404 page:
https://colorlib.com/wp/free-404-error-page-templates/

4. Regex to check if input is Japanese:
https://gist.github.com/ryanmcgrath/982242

5. Regex to check if input is English:
https://stackoverflow.com/questions/2266088/how-do-i-verify-that-a-string-is-in-english

6. How to update AWS EC2 instance:
https://askubuntu.com/questions/449032/29-packages-can-be-updated-how
https://askubuntu.com/questions/187071/how-do-i-shut-down-or-reboot-from-a-terminal#187080

7. How to add JS onclick() to element:
https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_onclick_html

8. How to see if a string contains a string:
https://stackoverflow.com/questions/1789945/how-to-check-whether-a-string-contains-a-substring-in-javascript

9. Stuff for .gitignore file: https://www.gitignore.io/
## People who helped us:
1. Brock showed us that !isJapanese is not the same as !isJapaneseBool (the first is a function and the second is a boolean). I probably spend 30 minutes on that, entirely stuck!

## How to get mysql DB working:
```
sudo apt-get install mysql-server
//struggled a ton to get various things working
mysql -h 127.0.0.1 -P 3306 -u root
```

Then, in MySQL:
```
SOURCE create.sql; // this is in the mysql folder
SOURCE insert.sql;
USE main_db;
//To verify things were actually created/inserted, try:
SHOW TABLES;
DESCRIBE [insert table name here];
SELECT * FROM [insert table name here];
```

##Things that Naomi runs when her windows installation of MySQL has 2002 errors (HY000 Can't connect to local MySQL server through socket '/var/run/mysqld/mysqld.sock'):
```
sudo /etc/init.d/mysql stop
sudo mkdir -p /var/run/mysqld
sudo mkdir -p /var/run/mysqld_safe
chown mysql:mysql /var/run/mysqld
sudo mysqld_safe
//switch to new terminal
```

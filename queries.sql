CREATE database prelaunchApp;
use prelaunchApp;

CREATE OR REPLACE TABLE user(
id int NOT NULL PRIMARY KEY,
firstname varchar(30),
lastname varchar(30),
fb_link varchar(200),
tw_link varchar(200),
insta_link varchar(200),
li_link varchar(200),
gplus_link varchar(200),
gender varchar(10),
email varchar(50),
points int,
login_date date,
num_persons int,
referred_by int,
num_children int,
age_last_child
);
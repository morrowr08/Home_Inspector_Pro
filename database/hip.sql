CREATE DATABASE home_inspector_pro;

CREATE TABLE user (
user_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
first_name varchar(30) NOT NULL,
last_name varchar(30) NOT NULL,
email varchar(50) NOT NULL UNIQUE,
password varchar(50) NOT NULL
);

CREATE TABLE report (
report_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id int(11) NOT NULL,
first_name varchar(30) NOT NULL,
last_name varchar(30) NOT NULL,
address varchar(255) NOT NULL,
report_document varchar(255) NOT NULL,
access_code int(11) NOT NULL,
email varchar(50) NOT NULL
);

CREATE TABLE comment (
comment_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
report_id int(11) NOT NULL,
customer_comment tinyint(1) NOT NULL,
comment text NOT NULL
);

-- Insert into user_id 1, Ryan Morrow

INSERT INTO report (user_id, first_name, last_name, address, report_document, access_code, email) 
VALUES ('1', 'Brad', 'Westfall', 'Broadway Rd & Priest Dr', '/pdf/doc1.pdf', '12345', 'brad@azpixels.com');

INSERT INTO report (user_id, first_name, last_name, address, report_document, access_code, email) 
VALUES ('1', 'Daniel', 'Bilotte', 'Broadway Rd & Priest Dr', '/pdf/doc2.pdf', '12345', 'daniel@litfuze.com');

-- Insert into user_id 2, Shelly Morrow

INSERT INTO report (user_id, first_name, last_name, address, report_document, access_code, email) 
VALUES ('2', 'Brig', 'Lamoreaux', 'Broadway Rd & Priest Dr', '/pdf/doc3.pdf', '12345', 'brig@apollo.com');

-- Insert into comment_id, Ryan Morrow
INSERT INTO comment (report_id, comment) VALUES (1, 'I had a question on the A/C, hopefully you can clarify something for me?');


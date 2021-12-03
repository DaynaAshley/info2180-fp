CREATE DATABASE IF NOT EXISTS BugMe;

USE BugMe;
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON BugMe.* TO 'info2180'@'localhost' IDENTIFIED BY '2021Sem1';

CREATE TABLE Users (
   id INT AUTO_INCREMENT,
   firstname VARCHAR(64),
   lastname VARCHAR(64),
   password VARCHAR(64),
   email VARCHAR(64),
   date_joined DATETIME,
   PRIMARY KEY(id));

CREATE TABLE Issues (
   id INT AUTO_INCREMENT,
   title VARCHAR(64),
   description TEXT(254),
   type VARCHAR(64),
   priority VARCHAR(64),
   status VARCHAR(64),
   assigned_to INT,
   created_by INT,
   created DATETIME,
   updated DATETIME,
   PRIMARY KEY(id));


INSERT INTO Users (firstname, lastname, password, email, date_joined) 
SELECT 'administrator','administrator', md5('password123'), 'admin@project2.com', '2021-12-01' 
WHERE NOT EXISTS (SELECT email FROM Users WHERE email='admin@project2.com');

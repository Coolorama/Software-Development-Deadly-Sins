CREATE DATABASE software_exercise;

USE software_exercise;

CREATE TABLE Person(
	user_id INT AUTO_INCREMENT NOT NULL,
	user_name VARCHAR(100) NOT NULL,
	user_username VARCHAR(100) NOT NULL,
	user_email VARCHAR(100),
	user_descript VARCHAR(500),
	user_password VARCHAR(500),
	user_image VARCHAR(500),
  	CONSTRAINT user_pk PRIMARY KEY(user_id)
);
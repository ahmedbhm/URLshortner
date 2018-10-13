CREATE DATABASE `shortlink`;

CREATE TABLE links (
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  url VARCHAR(255) DEFAULT NULL,
  code VARCHAR(12) DEFAULT NULL,
  created date DEFAULT NULL
);
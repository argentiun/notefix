DROP DATABASE IF EXISTS notefix;

CREATE DATABASE notefix;


USE notefix;

CREATE TABLE user (
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name                VARCHAR(100) NOT NULL,
    lastname            VARCHAR(100) NOT NULL,
    tel                 INT UNSIGNED NOT NULL,
    email               VARCHAR(100) NOT NULL,
    pass                VARCHAR(500) NOT NULL,
    creationdate        datetime NOT NULL DEFAULT NOW()
);

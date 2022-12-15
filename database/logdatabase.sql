CREATE DATABASE logdatabase;
USE logdatabase;

CREATE TABLE logtable (
    id INT PRIMARY KEY AUTO_INCREMENT,
    host VARCHAR(255),
    request VARCHAR(10),
    lang VARCHAR(255),
    userIp VARCHAR(255),
    userid INT,
    useragent VARCHAR(255),
    script VARCHAR(255),
    reqTime DATETIME DEFAULT CURRENT_TIMESTAMP
);
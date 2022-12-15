CREATE DATABASE iamsocial;

USE iamsocial;

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    pwd VARCHAR(255) NOT NULL,
    mail VARCHAR(255) UNIQUE,
    username VARCHAR(255) UNIQUE,
    profilepic VARCHAR(32),
    bannerpic VARCHAR(32),
    isAdmin BOOLEAN DEFAULT FALSE,
    isDeleted BOOLEAN DEFAULT FALSE,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    bio VARCHAR(255),
    company VARCHAR(255),
    designation VARCHAR(255)

);

CREATE TABLE followfeed(
    userid int,
    userFollowingid int,
    FOREIGN KEY (userid) REFERENCES users(id),
    FOREIGN KEY (userFollowingid) REFERENCES users(id),
    UNIQUE(userid, userFollowingid)
);

CREATE TABLE post(
    postid INT PRIMARY KEY AUTO_INCREMENT,
    userid int,
    msg VARCHAR(255) ,
    pic VARCHAR(32),
    isDeleted BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (userid) REFERENCES users(id)
);

CREATE TABLE comments(
    commentid INT PRIMARY KEY AUTO_INCREMENT,
    postid int,
    userid int,
    comment VARCHAR(255) ,
    /*likes int,*/
    isDeleted BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (postid) REFERENCES post(postid)
);
CREATE TABLE likes(
    userid int,
    postid int,
    FOREIGN KEY (userid) REFERENCES users(id),
    FOREIGN KEY (postid) REFERENCES post(postid),
    UNIQUE(userid, postid)
);

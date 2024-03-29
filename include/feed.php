<?php
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";

function Getfeed(){
    $pw_check = $GLOBALS["database"]->query(("SELECT fd.*, u.username, u.profilepic, u.id, (SELECT COUNT(*) FROM likes as l WHERE l.postid=fd.postid) AS `like` FROM post as fd JOIN users as u ON (fd.userid) = u.id WHERE u.isDeleted=FALSE AND fd.isDeleted=FALSE ORDER BY fd.postid DESC;"));
    $result = $pw_check->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function Getfollowfeed($userid){
    $pw_check = $GLOBALS["database"]->query(("SELECT fd.*, u.username, u.profilepic, u.id, (SELECT COUNT(*) FROM likes as l WHERE l.postid=fd.postid) AS `like` FROM post as fd JOIN users as u ON (fd.userid) = u.id JOIN followfeed as ffd ON (u.id)=ffd.userFollowingid WHERE u.isDeleted=FALSE AND fd.isDeleted=FALSE AND ffd.userid = ".$userid." ORDER BY fd.postid DESC;"));
    $result = $pw_check->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function GetUserfeed($userid){
    $pw_check = $GLOBALS["database"]->query(("SELECT fd.*, u.username, u.profilepic, u.id, (SELECT COUNT(*) FROM likes as l WHERE l.postid=fd.postid) AS `like` FROM post as fd JOIN users as u ON (fd.userid) = u.id WHERE u.isDeleted=FALSE AND fd.isDeleted=FALSE AND userid=".$userid." ORDER BY fd.postid DESC;"));
    $result = $pw_check->fetch_all(MYSQLI_ASSOC);
    return $result;
}
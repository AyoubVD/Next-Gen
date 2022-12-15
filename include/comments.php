<?php
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";

function CreateComment($userid, $postid, $comment){
    $pw_check = $GLOBALS["database"]->query(("INSERT INTO comments (userid, postid, comment) VALUES (".$userid.", ".$postid.", '".$comment."');"));
    return $pw_check;
}

function DeleteComment($commentid){
    $pw_check = $GLOBALS["database"]->query(("UPDATE comments SET isDeleted=TRUE WHERE commentid=".$commentid.";"));
    return $pw_check;
}

function GetComments($postid){
    $pw_check = $GLOBALS["database"]->query(("SELECT c.*, u.username, u.profilepic, u.id FROM comments as c JOIN users as u ON (c.userid) = u.id WHERE u.isDeleted=FALSE AND c.isDeleted=FALSE AND postid=".$postid." ORDER BY c.commentid DESC;"));
    $result = $pw_check->fetch_all(MYSQLI_ASSOC);
    return $result;
}

<?php   
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";

function login($username,$password){
    $hashedpw= md5($password);
    $pw_check = $GLOBALS["database"]->query(("SELECT * FROM users WHERE username='".$username."' AND pwd ='".$hashedpw."' AND isDeleted=FALSE;"));
    $result = $pw_check->fetch_assoc();
    return $result;
}

function register($username,$password,$password2,$email){
    if($password!=$password2) return false;
    $count_check = $GLOBALS["database"]->query("SELECT COUNT(*) AS c FROM users WHERE username ='" . $username ."' OR mail='".$email."'");
    $count = $count_check->fetch_row();

    if ($count[0] != "0") return false;
    $hashedpassword = md5($password);
    $GLOBALS["database"]->query("INSERT INTO users(username, mail, pwd) VALUES ('".$username."', '".$email."', '".$hashedpassword."');") ;
    return true; 
}

function getUser($userId) {
    $pw_check = $GLOBALS["database"]->query(("SELECT * FROM users WHERE id='".$userId."';"));
    $result = $pw_check->fetch_assoc();
    return $result;
}

function followUser($userId, $followId) {
    $GLOBALS["database"]->query("INSERT INTO follows(userid, followid) VALUES ('".$userId."', '".$followId."');");
}
function unFollowUser($userId, $followId) {
    $GLOBALS["database"]->query("DELETE FROM follows WHERE userid='".$userId."' AND followid='".$followId."';");
}
function deleteUsers($userId) {
    $GLOBALS["database"]->query("UPDATE users SET isDeleted=TRUE WHERE id='".$userId."';");
}
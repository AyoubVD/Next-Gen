<?php   
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";

function login($username,$password){
    // $hashedpw= md5($password);
    $pw_check = $GLOBALS["database"]->query(("SELECT * FROM users WHERE username='".$username."' AND isDeleted=FALSE;"));
    $result = $pw_check->fetch_assoc();
    if (password_verify($password, $result['pwd'])){
        if($result==null){
            return null;
        }
        else{
            return $result;
        }
        return $result;
    }
}

function register($username,$password,$password2,$email){
    if($password!=$password2) return false;
    $count_check = $GLOBALS["database"]->query("SELECT COUNT(*) AS c FROM users WHERE username ='" . $username ."' OR mail='".$email."'");
    $count = $count_check->fetch_row();

    if ($count[0] != "0") return false;
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
    $GLOBALS["database"]->query("INSERT INTO users(username, mail, pwd) VALUES ('".$username."', '".$email."', '".$hashedpassword."');") ;
    return true; 
}

function getUser($userId) {
    $pw_check = $GLOBALS["database"]->query(("SELECT * FROM users WHERE id='".$userId."';"));
    $result = $pw_check->fetch_assoc();
    return $result;
}

function getUsers(){
    $pw_check = $GLOBALS["database"]->query(("SELECT id,username,mail,profilepic FROM users"));
    $result = $pw_check->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function followUser($userId, $userFollowingid) {
    $GLOBALS["database"]->query("INSERT INTO followfeed(userid, userFollowingid) VALUES ('".$userId."', '".$userFollowingid."');");
}
function unFollowUser($userId, $userFollowingid) {
    $GLOBALS["database"]->query("DELETE FROM follows WHERE userid='".$userId."' AND userFollowingid='".$userFollowingid."';");
}
function deleteUsers($userId) {
    $GLOBALS["database"]->query("UPDATE users SET isDeleted=TRUE WHERE id='".$userId."';");
}
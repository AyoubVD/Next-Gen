<?php   
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";

function login($username,$password){
    // $hashedpw= md5($password);
    $pw_check = $GLOBALS["database"]->query(("SELECT * FROM users WHERE username='".$username."' AND isDeleted=FALSE;"));
    $result = $pw_check->fetch_assoc();
    if (password_verify($password, $result['pwd'])){
        return $result;
    }
    return null;
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
    $pw_check = $GLOBALS["database"]->query(("SELECT id,username,mail,profilepic, firstname, lastname FROM users WHERE isDeleted=false" ));
    $result = $pw_check->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function followUser($userId, $userFollowingid) {
    $GLOBALS["database"]->query("INSERT INTO followfeed(userid, userFollowingid) VALUES ('".$userId."', '".$userFollowingid."');");
}

function unFollowUser($userId, $userFollowingid) {
    $GLOBALS["database"]->query("DELETE FROM followfeed WHERE userid='".$userId."' AND userFollowingid='".$userFollowingid."';");
}

function deleteUsers($userId) {
    $GLOBALS["database"]->query("UPDATE users SET isDeleted=TRUE WHERE id='".$userId."';");
}

function isAdmin($userId) {
    $pw_check = $GLOBALS["database"]->query(("SELECT * FROM users WHERE id='".$userId."';"));
    $result = $pw_check->fetch_assoc();
    return $result['isAdmin'];
}

function updatePassword($userId,$oldpassword,$newpassword,$newPassword2){
    if($newpassword!=$newPassword2) return false;
    $pw_check = $GLOBALS["database"]->query(("SELECT * FROM users WHERE id='".$userId."';"));
    $result = $pw_check->fetch_assoc();
    if (password_verify($oldpassword, $result['pwd'])){
        $hashedpassword = password_hash($newpassword, PASSWORD_BCRYPT);
        $GLOBALS["database"]->query("UPDATE users SET pwd='".$hashedpassword."' WHERE id='".$userId."';") ;
        return true;
    }
    return false;
}

function updateInfo($firstname,$lastname,$bio,$company,$designation,$userId){
    $GLOBALS["database"]->query("UPDATE users SET firstname='".$firstname."', lastname='".$lastname."', bio='".$bio."', company='".$company."', designation='".$designation."' WHERE id='".$userId."';") ;
}
    
function isfollowing($userId, $userFollowingid) {
    $pw_check = $GLOBALS["database"]->query(("SELECT * FROM followfeed WHERE userid='".$userId."' AND userFollowingid='".$userFollowingid."';"));
    $result = $pw_check->fetch_assoc();
    if($result) return true;
    return false;
}

function getFollowing($userId){
    $users = $GLOBALS["database"]->query(("select user.id, user.username from followfeed join users as user on user.id = followfeed.userFollowingid where followfeed.userid =".$userId));
    $result = $users->fetch_all(MYSQLI_ASSOC);
    return $result;   
}

function fuzzySearch($search){
    $users = $GLOBALS["database"]->query(("SELECT id,username,firstname, lastname,profilepic FROM users WHERE username LIKE '%".$search."%' AND isDeleted=false"));
    $result = $users->fetch_all(MYSQLI_ASSOC);
    return $result;   
}

function fuzzySearchAdmin($search){
    $users = $GLOBALS["database"]->query(("SELECT id,username,mail, firstname, lastname, isDeleted FROM users WHERE username LIKE '%".$search."%' "));
    $result = $users->fetch_all(MYSQLI_ASSOC);
    return $result;   
}
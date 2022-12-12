<?php
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";


// Make function
function post($username, $msg, $file){
    $imghash = "";
    // Check if the form was submitted
    // Check if a file was selected for upload

    // if (isset($_FILES['myfile'])) {
        // Get the file details

    // Check if the file is a valid upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Create a new file name for the uploaded file
        $new_file_name = time() . $file['name'];

        $imghash=md5($new_file_name);

        // Move the uploaded file to the specified location
        move_uploaded_file($file['tmp_name'], "../public/uploads/$imghash");
    }else{
        echo $file['error'];
        die;
    }

    $GLOBALS["database"]->query("INSERT INTO post(userid, msg, pic) VALUES ('".$username."', '".$msg."', '".$imghash."');");
}


function deletePost($postid){
    $GLOBALS["database"]->query("UPDATE post SET isDeleted=TRUE WHERE postid='".$postid."';");
}function deleteUserPost($userid){
    $GLOBALS["database"]->query("UPDATE post SET isDeleted=TRUE WHERE userid='".$userid."';");
}

function likePost($postid,$userId){
    $GLOBALS["database"]->query("INSERT INTO likes(userid,postid) VALUES(".$userId.",".$postid.")");
}
function dislikePost($postid,$userId){
    $GLOBALS["database"]->query("DELETE FROM likes WHERE userid =".$userId." AND postid=".$postid." ");
}
function didLike($userId, $postid){
    // $count_check = $GLOBALS["database"]->query("SELECT COUNT(*) AS c FROM users WHERE username ='" . $username ."' OR mail='".$email."'");
    $count_check = $GLOBALS["database"]->query("SELECT COUNT(*) FROM likes WHERE userid=".$userId." AND postid=".$postid."");
    $count = $count_check->fetch_row();

    return($count[0] != "0");
}

<?php
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";
include_once INCLUDE_PATH . "comments.php";


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
    $count_check = $GLOBALS["database"]->query("SELECT COUNT(*) as c FROM likes WHERE userid=".$userId." AND postid=".$postid."");
    $count = $count_check->fetch_row();
    
    return($count[0] != "0");
}



function displayPosts($posts) {
    foreach ($posts as &$p) {
        $liked=didLike($_SESSION["id"], $p["postid"]);
        $comments = GetComments($p["postid"]);
        
    ?>
    <div class="container mx-auto p-10" background-color="lightblue" width="100%" style="text-align:center; background-color:7b68ee">
        
                <!-- img softcoden !!! -->
    <img class="profileImage" width="30%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F04%2F90%2F37%2F0490378ab58d2a868b41ee37b91f2e81.jpg&f=1&nofb=1&ipt=5af84330168e9f2e079f3188ce30eb7b7144f59a476d84d5cac9db66acf416a6&ipo=images" />
        <div>
            <div class="profile-post">
            <p><b><a href="./profile.php?userid=<?php echo $p["id"] ?>"><?php echo $p["username"] ?></a></b> <br> <?php echo $p["msg"] ?></p>
            <div class="buttons">
            <img class="post-image" src="./uploads/<?php echo $p["pic"] ?>" />
           <br>
           <?php if ($liked==false){ ?>
                <a href="./like.php?id=<?php echo $p["postid"] ?>" style="">Like</a>
            <?php } else { ?>
                <a href="./dislike.php?id=<?php echo $p["postid"] ?>">dislike</a>
            <?php } ?>
            <br>
            <span class="like__amount">Liked By <?php echo $p["like"] ?></span>
            <br>
            
            <div class="comment__container">  <input type="text" class="comment__input" placeholder="Comment"/>  <div><p><?php echo "comments" ?></p></div> </div>
                <?php
                foreach ($comments as &$c) {
                ?>
                <div>
                    <p><b><a href="./profile.php?userid=<?php echo $c["id"] ?>"><?php echo $c["username"] ?></a></b> <br> <?php echo $c["comment"]?></p>
                <?php
                }
                
                ?>       
            <hr>
            </div>
            </div>
        </div>
    </div>
    <?php
    }
}
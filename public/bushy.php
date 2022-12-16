<?php
session_start();
$title="Feed";
// Include for the feed
//include_once '../include/PathLogging.php';
include_once '../include/feed.php';
include_once '../include/post.php';

if (empty($_SESSION)){
    header('Location: ./index.php');
}

// Request feed for index
$posts=GetFeed(); // [["userName" => "Test", "msg" => "Test", "likes" => 0, "postid" => -1, "img" => "https://miro.medium.com/max/651/1*rf4QAy4yYPdfuLsZ7NrHZA.jpeg"]]
?>

<!DOCTYPE html>
<html lang="en">

<?php include './head.php'; ?>
<link rel="stylesheet" href="./Css/bushy.css">
<body>
    <div style="background-color:#f2f3f4   ; width:80%; margin-left:10%;">
        <div style="background-color:#f2f3f4   ; width:60%; margin-left:35%; text-align: center;">
         
        </div>
        <?php
    include './PostUpload.php';
    displayPosts($posts); ?>
    </div>
</body>


</html>
<?php
session_start();
// Include for the feed
include_once '../include/PathLogging.php';
include_once '../include/feed.php';
include_once '../include/post.php';

if (empty($_SESSION)){
    header('Location: ./index.php');
}

$title="FollowFeed";
// Request feed for index
$posts=Getfollowfeed($_SESSION["id"]); // [["userName" => "Test", "msg" => "Test", "likes" => 0, "postid" => -1, "img" => "https://miro.medium.com/max/651/1*rf4QAy4yYPdfuLsZ7NrHZA.jpeg"]]
?>

<!DOCTYPE html>
<html lang="en">

<?php include './head.php'; ?>
<body>
    <?php
    include './navbar.php';
    ?>

<li class="list-group-item">
    <?php displayPosts($posts); ?>
          
        </li>
    </ul>
</body>

</html>
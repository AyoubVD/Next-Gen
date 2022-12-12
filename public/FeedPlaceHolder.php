<?php
session_start();
$title="Feed";
// Include for the feed
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

<body>
    <?php
    include './navbar.html';
    ?>

    <?php
        displayPosts($posts);
        ?>
        <li class="list-group-item">
            <div class="content">

            </div>
            <img src="images/Pepe.jpg" alt="Pepe" width="500" height="333">

            <br>
            <textarea rows="5" cols="50" name="description">
                Your description
            </textarea>
            <br>

            <a href="#" class="like-button">
                <svg width="20" height="20" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M320 1344q0-26-19-45t-45-19q-27 0-45.5 19t-18.5 45q0 27 18.5 45.5t45.5 18.5q26 0 45-18.5t19-45.5zm160-512v640q0 26-19 45t-45 19h-288q-26 0-45-19t-19-45v-640q0-26 19-45t45-19h288q26 0 45 19t19 45zm1184 0q0 86-55 149 15 44 15 76 3 76-43 137 17 56 0 117-15 57-54 94 9 112-49 181-64 76-197 78h-129q-66 0-144-15.5t-121.5-29-120.5-39.5q-123-43-158-44-26-1-45-19.5t-19-44.5v-641q0-25 18-43.5t43-20.5q24-2 76-59t101-121q68-87 101-120 18-18 31-48t17.5-48.5 13.5-60.5q7-39 12.5-61t19.5-52 34-50q19-19 45-19 46 0 82.5 10.5t60 26 40 40.5 24 45 12 50 5 45 .5 39q0 38-9.5 76t-19 60-27.5 56q-3 6-10 18t-11 22-8 24h277q78 0 135 57t57 135z" />
                </svg>
            </a>
            <script src="Scripts/like.js"> </script>
        </li>
    </ul>
</body>

</html>
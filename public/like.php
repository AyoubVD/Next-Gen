<?php
session_start();
if (empty($_SESSION)){
    header('Location: ./index.php');
}
// Include for the feed
include_once '../include/post.php';

likePost($_GET["id"], $_SESSION["id"]);

header('Location: ' . $_SERVER["HTTP_REFERER"]);
<?php
session_start();
// Include for the feed
include_once '../include/post.php';

likePost($_GET["id"], $_SESSION["id"]);

header('Location: ' . $_SERVER["HTTP_REFERER"]);
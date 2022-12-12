<?php
session_start();
// Include for the feed
include_once '../include/post.php';

dislikePost($_GET["id"], $_SESSION["id"]);

header('Location: ' . $_SERVER["HTTP_REFERER"]);
<?php
session_start();
include_once '../include/post.php';
include_once '../include/users.php';
if (empty($_SESSION)){
    header('Location: ./index.php');
}
if (isAdmin($_SESSION["id"]) == false) {
    header("Location: ./FeedPlaceHolder.php");
}
deleteUserPost  ($_GET['id']);
include_once '../include/PathLogging.php';
header("Location: admin.php");
?>

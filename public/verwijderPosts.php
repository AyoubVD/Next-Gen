<?php
session_start();
include_once '../include/post.php';
if (empty($_SESSION)){
    header('Location: ./index.php');
}
if (isAdmin($_SESSION["id"]) == false) {
    header("Location: ./FeedPlaceHolder.php");
}
deleteUserPost  ($_GET['id']);
header("Location: admin.php");
?>

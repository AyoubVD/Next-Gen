<?php
include_once '../include/users.php';
session_start();
if (empty($_SESSION)){
    header('Location: ./index.php');
}
if (isAdmin($_SESSION["id"]) == false) {
    header("Location: ./FeedPlaceHolder.php");
}
deleteUsers($_GET['id']);
header("Location: admin.php");
?>
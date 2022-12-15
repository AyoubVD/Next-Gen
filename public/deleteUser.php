<?php
include_once '../include/users.php';
session_start();
if (empty($_SESSION)){
    header('Location: ./index.php');
}
deleteUsers($_SESSION['id']);
include_once '../include/PathLogging.php';
header("Location: ./logout.php");
?>
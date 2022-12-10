<?php
session_start();
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";

function GetFeed(){
    $pw_check = $GLOBALS["database"]->query(("SELECT fd.*, u.username, u.profilepic FROM feed as fd JOIN users as u ON (fd.userid) = u.id;"));
    $result = $pw_check->fetch_all(MYSQLI_ASSOC);
    return $result;
}

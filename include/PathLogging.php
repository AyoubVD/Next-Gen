<?php
$host = $_SERVER["HTTP_HOST"];
$request = $_SERVER["REQUEST_METHOD"];
$scriptname = $_SERVER["SCRIPT_NAME"];
$userIP = $_SERVER["REMOTE_ADDR"];
$agent = $_SERVER["HTTP_USER_AGENT"];
$lang = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
$uid = $_SESSION["id"];
$date = date("Y-m-d H:i:s");

$db = new mysqli("127.0.0.1:3306", "root","", "logdatabase");
//$db = new mysqli("ID388827_iamsocial.db.webhosting.be", "ID388827_iamsocial","wachtwoordimslab2020", "ID388827_iamsocial");
if(!$db){
    die("there was an issue connecting to the database!");
}

// define('database', $db);
// echo "INSERT INTO `logtable` (`host`, `request`, `script`, `userIp`, `useragent`, `lang`, `userid`, `reqTime`) VALUES ('$host', '$request', '$scriptname', '$userIP', '$agent', '$lang', '$uid', '$date');";
$db->query("INSERT INTO `logtable` (`host`, `request`, `script`, `userIp`, `useragent`, `lang`, `userid`, `reqTime`) VALUES ('$host', '$request', '$scriptname', '$userIP', '$agent', '$lang', '$uid', '$date');");

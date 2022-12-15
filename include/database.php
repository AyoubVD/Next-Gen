<?php
$db = new mysqli("127.0.0.1:3306", "root","", "iamsocial");
//$db = new mysqli("ID388827_iamsocial.db.webhosting.be", "ID388827_iamsocial","wachtwoordimslab2020", "ID388827_iamsocial");
if(!$db){
    die("there was an issue connecting to the database!");
}

// define('database', $db);
$GLOBALS["database"] = $db;


<?php
include_once '../include/users.php';

deleteUsers($_GET['id']);
header("Location: admin.php");
?>
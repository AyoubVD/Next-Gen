<?php
include_once '../include/post.php';

deleteUserPost  ($_GET['id']);
header("Location: admin.php");
?>
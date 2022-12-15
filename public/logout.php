<?php
session_start();
include_once '../include/PathLogging.php';

session_destroy();
header('Location: ./index.php');
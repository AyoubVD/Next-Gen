<?php
$servername= "localhost";
$username="root";
$password="";
$dbname= "iamsocial";
$teller=0;

$connect1= new mysqli($servername,$username,$password,$dbname);
 if ($connect1->connect_error){
     die("connection failed: ". $connect1->connect_error);
 }
 else{
     $sql="SELECT * FROM users ";
 }
if( isset($_GET['id'])){
    $id=$_GET['id'];
}
 $sql="DELETE FROM `post` WHERE `userid` = '$id' ";
 $qresult= $connect1 -> query($sql);
 header("Location: admin.php");
?>
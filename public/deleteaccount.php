<?php
$servername= "localhost";
$username="root";
$password="";
$dbname= "iamsocial";
$teller=0;

$connect1= new mysqli($servername,$username,$password,$dbname);
?>
<?php
 
 if ($connect1->connect_error){
     die("connection failed: ". $connect1->connect_error);
 }
 else{
     $sql="SELECT * FROM users";
 }
if( isset($_GET['id'])){
    $id=$_GET['id'];
}
 $sql="DELETE FROM `users` WHERE `id` = '$id' ";
 $qresult= $connect1 -> query($sql);
 header("Location: ../index.php");
?>
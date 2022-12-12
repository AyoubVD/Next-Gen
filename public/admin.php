<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Css/feeds.css">
    <title>Admin</title>
</head>
<body>
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
?>
<table border="1px">
 <tr>
 <td> mail </td>
 <td>username</td>
</tr>
<?php
 $qresult= $connect1 -> query($sql);
if($qresult->num_rows > 0){
    while($endresult = $qresult->fetch_assoc()){
        $teller++;
?>
<tr>
    <td>
        <?php echo $endresult["mail"] ?>
    </td>
    <td>
        <?php echo $endresult["username"] ?>
    </td>
    <td>
        <a href="verwijder.php?id=<?php echo $endresult['id'] ?>">verwijder</a>
    </td>
    <td>
        <a href="">verwijder posts</a>
    </td>
</tr>


<?php
    }
}
?>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/feedplaceholder.css">
    <link rel="stylesheet" type="text/css" href="Css/test.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>placeholder</title>
</head>

<body>
    <?php
    include './navbar.html';
    ?>
<ul class="list-group list-group-flush">
  <li class="list-group-item">
  <div id="content">

</div>
<img src="images/Pepe.jpg" alt="Pepe" width="500" height="333">

<br>
<textarea rows="5" cols="50" name="description">
    Your description
</textarea>
<br>

<a href="#" class="like-button">
    <?xml version="1.0" encoding="utf-8"?>
    <svg width="20" height="20" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M320 1344q0-26-19-45t-45-19q-27 0-45.5 19t-18.5 45q0 27 18.5 45.5t45.5 18.5q26 0 45-18.5t19-45.5zm160-512v640q0 26-19 45t-45 19h-288q-26 0-45-19t-19-45v-640q0-26 19-45t45-19h288q26 0 45 19t19 45zm1184 0q0 86-55 149 15 44 15 76 3 76-43 137 17 56 0 117-15 57-54 94 9 112-49 181-64 76-197 78h-129q-66 0-144-15.5t-121.5-29-120.5-39.5q-123-43-158-44-26-1-45-19.5t-19-44.5v-641q0-25 18-43.5t43-20.5q24-2 76-59t101-121q68-87 101-120 18-18 31-48t17.5-48.5 13.5-60.5q7-39 12.5-61t19.5-52 34-50q19-19 45-19 46 0 82.5 10.5t60 26 40 40.5 24 45 12 50 5 45 .5 39q0 38-9.5 76t-19 60-27.5 56q-3 6-10 18t-11 22-8 24h277q78 0 135 57t57 135z" />
    </svg>
</a>
<script src="Scripts/like.js"> </script>
  </li>


    <?php

include_once "../include/database.php";
// show users from database
$users = $db->query("SELECT * FROM users");

//add users to list
/* if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $agree = $_POST['agree'];
    $database->query("INSERT INTO users (username, email, password, password2, agree) VALUES ('$username', '$email', '$password', '$password2', '$agree')");
    header("Location: test.php"); 
}   */
// select everything from users
$users = $db->query("SELECT * FROM users");
// echo user data
/* foreach ($users as $user) {
    echo $user['username'] . "<br>";
    echo $user['email'] . "<br>";
    echo $user['password'] . "<br>";
    echo $user['password2'] . "<br>";
    echo $user['agree'] . "<br>";
} */
// select everything from posts
/* $posts = $db->query("SELECT * FROM posts"); 
// select name from users where id from posts = user_id    
 foreach ($posts as $post) {
    $user = $db->query("SELECT username FROM users WHERE id = " . $post['userid'])->fetch();
    echo $user['name'] . "<br>";
    echo $post['title'] . "<br>";
    echo $post['content'] . "<br>";
    echo $post['created_at'] . "<br>";
    echo $post['updated_at'] . "<br>"; 
    // print attributes of $post
     
}  */

//echo user from list in div
/* foreach ($users as $user) {
    echo "<li class='list-group-item'>";
    echo "<h3>" . $user['username'] . "</h3>";
    echo "<p>" . $user['mail'] . "</p>";
    echo "<p>" . $user['pwd'] . "</p>";
    echo "<p>" . $user['id'] . "</p>";
    echo "<a href='' class='like-button'>
    <?xml version='1.0' encoding='utf-8'?>
    <svg width='20' height='20' viewBox='0 0 1792 1792' xmlns='http://www.w3.org/2000/svg'>
        <path
            d='M320 1344q0-26-19-45t-45-19q-27 0-45.5 19t-18.5 45q0 27 18.5 45.5t45.5 18.5q26 0 45-18.5t19-45.5zm160-512v640q0 26-19 45t-45 19h-288q-26 0-45-19t-19-45v-640q0-26 19-45t45-19h288q26 0 45 19t19 45zm1184 0q0 86-55 149 15 44 15 76 3 76-43 137 17 56 0 117-15 57-54 94 9 112-49 181-64 76-197 78h-129q-66 0-144-15.5t-121.5-29-120.5-39.5q-123-43-158-44-26-1-45-19.5t-19-44.5v-641q0-25 18-43.5t43-20.5q24-2 76-59t101-121q68-87 101-120 18-18 31-48t17.5-48.5 13.5-60.5q7-39 12.5-61t19.5-52 34-50q19-19 45-19 46 0 82.5 10.5t60 26 40 40.5 24 45 12 50 5 45 .5 39q0 38-9.5 76t-19 60-27.5 56q-3 6-10 18t-11 22-8 24h277q78 0 135 57t57 135z' />
    </svg>
       </a>";
    echo "</li>";
} */

//echo $users[0]['username'];
 //show each key and value of posts
 /* foreach($post as $key => $value){
    //show each key and value of users
    foreach($users as $user){
        //if post userid is equal to user id
        if($post['userid'] == $user['id']){
            //show username
            echo $user['username'];
        }
    }
} */
//show users from database
$users = $db->query("SELECT * FROM users");
//show everythinh from post
$posts = $db->query("SELECT * FROM posts");
foreach($posts as $post){
   

    foreach ($post as $key => $value) {
    echo "<li class='list-group-item'>";
    echo "<h3>" . $post['msg'] . "</h3>";
    echo "<img src='" . $post['pic'] . " 'width='30%'>";
   /*  echo "<p>" . $user['pwd'] . "</p>";
    echo "<p>" . $user['id'] . "</p>"; */
    echo "</li>";
    }  
}
?>
</ul>
<!-- create container -->

</body>

</html>
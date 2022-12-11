<?php
include_once '../include/users.php';

if($_POST){
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $password2=$_POST["password2"];
    //$agree=$_POST["agree"];
    if(register($username,$password,$password2,$email)){
        header('Location: ./index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lf8Pq4iAAAAAKv53YUm-Li3wt0x5oGzx38KCYKe"></script>
    <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6Lf8Pq4iAAAAAKv53YUm-Li3wt0x5oGzx38KCYKe', {action: 'submit'}).then(function(token) {
              document.getElementByID("demo-form").value=token;
          });
        });
      }
  </script>
    <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
    <title>test page</title>
</head>
<body>
    <?php
include("./navbar.html");
header('Location: ./index.php');
?>
<main>
    
    <!-- <form action="register.php" method="post" id="demo-form">
        <h1>Sign Up</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            
            <label for="password2">Password Again:</label>
            <input type="password" name="password2" id="password2">
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="#" title="term of services">term of services</a>
                
            </label>
            
        </div>
        <div>
        

        </div>
        <script>
        grecaptcha.ready(function() {
          grecaptcha.execute('6Lf8Pq4iAAAAAKv53YUm-Li3wt0x5oGzx38KCYKe', {action: 'submit'}).then(function(token) {
              document.getElementByID("demo-form").value=token;
          });
    </script>
        <button type="submit">Register</button>
        <footer>Already a member? <a href="index.html">Login here</a></footer>
    </form>
        -->

    
</main>
</body>
</html>
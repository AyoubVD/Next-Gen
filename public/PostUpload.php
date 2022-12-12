<?php
session_start();
include_once '../include/post.php';

// Call function
if (isset($_POST['description'])) {
    if (isset($_FILES['myfile'])){
        post($_SESSION["id"], $_POST["description"], $_FILES["myfile"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method = "post" enctype="multipart/form-data">
        Description : <br />
        <textarea rows="5" cols="50" name="description">
        </textarea>
        <br />
        <label for="myfile">Select a file:</label>
        <input type="file" id="myfile" name="myfile"><br><br>
        <input type="submit">
    </form>
</body>

</html>
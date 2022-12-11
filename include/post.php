<?php
session_start();
include_once '../GLOBALS.php';
include_once INCLUDE_PATH . "database.php";

// Make function
function post(){
    $username=$_SESSION["id"];//$_POST["username"];
    $msg=$_POST["description"];


    $imghash = "";
    // Check if the form was submitted
    // Check if a file was selected for upload
    if (isset($_FILES['myfile'])) {
        // Get the file details
        $file = $_FILES['myfile'];

        // Check if the file is a valid upload
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Create a new file name for the uploaded file
            $new_file_name = time() . $file['name'];

            $imghash=md5($new_file_name);

            // Move the uploaded file to the specified location
            move_uploaded_file($file['tmp_name'], "../public/uploads/$imghash");
        }else{
            echo $file['error'];
            die;
        }
    }

    $GLOBALS["database"]->query("INSERT INTO feed(userid, msg, pic) VALUES ('".$username."', '".$msg."', '".$imghash."');");
}
// create function post function
// function post(){
//     // Get the file details
//     $file = $_FILES['myfile'];
//
//     // Check if the file is a valid upload
//     if ($file['error'] === UPLOAD_ERR_OK) {
//         // Create a new file name for the uploaded file
//         $new_file_name = time() . $file['name'];
//
//         // Move the uploaded file to the specified location
//         move_uploaded_file($file['tmp_name'], "../public/uploads/$new_file_name");
//     }
// }


?>

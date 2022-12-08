<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    function test(){
        $servername = "127.0.0.1:3306";
        $username = "root";
        $password = "";
        $dbname = "iamsocial";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // sql to delete a record
        $sql = "DELETE FROM users WHERE id=1";
        
        if ($conn->query($sql) === TRUE) {
          echo "Record deleted successfully";
        } else {
          echo "Error deleting record: " . $conn->error;
        }
        
        $conn->close();
    }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Css/delete.css">
    <title>Delete account confirmation</title>
</head>
<body>
    <p>Click the delete button to confirm you want to delete your account.</p>
    <button onclick="GoBack()" class = "btn btn-cancel">Cancel</button>
    <button id="Bye" onclick="Confirmed()" class = "btn btn-delete">Delete</button>

    <script src="Scripts/CompleteDelete.js"></script>
</body>
</html>
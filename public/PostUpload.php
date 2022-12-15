<?php

// Call function
if (isset($_POST['description'])) {
    if (isset($_FILES['myfile'])){
        post($_SESSION["id"], $_POST["description"], $_FILES["myfile"]);
    }
}
?>

<div class="container mx-auto p-10" background-color="lightblue" width="100%">
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method = "post" enctype="multipart/form-data">
        Description : <br />
        <textarea rows="5" cols="50" name="description"></textarea>
        <br>
        <label for="myfile">Select a file:</label>
        <input type="file" id="myfile" name="myfile"><br><br>
        <input type="submit">
    </form>
    <hr>
</div>
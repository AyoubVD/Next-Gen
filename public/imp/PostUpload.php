<?php

// Call function
if (isset($_POST['description'])) {
    if (isset($_FILES['myfile'])){
        post($_SESSION["id"], htmlspecialchars($_POST["description"]), $_FILES["myfile"]);
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
}
?>
<div class="container mx-auto p-10 " background-color="7b68ee " width="100%" style="text-align:center;">

    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method = "post" enctype="multipart/form-data">
    <div class="profile"><img class="profileImage" width="30%" src="./uploads/<?php echo $p["pic"] ?>" /><div>
        <div class="description">
        Description : <br />
        <textarea rows="5" cols="50" name="description"></textarea>
        <br>
        <input type="file" id="myfile" name="myfile"><br><br>
        <input type="submit">
        </div>
    </form>
    <hr>
</div>
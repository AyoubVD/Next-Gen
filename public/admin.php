<?php   
session_start();
include_once '../include/users.php';
if (empty($_SESSION)){
    header('Location: ./index.php');
}
if (isAdmin($_SESSION["id"]) == false) {
    header("Location: ./FeedPlaceHolder.php");
}
?>

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

include_once './navbar.php';
?>
<div class="container mx-auto p-10" background-color="lightblue" width="100%">
    <h1>Admin</h1>
    <h2>Verwijder gebruikers</h2>
    <table>
        <tr>
            <th>Gebruikersnaam</th>
            <th>Verwijder</th>
        </tr>
        <?php
        $users = getUsers();
        foreach ($users as &$u) {
            ?>
            <tr>
                <td><a href="./profile.php?userid=<?php echo $u["id"] ?>"><?php echo $u["username"] ?></a></td>
                <td><a href="./verwijder.php?id=<?php echo $u["id"] ?>">Verwijder</a></td>
                <td><a href="./verwijderPosts.php?id=<?php echo $u["id"] ?>">Verwijder posts</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
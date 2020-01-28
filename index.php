<?php
session_start();
if(!isset($_SESSION['name'])) {
    $_SESSION['name'] = $_POST['name'];
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Super Hitori Signin</title>
    <link href="hitori.css" type="text/css" rel="stylesheet" />

</head>
<body>
<form action="index-post.php" id="signin" method="post">
    <fieldset>
        <p><img src="img/banner.png" width="521" height="346" alt="Super Hitori Banner"></p>
        <p>Welcome to Super Hitori</p>
        <p><label for="name">Your Name: </label>
            <input type="text" name="name" id="name" value=""></p>
        <p><input type="submit" value="Start Game"></p>
    </fieldset>
</form>
</body>
</html>
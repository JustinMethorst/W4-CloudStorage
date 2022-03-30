<?php
include './includes/class-autoload.inc.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="register.php">Register User</a>
<br>
<a href="login.php">Login User</a>


<form action="upload.function.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file"/>
    <button type="submit" name="upload">upload</button>
</form>

</body>
</html>

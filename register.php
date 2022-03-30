<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Register for Cloud Storage</title>
</head>
<body>

<h1> Registration for Cloud Storage </h1>

<form method="post" enctype="multipart/form-data" action=?#?>
    <table>
        <tr>
            <td>
                <b> Enter your Name </b>
            </td>
            <td>
                <label>
                    <input type="text" placeholder="Enter name" name="n" pattern="[a-z A-Z]*" required/>
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <b> Enter your Email </b>
            </td>
            <td>
                <label>
                    <input type="email" name="e" placeholder="Enter Email">
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <b> Enter your Password </b>
            </td>
            <td>
                <label>
                    <input type="password" name="p" placeholder=" Enter Password">
                </label>
            </td>
        </tr>
        <tr>
            <td><b> Select your Profile Pic </b></td>
            <td><input type="file" name="pic"/></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="save" value="Register"/>
                <input type="reset" value="Reset"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
extract($_POST);
if (isset($save)) {
    $dob = $yy . "-" . $mm . "--" . $dd;
    $h = implode(",", $hobb);
    $img = $_FILES['pic']['name'];
    if ($return) {
        $msg = "<font color='red'>" . ucfirst($e) . " already exists choose another email </font>";
    } else {
        $msg = "<font color='blue'> your data saved </font>";
    }
}
?>
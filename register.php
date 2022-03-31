<?php
include './includes/class-autoload.inc.php';
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Register for Cloud Storage</title>
    </head>
    <body>

    <h1> Registration for Cloud Storage </h1>

    <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
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
                        <input type="email" name="email" placeholder="Enter Email"
                               value="<?php echo htmlspecialchars($_POST['email']) ?? '' ?? ?>">
                        <div class="error">
                            <?php echo $errors['email'] ?? '' ?? ?>
                        </div>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <b> Enter your Username </b>
                </td>
                <td>
                    <label>
                        <input type="text" name="username" placeholder=" Enter Username"
                               value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?? ?>">
                        <div class="error">
                            <?php echo $errors['username'] ?? '' ?? ?>
                        </div>
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
                        <div class="error">
                            <!--                        --><?php //echo $errors['username'] ?? '' ?? ?>
                        </div>
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

if (isset($_POST['submit'])) {
    //validate entries
    $validation = new User($_POST);
    $errors = $validation->validateForm();

    //save data to db
}
?>
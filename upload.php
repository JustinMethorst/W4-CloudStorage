<?php
include './includes/class-autoload.inc.php';
$conn = new Files();
?>


    <form action="<?php $conn->uploadFile(); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <button type="submit" name="upload">upload</button>
    </form>

<?php
print_r($_FILES);
?>
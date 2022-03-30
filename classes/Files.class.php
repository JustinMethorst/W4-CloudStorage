<?php
//class Rating {
//    public $rate;
//
//    public function __construct($price) {
//        $this->$rate = $price;
//    }
//
//    public function display() {
//        echo $this->rate;
//    }
//}
//
//$alex = new Rating($_POST['price']);
//$alex->display();

class Files extends Dbh
{

    public function __construct()
    {

    }

    function uploadFile()
    {

        if (isset($_POST['upload'])) {
            $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $folder = "upload/";

            /* new file size in KB */
            $new_size = $file_size / 1024;
            /* new file size in KB */

            /* make file name in lower case */
            $new_file_name = strtolower($file);
            /* make file name in lower case */

            $final_file = str_replace(' ', '-', $new_file_name);

            if (move_uploaded_file($file_loc, $folder . $final_file)) {
                $sql = "INSERT INTO file(file_name, type, size) VALUES ( '$final_file', '$file_type','$new_size')";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();

                echo "File successfully upload !!";
            } else {
                echo "Error please try again";
            }
        }
    }
}
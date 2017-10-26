<?php
/**
* Created by PhpStorm.
* User: josen
* Date: 23-Oct-17
* Time: 11:38 AM
*/
require '../start.php';
session_start();

if (isset($_GET['addcat'])) {
    $catname = $_POST['catname'];

    $sql = "INSERT INTO categories (category, created_at)
                VALUES ('$catname', NOW())";

    //var_dump($image);

    $update = $db->query($sql);

    var_dump($update);

    if ($update){
        header('LOCATION: ' . BASE_URL . 'admin/adminsettings.php');
    }

}

if (isset($_GET['addprod'])){
    $itemname = $_POST['itemname'];
    $itemdescription = $_POST['itemdescription'];
    $itemprice = $_POST['itemprice'];
    $itemquantity    = $_POST['itemquantity'];

    if (isset($_FILES['itemimage']['name'])) {
        $target_dir = "../../public/uploads/hardwareproducts/";
//            var_dump($target_dir);
//            var_dump($_SESSION['user'][3]);
        $target_file = $target_dir . time() . basename($_FILES['itemimage']['name']);
        //var_dump($target_file);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        //var_dump($imageFileType);
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["itemimage"]["size"] > 2048000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["itemimage"]["tmp_name"], $target_file)) {
                $image = time() . basename($_FILES["itemimage"]["name"]);
                //echo "The file " . $image . " has been uploaded.";
                $_FILES = null;

            } else {
                ?> <script> <?php echo "Sorry, there was an error uploading your file."; ?></script> <?php
            }
        }

        $id = $_SESSION['user'][3];

        $sql = "INSERT INTO hardware_products (code, productname, description, categoryid, image, quantity, price, sellerid, created_at)
                VALUES ('','$itemname', '$itemdescription', 1, '$image', $itemquantity, $itemprice, $id, NOW())";

        //var_dump($image);

        $update = $db->query($sql);

        var_dump($update);

        if ($update){
            header('LOCATION: ' . VIEW_URL . 'user_account.php');
        }

    }

}
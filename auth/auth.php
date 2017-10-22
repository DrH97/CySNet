<?php
    require '../app/start.php';
    session_start();

    $userpass = null;
    $image = null;

    if (isset($_GET['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $loginresult = $db->query($sql);

        if($loginresult != null){
            //var_dump($loginresult);
            $userpass = $loginresult->fetch_assoc();
            if (password_verify($password, $userpass['password'])){
                $_SESSION['user'][0] = $userpass['email'];
                $_SESSION['user'][1] = $userpass['firstname'];
                $_SESSION['user'][2] = $userpass['lastname'];
                $_SESSION['user'][3] = $userpass['id'];

                header("LOCATION: ../index.php");

            } else {
                header("LOCATION: " . BASE_URL . 'auth/login.php');
                ?><script>alert("Wrong password or username");</script> <?php

            }
        }
    }

if (isset($_GET['adminlogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE email = '$email'";

    $loginresult = $db->query($sql);

    if($loginresult != null){
        //var_dump($loginresult);
        $userpass = $loginresult->fetch_assoc();
        if (password_verify($password, $userpass['password'])){
            $_SESSION['admin'][0] = $userpass['email'];
            $_SESSION['admin'][1] = $userpass['firstname'];
            $_SESSION['admin'][2] = $userpass['lastname'];
            $_SESSION['admin'][3] = $userpass['id'];

            header("LOCATION: ../admin/admin.php");

        } else {
            header("LOCATION: " . BASE_URL . 'auth/adminlogin.php');
            ?><script>alert("Wrong password or username");</script> <?php

        }
    }
}

    if (isset($_GET['register'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email-sign'];
        $password = password_hash($_POST['password-sign'], PASSWORD_BCRYPT);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        // var_dump($sql);

        $registerresult = $db->query($sql);

        if($registerresult->num_rows == 0){
            //var_dump($registerresult);
            $sql = "INSERT INTO users (username, firstname, lastname, gender, mobile, email, password, created_at)
                    VALUES ('','$firstname', '$lastname', '$gender', .$mobile, '$email', '$password', NOW())";

            $reg = $db->query($sql);

            var_dump($reg);
        } else {
            ?><script>alert("User with email already exists");</script> <?php
        }

        header("LOCATION: " . BASE_URL . 'auth/login.php');
    }

    if (isset($_GET['logout'])){
        //session_start();
        session_unset();
        session_destroy();

        header("LOCATION: ../index.php");
    }

    if (isset($_GET['updateaccount'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        //$gender = $_POST['gender'];
        //$mobile = $_POST['mobile'];
        //$email = $_POST['email'];
        $password = $userpass['password'];
//        $image = '';

        if (isset($_FILES['profile_image']['name'])) {
            $target_dir = "../public/uploads/";
//            var_dump($target_dir);
//            var_dump($_SESSION['user'][3]);
            $target_file = $target_dir . time() . basename($_FILES['profile_image']['name']);
            //var_dump($target_file);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            //var_dump($imageFileType);
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
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
            if ($_FILES["profile_image"]["size"] > 2048000) {
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
                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                    $image = time() . basename($_FILES["profile_image"]["name"]);
                    echo "The file " . $image . " has been uploaded.";

                } else {
                    ?> <script> <?php echo "Sorry, there was an error uploading your file."; ?></script> <?php
                }
            }
        }

        $id = $_SESSION['user'][3];

        $sql =  "UPDATE users SET username = '', firstname = '$firstname', lastname = '$lastname', 
                 image = '$image', updated_at = NOW() WHERE id = '$id'";

        if (isset($_POST['password-sign'])) {
            $password = password_hash($_POST['password-sign'], PASSWORD_BCRYPT);
            $sql = "UPDATE users SET username = '', firstname = '$firstname', lastname = '$lastname', 
                  password = '$password', image = '$image', updated_at = NOW() WHERE id = '$id'";
        }
        var_dump($image);

        $update = $db->query($sql);

        var_dump($update);

        if ($update){
            header('LOCATION: ' . VIEW_URL . 'user_account_update.php');
        }

    }


//    $sql = "SELECT * FROM users WHERE email = '$email'";
//    // var_dump($sql);
//
//    $registerresult = $db->query($sql);
//
//    if($registerresult->num_rows == 0){
//        //var_dump($registerresult);
//        $sql = "INSERT INTO users (username, firstname, lastname, gender, mobile, email, password, created_at)
//                    VALUES ('','$firstname', '$lastname', '$gender', .$mobile, '$email', '$password', NOW())";
//
//        $reg = $db->query($sql);
//
//        var_dump($reg);
//    } else {
//        ?><!--<script>alert("User with email already exists");</script> --><?php
//    }
//
//    header("LOCATION: " . BASE_URL . 'auth/login.php');
//}
?>
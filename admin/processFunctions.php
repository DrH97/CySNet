<?php

include('connection.php');

//get current date-time for when the item is created
date_default_timezone_set('Africa/Nairobi');
$date = date('Y-m-d H:i:s');



//POSTS

if(!empty($_POST)){
    
    //CATEGORY POSTS
    $catItem = $_POST['catname'];

    $sql = "INSERT INTO categories (category,created_at) values ('$catItem', '$date')";

    mysqli_query($conn, $sql);


    //PROS POSTS
    $companyImage = $_POST['company_image'];
    $companyName = $_POST['company_name'];
    $companyMobile = $_POST['company_mobile'];

    $sql = "INSERT INTO professionals (name, image, mobile, created_at) values ('$companyName', '$companyImage', '$companyMobile', '$date')";

    mysqli_query($conn, $sql);
    
}

 

//GETS

if (!empty($_GET['catname'])){

        $catItem = $_GET['catname'];

        //get current date-time for when the item is created
        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO categories (category,created_at) values ('$catItem', '$date')";
        
        if (mysqli_query($conn, $sql)) {
            
            $message = "Record updated successfully";
            
        } else {
            
            $message = "Error updating record: " . mysqli_error($conn);
        }

 }else if(!empty($_GET['catname'])){
    
    
}


?>
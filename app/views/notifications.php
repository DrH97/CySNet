<?php

include('connection.php');

//CHECKING DB TO DETERMINE NOTIFICATION DISPLAY

//get seller verification status
$sql = "SELECT username FROM users WHERE id='$id' AND seller='2'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 

if(empty($row['total'])){
    $sellerNotif = "<center><h3 class='notification'>You have been denied permission to sell. Work on your portfolio again.</h3></center>";
}else{
     $sellerNotif = "<center><h3 class='notification'>You have been granted permission to sell. Upload products to get started.</h3></center>";
}

mysqli_free_result($result);



//get repair verification status
$sql = "SELECT username FROM users WHERE id='$id' AND repairer='2'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

if(empty($row['total'])){
    $repairerNotif = "<center><h3 class='notification'>You have been denied permission to repair. Work on your portfolio again.</h3></center>";
}else{
    $repairerNotif = "<center><h3 class='notification'>You have been granted permission to repair. You are shortlisted as our repair partner</h3></center>";
}

mysqli_free_result($result);




?>
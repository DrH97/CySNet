<?php

include('connection.php');

//FETCHING REPORT DATA

//get total of user accounts
$sql = "SELECT COUNT(email) AS 'total' FROM users";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$numUserAccounts = $row['total'];

mysqli_free_result($result);



//get total of student sellers
$sql = "SELECT COUNT(email) AS 'total' FROM users WHERE seller='1'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$numStudentSellers = $row['total'];

mysqli_free_result($result);



//get total of products posted
$sql = "SELECT SUM(quantity) AS 'total' FROM hardware_products";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$numProductsPosted = $row['total'];

mysqli_free_result($result);



//get total of products sold
//to be calculated



//get total of student repairers
$sql = "SELECT COUNT(email) AS 'total' FROM users WHERE repairer='1'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$numStudentRepairers = $row['total'];

mysqli_free_result($result);



//get total of active student repairers
$sql = "SELECT COUNT(email) AS 'total' FROM users WHERE activerepairer='1'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$numActiveStudentRepairers = $row['total'];

mysqli_free_result($result);


//get total of inactive student repairers
$sql = "SELECT COUNT(email) AS 'total' FROM users WHERE repairer='1' AND activerepairer='0'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$numInactiveStudentRepairers = $row['total'];

mysqli_free_result($result);



//get total of student repairers and sellers
$sql = "SELECT COUNT(email) AS 'total' FROM users WHERE repairer='1' AND seller='1'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$numStudentRepAndSell = $row['total'];

mysqli_free_result($result);




?>
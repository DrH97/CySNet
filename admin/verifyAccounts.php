<?php

// FOR SELLER VERIFICATION
        
    if (!empty($_GET['sellerAccept'])){

        $isAccepted = $_GET['sellerAccept'];

        //var_dump($_GET);
        
        echo "<script> alert('Confirm you want to accept this seller'); </script>";

        $sql = "UPDATE users SET seller='1' WHERE id='$isAccepted'";
        
        if (mysqli_query($conn, $sql)) {
            
            $message = "Record updated successfully";
            
        } else {
            
            $message = "Error updating record: " . mysqli_error($conn);
        }

    }else if(!empty($_GET['sellerDeny'])){
        
        $isDenied = $_GET['sellerDeny'];

        //var_dump($_GET);
        
        echo "<script> alert('Confirm you want to deny this seller'); </script>";

        $sql = "UPDATE users SET seller='1' WHERE id='$isDenied'";
        
        if (mysqli_query($conn, $sql)) {
            
            $message = "Record updated successfully";
            
        } else {
            
            $message = "Error updating record: " . mysqli_error($conn);
        }
        
    }




// FOR REPAIRER VERIFICATION
        
    if (!empty($_GET['repairerAccept'])){

        $isAccepted = $_GET['repairerAccept'];

        //var_dump($_GET);
        
        echo "<script> alert('Confirm you want to accept this repairer'); </script>";

        $sql = "UPDATE users SET repairer='1' WHERE id='$isAccepted'";
        
        if (mysqli_query($conn, $sql)) {
            
            $message = "Record updated successfully";
            
        } else {
            
            $message = "Error updating record: " . mysqli_error($conn);
        }

    }else if(!empty($_GET['repairerDeny'])){
        
        $isDenied = $_GET['repairerDeny'];

        //var_dump($_GET);
        
        echo "<script> alert('Confirm you want to deny this repairer'); </script>";

        $sql = "UPDATE users SET deniedverification='1' WHERE id='$isDenied'";
        
        if (mysqli_query($conn, $sql)) {
            
            $message = "Record updated successfully";
            
        } else {
            
            $message = "Error updating record: " . mysqli_error($conn);
        }
        
    }



?>

<?php
session_start();
require '../start.php';

$Quantity=1; $count;

if(isset($_GET['cart'])){

    if(isset($_SESSION['shopping_cart'])){
        $item_array_id = array_column($_SESSION['shopping_cart'],"item_id");
        //var_dump($item_array_id);
        if (!in_array($_GET['itemid'], $item_array_id)) {
            $Quantity = 1;
            $count = count($_SESSION['shopping_cart']);

            $item_array = array(
                'item_id' => $_GET['itemid'],
                'item_qty' => 1
            );

            $_SESSION['shopping_cart'][$count] = $item_array;

            echo "Product Successfully Added...";

        } else {
            //var_dump($_SESSION['shopping_cart']);
            for ($i=0; $i < count($_SESSION['shopping_cart']) ; $i++){

                if($_GET['itemid'] == $_SESSION['shopping_cart'][$i]['item_id']) {
                    //var_dump($i);
                    $_SESSION['shopping_cart'][$i]['item_qty']++;

                    break;
                }
            }

            echo "Product Successfully Updated...";
//            echo '<script>alert("Item already added")</script>';
//            echo '<script>window.location = "index.php"</script>';
        }

    } else {
        $item_array = array(
            'item_id' => $_GET['itemid'],
            'item_qty' => $Quantity
        );
        $_SESSION['shopping_cart'][0] = $item_array;
        $url = VIEW_URL . 'mycart.php';
        echo "Your Shopping Cart is ready... you can view your <a style='color: red;' href='$url'>product here</a>";
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "remove" && isset($_SESSION['shopping_cart'])) {
        foreach ($_SESSION['shopping_cart'] as $keys => $values) {
            if ($values['item_id'] == $_GET["itemid"]) {
                unset($_SESSION['shopping_cart'][$keys]);
//                echo '<script>alert("Item removed!")</script>';
                echo '<script>window.location = "mycart.php"</script>';
            }
        }

        if (empty($_SESSION['shopping_cart'])){
            unset($_SESSION['shopping_cart']);
        }
    }

    echo '<script>window.location = "mycart.php"</script>';
    echo "Successfully Removed Product";
}
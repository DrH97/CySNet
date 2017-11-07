<?php
include_once '../start.php';
include VIEW_ROOT . '/layouts/navbar.php';

//$Quantity;

//if(isset($_GET['cart'])){
//    $Quantity = 1;
//    //var_dump($_GET);
//    if(isset($_SESSION['shopping_cart'])){
//        $item_array_id = array_column($_SESSION['shopping_cart'], "item_id");
//        //var_dump($item_array_id);
//        if (!in_array($_GET['id'], $item_array_id)) {
//            $Quantity = 1;
//            $count = count($_SESSION['shopping_cart']);
//            $item_array = array(
//                'item_id' => $_GET['id'],
//                'item_qty' => $Quantity
//            );
//            $_SESSION['shopping_cart'][$count] = $item_array;
//            echo 'Success1';
//        } else {
//            $Quantity = $Quantity + 1;
//            echo 'Success2';
////            echo '<script>alert("Item already added")</script>';
////            echo '<script>window.location = "index.php"</script>';
//        }
//
//    } else {
//        $item_array = array(
//            'item_id' => $_GET['itemid'],
//            'item_qty' => $Quantity
//        );
//        $_SESSION['shopping_cart'][0] = $item_array;
//
//        echo 'Success2';
//    }
//}
//
//if (isset($_GET['action'])) {
//    if ($_GET['action'] == "remove") {
//        foreach ($_SESSION['shopping_cart'] as $keys => $values) {
//            if ($values['item_id'] == $_GET["id"]) {
//                unset($_SESSION['shopping_cart'][$keys]);
//                echo '<script>alert("Item removed!")</script>';
//                echo '<script>window.location = "cart.php"</script>';
//            }
//        }
//    }
//
//}
//else {
//    echo "action";
//    //return true;
//}

?>

<?php
if (!isset($_SESSION['shopping_cart'])) {
    ?>
    <!-- DESCRIPTION -->
    <div class="description">
        <center>
            <div>
                <h3>You have no items on your cart</h3>
                <a href="<?php echo BASE_URL; ?>">
                    <button>GET STARTED</button>
                </a>
            </div>
        </center>
    </div>

    <?php
} else {
    ?>

    <div class="error" id="error" style="display: none;"><p class="message" id="errormess">Some Error Here!!! sdfnjskdf jksd fs dfkj sdkjf kjsd fkj</p><span class="close" id="errorspan" onclick="alert('Asdad');">&cross;</span></div>
    <div class="inform" id="info" style="display: none;"><p class="message" id="infomess">Some Info Here...asdasdasdasd asdasd asd ndajk sdja sdj ajksd asjk dakjs d askd akj</p><span class="close" id="infospan" onclick="alert('Asdad');">&cross;</span></div>


    <!-- CONTENT -->
    <div class="content" style="padding-top: 5em;">


        <form method="post" action="">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th colspan="2">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_SESSION['shopping_cart'])) {
                        $count = 0;
                        foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                            $query = $db->query("SELECT * FROM hardware_products WHERE id = '".$values['item_id']."'") or die("could not complete search...");
                            $query = mysqli_fetch_array($query);
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td width="120"><img style="width: 60px; border: 1px solid gainsboro; padding: 5px; margin: 5px 0;" src="<?php echo BASE_URL . 'public/uploads/hardwareproducts/' . $query['image']; ?>"></td>
                                <td><?php echo $query['productname']; ?></td>
                                <td>KSh <input disabled style="color: black; background:none; font-size: 16px; border: none; padding: 0; margin: 0; max-width: 70px;" id="price<?php echo $count; ?>" value="<?php echo $query['price']; ?>"></td>
                                <td>
                                    <div class="small-6 columns" sstyle="border: solid;">
                                        <a onclick="quan('sub', <?php echo $count; ?>)" href="#" class="quan subtract" ><span class="fa fa-fw fa-minus-circle"></span></a>
<!--                                        <span id="dsisp--><?php //echo $count; ?><!--" class="disp_quan">--><?php //echo $values['item_qty']; ?><!--</span>-->
                                        <input id="disp<?php echo $count; ?>" name="quan[{$hash}]" maxlength="6" class="field_small_only" type="hsidden" value="<?php echo $values['item_qty']; ?>" style="width: 30px; height: 30px; text-align: center; font-size: 1.1em; border: none; box-shadow: inset 0px 0px 3px 1px grey; border-radius: 20%;">
<!--                                        <span id="dsisp--><?php //echo $count; ?><!--" class="hide"></span>-->
                                        <a onclick="quan('add', <?php echo $count; ?>)" href="#" class="quan add" rel="{$hash}"><span class="fa fa-fw fa-plus-circle"></span></a>
                                    </div>
                                </td>
                                <td>KSh <input class="itemtotal" disabled style="color: black; background: none; font-size: 16px; border: none; padding: 0; margin: 0; max-width: 70px;" id="itemtotal<?php echo $count; ?>" value="<?php echo $query['price'] * $values['item_qty']; ?>"></td>
                                <td><a href="cart.php?action=remove?itemid=<?php echo $values['item_id']; ?>" onclick="removecart('<?php echo $values['item_id']; ?>')" ><span style="color: red;" class="fa fa-fw fa-trash-o"></span></a></td>
                            </tr>

                        <?php } ?>
                    <?php }?>
                    <td colspan="7" style="background: whitesmoke; text-align: right; padding: 10px;"><b style="margin-right: 20px;"><hr>GrandTotal KSh </b><input value="0" class="grandtotal" disabled style=" text-align: leftt; background: none; font-size: 1.1em; border: none; padding: 0; margin: 0; max-width: 50px;" id="grandtotal">/-</td>

                </tbody>
            </table>

            <input type="submit" value="PURCHASE ITEM(S)">

        </form>

    </div>

<?php
}
?>
<!-- end of content div -->

<script>

    function removecart(id) {
//        $('#action').html('<center><img style="width: 30px;" src="<?php //echo ASSETS . '/images/loader.gif'; ?>//" /></center>');
//        //info("Edited product Succesfully");

        $.ajax({
            type: 'get',
            url: 'cart.php?action=remove',
            data: {
                'itemid': id
            },
            success: function (succ) {
                info(succ);

            }
        });
    }

    function quan(act, id) {

        x = $("#disp"+id).val();

        if (act === 'sub') {
            if (x > 1) {
                x = x - 1;
                //            alert(x);
                $("#disp" + id).val(x);
            } else
                $("#disp" + id).val(x);
        } else if(act === 'add'){
            x++;
            $("#disp"+id).val(x);
        }

        y = $("#price"+id).val();
        z = x*y;

        $("#itemtotal"+id).val(z);

        sumTotal();
    }

    function sumTotal() {
        let total = 0;
        items = document.getElementsByClassName("itemtotal");
        //alert(items.length);

        for (i=0; i < items.length; i++){
            p = parseInt(items[i].value.trim());
            total = total + p
        }

        $("#grandtotal").val(total);
    }

    window.onload(sumTotal());

</script>

<?php include 'layouts/footer.php'; ?>
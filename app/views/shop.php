<?php

include VIEW_ROOT . 'layouts/navbar.php';

$totalHProducts = $db->query("SELECT COUNT(*) as total from hardware_products")->fetch_assoc()['total'];

//$totalHProducts = 1000;

$paginator = new Paginator();
$paginator->total = $totalHProducts;
$paginator->paginate();

$firstlimit = ($paginator->currentPage - 1)*$paginator->itemsPerPage;

$hardwareitems = $db->query("SELECT * FROM hardware_products WHERE quantity > 0 LIMIT $firstlimit,  $paginator->itemsPerPage");

if (isset($_GET['search'])) {
    $searchq = $_GET['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

    $query = $db->query("SELECT * FROM hardware_products WHERE quantity > 0 && productname LIKE '%$searchq%' OR description LIKE '%$searchq%' LIMIT $firstlimit,  $paginator->itemsPerPage");
    if(isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        $query = $db->query("SELECT * FROM (SELECT * FROM hardware_products WHERE categoryid = $cat ) AS subq WHERE productname LIKE '%$searchq%' OR description LIKE '%$searchq%'  && quantity > 0 LIMIT $firstlimit,  $paginator->itemsPerPage");
        //var_dump($query);

        $count = mysqli_num_rows($query);
        if ($count < 1) {
            $query = $db->query("SELECT * FROM hardware_products WHERE quantity > 0 AND categoryid = $cat LIMIT $firstlimit,  $paginator->itemsPerPage");

            $count = mysqli_num_rows($query);
            if ($count != 0) { ?>
                <script>alert('There were no products found.. Here are products in the same category...');</script>
                <?php
            }
        }

    }

    $count = mysqli_num_rows($query);
    if ($count == 0) { ?>
        <script>alert('There were no products found.. try different parameters..');</script>
        <?php
    } else {

        $hardwareitems = $query;
    }
}

function setseller($db, $sid){
//    $sellers =
    return mysqli_fetch_assoc($db->query("SELECT * FROM users WHERE id = $sid"));
    //$seller =
//    return $sellers/*['firstname'].' '.$sellers['lastname']*/;
}

function error($error){
    ?><style>errors(<?php echo $error; ?>); </style><?php
}

?>

<style>
    .content{
        padding-top: 1em;
        width: 80%;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: auto;
        grid-gap: 1.8em;
    }

    .h-card {
        dbackground-color: white;
        width: auto;
        min-width: 100%;
        max-width: 100%;
        sfloat: left;
        height: auto;
        sdisplay: block;
        box-shadow: 0px 0px 0px gray;
        margin: 0;
        text-align: left;
    }

    @media screen and (max-width: 1100px){
        .content{
            grid-template-columns: repeat(3, 1fr);
        }
    }
    @media screen and (max-width: 780px){
        .content{
            width: 85%;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 1em;
        }
    }
    @media screen and (max-width: 450px){
        .h-card {
            box-shadow: 0 0 2px gray;
        }

        .content{
            width: 90%;
            grid-template-columns: 1fr;
        }
    }

</style>

<!-- DESCRIPTION -->
<div class="description">
    <center>
        <div class="search">
            <form method="get" action="<?php echo BASE_URL . 'index.php'; ?>">
                <input name="search" type="search" placeholder="Hey there, What are you looking for?">
                <select name="cat">
                    <option selected disabled="disabled">Category</option>
                    <?php
                    $categories = $db->query("SELECT * FROM categories");

                    while($cat = $categories->fetch_assoc()):
                        ?>
                        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['category']; ?></option>
                    <?php endwhile; ?>
                </select>
                <input type="submit" value="FIND">
            </form>
        </div>
    </center>
</div>

<div class="error" id="error" style="display: none;"><p class="message" id="errormess">Some Error Here!!! sdfnjskdf jksd fs dfkj sdkjf kjsd fkj</p><span class="close" id="errorspan" onclick="alert('Asdad');">&cross;</span></div>
<div class="inform" id="info" style="display: none;"><p class="message" id="infomess">Some Info Here...asdasdasdasd asdasd asd ndajk sdja sdj ajksd asjk dakjs d askd akj</p><span class="close" id="infospan" onclick="alert('Asdad');">&cross;</span></div>


<!-- CONTENT -->
<div class="content">

    <?php while($item = mysqli_fetch_assoc($hardwareitems)):
            $sellers = setseller($db,$item['sellerid']);
        ?>
    <!-- hardware items card -->
    <div class="h-card">
        <div class="image" style='background-image: url("<?php echo BASE_URL . 'public/uploads/hardwareproducts/' . $item['image']; ?>"); background-size: cover; overflow: hidden;'>
            <img src="<?php echo BASE_URL . 'public/uploads/hardwareproducts/' . $item['image']; ?>" style="opacity: 0;"/>
            <h3><?php echo $item['productname']; ?></h3>
        </div>
        <div class="more">
            <p><?php echo $item['description']; ?></p>
            <div class="price-quantity">
                <p style='color:coral;' id='price'>KSH <span style='color:orangered'><b><?php echo $item['price']; ?></b></span></p>
                <p style='color:green;' id='quantity'><b><?php echo $item['quantity']; ?></b> in stock</p>
            </div>
            <div class="bottom">
                <button id="sellerBtn" onclick="setSeller(<?php echo $item['sellerid']; ?>, '<?php echo $sellers['firstname'].' '.$sellers['lastname']; ?>', '<?php echo $sellers['year']; ?>', '<?php echo $sellers['mobile']; ?>', '<?php echo $sellers['email']; ?>', '<?php echo $sellers['rating']; ?>')">About Seller</button>
                <button type="submit" id="cartbutton" onclick="addcart(<?php echo $item['id']; ?>)">Add to cart</button>
            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <!-- loop to display hardware items, happens here -->




    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>

            <h3>About Seller</h3>
<!--            --><?php
//                if ($reviews = $db->query('SELECT * FROM ratings WHERE sellerid = '<script>sellerid</script>) !== false) {
//                $score = 0;
//                $count = 0;
//                foreach ($reviews as $review) {
//                $score += $review['rating'];
//                $count++;
//                }
//                $product['review_score'] = round($score/$count, 1);
//                if (!$product_view) {
//                $link = $GLOBALS['seo']->buildURL('prod', $product['product_id'], '&') . '#reviews';
//                } else {
//                $link = '#reviews';
//                }
//                $score = number_format(($score/$count), 1);
//                if ($product_view) {
//                $GLOBALS['smarty']->assign('LANG_REVIEW_INFO', sprintf($GLOBALS['language']->catalogue['review_info'], $score, $count, $link));
//                } else {
//                $product['review_info'] = sprintf($GLOBALS['language']->catalogue['review_info'], $score, $count, $link);
//                }
//                unset($score, $count);
//                } else {
//                $product['review_score'] = false;
//                }
//            ?>
            <center>
                <div class="person">
                    <img src="<?php echo ASSETS . 'images/defaultprofile.png'?>">
                    <div>
                        <h3 id="modalhead"></h3>
                        <div id="modalrating">
<!--                            --><?php //if ($product['review_score'])
//                            {
//                                for ($i = 1; $i <= 5; $i++) {
//                                    if ($product['review_score'] >= $i) { ?>
<!--                                        <span class="fa fa-star schecked fa-2x"></span>-->
<!--                                        <img style="width: 15px;" src="--><?php //echo ASSETS . 'images/star.png'; ?><!--" alt="">-->
<!--                                    --><?php //} elseif ($product['review_score'] > ($i - 1) && $product['review_score'] < $i) { ?>
<!--                                        <span class="fa fa-star-half-o schecked fa-2x"></span>-->
<!--                                        <img style="width: 15px;" src="--><?php //echo ASSETS . 'images/star_half.png'; ?><!--" alt="">-->
<!--                                    --><?php //} else { ?>
<!--                                        <span class="fa fa-star-o fa-2x"></span>-->
<!--                                        <img style="width: 15px;" src="--><?php //echo ASSETS . 'images/star_off.png'; ?><!--" alt="">-->
<!--                                    --><?php //}
//                                }
//                            }
//                            else { ?>
<!--                                No rating-->
<!--                            --><?php //}
//                                ?>
                        </div>
                    </div>
                </div>
            </center>

            <table>
<!--                <tr>-->
<!--                    <td class="info">Gender:</td>-->
<!--                    <td id="sellergender">Male</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="info">Institution:</td>-->
<!--                    <td>Strathmore University</td>-->
<!--                </tr>-->

                <tr>
                    <td class="info">Year:</td>
                    <td id="modalyear">2</td>
                </tr>
                <tr>
                    <td class="info">Number:</td>
                    <td id="modalmobile">+254 700 000 000</td>
                </tr>
                <tr>
                    <td class="info">Contact Email:</td>
                    <td id="modalemail">jdoe@gmail.com</td>
                </tr>

            </table>

        </div>

    </div>

    <!-- end of modal div -->

</div>

<div class="pagination">
    <?php echo $paginator->pageNumbers(); ?>
</div>
<div class="itemsselector"><?php echo $paginator->itemsPerPage(); ?></div>
<!--    --><?php //var_dump($paginator->pageNumbers()); ?>

<style>
    .itemsselector{
        position: fixed;
        right: 0;
        bottom: 0px;
        width: 100px;
    }
    .pagination{
        margin-left: 45%;
        width: 11%;
        display: inline-block;
    }
    .pagination li{
        padding: 15px 5px 0 5px;
        float: left;
        list-style: none;
        transition: all 0s ease;
    }

    .pagination li a:hover{
        font-size: 1.1rem;
        transition: all 0s ease;
    }

    .pagination li a.current{
        color: dodgerblue;
        font-size: 1.4rem;
        padding-top: -5px;
    }

    .paginate{
        box-shadow: 0 0 5px 1px skyblue;
    }

</style>


<?php include 'layouts/footer.php'; ?>

<!-- end of content div -->



<script>

    var errorspan = document.getElementById("errorspan");
    var error = document.getElementById("error");
    var infospan = document.getElementById("infospan");
    var info1 = document.getElementById("info");

    errorspan.onclick = function() {
        error.style.display = "none";
    };
    infospan.onclick = function() {
        info1.style.display = "none";
    };

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("sellerBtn");

    // Get the <span> element that closes the modal
    var spanmodal = document.getElementsByClassName("close")[2];

    // When the user clicks on the button, open the modal
//    btn.onclick = function() {
//        //modal.style.display = "block";
//    };

    // When the user clicks on <span> (x), close the modal
    spanmodal.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    function setSeller(id, name, year, mobile, email, rating) {
        sellerid = id;
        sellername = name;
        selleryear = year;
        sellermobile = mobile;
        selleremail = email;
        sellerrating = rating;

        $.ajax({
            type: 'get',
            url: '<?php echo BASE_URL;?>?seller=true',
            data: {
                'sellerid': id
            },
            success: function (succ) {
                document.getElementById("modalrating").innerHTML = '';
                //info(succ);
                if (succ > 0)
                    for (i=0; i<5; i++){
                        if (succ >= i) {
                            document.getElementById("modalrating").innerHTML += '<span class="fa fa-star schecked fa-2x"></span>';
                        } else if (succ > (i - 1) && succ < i){
                            document.getElementById("modalrating").innerHTML += '<span class="fa fa-star-half-o schecked fa-2x"></span>';
                        } else {
                            document.getElementById("modalrating").innerHTML += '<span class="fa fa-star-o schecked fa-2x"></span>';
                        }
                    }
                else
                    document.getElementById("modalrating").innerHTML = 'Be the first to rate this seller';

                document.getElementById("modalhead").innerHTML = sellername;
                document.getElementById("modalyear").innerHTML = selleryear;
                document.getElementById("modalmobile").innerHTML = sellermobile;
                document.getElementById("modalemail").innerHTML = selleremail;
//                document.getElementById("modalrating").innerHTML = succ;

                modal.style.display = "block";
//                info(succ);
//                $('#mycart').html('MyCart<span class="fa fa-fw fa-shopping-cart"></span>');
            }
        });



//        if (checkEmpty(year))
//            selleryear = null;
//
//        if (checkEmpty(mobile))
//            sellermobile = null;
//
//        if (checkEmpty(email))
//            selleremail = null;

    }

    function errors(error) {
        var errors = document.getElementById("error");
        var errorsmess = document.getElementById("errormess");
        errors.style.display = "block";
        errorsmess.innerHTML = error;
    }

    function info(info) {
//        $('#cartbutton').html('<center><img src="<?php //echo ASSETS . '/images/dolphin.gif'; ?>//"/></center>');
        var infos = document.getElementById("info");
        var infosmess = document.getElementById("infomess");
        infos.style.display = "block";
        infosmess.innerHTML = info;

    }

    function addcart(id) {
        $('#mycart').html('<center><img style="width: 20px;" src="<?php echo ASSETS . '/images/loader.gif'; ?>" /></center>');
        //info("Added to cart");

        $.ajax({
            type: 'get',
            url: '<?php echo VIEW_URL; ?>cart.php?cart=1',
            data: {
                'itemid': id
            },
            success: function (succ) {
                info(succ);
                $('#mycart').html('MyCart<span class="fa fa-fw fa-shopping-cart"></span>');
            }
        });

    }

</script>
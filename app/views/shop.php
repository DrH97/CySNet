<?php
include VIEW_ROOT . 'layouts/navbar.php';

$hardwareitems = $db->query("SELECT * FROM hardware_products");
$sellersdeets = $db->query("SELECT * FROM users");

if (!empty($_GET['search'])) {
    $searchq = $_GET['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

    $query = $db->query("SELECT * FROM hardware_products WHERE productname LIKE '%$searchq%' OR description LIKE '%$searchq%'");
    if(isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        $query = $db->query("SELECT * FROM hardware_products WHERE categoryid = $cat AND productname LIKE '%$searchq%' OR description LIKE '%$searchq%'");
//        ?><!--<p>--><?php //var_dump("SELECT * FROM hardware_products WHERE categoryid = $cat AND  productname LIKE '%$searchq%' OR description LIKE '%$searchq%'"); ?><!--</p>--><?php
    }

    $count = mysqli_num_rows($query);
    if ($count == 0) { ?>
        <script>alert("There were no products found.. try different parameters..")</script>
        <?php
    } else {

        $hardwareitems = $query;
    }
}

function setseller($db, $sid){
    $sellers = mysqli_fetch_assoc($db->query("SELECT * FROM users WHERE id = $sid"));
    //$seller =
    return $sellers/*['firstname'].' '.$sellers['lastname']*/;
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

<div class="error" id="error"><p class="message">Some Error Here!!! sdfnjskdf jksd fs dfkj sdkjf kjsd fkj</p><span class="close" id="errorspan" onclick="alert('Asdad');">&cross;</span></div>
<div class="inform" id="info"><p class="message">Some Info Here...asdasdasdasd asdasd asd ndajk sdja sdj ajksd asjk dakjs d askd akj</p><span class="close" id="infospan" onclick="alert('Asdad');">&cross;</span></div>

<!-- CONTENT -->
<div class="content">

    <?php while($item = mysqli_fetch_assoc($hardwareitems)):
            $sellers = setseller($db,$item['sellerid']);
        ?>
    <!-- hardware items card -->
    <div class="h-card">
        <div class="image">
            <img src="<?php echo BASE_URL . 'public/uploads/hardwareproducts/' . $item['image']; ?>" />
            <h3><?php echo $item['productname']; ?></h3>
        </div>
        <div class="more">
            <p><?php echo $item['description']; ?></p>
            <div class="price-quantity">
                <p style='color:coral;' id='price'>KSH <span style='color:orangered'><b><?php echo $item['price']; ?></b></span></p>
                <p style='color:green;' id='quantity'><b><?php echo $item['quantity']; ?></b> in stock</p>
            </div>
            <div class="bottom">
                <button id="sellerBtn" onclick="setSeller(<?php echo $item['sellerid']; ?>, '<?php echo $sellers['firstname'].' '.$sellers['lastname']; ?>', '<?php echo $sellers['gender']; ?>')">About Seller</button>
                <button id="cart">Add to cart</button>
            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <div class="h-card">
        <div class="image">
            <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            <h3>Name of hardware item</h3>
        </div>
        <div class="more">
            <p>description this is a sample description of this hardware item. description this is a sample description of this hardware item. description this is a sample description of this hardware item.description this is a sample description of this hardware item</p>
            <div class="price-quantity">
                <p style='color:coral;' id='price'>KSH <span style='color:orangered'><b>1200</b></span></p>
                <p style='color:green;' id='quantity'><b>7</b> in stock</p>
            </div>
            <div class="bottom">
                <button id="sellerBtn">About Seller</button>
                <button id="cart">Add to cart</button>
            </div>
        </div>
    </div>

    <div class="h-card">
        <div class="image">
            <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            <h3>Name of hardware item</h3>
        </div>
        <div class="more">
            <p>description this is a sample description of this hardware item. description this is a sample description of this hardware item. description this is a sample description of this hardware item.description this is a sample description of this hardware item</p>
            <div class="price-quantity">
                <p style='color:coral;' id='price'>KSH <span style='color:orangered'><b>1200</b></span></p>
                <p style='color:green;' id='quantity'><b>7</b> in stock</p>
            </div>
            <div class="bottom">
                <button id="sellerBtn">About Seller</button>
                <button id="cart">Add to cart</button>
            </div>
        </div>
    </div>

    <div class="h-card">
        <div class="image">
            <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            <h3>Name of hardware item</h3>
        </div>
        <div class="more">
            <p>description this is a sample description of this hardware item. description this is a sample description of this hardware item. description this is a sample description of this hardware item.description this is a sample description of this hardware item</p>
            <div class="price-quantity">
                <p style='color:coral;' id='price'>KSH <span style='color:orangered'><b>1200</b></span></p>
                <p style='color:green;' id='quantity'><b>7</b> in stock</p>
            </div>
            <div class="bottom">
                <button id="sellerBtn">About Seller</button>
                <button id="cart">Add to cart</button>
            </div>
        </div>
    </div>

    <div class="h-card">
        <div class="image">
            <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            <h3>Name of hardware item</h3>
        </div>
        <div class="more">
            <p>description this is a sample description of this hardware item. description this is a sample description of this hardware item. description this is a sample description of this hardware item.description this is a sample description of this hardware item</p>
            <div class="price-quantity">
                <p style='color:coral;' id='price'>KSH <span style='color:orangered'><b>1200</b></span></p>
                <p style='color:green;' id='quantity'><b>7</b> in stock</p>
            </div>
            <div class="bottom">
                <button id="sellerBtn">About Seller</button>
                <button id="cart">Add to cart</button>
            </div>
        </div>
    </div>

    <div class="h-card">
        <div class="image">
            <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            <h3>Name of hardware item</h3>
        </div>
        <div class="more">
            <p>description this is a sample description of this hardware item. description this is a sample description of this hardware item. description this is a sample description of this hardware item.description this is a sample description of this hardware item</p>
            <div class="price-quantity">
                <p style='color:coral;' id='price'>KSH <span style='color:orangered'><b>1200</b></span></p>
                <p style='color:green;' id='quantity'><b>7</b> in stock</p>
            </div>
            <div class="bottom">
                <button id="sellerBtn">About Seller</button>
                <button id="cart">Add to cart</button>
            </div>
        </div>
    </div>

    <div class="h-card">
        <div class="image">
            <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            <h3>Name of hardware item</h3>
        </div>
        <div class="more">
            <p>description this is a sample description of this hardware item. description this is a sample description of this hardware item. description this is a sample description of this hardware item.description this is a sample description of this hardware item</p>
            <div class="price-quantity">
                <p style='color:coral;' id='price'>KSH <span style='color:orangered'><b>1200</b></span></p>
                <p style='color:green;' id='quantity'><b>7</b> in stock</p>
            </div>
            <div class="bottom">
                <button id="sellerBtn">About Seller</button>
                <button id="cart">Add to cart</button>
            </div>
        </div>
    </div>


    <!-- loop to display hardware items, happens here -->




    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>

            <h3>About Seller</h3>

            <center>
                <div class="person">
                    <img src="<?php echo ASSETS . 'images/defaultprofile.png'?>">
                    <div>
                        <h3 id="modalhead"></h3>
                        <div>
                            <span class="fa fa-star checked fa-2x"></span>
                            <span class="fa fa-star checked fa-2x"></span>
                            <span class="fa fa-star checked fa-2x"></span>
                            <span class="fa fa-star fa-2x"></span>
                            <span class="fa fa-star fa-2x"></span>
                        </div>
                    </div>
                </div>
            </center>

            <table>
                <tr>
                    <td class="info">Gender:</td>
                    <td id="sellergender">Male</td>
                </tr>
                <tr>
                    <td class="info">Institution:</td>
                    <td>Strathmore University</td>
                </tr>
                <tr>
                    <td class="info">Course:</td>
                    <td>Bachelors in Informatics and Computer Science</td>
                </tr>
                <tr>
                    <td class="info">Year:</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td class="info">Admission number:</td>
                    <td>095242</td>
                </tr>


            </table>

        </div>

    </div>

    <!-- end of modal div -->

</div>

<?php include 'layouts/footer.php'; ?>

<!-- end of content div -->



<script>

    var errorspan = document.getElementById("errorspan");
    var error = document.getElementById("error");
    var infospan = document.getElementById("infospan");
    var info = document.getElementById("info");

    error.onclick = function() {
        error.style.display = "none";
    };
    info.onclick = function() {
        info.style.display = "none";
    };

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("sellerBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
//    btn.onclick = function() {
//        //modal.style.display = "block";
//    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

    function setSeller(id, name, gender) {
        sellerid = id;
        sellername = name;
        sellergender = gender;
        document.getElementById("modalhead").innerHTML = sellername;
        document.getElementById("sellergender").innerHTML = sellergender;
        modal.style.display = "block";
    }

    function getSeller() {
        return sellerid;
    }
</script>


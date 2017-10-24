<?php
include VIEW_ROOT . 'layouts/navbar.php';
?>

<!-- DESCRIPTION -->
<div class="description">
    <center>
        <div>
            <form method="get" action="<?php echo BASE_URL . 'index.php'; ?>">
                <input name="search" type="search" placeholder="Hey there, What are you looking for?">
                <select name="cat">
                    <option selected disabled="disabled">Category</option>
                    <option value="Cables">Cables</option>
                    <option value="Hard drive">Hard drive</option>
                    <option value="Flash drive">Flash drive</option>
                    <option value="Memory card">Memory card</option>
                    <option value="sth else">sth else</option>
                </select>
                <input type="submit" value="FIND">
            </form>
        </div>
    </center>
</div>

<!-- CONTENT -->
<div class="content">


    <!-- hardware items card -->
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
                        <h3>Name of seller</h3>
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
                    <td>Male</td>
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

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("sellerBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    };

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
</script>


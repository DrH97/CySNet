<?php
include_once '../start.php';
include VIEW_ROOT . '/layouts/navbar.php'; ?>

<!-- DESCRIPTION -->
<div class="description">
    <center>
        <div>
            <h3>You have no items on your cart</h3>
            <a href="<?php echo BASE_URL; ?>"><button>GET STARTED</button></a>
        </div>
    </center>
</div>

<!-- CONTENT -->
<div class="content">

    <form method="post" action="">
        <table>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Seller</th>
                <th>Time Purchased</th>
                <th>Remove?</th>
            </tr>
            <tr>
                <td>1</td>
                <td>sth here</td>
                <td>sth else</td>
                <td>sth sth</td>
                <td>more sth</td>
                <td>another sth</td>
                <td><input type="checkbox" value="###"></td>
            </tr>


        </table>

        <input type="submit" value="PURCHASE ITEM(S)">

    </form>

</div>

<!-- end of content div -->

<?php include 'layouts/footer.php'; ?>
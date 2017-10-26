<?php
/**
 * Created by PhpStorm.
 * User: josen
 * Date: 25-Oct-17
 * Time: 2:12 AM
 */
include_once '../start.php';
include VIEW_ROOT . 'layouts/navbar.php';
?>

<style>
    .content{
        padding-top: 70px;
        width: 80%;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: auto;
        grid-gap: 1.8em;
    }

    .h-card {
        dbackground-color: white;
        dwidth: 25%;
        min-width: 100%;
        max-width: 100%;
        sfloat: left;
        height: auto;
        sdisplay: block;
        box-shadow: 0px 0px 10px gray;
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
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media screen and (max-width: 450px){
        .content{
            width: 90%;
            grid-template-columns: 1fr;
        }
    }

</style>
<div class="content">

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

</div>


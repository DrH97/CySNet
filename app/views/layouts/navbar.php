<?php require 'appheader.php';
session_start();
include APP_ROOT . '/paginator.php';
?>
<!-- TOP NAVIGATION BAR -->
    <header style="ospacity: 0">

        <a href="?It'sTechCrowdYooo" id="title">TechCrowd</a>
        <div id="links">
            <a class="tablinks" href=" <?php echo BASE_URL; ?> " id="defaultOpen">Shop</a>
            <a id="repairs" class="tablinks" href="<?php echo VIEW_URL . 'repairs.php'; ?>" >Repairs</a>
            <a id="mycart" class="tablinks" href="<?php echo VIEW_URL . 'mycart.php' ?>">MyCart</a>
        </div>
        <div class="account" id="account">
            <!-- Authentication Links -->
        <?php if(!isset($_SESSION['user'][0])) { ?>
            <a href="<?php echo BASE_URL . 'auth/login.php'?>" style="padding: 10px; margin-top: -10px; text-decoration: none;"><p>LOGIN</p></a>
        <?php } else { ?>

            <a id="account-sign" style="height: 100%; margin-top: -8px; padding-top: 5px; text-decoration: none; display: inline-flex;">
                <p><?php echo $_SESSION['user'][2]; ?></p>
                <img src="<?php echo ASSETS . 'images/defaultprofile.png'; ?>"/>
                <div class="pointer" style="width: 25px; height: 25px; position: fixed; top: 20px; right: 5px;"></div>
            </a>
        <?php } ?>

        </div>

    </header>
<style>
    .pointer:after{
        content: '';
        /*width: 0;*/
        /*height: 0;*/
        border-bottom: 5px solid transparent;
        border-top: 5px solid black;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        position: absolute;
        right: 5px;
        top: 10px;
    }

    header.sticky .account .pointer:after{
        top: 0px;
    }

    .account-drop {
        display: none;
        width: 125px;
        position: fixed;
        top: 40px;
        right: 0;
        background-color: white;
        border-bottom-left-radius: 10px;
        box-shadow: 0 1px 5px skyblue;
        z-index: 3;
        text-align: center;
        opacity: .7;
    }

    .account-drop:hover{
        opacity: .9;
    }

    .account-drop a div{
        padding: 10px 0;

    }

    a{
        text-decoration: none;
        color: black;
    }

    .account-drop a div:hover {
        color: skyblue;
    }

    /*.account:hover .account-drop{*/
        /*display: block;*/
    /*}*/
</style>

<div id="account-drop" class="account-drop">
    <a href="<?php echo VIEW_URL . 'user_account.php'?>">
        <div>
            My account
        </div>
    </a>
    <a href="<?php echo BASE_URL . 'auth/auth.php?logout=true' ?>">
        <div>
            Logout
        </div>
    </a>
</div>



<!-- MINIFIED NAVIGATION BAR -->
<div class="minNav" id="min-nav">
    <a href="?It'sTechCrowdYooo" id="min-title">TechCrowd</a>
    <a href=" <?php echo BASE_URL; ?> " style="color: black;background-color: skyblue;">Shop</a>
    <a href="<?php echo VIEW_URL . 'repairs.php'; ?>">Repairs</a>
    <a href="<?php echo VIEW_URL . 'mycart.php' ?>">MyCart</a>
     <?php if(!isset($_SESSION['user'][0])) { ?>
        <a href="<?php echo BASE_URL . 'auth/login.php'?>"><p>LOGIN / SIGNUP</p></a>
    <?php } else { ?>
        <a href="<?php echo VIEW_URL . 'user_account.php'?>">
            <div>
                My account
            </div>
        </a>
        <a href="<?php echo BASE_URL . 'auth/auth.php?logout=true' ?>">
            <div>
                Logout
            </div>
        </a>
     <?php } ?>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navToggleFunction()">&#9776;</a>
</div>

<script>

    $(document).on('scroll', function () {
        if ($(this).scrollTop() > 20 && $(this).width() > 780){
            $('header').addClass('sticky');
            $('.search').addClass('sticky');
//            $('.description').addClass('sticky');
        } else {
            $('header').removeClass('sticky');
            $('.search').removeClass('sticky');
//            $('.description').removeClass('sticky');
        }
    });

    var dropdown = document.getElementById('account-sign');
    var accdrop = document.getElementById('account-drop');

    dropdown.onmouseover = function(){
        accdrop.style.display = 'block';

        accdrop.onmouseover = function(){
            accdrop.style.display = 'block';
        };

        accdrop.onmouseout = function(){
            accdrop.style.display = 'none';
        };
    };

    dropdown.onmouseout = function(){
        accdrop.style.display = 'none';
    };


//    function displayDrop() {
//        var drop = document.getElementById('account-drop');
//
//        if (drop.style.display = 'none')
//            drop.style.display = 'block';
//        else if(drop.style.display = 'block')
//            drop.style.display = 'none';
//    }

//    window.onclick = function(event) {
//        if (event.target !== document.getElementById("account-drop")) {
//            document.getElementById("account-drop").style.display = "none";
//        }
//    };

    //make navigation bar responsive
    function navToggleFunction() {
        var x = document.getElementById("min-nav");
        if (x.className === "minNav") {
            x.className += " responsive";
        } else {
            x.className = "minNav";
        }
    }

</script>
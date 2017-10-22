<?php require 'appheader.php';
session_start();
?>
<!-- TOP NAVIGATION BAR -->
    <header>

        <a href="?It'sTechCrowdYooo" id="title">TechCrowd</a>
        <div id="links">
            <a class="tablinks" href=" <?php echo BASE_URL; ?> " id="defaultOpen">Shop</a>
            <a id="repairs" class="tablinks" href="<?php echo VIEW_URL . 'repairs.php'; ?>" >Repairs</a>
            <a id="mycart" class="tablinks" href="<?php echo VIEW_URL . 'mycart.php' ?>">MyCart</a>
        </div>
        <div class="account">
            <!-- Authentication Links -->
        <?php if(!isset($_SESSION['user'][0])) { ?>
            <a href="<?php echo BASE_URL . 'auth/login.php'?>" style="padding: 10px; margin-top: -10px; text-decoration: none;"><p>LOGIN</p></a>
        <?php } else { ?>

            <a href="<?php echo VIEW_URL . 'user_account.php'?>" style="height: 100%; margin-top: -8px; padding-top: 5px; text-decoration: none; display: inline-flex;">
                <p><?php echo $_SESSION['user'][2]; ?></p>
                <img src="<?php echo ASSETS . 'images/defaultprofile.png'; ?>"/>
            </a>
        <?php } ?>
        </div>

    </header>

<!-- MINIFIED NAVIGATION BAR -->
<div class="minNav" id="min-nav">
    <a href="?It'sTechCrowdYooo" id="min-title">TechCrowd</a>
    <a href=" <?php echo BASE_URL; ?> " style="color: black;background-color: skyblue;">Shop</a>
    <a href="<?php echo VIEW_URL . 'repairs.php'; ?>">Repairs</a>
    <a href="<?php echo VIEW_URL . 'mycart.php' ?>">MyCart</a>
     <?php if(!isset($_SESSION['user'][0])) { ?>
        <a href="<?php echo BASE_URL . 'auth/login.php'?>"><p>LOGIN</p></a>
    <?php } else { ?>
        <a href="<?php echo VIEW_URL . 'user_account.php'?>">
            <p><?php echo $_SESSION['user'][2]; ?></p>
        </a>
    <?php } ?>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navToggleFunction()">&#9776;</a>
</div>

<script>

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
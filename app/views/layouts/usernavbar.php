<?php require 'appheader.php';
session_start();

if (!isset($_SESSION['user']))
    header("LOCATION: " . BASE_URL . 'auth/login.php');

$id = $_SESSION['user']['3'];
$userq = $db->query("SELECT * FROM users WHERE id = '$id'");

$userdeets = $userq->fetch_assoc();
?>

<style>
    header {
        background: rgba(255, 255, 255, 0.8);
    }

</style>

<!-- TOP NAVIGATION BAR -->
<header>

    <a href="<?php echo BASE_URL; ?>" id="title">TechCrowd <span id="subtitle">ACCOUNT</span></a>
    <div id="links">
        <a href="user_account.php">Profile</a>
        <a href="user_account_update.php">Update</a>
        <a href="<?php echo BASE_URL . 'auth/auth.php?logout=true' ?>" id="logout">Log out</a>
    </div>
    <div class="account">
        <h3 style="padding: 0 20px;"><?php echo $_SESSION['user'][1] . ' ' . $_SESSION['user'][2]; ?></h3>
        <?php if ($userdeets['image'] !== null) : ?>
            <img src="<?php echo BASE_URL . 'public/uploads/' . $userdeets['image']; ?>" />
        <?php else : ?>
            <img src="<?php echo ASSETS . 'images/defaultprofile.png'; ?>" />
        <?php endif; ?>
    </div>

</header>

<!-- MINIFIED NAVIGATION BAR -->
<div class="minNav" id="min-nav">
    <a href="/" id="min-title">TechCrowd</a>
    <a href="user_account.php">Profile</a>
    <a href="user_account_update.php">Update</a>
    <a href="<?php echo BASE_URL . 'auth/auth.php?logout=true' ?>" id="logout">Log out</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navToggleFunction()">&#9776;</a>
</div>

<!-- PROFILE BOX -->
<div class="profile-box">
<!--    <center>-->
<!--        <div>-->
<!--            --><?php //if ($userdeets['image'] !== null) : ?>
<!--                <img src="--><?php //echo BASE_URL . 'public/uploads/' . $userdeets['image']; ?><!--" />-->
<!--            --><?php //else : ?>
<!--                <img src="--><?php //echo ASSETS . 'images/defaultprofile.png'; ?><!--" />-->
<!--            --><?php //endif; ?>
<!--            <h3>--><?php //echo $_SESSION['user'][1] . $_SESSION['user'][2]; ?><!--</h3>-->
<!---->
<!--        </div>-->
<!--    </center>-->
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
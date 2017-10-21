<?php require 'appheader.php';
session_start();
?>
<!-- TOP NAVIGATION BAR -->
    <header>

        <a href="/?It'sTechCrowdYooo" id="title">TechCrowd</a>
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
                <img src="<?php echo ASSETS . 'images/defaultprofile.png'?>"/>
            </a>
        <?php } ?>
        </div>

    </header>

    <!-- DESCRIPTION -->
<!--    <div class="description">-->
<!--        <center>-->
<!--            <div>-->
<!---->
<!--                -->
<!--            </div>-->
<!--        </center>-->
<!--    </div>-->

<!--<script>-->
<!--        function openTabsnav(evt, tabName) {-->
<!--            // Declare all variables-->
<!--            var i, tablinks;-->
<!---->
<!--             //Get all elements with class="tabcontent" and hide them-->
<!--//            tabcontent = document.getElementsByClassName("tabcontent");-->
<!--//            for (i = 0; i < tabcontent.length; i++) {-->
<!--//                tabcontent[i].style.backgroundColor = "";-->
<!--//                tabcontent[i].style.color = "";-->
<!--//            }-->
<!---->
<!--            // Get all elements with class="tablinks" and remove the class "active"-->
<!--            tablinks = document.getElementsByClassName("tablinks");-->
<!--            for (i = 0; i < tablinks.length; i++) {-->
<!--                tablinks[i].className = tablinks[i].className.replace(" active", "");-->
<!--            }-->
<!---->
<!--            // Show the current tab, and add an "active" class to the button that opened the tab-->
<!--            document.getElementById(tabName).style.display = "block";-->
<!--            document.getElementById(tabName).style.color = "black";-->
<!--            document.getElementById(tabName).style.backgroundColor = "skyblue";-->
<!--            evt.currentTarget.className += " active";-->
<!--        }-->
<!---->
<!--        // Get the element with id="defaultOpen" and click on it-->
<!--        document.getElementById('defaultOpen').click();-->
<!--    </script>-->
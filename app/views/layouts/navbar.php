<?php require 'appheader.php'; ?>

<!-- TOP NAVIGATION BAR -->
    <header>

        <a href="#It'sTechCrowdYooo" id="title">TechCrowd</a>
        <div id="links">
            <a class="tablinks active" href=" <?php echo BASE_URL; ?> " onclick="openTabsnav(event, 'shop')"  id="defaultOpen">Shop</a>
            <a id="repairs" class="tablinks" href="<?php echo VIEW_URL . 'repairs.php'; ?>" onclick="openTabsnav(event, 'repairs')">Repairs</a>
            <a id="mycart" class="tablinks" href="<?php echo VIEW_URL . 'mycart.php' ?>" onclick="openTabsnav(event, 'mycart')">MyCart</a>
        </div>
        <div class="account">
            <!-- Authentication Links -->

            <a href="<?php echo BASE_URL . 'auth/login.php'?>" style="text-decoration: none;"><p>LOGIN</p></a>

            <a href="profile/?user=1" style="text-decoration: none; display: inline-flex;"<!-- onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit(); " -->
                <form id="logout-form" action="<?php echo BASE_URL . 'auth/logout.php'?>" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form><p>logout</p>

                <img src="<?php echo ASSETS . 'images/defaultprofile.png'?>" />
            </a>

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

<script>
        function openTabsnav(evt, tabName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
//            tabcontent = document.getElementsByClassName("tabcontent");
//            for (i = 0; i < tabcontent.length; i++) {
//                tabcontent[i].style.background-color = "";
//                tabcontent[i].style.color = "";
//            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            document.getElementById(tabName).style.color = "black";
            document.getElementById(tabName).style.background = "skyblue";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
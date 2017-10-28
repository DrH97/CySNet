<?php
include_once '../app/start.php';
include VIEW_ROOT . 'layouts/appheader.php';

session_start();

if (!isset($_SESSION['admin']))
    header("LOCATION: " . BASE_URL . 'auth/adminlogin.php');

$adminq = $db->query("SELECT * FROM admins");

$admindeets = $adminq->fetch_assoc();
?>

    <style>
        header {
            background: rgba(255, 255, 255, 0.8);
        }

        table {
            padding-top: 0em;
            width: 100%;
            height: auto;
            text-align: center;
        }

    </style>


    <body>

    <!-- TOP NAVIGATION BAR -->
    <header>

        <a href="<?php echo BASE_URL; ?>" id="title">TechCrowd <span id="subtitle">ADMIN</span></a>
        <div id="links">
            <a href="admin.php">Verify</a>
            <a href="adminsettings.php" >Settings</a>
            <a href="<?php echo BASE_URL . 'auth/auth.php?logout=true' ?>" id="logout">Log out</a>
        </div>
        <div class="account">
            <p><?php echo $admindeets['firstname'] . ' ' . $admindeets['lastname']; ?></p>
            <img src="<?php echo ASSETS . 'images/favicon.ico'; ?>"/>
        </div>

    </header>

    <!-- MINIFIED NAVIGATION BAR -->
    <div class="minNav" id="min-nav">
        <a href="<?php echo BASE_URL; ?>" id="min-title">TechCrowd</a>
        <a href="admin.php">Verify</a>
        <a href="adminsettings.php">Settings</a>
        <a href="<?php echo BASE_URL . 'auth/auth.php?logout=true'; ?>" id="logout">Log out</a>
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navToggleFunction()">&#9776;</a>
    </div>


    <!-- PROFILE BOX -->
    <div class="profile-box" style="width: 0;">
        <!--        <center>-->
        <!--            <div>-->
        <!--<!--                <img src="{!! asset('images/defaultprofile.png') !!}" />-->
        <!--<!--                <h3>John Doe</h3>-->
        <!--            </div>-->
        <!--        </center>-->
    </div>


    <script>

        function navToggleFunction() {
            var x = document.getElementById("min-nav");
            if (x.className === "minNav") {
                x.className += " responsive";
            } else {
                x.className = "minNav";
            }
        }

        function openTabs(evt, tabName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
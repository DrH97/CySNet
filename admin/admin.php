<?php
include_once '../app/start.php';
if (null !== ($_SESSION['admin'][0])) { ?>

    <script src="<?php echo '../assets/js/fusioncharts.js'; ?>"></script>
    <script src="<?php echo '../assets/js/fusioncharts.charts.js'; ?>"></script>
    <script src="<?php echo '../assets/js/fusioncharts.theme.ocean.js'; ?>"></script>
    <script src="<?php echo '../assets/js/fusioncharts.theme.fint.js'; ?>"></script>
    <script src="<?php echo '../assets/js/fusioncharts.theme.carbon.js'; ?>"></script>


    <?php

    require_once VIEW_ROOT . 'layouts/appheader.php';
    include("fusioncharts.php");

    $totalUsers = 0;

    $adminq = $db->query("SELECT * FROM admins");

    $admindeets = $adminq->fetch_assoc();

    $users = $db->query("SELECT EXTRACT(YEAR FROM created_at) AS year, EXTRACT(MONTH FROM created_at) AS month, COUNT(id) AS registeredUsers FROM users GROUP BY MONTH(created_at)");

    foreach ($users as $userrs)
        $totalUsers += $userrs['registeredUsers'];

    $arrayData = array(
        "chart" => array(
            "caption" => "Number of users Registered Per Month",
            "subaCaption" => "Months",
            "captionFontSize" => "24",
            "refreshinterval" => "5",
            "xAxisName" => "Month",
            "yAxisName" => "Users",
            "paletteColors" => "#A2A5FC, #41CBE3, #EEDA54, #BB423F, #F35685",
            "showValues" => "1",
            "theme" => 'carbon',
            "canvasBgColor" => '#FFFFFF,#FFFFFF',
            "baseFont" => "Roboto",
        )
    );

    $arrayData["data"] = array();

    while ($usersRow = mysqli_fetch_array($users)) {
        array_push($arrayData["data"], array(
                "label" => $usersRow['month'] . ' ' . $usersRow['year'],
                "value" => $usersRow["registeredUsers"]
            )
        );
    }

    $encodedData = json_encode($arrayData);

    //var_dump($encodedData);

    $chart = new FusionCharts("doughnut3D", "Users", 600, 400, "user-chart", "json", "$encodedData");
    $chart->render();


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

        <a href="#" id="title">TechCrowd <span id="subtitle">ADMIN</span></a>
        <div id="links">
            <a href="#" style="color: black;background-color: skyblue;">Verify</a>
            <a href="<?php echo BASE_URL . 'auth/auth.php?logout=true' ?>" id="logout">Log out</a>
        </div>
        <div class="account">
            <p><?php echo $admindeets['firstname'] . ' ' . $admindeets['lastname']; ?></p>
            <img src="<?php echo ASSETS . 'images/favicon.ico'; ?>"/>
        </div>

    </header>

    <!-- PROFILE BOX -->
    <div class="profile-box" style="width: 0;">
        <!--        <center>-->
        <!--            <div>-->
        <!--<!--                <img src="{!! asset('images/defaultprofile.png') !!}" />-->
        <!--<!--                <h3>John Doe</h3>-->
        <!--            </div>-->
        <!--        </center>-->
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="tab">
            <button class="tablinks" onclick="openTabs(event, 'dashboard')" id="defaultOpen">DASHBOARD</button>
            <button class="tablinks" onclick="openTabs(event, 'sellers')">SELLERS</button>
            <button class="tablinks" onclick="openTabs(event, 'repairers')">REPAIRERS</button>
        </div>

        <div id="dashboard" class="tabcontent">

            <table>
                <tr>
                    <th>Accounts created</th>
                    <th>Sellers</th>
                    <th>Items posted</th>
                    <th>Items sold</th>
                    <th>Repairers</th>
                    <th>Active repairers</th>
                    <th>Inactive repairers</th>
                </tr>
                <tr>
                    <td><?php echo $totalUsers; ?></td>
                    <td>43</td>
                    <td>421</td>
                    <td>378</td>
                    <td>14</td>
                    <td>8</td>
                    <td>5</td>
                </tr>


            </table>

        </div>

        <div id="sellers" class="tabcontent">

            <center>
                <div>
                    <img src="<?php echo ASSETS . 'images/defaultprofile.png'; ?>"/>
                    <p>John a guy with long-ass name</p>
                    <button id="view">View Profile</button>
                    <button id="accept">Accept</button>
                    <button id="deny">Deny</button>
                </div>
            </center>

        </div>

        <div id="repairers" class="tabcontent">

            <center>
                <div>
                    <img src="<?php echo ASSETS . 'images/defaultprofile.png'; ?>"/>
                    <p>John Doe</p>
                    <button id="view">View Profile</button>
                    <button id="accept">Accept</button>
                    <button id="deny">Deny</button>
                </div>
            </center>

        </div>

        <div id="user-chart"></div>


    </div>


    <script>
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

    </body>

    <?php include_once VIEW_ROOT . 'layouts/footer.php';

} else {
    header("LOCATION: " . BASE_URL . 'auth/adminlogin.php');
}
?>
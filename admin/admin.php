<?php
include 'adminnavbar.php';
//
//if (!isset($_SESSION['admin'])) {
//    header("LOCATION: " . BASE_URL . 'auth/adminlogin.php');
//
//} else {

    ?>

    <script src="<?php echo '../assets/js/fusioncharts.js'; ?>"></script>
    <script src="<?php echo '../assets/js/fusioncharts.charts.js'; ?>"></script>
    <script src="<?php echo '../assets/js/fusioncharts.theme.ocean.js'; ?>"></script>
    <script src="<?php echo '../assets/js/fusioncharts.theme.fint.js'; ?>"></script>
    <script src="<?php echo '../assets/js/fusioncharts.theme.carbon.js'; ?>"></script>


    <?php

    require_once VIEW_ROOT . 'layouts/appheader.php';
    include("fusioncharts.php");

    $totalUsers = 0;
    $totalitems = 0;

//    version 1
//    $usersAnalytics = $db->query("SELECT EXTRACT(YEAR FROM created_at) AS year,
//                        EXTRACT(MONTH FROM created_at) AS month, COUNT(id) AS registeredUsers
//                        FROM users GROUP BY MONTH(created_at)");

//    version 2
    $usersAnalytics = $db->query("SELECT EXTRACT(YEAR FROM created_at) AS year,
                        MONTHNAME(created_at) AS month, COUNT(id) AS registeredUsers
                        FROM users GROUP BY MONTH(created_at)");

    $productAnalytics = $db->query("SELECT EXTRACT(YEAR FROM created_at) AS year, 
                        MONTHNAME(created_at) AS month,
                        EXTRACT(DAY FROM created_at) AS day, COUNT(id) AS uploadedproducts
                        FROM hardware_products GROUP BY DAY(created_at) LIMIT 7");

    //var_dump($usersAnalytics->fetch_assoc());

    $arrayData = $arrayData2 = array(
        "chart" => array(
            "caption" => "Number of Users Registered per Month",
            "subaCaption" => "Months",
            "captionFontSize" => "18",
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

    $arrayData2 = array(
        "chart" => array(
            "caption" => "Number of Products Uploaded Per Day",
            "xAxisName" => "Day",
            "yAxisName" => "Products",
        )
    );

    $arrayData["data"] = $arrayData2['data'] = array();


    while ($usersRow = mysqli_fetch_array($usersAnalytics)) {
        //var_dump($usersRow);
        array_push($arrayData["data"], array(
                "label" => $usersRow['month'],
                "value" => $usersRow["registeredUsers"]
            )
        );
    }

    while ($productsRow = mysqli_fetch_array($productAnalytics)) {
        //var_dump($productsRow);
        array_push($arrayData2["data"], array(
                "label" => $productsRow['day'],
                "value" => $productsRow["uploadedproducts"]
            )
        );
    }

    $encodedData = json_encode($arrayData);
    $encodedData2 = json_encode($arrayData2);
    //var_dump($encodedData);

    $chart = new FusionCharts("column3D", "Users", 400, 300, "user-chart", "json", "$encodedData");
    $chart->render();
    $chart2 = new FusionCharts("line", "Products", 400, 300, "products-chart", "json", "$encodedData2");
    $chart2->render();

    foreach ($usersAnalytics as $userrs)
        $totalUsers += $userrs['registeredUsers'];
    foreach ($productAnalytics as $prods)
        $totalitems += $prods['uploadedproducts'];

    ?>

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
                    <td><?php echo $totalitems; ?></td>
                    <td>378</td>
                    <td>14</td>
                    <td>8</td>
                    <td>5</td>
                </tr>


            </table>

            <caenter style="float: left;"><div id="user-chart"></div></caenter>
            <caenter><div id="products-chart"></div></caenter>

        </div>

        <div id="sellers" class="tabcontent">

            <center>
                <div class='view'>
                    <img src="<?php echo ASSETS . 'images/defaultprofile.png'; ?>"/>
                    <p>John a guy with long-ass name</p>
                    <button id="view">View Profile</button>
                    <button id="accept" style="background-color: rgba(20,150,120,.7); color: #fff;">Accept</button>
                    <button id="deny" style="background-color: rgba(120,50,20,.7); color: #fff;">Deny</button>
                </div>
            </center>

        </div>

        <div id="repairers" class="tabcontent">

            <center>
                <div class='view'>
                    <img src="<?php echo ASSETS . 'images/defaultprofile.png'; ?>"/>
                    <p>John Doe</p>
                    <button id="view">View Profile</button>
                    <button id="accept" style="background-color: rgba(20,150,120,.7); color: #fff;">Accept</button>
                    <button id="deny" style="background-color: rgba(120,50,20,.7); color: #fff;">Deny</button>
                </div>
            </center>

        </div>


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

    </body>

    <?php include_once VIEW_ROOT . 'layouts/footer.php';

//}
?>
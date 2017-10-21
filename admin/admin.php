<?php
    include_once '../app/start.php';
    require_once VIEW_ROOT . 'layouts/appheader.php';

    $adminq = $db->query("SELECT * FROM admins");

    $admindeets = $adminq->fetch_assoc();

?>

    <style>
        header {
            background: rgba(255, 255, 255, 0.8);
        }
        
        table{
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
            <a href="#" id="logout">Log out</a>
        </div>
        <div class="account">
            <p><?php echo $admindeets['firstname'] . ' ' . $admindeets['lastname']; ?></p>
            <img src="<?php echo ASSETS . 'images/favicon.ico'; ?>" />
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

        <!--chart dashboard start-->
        <div id="chart-dashboard">
            <div class="row">
                <div class="col s12 m8 l8">
                    <div class="card">
                        <div class="card-move-up waves-effect waves-block waves-light">
                            <div class="move-up cyan darken-1">
                                <div>
                                    <span class="chart-title white-text">Revenue</span>
                                    <div class="chart-revenue cyan darken-2 white-text">
                                        <p class="chart-revenue-total">$500.85</p>
                                        <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
                                    </div>
                                    <div class="switch chart-revenue-switch right">
                                        <label class="cyan-text text-lighten-5">
                                            Month
                                            <input type="checkbox">
                                            <span class="lever"></span> Year
                                        </label>
                                    </div>
                                </div>
                                <div class="trending-line-chart-wrapper">
                                    <canvas id="trending-line-chart" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                            <div class="col s12 m3 l3">
                                <div id="doughnut-chart-wrapper">
                                    <canvas id="doughnut-chart" height="200"></canvas>
                                    <div class="doughnut-chart-status">4500
                                        <p class="ultra-small center-align">Sold</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m2 l2">
                                <ul class="doughnut-chart-legend">
                                    <li class="Repairers ultra-small"><span class="legend-color"></span>Repairers</li>
                                    <li class="Customers ultra-small"><span class="legend-color"></span>Customers</li>
                                    <li class="Sellers ultra-small"><span class="legend-color"></span>Sellers</li>
                                </ul>
                            </div>
                            <div class="col s12 m5 l6">
                                <div class="trending-bar-chart-wrapper">
                                    <canvas id="trending-bar-chart" height="90"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Revenue by Month <i class="mdi-navigation-close right"></i></span>
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="month">Month</th>
                                    <th data-field="item-sold">Item Sold</th>
                                    <th data-field="item-price">Item Price</th>
                                    <th data-field="total-profit">Total Profit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>January</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>February</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>March</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>April</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>May</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>June</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>July</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>August</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Septmber</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Octomber</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>November</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>December</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

                <div class="col s12 m4 l4">
                    <div class="card">
                        <div class="card-move-up teal waves-effect waves-block waves-light">
                            <div class="move-up">
                                <p class="margin white-text">Browser Stats</p>
                                <canvas id="trending-radar-chart" height="114"></canvas>
                            </div>
                        </div>
                        <div class="card-content  teal darken-2">
                            <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                            <div class="line-chart-wrapper">
                                <p class="margin white-text">Revenue by product</p>
                                <canvas id="line-chart" height="114"></canvas>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Revenue by product <i class="mdi-navigation-close right"></i></span>
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <th data-field="country-name">Country Name</th>
                                    <th data-field="item-sold">Item Sold</th>
                                    <th data-field="total-profit">Total Profit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>USA</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>UK</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Canada</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Brazil</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>

                                    <td>India</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>France</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Austrelia</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Russia</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--chart dashboard end-->

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
                    <td>123</td>
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
                    <img src="{{ asset('images/defaultprofile.png') }}" />
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
                    <img src="assets/images/default-profile.png" />
                    <p>John Doe</p>
                    <button id="view">View Profile</button>
                    <button id="accept">Accept</button>
                    <button id="deny">Deny</button>
                </div>
            </center>

        </div>






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

    <!-- chartist -->
    <script type="text/javascript" src="<?php echo ASSETS . 'js/chartist-js/chartist.min.js'; ?>"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="<?php echo ASSETS . 'js/chartjs/chart.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo ASSETS . 'js/chartjs/chart-script.js' ?>"></script>

</body>

<?php include_once VIEW_ROOT . 'layouts/footer.php'; ?>
<?php

    include 'adminnavbar.php';

    require_once VIEW_ROOT . 'layouts/appheader.php';

    include 'report.php';
    
    ?>

<div class="error" id="error" style="display: none;"><p class="message" id="errormess">Some Error Here!!! sdfnjskdf jksd fs dfkj sdkjf kjsd fkj</p><span class="close" id="errorspan" onclick="alert('Asdad');">&cross;</span></div>
<div class="inform" id="info" style="display: none;"><p class="message" id="infomess">Some Info Here...asdasdasdasd asdasd asd ndajk sdja sdj ajksd asjk dakjs d askd akj</p><span class="close" id="infospan" onclick="alert('Asdad');">&cross;</span></div>

    <!-- CONTENT -->
    <div class="content">

        <div class="tab">
            <button class="tablinks" onclick="openTabs(event, 'dashboard')" id="defaultOpen">DASHBOARD</button>
            <button class="tablinks" onclick="openTabs(event, 'sellers')">SELLERS</button>
            <button class="tablinks" onclick="openTabs(event, 'repairers')">REPAIRERS</button>
        </div>

        <div id="dashboard" class="tabcontent">

            <center>
                <h3>Summary Report</h3>
            </center>

            <table>
                <tr>
                    <th>Accounts created</th>
                    <th>Sellers</th>
                    <th>Products posted</th>
                    <th>Products sold</th>
                    <th>Repairers</th>
                    <th>Active repairers</th>
                    <th>Inactive repairers</th>
                </tr>
                <tr>
                    <td><b><?php echo $numUserAccounts; ?></b></td>
                    <td>
                        <?php echo $numStudentSellers; ?>
                    </td>
                    <td>
                        <?php echo $numProductsPosted; ?>
                    </td>
                    <td>12</td>
                    <td>
                        <?php echo $numStudentRepairers; ?>
                    </td>
                    <td>
                        <?php echo $numActiveStudentRepairers; ?>
                    </td>
                    <td>
                        <?php echo $numInactiveStudentRepairers; ?>
                    </td>
                </tr>


            </table>

            <br>
            <center>
                <h3>Overview</h3>
            </center>

            <center><canvas id="oChart" width="50" height="15" class="graph"></canvas></center>

            <br>
            <center>
                <h3>Sellers</h3>
            </center>

            <center><canvas id="sChart" width="50" height="15" class="graph"></canvas></center>

            <br>
            <center>
                <h3>Repairers</h3>
            </center>

            <center><canvas id="rChart" width="50" height="15" class="graph"></canvas></center>

        </div>

        <div id="sellers" class="tabcontent">

            <?php
            
                $sql = "SELECT * FROM users WHERE seller='0'";
                
                $result = $db->query($sql);

                        if($result != null){

                            if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_array($result)){ ?>
            
                                    <?php $sellerName = $row['firstname'] . " " . $row['lastname'] ?>

                <form method='get' action='admin.php'>
                    <center>
                        <div class='view'>
                            <img src='<?php echo ASSETS . ' images/defaultprofile.png '; ?>'/>
                            <p>
                                <?php echo $sellerName; ?>
                            </p>
                            <button id='view'>View Profile</button>
                            <button id='accept' name='sellerAccept' value='<?php echo $row['id']; ?>' style='background-color: rgba(20,150,120,.7); color: #fff;'>Accept</button>
                            <button id='deny' name='sellerDeny' value='<?php echo $row['id']; ?>' style='background-color: rgba(120,50,20,.7); color: #fff;'>Deny</button>
                        </div>
                    </center>
                </form>

                <?php }

                                // Free result set
                                mysqli_free_result($result);

                            } else{
                                echo "<center><h4 style='width: 70%;'>No new sellers at the moment.</h4></center>";
                            }

                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }            
            
            ?>

                <!-- end of sellers display loop -->

        </div>

        <div id="repairers" class="tabcontent">

            <?php
            
                $sql = "SELECT * FROM users WHERE repairer='0'";
                
                $result = $db->query($sql);

                        if($result != null){

                            if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_array($result)){ ?>
                                    
                                    <?php $repairerName = $row['firstname'] . " " . $row['lastname'] ?>

                <form method='get' action='admin.php'>
                    <center>
                        <div class='view'>
                            <img src='<?php echo ASSETS . ' images/defaultprofile.png '; ?>'/>
                            <p>
                                <?php echo $repairerName; ?>
                            </p>
                            <button id='view'>View Profile</button>
                            <button id='accept' name='repairerAccept' value='<?php echo $row['id']; ?>' style='background-color: rgba(20,150,120,.7); color: #fff;'>Accept</button>
                            <button id='deny' name='repairerDeny' value='<?php echo $row['id']; ?>' style='background-color: rgba(120,50,20,.7); color: #fff;'>Deny</button>
                        </div>
                    </center>
                </form>

                <?php }

                                // Free result set
                                mysqli_free_result($result);

                            } else{
                                echo "<center><h4 style='width: 70%;'>No new repairers at the moment.</h4></center>";
                            }

                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }            
            
            ?>

                <!-- end of repairers display loop -->

        </div>


    </div>

    <?php include('verifyAccounts.php'); ?>

    <script>
        function navToggleFunction() {
            var x = document.getElementById("min-nav");
            if (x.className === "minNav") {
                x.className += " responsive";
            } else {
                x.className = "minNav";
            }
        }


        //for tabs functionality
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



        //pie chart for overview
        var ctx1 = document.getElementById("oChart").getContext('2d');
        var overviewChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ["SELLERS", "REPAIRERS", "SELLERS + REPAIRERS"],
                datasets: [{
                    backgroundColor: [
                        "#2ecc71",
                        "#3498db",
                        "#ff6384"
                    ],
                    data: [
                        <?php echo $numStudentSellers; ?>,
                        <?php echo $numStudentRepairers; ?>,
                        <?php echo $numStudentRepAndSell; ?>
                    ]
                }]
            }
        });

        //bar graph for booked passengers
        var ctx2 = document.getElementById("sChart").getContext('2d');
        var sellersChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ["PRODUCTS POSTED", "PRODUCTS SOLD"],
                datasets: [{
                    label: '# of products',
                    data: [
                        <?php echo $numProductsPosted; ?>,
                        12
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        //bar graph for train schedules
        var ctx3 = document.getElementById("rChart").getContext('2d');
        var repairersChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ["ACTIVE REPAIRERS", "INACTIVE REPAIRERS", "NON REPAIRERS"],
                datasets: [{
                    label: '# of repairers',
                    data: [
                        <?php echo $numStudentRepairers; ?>,
                        <?php echo $numActiveStudentRepairers; ?>,
                        <?php echo $numUserAccounts - $numStudentRepairers; ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>

    </body>

    <?php include_once VIEW_ROOT . 'layouts/footer.php';

//}
?>

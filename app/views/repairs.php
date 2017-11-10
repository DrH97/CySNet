<?php
include_once '../start.php';
include VIEW_ROOT . '/layouts/navbar.php';


function error($error){
    ?>
            <style>
                errors(<?php echo $error;
                ?>);

            </style>
            <?php
}

?>

            <!-- DESCRIPTION -->
            <div class="description">

                <center>
                    <div id="search" class="search">
                        <form method="get" action="<?php echo VIEW_URL . 'repairs.php'; ?>">
                            <input name="search" type="search" placeholder="Hey there, Who are you looking for?">
                            <select disabled>
                    <option selected disabled="disabled">Category</option>
                    <option value="Cables">Cables</option>
                    <option value="Hard drive">Hard drive</option>
                    <option value="Flash drive">Flash drive</option>
                    <option value="Memory card">Memory card</option>
                    <option value="sth else">sth else</option>
                </select>
                            <input type="submit" value="FIND">
                        </form>
                    </div>
                </center>

            </div>

            <!-- CONTENT -->
            <div class="content">

                <?php include('instantRepairer.php'); ?>

                <!-- CONTAINER TO HOLD REMAINING CONTENT -->
                <div id="toggle">

                    <!-- TABS -->
                    <div class="tab" id='repair-tab'>
                        <button class="tablinks" onclick="openTabs(event, 'pro')" id="rtdefaultOpen">PROFESSIONALS</button>
                        <button class="tablinks" onclick="openTabs(event, 'student')">STUDENTS</button>
                    </div>


                    <!-- PROFESSIONAL TAB -->
                    <div id="pro" class="tabcontent">

                        <?php
            
            $sql = "SELECT * FROM users WHERE repairer = 2";

            $result = $db->query($sql);

            if (isset($_GET['search'])) {
                $searchq = $_GET['search'];
                $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

                $query = $db->query("SELECT * FROM (SELECT * FROM users WHERE repairer = 2 ) AS subq WHERE username LIKE '%$searchq%' OR lastname LIKE '%$searchq%' OR email LIKE '%$searchq%' OR mobile LIKE '%$searchq%' OR institution LIKE '%$searchq%' OR firstname LIKE '%$searchq%'");
                
                
                $count = mysqli_num_rows($query);
                if ($count == 0) { ?>
                                <script>
                                    alert('There were no repairers found.. try different parameters..');

                                </script>
                                <?php
                } else {

                    $result = $query;
                }
            }

             $pros = $db->query("SELECT * FROM professionals");
        
                foreach ($pros as $pro): ?>

                                    <!-- repairers card -->
                                    <div class="r-card">
                                        <div class="image">
                                            <img src="<?php echo BASE_URL . 'public/uploads/' . $pro['image']; ?>" />
                                        </div>
                                        <div class="more">
                                            <h3>
                                                <?php echo $pro['name']; ?>
                                            </h3>
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <p>
                                                <?php echo $pro['mobile']; ?>
                                            </p>
                                            <div class="bottom">
                                                <button id="aboutBtn">About Repairer</button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach; ?>

                                    <!-- loops to display all expert repairers here -->


                    </div>


                    <!-- STUDENT TAB -->
                    <div id="student" class="tabcontent">

                        <?php $repairers = $db->query("SELECT * FROM users WHERE repairer='1'"); ?>

                        <?php foreach ($repairers as $rep): ?>

                        <!-- repairers card -->
                        <div class="r-card">
                            <div class="image">
                                <img src="<?php echo BASE_URL . 'public/uploads/' . $rep['image']; ?>" />
                            </div>
                            <div class="more">
                                <h3>
                                    <?php echo $rep['firstname']." ". $rep['lastname']; ?>
                                </h3>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <p>
                                    <?php echo $rep['mobile']; ?>
                                </p>
                                <div class="bottom">
                                    <!--                    <p style="background-color: green;">Available</p>-->
                                    <button id="aboutBtn">About Repairer</button>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>


                        <!-- loop to display student repairers -->

                    </div>

                </div>
                <!-- end of toggle div -->



                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>

                        <h3>About Repairer</h3>

                        <table>
                            <tr>
                                <td class="info">Gender:</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td class="info">Institution:</td>
                                <td>Strathmore University</td>
                            </tr>
                            <tr>
                                <td class="info">Course:</td>
                                <td>Bachelors in Informatics and Computer Science</td>
                            </tr>
                            <tr>
                                <td class="info">Year:</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td class="info">Admission number:</td>
                                <td>095242</td>
                            </tr>


                        </table>

                    </div>

                </div>

                <!-- end of modal div -->

            </div>

            <!-- end of content div -->

            <?php include "layouts/footer.php"; ?>

            <script>
                
                //hide description div by default
                document.getElementById("search").style.display = "none";
                
                //hide and show list of repairers
                function divToggle() {
                    var x = document.getElementById("toggle");
                    var y = document.getElementById("reveal");
                    var showDescription = document.getElementById("search");
                                        
                    if (x.style.display === "none") {
                        x.style.display = "block";
                        showDescription.style.display = "block";
                        y.innerHTML = "Hide list of repairers";
                    } else {
                        x.style.display = "none";
                        showDescription.style.display = "none";
                        y.innerHTML = "Show list of repairers";
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
                window.onload(document.getElementById("rtdefaultOpen").click());


                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("aboutBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on the button, open the modal
                btn.onclick = function() {
                    modal.style.display = "block";
                };

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                };

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target === modal) {
                        modal.style.display = "none";
                    }
                }

            </script>

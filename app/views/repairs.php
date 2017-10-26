<?php
include_once '../start.php';
include VIEW_ROOT . '/layouts/navbar.php';
//var_dump(VIEW_ROOT . 'layouts/navbar.php');
?>

<!-- DESCRIPTION -->
<div class="description">

    <center>
        <div class="search">
            <form method="get" action="#">
                <input type="search" placeholder="Hey there, Who are you looking for?">
                <select>
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

    <!-- TABS -->
    <div class="tab" id='repair-tab'>
        <button class="tablinks" onclick="openTabs(event, 'pro')" id="defaultOpen">PROFESSIONALS</button>
        <button class="tablinks" onclick="openTabs(event, 'student')">STUDENTS</button>
    </div>


    <!-- PRO TAB -->
    <div id="pro" class="tabcontent">

        <!-- repairers card -->
        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>


        <!-- loop to display all expert repairers -->


    </div>


    <!-- STUDENT TAB -->
    <div id="student" class="tabcontent">

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>

        <div class="r-card">
            <div class="image">
                <img src="<?php echo ASSETS . 'images/sample.jpg'?>" />
            </div>
            <div class="more">
                <h3>Name of person</h3>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p>0705 XXX 548</p>
                <div class="bottom">
                    <p style="background-color: green;">Available</p>
                    <button id="aboutBtn">About Repairer</button>
                </div>
            </div>
        </div>


        <!-- loop to display student repairers -->


    </div>







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

    //for sticky tab bar
    // Cache selectors outside callback for performance.
    var $window = $(window),
        $stickyEl = $('.tab'),
        elTop = $stickyEl.offset().top;

    $window.scroll(function() {
        $stickyEl.toggleClass('sticky', $window.scrollTop() > elTop);
    });


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
   // document.getElementById("defaultOpen").click();


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
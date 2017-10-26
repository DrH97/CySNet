<?php
require_once '../start.php';
include VIEW_ROOT . 'layouts/usernavbar.php';

$id = $_SESSION['user']['3'];
$userq = $db->query("SELECT * FROM users WHERE id = '$id'");

$userdeets = $userq->fetch_assoc();

$usersprod = $db->query("SELECT * FROM hardware_products WHERE sellerid = '$id'");

$userproddeets = $usersprod->fetch_assoc();

?>


<!-- CONTENT -->
<div class="content">

    <!-- TABS -->
    <div class="tab" id='account-tab'>
        <button class="tablinks" onclick="openTabs(event, 'about')" id="defaultOpen">ABOUT</button>
        <button class="tablinks" onclick="openTabs(event, 'rating')">RATING</button>
        <button class="tablinks" onclick="openTabs(event, 'store')">STORE</button>
        <button class="tablinks" onclick="openTabs(event, 'repairs')">REPAIRS</button>
    </div>


    <!-- ABOUT -->
    <div id="about" class="tabcontent">
        <table>
            <tr>
                <td class="info">Gender:</td>
                <td><?php echo $userdeets['gender']; ?></td>
            </tr>
            <tr>
                <td class="info">Institution:</td>
                <td><?php if (!empty($userdeets['institution'])) echo $userdeets['institution'];
                            else echo 'Unkown institution'; ?></td>
            </tr>
            <tr>
                <td class="info">Course:</td>
                <td><?php if (!empty($userdeets['course'])) echo $userdeets['course'];
                        else echo 'Unkown course'; ?></td>
            </tr>
            <tr>
                <td class="info">Year:</td>
                <td><?php if ($userdeets['year'] > 0) echo $userdeets['year'];
                        else echo 'Unkown year'; ?></td>
            </tr>
            <tr>
                <td class="info">Admission number:</td>
                <td><?php if ($userdeets['admno'] > 0) echo $userdeets['admno'];
                        else echo 'Unkown admission number'; ?></td>
            </tr>


        </table>

    </div>


    <!-- RATING -->
    <div id="rating" class="tabcontent">

        <h3>Your rating as rated by customers</h3>
        <span class="fa fa-star checked fa-2x"></span>
        <span class="fa fa-star checked fa-2x"></span>
        <span class="fa fa-star checked fa-2x"></span>
        <span class="fa fa-star fa-2x"></span>
        <span class="fa fa-star fa-2x"></span>

    </div>


    <!-- STORE -->
    <div id="store" class="tabcontent">
        <div class="upload">
            <form method="post" action="products.php?addprod=true" enctype="multipart/form-data">
                <h4>Upload to sell hardware</h4>
                <input type="file" name="itemimage" required><br><br>
                <input type="text" placeholder="Hardware name" name="itemname" required><br>
                <select>
                    <option selected disabled="disabled">Category</option>
                    <?php
                    $categories = $db->query("SELECT * FROM categories");

                    while($cat = $categories->fetch_assoc()):
                    ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['category']; ?></option>
                    <?php endwhile; ?>
                </select>
                <textarea rows="10" cols="52" placeholder="Enter hardware description as list" name="itemdescription" required></textarea><br><br>
                <input type="number" placeholder="Price in KES" name="itemprice" required><br>
                <input type="number" placeholder="Quantity in stock" name="itemquantity" required><br>
                <input type="submit" name="submititem">
            </form>
        </div>

        <!-- separator line -->
        <br>
        <h3>Here's your uploaded items</h3>
        <hr>

        <!-- display table of upload items here -->
        <form method='post' action='#'>
            <?php
                $categories = $db->query("SELECT * FROM hardware_products WHERE sellerid = $id");

            ?>
            <table style=" padding: 0;">
                <tr>
                    <th>Image</th>
                    <th>Hardware Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Remove?</th>
                </tr>

                <?php foreach ($categories as $cat): ?>
                <tr>
                    <td><img src="<?php echo BASE_URL . 'public/uploads/hardwareproducts/' . $cat['image']; ?>"></td>
                    <td><?php echo $cat['description']; ?></td>
                    <td><?php echo $cat['price']; ?></td>
                    <td><?php echo $cat['quantity']; ?></td>
                    <td><input type='checkbox' name='remove' value='#'></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </form>



    </div>


    <!-- REPAIRS -->
    <div id="repairs" class="tabcontent">

        <form method="post" action="#">

            <h3>Register as a repairer.</h3>

            <!-- Rounded switch -->
            <label class="switch">
                <input type="checkbox" id="repairset" name="repairset" onchange="repairer()">
                <span class="slider round"></span>
            </label> <br>

            <h3>Toggle the switch to let everyone know you are available for repair. Untoggle for unavailability.</h3>

            <label class="switch">
                <input type="checkbox" name="availability">
                <span class="slider round"></span>
            </label> <br>

            <input type="submit" value="MAKE ME AVAILABLE" name="submit">

        </form>

    </div>






</div>


<script>

    function repairer() {
        document.getElementById("repairset").setAttribute("disabled", true);
        alert("We have received your request, Give us a while to verify it.");
    }


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
    window.onload.document.getElementById("defaultOpen").click();

</script>


</body>

</html>

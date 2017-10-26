<?php
include 'adminnavbar.php';
if (null !== ($_SESSION['admin'][0])) { ?>

    <!-- CONTENT -->
    <div class="content">

        <div class="tab">
            <button class="tablinks" onclick="openTabs(event, 'categories')" id="defaultOpen">Categories</button>
            <button class="tablinks" onclick="openTabs(event, 'sellers')">Products</button>
            <button class="tablinks" onclick="openTabs(event, 'repairers')">Users</button>
        </div>

        <div id="categories" class="tabcontent">
            <div class="upload">
                <form method="post" action="<?php echo VIEW_URL; ?>products.php?addcat=true">
                    <h4>Add category</h4>
                    <input type="text" placeholder="Category name" name="catname" required><br><br>
                    <input type="submit" name="submitcat">
                </form>
            </div>

            <?php
            $categories = $db->query("SELECT * FROM categories");

            ?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>
                <?php foreach ($categories as $cat): ?>
                <tr>
                    <td><?php echo $cat['id']; ?></td>
                    <td><?php echo $cat['category']; ?></td>
                    <td>edit</td>
                    <td><input type='checkbox' name='remove' value='#'></td>
                </tr>
                <?php endforeach; ?>

            </table>

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

} else {
    header("LOCATION: " . BASE_URL . 'auth/adminlogin.php');
}
?>
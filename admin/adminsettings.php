<?php include 'adminnavbar.php'; ?>

<!-- CONTENT -->
<div class="content">

    <div class="tab">
        <button class="tablinks" onclick="openTabs(event, 'categories')" id="defaultOpen">CATEGORIES</button>
        <button class="tablinks" onclick="openTabs(event, 'professionals')">PROFESSIONALS</button>
    </div>

    <!-- CATEGORIES -->
    <div id="categories" class="tabcontent">

        <center>
            <div class="upload" style="text-align: center;">
                
                <form method="post" action="adminsettings.php">
                    <h4>Add category</h4>
                    <input type="text" placeholder="Category name" name="catname" required><br><br>
                    <input type="submit" name="submitcat">
                </form>
                
            </div>
        </center>

        <?php $categories = $db->query("SELECT * FROM categories"); ?>

        <table>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>

            <?php foreach ($categories as $cat): ?>

            <tr>
                <td>
                    <?php echo $cat['id']; ?>
                </td>
                <td>
                    <?php echo $cat['category']; ?>
                </td>
                <td>edit</td>
                <td><input type='checkbox' name='remove' value='#'></td>
            </tr>

            <?php endforeach; ?>

        </table>

    </div>


    <!-- SET PROFESSIONALS -->
    <div id="professionals" class="tabcontent">

        <center>
            <div class="upload" style="text-align: center;">
                
                <form method="post" action="adminsettings.php">
                    <h4>Add Professional repairers</h4>
                    <input type="file" placeholder="Company image" name="company_image" required><br><br>
                    <input type="text" placeholder="Company name" name="company_name" required><br><br>
                    <input type="text" placeholder="Mobile number" name="company_mobile" required><br><br>
                    <input type="submit" name="submit">
                </form>
                
            </div>
        </center>

        <?php $pros = $db->query("SELECT * FROM professionals"); ?>

        <form method='get' action="adminsettings.php">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Mobile</th>                    
                    <th><b>Edit</b></th>
                    <th><b>Remove</b></th>
                </tr>

                <?php foreach ($pros as $cat): ?>

                <tr>
                    <td>
                        <?php echo $cat['id']; ?>
                    </td>
                    <td>
                        <?php echo BASE_URL . 'public/uploads/' . $cat['image']; ?>
                    </td>
                    <td>
                        <?php echo $cat['name']; ?>
                    </td>
                    <td>
                        <?php echo $cat['mobile']; ?>
                    </td>                    
                    <td>edit</td>
                    <td><input type='checkbox' name='remove' value='#'></td>
                </tr>

                <?php endforeach; ?>

            </table>
        </form>
    </div>


</div>

<?php include('processFunctions.php'); ?>


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

?>

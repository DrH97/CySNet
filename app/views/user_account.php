<?php
require_once '../start.php';
//$res = 0;

include VIEW_ROOT . 'layouts/usernavbar.php';

$id = $_SESSION['user']['3'];
$userq = $db->query("SELECT * FROM users WHERE id = '$id'");

$sellerq = $db->query("SELECT * FROM sellers WHERE sellerid = '$id'");

$userdeets = $userq->fetch_assoc();

$sellerdeets = $userq->fetch_assoc();

$usersprod = $db->query("SELECT * FROM hardware_products WHERE sellerid = '$id'");

$userproddeets = $usersprod->fetch_assoc();

$res = $userproddeets;

if (isset($_GET['removeprod'])){
    $itemid = $_GET['id'];
    //var_dump($itemid);

    $sql = "DELETE FROM hardware_products WHERE id = $itemid";

    $delete = $db->query($sql);

    if ($delete){
        echo "<script>
                $('#remove').html('');
        </script>";
    }
}



?>

    <script>
        (function(e,t,n){var r=e.querySelectorAll("html")[0];
        r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);
    </script>

<div class="error" id="error" style="display: none; width: 100%;"><p class="message" id="errormess">Some Error Here!!! sdfnjskdf jksd fs dfkj sdkjf kjsd fkj</p><span class="close" id="errorspan">&cross;</span></div>
<div class="inform" id="info" style="display: none;"><p class="message" id="infomess">Some Info Here...asdasdasdasd asdasd asd ndajk sdja sdj ajksd asjk dakjs d askd akj</p><span class="close" id="infospan">&cross;</span></div>

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
    <div id="about" class="tabcontent"">
        <table style="width:100%; overflow: scroll;">
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
                        else echo 'Unkown admission number'; ?>
                </td>
            </tr>
        </table>
    </div>


    <!-- RATING -->
    <div id="rating" class="tabcontent">

        <?php if ($sellerdeets['rating'])
        { ?>
            <h3>Your rating as rated by customers</h3>
            <?php for ($i = 1; $i <= 5; $i++) {
                if ($sellerdeets['rating'] >= $i) { ?>
                    <span class="fa fa-star schecked fa-2x"></span>
                    <!--<img style="width: 15px;" src="--><?php //echo ASSETS . 'images/star.png'; ?><!--" alt="">-->
                <?php } elseif ($sellerdeets['rating'] > ($i - 1) && $sellerdeets['rating'] < $i) { ?>
                    <span class="fa fa-star-half-o schecked fa-2x"></span>
                    <!--<img style="width: 15px;" src="--><?php //echo ASSETS . 'images/star_half.png'; ?><!--" alt="">-->
                <?php } else { ?>
                    <span class="fa fa-star-o fa-2x"></span>
                    <!--<img style="width: 15px;" src="--><?php //echo ASSETS . 'images/star_off.png'; ?><!--" alt="">-->
                <?php }
            }
        }
        else { ?>
            No rating or reviews yet
        <?php }
        ?>
<!--        <span class="fa fa-star checked fa-2x"></span>-->
<!--        <span class="fa fa-star checked fa-2x"></span>-->
<!--        <span class="fa fa-star checked fa-2x"></span>-->
<!--        <span class="fa fa-star fa-2x"></span>-->
<!--        <span class="fa fa-star fa-2x"></span>-->

    </div>


<style>

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .inputfile + label {
        max-width: 80%;
        font-size: 1.25rem;
        /* 20px */
        font-weight: 700;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        padding: 0.625rem 1.25rem;
        /* 10px 20px */
    }

    .inputfile:focus + label,
    .inputfile.has-focus + label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }

    .inputfile + label * {
        /* pointer-events: none; */
        /* in case of FastClick lib use */
    }

    .inputfile + label svg {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
        margin-top: -0.25em;
        /* 4px */
        margin-right: 0.25em;
        /* 4px */
    }

    /* style 2 */

    .inputfile-2 + label {
        color: cornflowerblue;
        border: 2px solid currentColor;
    }

    .inputfile-2:focus + label,
    .inputfile-2.has-focus + label,
    .inputfile-2 + label:hover {
        color: dodgerblue;
    }


    /* inputs */

    .input {
        position: relative;
        z-index: 1;
        display: inline-block;
        margin: 1em;
        max-width: 550px;
        width: calc(100% - 0em);
        vertical-align: top;
        overflow: hidden;
    }

    .input__field {
        position: relative;
        display: block;
        float: right;
        padding: 0.8em 0;
        width: 60%;
        border: none;
        border-radius: 0;
        background: #f0f0f0;
        color: #aaa;
        /*font-weight: 400;*/
        /*font-family: "Avenir Next", "Helvetica Neue", Helvetica, Arial, sans-serif;*/
        /*-webkit-appearance: none; !* for box shadows to show on iOS *!*/
    }

    .input__field:focus {
        outline: none;
    }

    .input__label {
        display: inline-block;
        float: right;
        padding: 0 1em;
        width: 40%;
        color: #696969;
        font-weight: bold;
        font-size: 70.25%;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .input__label-content {
        position: relative;
        display: block;
        padding: 1.6em 0;
        width: 100%;
    }

    .graphic {
        position: absolute;
        top: 0;
        left: 0;
        fill: none;
    }

    .icon {
        color: #ddd;
        font-size: 150%;
    }

    /* Fumi */
    .input--fumi {
        background: #fff;
        overflow: hidden;
        padding: 0.25em 10px;
    }

    .input--fumi::after {
        content: '';
        width: 1px;
        position: absolute;
        top: 0.5em;
        bottom: 0.5em;
        left: 2.5em;
        background: #f0f0f0;
        z-index: 1;
    }

    .input__field--fumi {
        background: transparent;
        padding: -1.5em 1em 0.25em 4.15em;
        width: 90%;
        color: dodgerblue;
    }

    .input__label--fumi {
        position: absolute;
        width: 100%;
        text-align: left;
        padding-left: 4.5em;
        pointer-events: none;
        z-index: 1;
    }

    .icon--fumi {
        width: 0;
        position: absolute;
        top: 0;
        left: -1.7em;
        padding: 1em 0 0 0.5em;
    }

    @media screen and (max-width: 785px) {
        .icon--fumi {
            left: -1.4em;
        }
    }

    @media screen and (max-width: 475px) {
        .input__field--fumi {
            padding: -1.5em 1em 0.25em 2.15em;
            width: 80%;
        }

        .icon--fumi {
            left: -1.2em;
        }
    }

    .input__label-content--fumi {
        padding: 1em 0;
        display: inline-block;
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0;
    }

    .input__label-content--fumi span {
        display: inline-block;
    }

    .input__field--fumi:focus + .input__label--fumi .input__label-content--fumi,
    .input--filled .input__label-content--fumi {
        -webkit-animation: anim-fumi-1 0.3s forwards;
        animation: anim-fumi-1 0.3s forwards;
    }

    @-webkit-keyframes anim-fumi-1 {
        50% {
            -webkit-transform: translate3d(0, 3em, 0);
            transform: translate3d(0, 3em, 0);
        }
        51% {
            -webkit-transform: translate3d(0, -3em, 0) scale3d(0.85, 0.85, 1);
            transform: translate3d(0, -3em, 0) scale3d(0.85, 0.85, 1);
        }
        100% {
            color: #a3a3a3;
            -webkit-transform: translate3d(0, -1.1em, 0) scale3d(0.85, 0.85, 1);
            transform: translate3d(0, -1.1em, 0) scale3d(0.85, 0.85, 1);
        }
    }

    @keyframes anim-fumi-1 {
        50% {
            -webkit-transform: translate3d(0, 3em, 0);
            transform: translate3d(0, 3em, 0);
        }
        51% {
            -webkit-transform: translate3d(0, -3em, 0) scale3d(0.85, 0.85, 1);
            transform: translate3d(0, -3em, 0) scale3d(0.85, 0.85, 1);
        }
        100% {
            color: #a3a3a3;
            -webkit-transform: translate3d(0, -1.1em, 0) scale3d(0.85, 0.85, 1);
            transform: translate3d(0, -1.1em, 0) scale3d(0.85, 0.85, 1);
        }
    }


    .input__field--fumi:focus + .input__label--fumi .icon--fumi,
    .input--filled .icon--fumi {
        -webkit-animation: anim-fumi-2 0.3s forwards;
        animation: anim-fumi-2 0.3s forwards;
    }

    @-webkit-keyframes anim-fumi-2 {
        50% {

            opacity: 1;
            -webkit-transform: translate3d(0, -3em, 0);
            transform: translate3d(0, -3em, 0);
        }
        50.25% {
            opacity: 0;
            -webkit-transform: translate3d(0, -3em, 0);
            transform: translate3d(0, -3em, 0);
        }
        50.75% {
            opacity: 0;
            -webkit-transform: translate3d(0, 3em, 0);
            transform: translate3d(0, 3em, 0);
        }
        51% {
            opacity: 1;
            -webkit-transform: translate3d(0, 3em, 0);
            transform: translate3d(0, 3em, 0);
        }
        100% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            color: #00aeef;
            color: dodgerblue;
        }
    }

    @keyframes anim-fumi-2 {
        50% {
            opacity: 1;
            -webkit-transform: translate3d(0, -3em, 0);
            transform: translate3d(0, -3em, 0);
        }
        50.25% {
            opacity: 0;
            -webkit-transform: translate3d(0, -3em, 0);
            transform: translate3d(0, -3em, 0);
        }
        50.75% {
            opacity: 0;
            -webkit-transform: translate3d(0, 3em, 0);
            transform: translate3d(0, 3em, 0);
        }
        51% {
            opacity: 1;
            -webkit-transform: translate3d(0, 3em, 0);
            transform: translate3d(0, 3em, 0);
        }
        100% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            color: #00aeef;
        }
    }

</style>

    <!-- STORE -->
    <div id="store" class="tabcontent">
        <div id="upload" class="upload">
            <form method="post" action="products.php?addprod=true" enctype="multipart/form-data">
                <h4>Upload to sell hardware</h4>

                <div class="box">
                    <input type="file" name="itemimage" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" maultiple required/>
                    <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose an image&hellip;</span></label>
                </div>

                <span class="input input--fumi">
					<input class="input__field input__field--fumi" type="text" id="input-23" name="itemname" required/>
					<label class="input__label input__label--fumi" for="input-23">
						<i class="fa fa-fw fa-gavel icon icon--fumi"></i>
						<span class="input__label-content input__label-content--fumi">Hardware name</span>
					</label>
				</span>

                <span class="input input--fumi">
<!--					<input class="input__field input__field--fumi" type="text" id="input-23" />-->
                    <select class="input__field input__field--fumi" id="input-23">
                    <option selected disabled="disabled">Category</option>
                        <?php
                        $categories = $db->query("SELECT * FROM categories");

                        while($cat = $categories->fetch_assoc()):
                            ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['category']; ?></option>
                        <?php endwhile; ?>
                    </select>
					<label class="input__label input__label--fumi" for="input-23">
						<i class="fa fa-fw fa-bars icon icon--fumi"></i>
						<span class="input__label-content input__label-content--fumi"></span>
					</label>
				</span>

<!--                <input type="file" name="itemimage" required><br><br>-->
<!--                <input type="text" placeholder="Hardware name" name="itemname" required><br>-->
<!--                <select>-->
<!--                    <option selected disabled="disabled">Category</option>-->
<!--                    --><?php
//                    $categories = $db->query("SELECT * FROM categories");
//
//                    while($cat = $categories->fetch_assoc()):
//                    ?>
<!--                    <option value="--><?php //echo $cat['id']; ?><!--">--><?php //echo $cat['category']; ?><!--</option>-->
<!--                    --><?php //endwhile; ?>
<!--                </select>-->

                <textarea class="input__field--fumi" style="background: white; padding: 2%;" rows="10" cols="52" placeholder="Enter hardware description as list" name="itemdescription" required></textarea><br><br>

                <span class="input input--fumi">
                    <input id="input-23" class="input__field input__field--fumi" type="number" name="itemprice" required>
                    <!--					<input class="input__field input__field--fumi" type="text" id="input-23" />-->
					<label class="input__label input__label--fumi" for="input-23">
						<i class="fa fa-fw fa-money icon icon--fumi"></i>
						<span class="input__label-content input__label-content--fumi">Price in KES</span>
					</label>
				</span>

                <span class="input input--fumi">
                    <input class="input__field input__field--fumi" type="number" name="itemquantity" required>
                    <!--					<input class="input__field input__field--fumi" type="text" id="input-23" />-->
					<label class="input__label input__label--fumi" for="input-23">
						<i class="fa fa-fw fa-bitbucket icon icon--fumi"></i>
						<span class="input__label-content input__label-content--fumi">Quantity</span>
					</label>
				</span>
<!--                <input type="number" placeholder="Price in KES" name="itemprice" required><br>-->
<!--                <input type="number" placeholder="Quantity in stock" name="itemquantity" required><br>-->
                <input type="submit" name="submititem">
            </form>
        </div>

        <div id="editupload" class="upload" style="display: none;">
            <?php
            $res;
            if (isset($_GET['editprod'])) {
                $itemid = $_GET['itemid'];

                $sql = "SELECT * FROM hardware_products WHERE id = $itemid";
                //var_dump($image);

                $result = $db->query($sql);

                if ($result) {
                    $res = $result->fetch_assoc();
                    var_dump($res);
                    //header('Location: user_account.php');
                    //return;
                }
            }
            ?>
            <form method="post" action="products.php?editprod=true" enctype="multipart/form-data">
                <h4>Update hardware item</h4>

                <input name="edititemid" hidden value="<?php echo $res['id']; ?>">

                <div class="box">Click
                    <input type="file" name="edititemimage" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" maultiple/>
                    <label for="file-2"> <span> <img width="100px" src="<?php echo BASE_URL . 'public/uploads/hardwareproducts/' . $res['image']; ?>"></span></label>
                    to edit
                </div>

                <span class="input input--fumi">
					<input value="<?php echo $res['productname']; ?>" class="input__field input__field--fumi" type="text" id="input-23" name="edititemname" required/>
					<label class="input__label input__label--fumi" for="input-23">
						<i class="fa fa-fw fa-gavel icon icon--fumi"></i>
						<span class="input__label-content input__label-content--fumi">Hardware name</span>
					</label>
				</span>

                <span class="input input--fumi">
<!--					<input class="input__field input__field--fumi" type="text" id="input-23" />-->
                    <select name="edititemcat" class="input__field input__field--fumi" id="input-23">
                        <option disabled="disabled">Category</option>
                        <?php
                        $categories = $db->query("SELECT * FROM categories");
                        $count = 0;
                        while($cat = $categories->fetch_assoc()):
                            $count = $count + 1;
                            ?>
                            <option <?php if ($count == $res['categoryid']){ echo 'selected'; } ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['category']; ?></option>
                        <?php endwhile; ?>
                    </select>
					<label class="input__label input__label--fumi" for="input-23">
						<i class="fa fa-fw fa-bars icon icon--fumi"></i>
						<span class="input__label-content input__label-content--fumi"></span>
					</label>
				</span>

                <!--                <input type="file" name="itemimage" required><br><br>-->
                <!--                <input type="text" placeholder="Hardware name" name="itemname" required><br>-->
                <!--                <select>-->
                <!--                    <option selected disabled="disabled">Category</option>-->
                <!--                    --><?php
                //                    $categories = $db->query("SELECT * FROM categories");
                //
                //                    while($cat = $categories->fetch_assoc()):
                //                    ?>
                <!--                    <option value="--><?php //echo $cat['id']; ?><!--">--><?php //echo $cat['category']; ?><!--</option>-->
                <!--                    --><?php //endwhile; ?>
                <!--                </select>-->

                <textarea class="input__field--fumi" style="background: white; padding: 2%;" rows="10" cols="52" placeholder="Enter hardware description as list" name="edititemdescription" required><?php echo $res['description']; ?></textarea><br><br>

                <span class="input input--fumi">
                    <input value="<?php echo $res['price']; ?>" id="input-23" class="input__field input__field--fumi" type="number" name="edititemprice" required>
                    <!--					<input class="input__field input__field--fumi" type="text" id="input-23" />-->
					<label class="input__label input__label--fumi" for="input-23">
						<i class="fa fa-fw fa-money icon icon--fumi"></i>
						<span class="input__label-content input__label-content--fumi">Price in KES</span>
					</label>
				</span>

                <span class="input input--fumi">
                    <input value="<?php echo $res['quantity']; ?>" class="input__field input__field--fumi" type="number" name="edititemquantity" required>
                    <!--					<input class="input__field input__field--fumi" type="text" id="input-23" />-->
					<label class="input__label input__label--fumi" for="input-23">
						<i class="fa fa-fw fa-bitbucket icon icon--fumi"></i>
						<span class="input__label-content input__label-content--fumi">Quantity</span>
					</label>
				</span>
                <!--                <input type="number" placeholder="Price in KES" name="itemprice" required><br>-->
                <!--                <input type="number" placeholder="Quantity in stock" name="itemquantity" required><br>-->
                <input type="submit" name="submititem">
            </form>
        </div>

        <!-- separator line -->
        <br>
        <h3 id="action">Here's your uploaded items</h3>
        <hr>

    <!-- display table of upload items here -->
        <?php
            $categories = $db->query("SELECT * FROM hardware_products WHERE sellerid = $id");
        ?>
        <div style="width: 100%;overflow-x: auto;">
            <table style="padding: 0;">
                <tr>
                    <th>Image</th>
                    <th>Hardware Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>

                <?php foreach ($categories as $cat): ?>
                <tr>
                    <td><img src="<?php echo BASE_URL . 'public/uploads/hardwareproducts/' . $cat['image']; ?>"></td>
                    <td><?php echo $cat['description']; ?></td>
                    <td><?php echo $cat['price']; ?></td>
                    <td><?php echo $cat['quantity']; ?></td>
                    <td><span class="fa fa-fw fa-edit" style="color: green;" onclick="editProduct('<?php echo $cat['id']; ?>')"></span>     <span class="fa fa-fw fa-trash-o"  style="color: red;" onclick="removeProduct('<?php echo $cat['id']; ?>', '<?php echo $cat['productname']; ?>')"></span></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <a href="#store" id="storemove"></a>
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


<script src="<?php echo ASSETS . 'js/custom-file-input.js'; ?>"></script>

<script>

    function repairer() {
        document.getElementById("repairset").setAttribute("disabled", true);
        alert("We have received your request, Give us a while to verify it.");
    }


    //for sticky tab bar
    // Cache selectors outside callback for performance.
    let $window = $(window),
        $stickyEl = $('.tab'),
        elTop = $stickyEl.offset().top;

    $window.scroll(function() {
        $stickyEl.toggleClass('sticky', $window.scrollTop() > elTop);
    });


    function openTabs(evt, tabName) {
        // Declare all variables
        let i, tabcontent, tablinks;

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
    window.onload(document.getElementById("defaultOpen").click());

    function removeProduct(id, name) {
        x = alert("Are you sure you want to remove " + name + "?");
        $('#action').html('<center><img style="width: 20px;" src="<?php echo ASSETS . '/images/loader.gif'; ?>" /></center>');

        window.location = "<?php echo '?removeprod=true&id='; ?>" + id;

        //$('#remove').html(succ);

//        $.ajax({
//            type: 'post',
//            url: 'auth.php?login=true',
//            data: {
//                'id': $('#email'),
//                'password': $('#password')
//            },
//            success: function (succ) {
//                $('#remove').html(succ);
//            }
//        });
    }

    function editProduct(id) {
        $('#action').html('<center><img style="width: 30px;" src="<?php echo ASSETS . '/images/loader.gif'; ?>" /></center>');
        //info("Edited product Succesfully");

        $.ajax({
            type: 'get',
            url: 'user_account.php?editprod=true',
            data: {
                'itemid': id
            },
            success: function (succ) {
//                info(succ);
                $('#action').html('Here\'s your uploaded items');

                document.getElementById('upload').style.display = "none";
                document.getElementById('editupload').style.display = "block";

                document.getElementById('storemove').click();

//                $('#upload').css.display = "none";
//                $('#editupload').css.display = "none";
            }
        });

    }

</script>

<script src="<?php echo ASSETS . 'js/classie.js'; ?>"></script>
<script>
    (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
            (function() {
                // Make sure we trim BOM and NBSP
                let rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function() {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
            // in case the input is already filled..
            if( inputEl.value.trim() !== '' ) {
                classie.add( inputEl.parentNode, 'input--filled' );
            }

            // events:
            inputEl.addEventListener( 'focus', onInputFocus );
            inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
            classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
            if( ev.target.value.trim() === '' ) {
                classie.remove( ev.target.parentNode, 'input--filled' );
            }
        }
    })();

    function info(info) {
//        $('#cartbutton').html('<center><img src="<?php //echo ASSETS . '/images/dolphin.gif'; ?>//"/></center>');
        var infos = document.getElementById("info");
        var infosmess = document.getElementById("infomess");
        infos.style.display = "block";
        infosmess.innerHTML = info;

    }

    var errorspan = document.getElementById("errorspan");
    var error = document.getElementById("error");
    var infospan = document.getElementById("infospan");
    var info1 = document.getElementById("info");

    errorspan.onclick = function() {
        error.style.display = "none";
    };
    infospan.onclick = function() {
        info1.style.display = "none";
    };
</script>

</body>

</html>
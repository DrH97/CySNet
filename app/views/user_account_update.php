<?php
    require_once '../start.php';
    include VIEW_ROOT . 'layouts/usernavbar.php';

    $id = $_SESSION['user']['3'];
    $userq = $db->query("SELECT * FROM users WHERE id = '$id'");

    $userdeets = $userq->fetch_assoc();

    //var_dump(BASE_URL . 'public/uploads/' . $userdeets['image']);
?>
    <!-- CONTENT -->
    <div class="content">

        <div class="update">

            <form method="post" enctype = "multipart/form-data"
                  action="<?php echo BASE_URL . 'auth/auth.php?updateaccount=true'; ?>">

                <br>
                <fieldset>
                    <legend>About yourself</legend>
                    <br> <input type="file" name="profile_image"><br><br>
                    <input type="text" placeholder="First name" name="firstname" value="<?php echo $userdeets['firstname']; ?>"><br>
                    <input type="text" placeholder="Last name" name="lastname" value="<?php echo $userdeets['lastname']; ?>"><br>
                </fieldset><br>

                <fieldset>
                    <legend>Yourself in institution</legend>
                    <br><input type="text" placeholder="Institution" name="institution" value="<?php echo $userdeets['institution']; ?>"><br>
                    <input type="text" placeholder="Course" name="course" value="<?php echo $userdeets['course']; ?>"><br>
                    <input type="text" placeholder="Year" name="year" value="<?php if($userdeets['year'] > 0) echo $userdeets['year']; else echo ''; ?>"><br>
                    <input type="number" placeholder="Admission number" name="admno" value="<?php if($userdeets['admno'] > 0) echo $userdeets['admno']; else echo ''?>"><br>
                </fieldset>

                <input type="submit" value="UPDATE PROFILE" name="submit"><br>

            </form><br>

            <form method="post" action="<?php echo BASE_URL . 'auth/auth.php?updatepass=true'; ?>">

                <br><br>
                <fieldset style="width: 95%;">
                    <legend>Change account credential</legend>
                    <br><input type="email" placeholder="Email" name="email" value="<?php echo $_SESSION['user'][0]; ?>" required><br>
                    <input type="password" placeholder="Password" name="password" required><br>
                    <input type="password" placeholder="Re-type password" name="re_password"><br>
                </fieldset>
                
                <input type="submit" value="UPDATE ACCOUNT" name="submit"><br>

            </form>

        </div>

    </div>

    <script>
        //javascript stuff to go here
    </script>

<?php
    include 'layouts/footer.php'
?>
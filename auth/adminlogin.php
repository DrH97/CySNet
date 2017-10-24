<?php
require '../app/start.php';
require VIEW_ROOT . 'layouts/appheader.php'; ?>

<style>

    html, body{
        background-color: skyblue;
    }

    header{
        height: 4em;
        position: static;
    }

    .content h2 {
        text-align: center;
    }

    .tabcontent {
        border-style: none;
    }
    /* Style the buttons inside the tab */

    div.tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        color: white;
        margin: 0 1em;
        border: 1px solid white;
    }
    /* Change background color of buttons on hover */

    div.tab button:hover {
        color: dodgerblue;
        background-color: white;
        border: 1px solid dodgerblue;
    }
    /* Create an active/current tablink class */

    @media only screen and (max-width: 780px){

        header {
            display: block;
            height: 3em;
        }

        header #title{
            font-size: 1.2em;
        }

        .content{
            text-align-last: center;
            width: 90%;
        }

        .content h2 {
            font-size: 1em;
        }

        div.tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 4px 8px;
            transition: 0.3s;
            color: white;
            margin: 0 1em;
            border: 1px solid white;
        }

        .tabcontent{
            width: 100%;
        }

    }

</style>

<!-- TOP NAVIGATION BAR -->
<header>

    <center>
        <a href="<?php echo BASE_URL; ?>" id="title">TechCrowd<span id="subtitle"> WELCOME</span></a>
    </center>

</header>

<!-- CONTENT -->
<div class="content">

    <h2>Hey there, welcome to <span style="font-size: 1.2em;"><b>TechCrowd</b></span> :)</h2>

    <!-- TABS -->
<!--    <div class="tab">-->
<!--        <button class="tablinks" onclick="openTabs(event, 'login')" id="defaultOpen">LOGIN</button>-->
<!--        <button class="tablinks" onclick="openTabs(event, 'signup')"><b>CREATE NEW ACCOUNT</b></button>-->
<!--    </div>-->

    <!-- LOGIN -->
    <div id="login" class="stabcontent">

        <center>
            <form method="post" action="auth.php?adminlogin=true">

                <input id="email" type="email" placeholder="Email" name="email" required autofocus><br>
                <input id="password" type="password" placeholder="Password" name="password" required><br><br>

                <label>
                    <input type="checkbox" name="remember">
                    Remember Me
                </label><br><br>

                <input type="submit" value="LOG IN"><br><br>

                <a href="">
                    Forgot Your Password?
                </a>

            </form>
        </center>

    </div>

    <!-- SIGNUP -->
    <div id="signup" class="tabcontent">

        <center>
            <form method="post" action="auth.php?register=true">

                <div>
                    <input id="firstname" name="firstname" type="text" placeholder="First Name" required autofocus><br>
                    <input id="lastname" name="lastname" type="text" placeholder="Last Name" required>
                </div><br>
                <div>
                    <label style="margin-right: 2em;">Gender:  </label>
                    <input id="male" type="radio" name="gender" value="Male" required><label for="male" style="margin-right: 2em;">Male</label>
                    <input id="female" type="radio" name="gender" value="Female" required><label for="female">Female</label>
                </div><br>
                <input id="mobile" type="number" placeholder="Mobile Number" name="mobile" required><br>
                <input id="email-sign" type="email" placeholder="Email" name="email-sign" required><br>
                <input id="password-sign" type="password" placeholder="Password" name="password-sign" required><br>
                <input id="password-confirm" type="password" placeholder="Re-type Password" name="password_confirmation" required><br><br>
                <input type="submit" value="SIGN UP"><br>

            </form>
        </center>

    </div>


</div>g

<?php include VIEW_ROOT . 'layouts/footer.php'; ?>

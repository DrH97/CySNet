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

        div.tabl {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: transparent;
            /*padding: 0 32.6% 0 32.6%;*/
            width: 40%;
            margin: 0em 30%;
            border-style: none;
            display: inline-flex;
        }

        .tabcontent {
            border-style: none;
        }
        /* Style the buttons inside the tab */

        div.tabl button {
            background-color: inherit;
            /*float: left;*/
            border: none;
            outline: none;
            cursor: pointer;
            padding: 10px 16px;
            width: 35%;
            transition: 0.3s;
            color: white;
            margin: 0 7.5%;
            border: 1px solid white;
        }
        /* Change background color of buttons on hover */


        div.tabl button:hover {
            color: dodgerblue;
            background-color: white;
            border: 1px solid dodgerblue;
        }
        /* Create an active/current tablink class */

        div.tabl button.active {
            color: white;
            background-color: dodgerblue;
            border-style: none;
        }

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

            div.tabl {
                overflow: hidden;
                border-bottom: 1px solid #ccc;
                background-color: transparent;
                padding: 0;
                width: 40%;
                margin-top: 2em;
                border-style: none;
            }

            div.tabl button {
                background-color: inherit;
                /*float: left;*/
                border: none;
                outline: none;
                cursor: pointer;
                padding: 4px 8px;
                width: 50%;
                transition: 0.3s;
                color: white;
                smargin: 0 1em;
                border: 1px solid white;
            }

            .tabcontent{
                swidth: 100%;
            }

        }

        @media only screen and (max-width: 575px){
            div.tabl {
                width: 100%;
                margin: 0;
            }
            div.tabl button {
                width: 50%;
                margin: 0;
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
    <div class="tabl">
        <button class="tablinks" onclick="openTabs(event, 'login')" id="defaultOpen"><span  class="fa fa-fw fa-sign-in"></span><br>LOGIN</button>
        <button class="tablinks" onclick="openTabs(event, 'signup')"><span  class="fa fa-fw fa-users"></span><br>CREATE NEW ACCOUNT</button>
    </div>

    <!-- LOGIN -->
    <div id="login" class="tabcontent">

        <center>
            <form method="post" action="auth.php?login=true">

                <input id="email" type="email" placeholder="Email or Admission number" name="email" required autofocus><br>
                <input id="password" type="password" placeholder="Password" name="password" required><br><br>

                <label>
                    <input type="checkbox" name="remember">
                    Remember Me
                </label><br><br>

                <input type="submit" value="LOG IN" onclick="logUser()"><br><br>
                <div  id="loginb"> </div>
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
                    <label style="margin-right: 2em;">Gender:  </label><br>
                    <input id="male" type="radio" name="gender" value="Male" required><label for="male" style="margin-right: 2em;">Male</label><span><i href=""></i></span>
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

    function logUser() {
        $('#loginb').html('<center><img src="<?php echo ASSETS . '/images/dolphin.gif'; ?>"/></center>');
        $.ajax({
            type: 'post',
            url: 'auth.php?login=true',
            data: {
                'email': $('#email'),
                'password': $('#password')
            },
//            success: function (succ) {
//                $('#loginb').html(succ);
//            }
        }).done(function( msg ) {
            alert( "message: " + msg );
        });

//        $.ajax({
//            method: "POST",
//            url: "some.php",
//            data: { name: "John", location: "Boston" }
//        })
//            .done(function( msg ) {
//                alert( "Data Saved: " + msg );
//            });
    }
</script>

<?php include VIEW_ROOT . 'layouts/footer.php'; ?>

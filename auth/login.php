<?php
require_once '../app/start.php';
require VIEW_ROOT . 'layouts/appheader.php'; ?>

<style>
        
        .body{
            background-color: skyblue;
        }
        
        .content h2 {
            margin-top: 2em;
            text-align: center;
        }
        
        div.tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: transparent;
            padding: 0 32.6% 0 32.6%;
            margin-top: 2em;
            border-style: none;
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
            color: black;
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
        
        div.tab button.active {
            color: white;
            background-color: dodgerblue;
            border-style: none;
        }

        form a{
            color: dodgerblue;
            font-size: 13px;
            text-decoration: none;
            position: relative;
            top: 10;
        }
    </style>

    <!-- TOP NAVIGATION BAR -->
    <header>

        <center>
            <a href="<?php echo BASE_URL; ?>" id="title">TechCrowd<span id="subtitle"> WELCOME</span></a>
        </center>

    </header>

<div class="body">
    <!-- CONTENT -->
    <div class="content">

        <h2>Hey there, welcome to <span style="font-size: 1.2em;"><b>TechCrowd</b></span> :)</h2>

        <!-- TABS -->
        <div class="tab">
            <button class="tablinks" onclick="openTabs(event, 'login')" id="defaultOpen">LOGIN</button>
            <button class="tablinks" onclick="openTabs(event, 'signup')">CREATE NEW ACCOUNT</button>
        </div>

        <!-- LOGIN -->
        <div id="login" class="tabcontent">

            <center>

            <form method="POST" action="?login=true">

                <input id="email" type="email" placeholder="Email" name="email" value="" required autofocus>
                <br>

                <input id="password" type="password" placeholder="Password" name="password" required><br><br>

                <input type="checkbox" name="remember"> Remember Me
                
                <input type="submit" value="LOG IN"><br>

                <a href="">
                    Forgot Your Password?
                </a>

            </form>
            </center>

        </div>


        <!-- SIGNUP -->
        <div id="signup" class="tabcontent">

            <center>

            <form method="post" action="?register=true">

                <div display="inline-flex">
                    <input id="firstname" type="text" placeholder="First Name" name="firstname" required autofocus>

                    <input id="lastname" type="text" placeholder="Last Name" name="lastname" required autofocus>

                </div><br>
                

                <div display="inline-flex">
                    <label style="margin-right: 2em;">Gender:  </label>

                    <input id="male" type="radio" name="gender" value="male" required><label for="male" style="margin-right: 2em;">Male</label>
                    
                    <input id="female" type="radio" name="gender" value="female" required><label for="female">Female</label>

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
    </script>

</div>

<?php include VIEW_ROOT . 'layouts/footer.php'; ?>
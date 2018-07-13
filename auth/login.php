<?php
require '../app/start.php';
require VIEW_ROOT . 'layouts/appheader.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1">

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

        .capbox {
        	background-color: #92D433;
        	border: #B3E272 0px solid;
        	border-width: 0px 12px 0px 0px;
        	display: inline-block;
        	*display: inline; zoom: 1; /* FOR IE7-8 */
        	padding: 8px 40px 8px 8px;
        	}

        .capbox-inner {
        	font: bold 11px arial, sans-serif;
        	color: #000000;
        	background-color: #DBF3BA;
        	margin: 5px auto 0px auto;
        	padding: 3px;
        	-moz-border-radius: 4px;
        	-webkit-border-radius: 4px;
        	border-radius: 4px;
        	}

        #CaptchaDiv {
        	font: bold 17px verdana, arial, sans-serif;
        	font-style: italic;
        	color: #000000;
        	background-color: #FFFFFF;
        	padding: 4px;
        	-moz-border-radius: 4px;
        	-webkit-border-radius: 4px;
        	border-radius: 4px;
        	}

        #CaptchaInput { margin: 1px 0px 1px 0px; width: 135px; }


/* The message box is shown when the user clicks on the password field */
#message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
}

#message p {
    padding: 10px 35px;
    font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
    color: green;
}

.valid:before {
    position: relative;
    left: -35px;
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
    color: red;
}

.invalid:before {
    position: relative;
    left: -35px;
}

.capbox {
	border: #B3E272 0px solid;
	border-width: 0px 12px 0px 0px;
	display: inline-block;
	*display: inline; zoom: 1; /* FOR IE7-8 */
	padding: 8px 40px 8px 8px;
	}

.capbox-inner {
	font: bold 11px arial, sans-serif;
	color: #000000;
	margin: 5px auto 0px auto;
	padding: 3px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	}

#CaptchaDiv {
	font: bold 17px verdana, arial, sans-serif;
	font-style: italic;
	color: #000000;
	padding: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	}

#CaptchaInput { margin: 1px 0px 1px 0px; width: 135px; }

    </style>

<!-- TOP NAVIGATION BAR -->
<header>

    <center>
        <a href="<?php echo BASE_URL; ?>" id="title">TechCrowd<span id="subtitle"> WELCOME</span></a>
    </center>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>

</header>

<div class="error" id="error" style="display: none;"><p class="message" id="errormess">Some Error Here!!! sdfnjskdf jksd fs dfkj sdkjf kjsd fkj</p><span class="close" id="errorspan" onclick="alert('Asdad');">&cross;</span></div>
<div class="inform" id="info" style="display: none;"><p class="message" id="infomess">Some Info Here...asdasdasdasd asdasd asd ndajk sdja sdj ajksd asjk dakjs d askd akj</p><span class="close" id="infospan" onclick="alert('Asdad');">&cross;</span></div>


<!-- CONTENT -->
<div class="content" style="background-color: skyblue;">

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

                <input type="button" value="LOG IN" onclick="logUser()"><br><br>
                <div  id="loginb"> </div>
                <a href="">
                    Forgot Your Password?
                </a>

            </form>
        </center>

    </div>

    <!-- SIGNUP -->
    <div id="signup" class="tabcontent" style="background-color: skyblue;">

        <center>
            <form method="post" action="auth.php?register=true"  onsubmit="return checkform(this);"
>

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

                                <div id="message">
                                  <p>Password must contain the following:</p>
                                  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                  <p id="number" class="invalid">A <b>number</b></p>
                                  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div>
                <input id="password-confirm" type="password" placeholder="Re-type Password" name="password_confirmation" required><br><br>


                <script>
                var myInput = document.getElementById("password-sign");
                var letter = document.getElementById("letter");
                var capital = document.getElementById("capital");
                var number = document.getElementById("number");
                var length = document.getElementById("length");

                // When the user clicks on the password field, show the message box
                myInput.onfocus = function() {
                    document.getElementById("message").style.display = "block";
                }

                // When the user clicks outside of the password field, hide the message box
                myInput.onblur = function() {
                    document.getElementById("message").style.display = "none";
                }

                // When the user starts to type something inside the password field
                myInput.onkeyup = function() {
                  // Validate lowercase letters
                  var lowerCaseLetters = /[a-z]/g;
                  if(myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                  } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                  }

                  // Validate capital letters
                  var upperCaseLetters = /[A-Z]/g;
                  if(myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                  } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                  }

                  // Validate numbers
                  var numbers = /[0-9]/g;
                  if(myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                  } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                  }

                  // Validate length
                  if(myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                  } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                  }
                }
                </script>

                <br>
<div class="capbox">

<div id="CaptchaDiv"></div>

<div class="capbox-inner">
Type the above number:<br>

<input type="hidden" id="txtCaptcha">
<input type="text" name="CaptchaInput" id="CaptchaInput" size="15"><br>

</div>
</div>
<br><br>

            <!--    <div class="form-group">
                         <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                         <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                         <div class="help-block with-errors"></div>
                     </div>


               END CAPTCHA -->


                <input type="submit" value="SIGN UP"><br>

            </form>

            <script type="text/javascript">


// Captcha Script

function checkform(theform){
var why = "";

if(theform.CaptchaInput.value == ""){
why += "- Please Enter CAPTCHA Code.\n";
}
if(theform.CaptchaInput.value != ""){
if(ValidCaptcha(theform.CaptchaInput.value) == false){
why += "- The CAPTCHA Code Does Not Match.\n";
}
}
if(why != ""){
alert(why);
return false;
}
}

var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("CaptchaDiv").innerHTML = code;

// Validate input against the generated number
function ValidCaptcha(){
var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
if (str1 == str2){
return true;
}else{
return false;
}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
return string.split(' ').join('');
}
</script>

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

    function logUser() {
        $('#loginb').html('<center><img style="width: 20px;" src="<?php echo ASSETS . '/images/loader.gif'; ?>" /></center>');

        $.ajax({
            type: 'post',
            url: 'auth.php?login=true',
            data: {
                'email': $('#email').val(),
                'password': $('#password').val()
            },
            success: function (succ) {

                if (succ === '1'){
                    window.location = "../index.php";
                } else {
                    errors(succ);
                    $('#loginb').html('');
                }

//                $('#loginb').html(succ);
            }
//        }).done(function( msg ) {
//            alert( "message: " + msg );
        });

        function errors(error) {
            var errors = document.getElementById("error");
            var errorsmess = document.getElementById("errormess");
            errors.style.display = "block";
            errorsmess.innerHTML = error;
        }

        function info(info) {
//        $('#cartbutton').html('<center><img src="<?php //echo ASSETS . '/images/dolphin.gif'; ?>//"/></center>');
            var infos = document.getElementById("info");
            var infosmess = document.getElementById("infomess");
            infos.style.display = "block";
            infosmess.innerHTML = info;

        }

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

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="validator.js"></script>
    <script src="contact.js"></script>



<?php include VIEW_ROOT . 'layouts/footer.php'; ?>

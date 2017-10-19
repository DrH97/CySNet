@extends('layouts.appheader')

    <style>
        header {
            background: rgba(255, 255, 255, 0.8);
        }
        
        table{
            padding-top: 0em;
            width: 100%;
            height: auto;
            text-align: center;
        }
        
    </style>

</head>

<body>

    <!-- TOP NAVIGATION BAR -->
    <header>

        <a href="#" id="title">TechCrowd <span id="subtitle">ADMIN</span></a>
        <div id="links">
            <a href="#" style="color: black;background-color: skyblue;">Verify</a>
            <a href="#" id="logout">Log out</a>
        </div>
        <div class="account">
            <p>John Doe</p>
            <img src="{!! asset('images/defaultprofile.png') !!}" />
        </div>

    </header>

    <!-- PROFILE BOX -->
    <div class="profile-box">
        <center>
            <div>
                <img src="{!! asset('images/defaultprofile.png') !!}" />
                <h3>John Doe</h3>
            </div>
        </center>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="tab">
            <button class="tablinks" onclick="openTabs(event, 'dashboard')" id="defaultOpen">DASHBOARD</button>
            <button class="tablinks" onclick="openTabs(event, 'sellers')">SELLERS</button>
            <button class="tablinks" onclick="openTabs(event, 'repairers')">REPAIRERS</button>
        </div>

        <div id="dashboard" class="tabcontent">

            <table>
                <tr>
                    <th>Accounts created</th>
                    <th>Sellers</th>
                    <th>Items posted</th>
                    <th>Items sold</th>
                    <th>Repairers</th>
                    <th>Active repairers</th>
                    <th>Inactive repairers</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>43</td>
                    <td>421</td>
                    <td>378</td>
                    <td>14</td>
                    <td>8</td>
                    <td>5</td>
                </tr>


            </table>

        </div>

        <div id="sellers" class="tabcontent">

            <center>
                <div>
                    <img src="{{ asset('images/defaultprofile.png') }}" />
                    <p>John a guy with long-ass name</p>
                    <button id="view">View Profile</button>
                    <button id="accept">Accept</button>
                    <button id="deny">Deny</button>
                </div>
            </center>

        </div>

        <div id="repairers" class="tabcontent">

            <center>
                <div>
                    <img src="assets/images/default-profile.png" />
                    <p>John Doe</p>
                    <button id="view">View Profile</button>
                    <button id="accept">Accept</button>
                    <button id="deny">Deny</button>
                </div>
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


</body>

</html>

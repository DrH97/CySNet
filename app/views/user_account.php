@extends('layouts.appheader')
{{-- @include('inc.navbar') --}}

@section('content')
    <style>
        
        header {
            background: rgba(255, 255, 255, 0.8);
        }
        
    </style>

    <!-- TOP NAVIGATION BAR -->
    <header>

        <a href="#" id="title">TechCrowd <span id="subtitle">ACCOUNT</span></a>
        <div id="links">
            <a href="/" style="color: black;background-color: skyblue;">Profile</a>
            <a href="profile/update">Update</a>
            {{-- <a href="{{ route(logout) }}" id="logout" >Log out</a> --}}
            <a id="logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        {{-- <div class="account">
            <p>{{ Auth::user()->email }}</p>
            <img src="assets/images/sample.jpg" />
        </div> --}}

    </header>

    <!-- PROFILE BOX -->
    <div class="profile-box">
        <center>
            <div>
                <img src="{!! asset('images/sample.jpg') !!}" />
                @guest
                    {{ route('login') }}
                @else
                    <h3>{{ Auth::user()->firstname . " " . Auth::user()->lastname}}</h3>
                @endguest
            </div>
        </center>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- TABS -->
        <div class="tab">
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
                    <td>Male</td>
                </tr>
                <tr>
                    <td class="info">Institution:</td>
                    <td>Strathmore University</td>
                </tr>
                <tr>
                    <td class="info">Course:</td>
                    <td>Bachelors in Informatics and Computer Science</td>
                </tr>
                <tr>
                    <td class="info">Year:</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td class="info">Admission number:</td>
                    <td>095242</td>
                </tr>


            </table>

        </div>
        

        <!-- RATING -->
        <div id="rating" class="tabcontent">

            <h3>Your rating as rated by customers</h3>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>

        </div>
        

        <!-- STORE -->
        <div id="store" class="tabcontent">

            <div class="upload">
                <form method="post" action="/addProduct">
                    {{ csrf_field() }}
                    <h4>Upload to sell hardware</h4>
                    <input type="number" name="sellerid" hidden value="{!! Auth::user()->id !!}">
                    <input type="file" name="image" required><br><br>
                    <input type="text" placeholder="Hardware name" name="productname" required><br><br>
                    <textarea rows="10" cols="52" placeholder="Enter hardware description as list" name="description" required></textarea><br><br>
                    <input type="number" placeholder="Price in KES" name="price" required><br>
                    <input type="number" placeholder="Quantity" name="quantity" required><br>
                    <input type="submit" value="UPLOAD" name="submit">
                </form>
            </div>

            <!-- separator line -->
            <br>
            <hr>


            <!-- display upload items here -->



        </div>
        

        <!-- REPAIRS -->
        <div id="repairs" class="tabcontent">            

            <form method="post" action="#">
                
                <h3>Register as a repairer. Untoggle to unregister.</h3>
                
                <!-- Rounded switch -->
                <label class="switch">
                  <input type="checkbox" name="availability">
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


@endsection
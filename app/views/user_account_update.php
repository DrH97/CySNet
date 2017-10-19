@extends('layouts.appheader')
{{-- @include('inc.navbar') --}}

@section('content')

    <!-- TOP NAVIGATION BAR -->
    <header>

        <a href="#" id="title">TechCrowd <span id="subtitle">ACCOUNT</span></a>
        <div id="links">
            <a href="../profile">Profile</a>
            <a href="profile/update" style="color: black;background-color: skyblue;">Update</a>
            <a href="#" id="logout">Log out</a>
        </div>
        {{-- <div class="account">
            <p>John Doe</p>
            <img src="assets/images/sample.jpg" />
        </div> --}}

    </header>

    <!-- PROFILE BOX -->
    <div class="profile-box">
        <center>
            <div>
                <img src="{!! asset('images/sample.jpg') !!}" />
                <h3>Ensure your profile is always up-to-date</h3>
            </div>
        </center>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="update">

            <form method="post" action="#">

                <br>
                <fieldset>
                    <legend>About yourself</legend>
                    <br> <input type="file" name="profile_image" ><br><br>
                    <input type="text" placeholder="First name" name="fname" value="{!! Auth::user()->firstname !!}"><br>
                    <input type="text" placeholder="Last name" name="lname" value="{!! Auth::user()->lastname !!}"><br>
                </fieldset><br>

                <fieldset>
                    <legend>Yourself in institution</legend>
                    <br><input type="text" placeholder="Institution" name="institution"><br>
                    <input type="text" placeholder="Course" name="course"><br>
                    <input type="text" placeholder="Year" name="year"><br>
                    <input type="number" placeholder="Admission number" name="studentId"><br>
                </fieldset>

                <input type="submit" value="UPDATE PROFILE" name="submit"><br>

            </form><br>

            <form method="post" action="#">

                <br><br>
                <fieldset style="width: 95%;">
                    <legend>Change account credential</legend>
                    <br><input type="email" placeholder="Email" name="email" value="{!! Auth::user()->email !!}"><br>
                    <input type="password" placeholder="Password" name="password"><br>
                    <input type="password" placeholder="Re-type password" name="re_password"><br>
                </fieldset>
                
                <input type="submit" value="UPDATE ACCOUNT" name="submit"><br>

            </form>

        </div>

    </div>

    <script>
        //javascript stuff to go here
    </script>


@endsection
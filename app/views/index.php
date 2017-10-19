@extends('layouts.appheader')
@include('inc.navbar')

{{-- @section('bluebar') --}}
    <div class="description">
        <center>
            <div>
                <form method="post" action="#">
                    <input type="search" placeholder="Hey there, What are you looking for?">
                    <select>
                      <option selected="true" disabled="disabled">Category</option>
                      <option value="Cables">Cables</option>
                      <option value="Hard drive">Hard drive</option>
                      <option value="Flash drive">Flash drive</option>
                      <option value="Memory card">Memory card</option>
                      <option value="sth else">sth else</option>
                    </select>
                    <input type="submit" value="FIND">
                </form>
                
            </div>
        </center>
    </div> 
    
{{-- @endsection --}}

@section('content')

    <!-- CONTENT -->
    <div class="content">


        <!-- hardware items card -->
        <center>
            <div class="h-card">
                <div class="image">
                    <img src="{!! asset('images/sample.jpg') !!}" />
                </div>
                <div class="more">
                    <h3>Name of hardware item</h3>
                    <p>description this is a sample description of this hardware item. description this is a sample description of this hardware item. description this is a sample description of this hardware item.description this is a sample description of this hardware item</p>
                    <div class="bottom">
                        <button id="sellerBtn">About Seller</button>
                        <button id="cart">Add to cart</button>
                    </div>
                </div>
            </div>
        </center>


        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>

                <h3>About Seller</h3>

                <center>
                <div class="person">
                    <img src="assets/images/default-profile.png">
                    <div>
                        <h3>Name of seller</h3>
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
                </center>

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

        </div>


        <!-- loop to display hardware items, happens here -->



    </div>


    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("sellerBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>

    
@endsection
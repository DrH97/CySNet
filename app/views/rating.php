@extends('layouts.appheader')
@extends('inc.navbar')

@section('content')
   {{--  <!-- TOP NAVIGATION BAR -->
    <header>

        <a href="#" id="title">TechCrowd<span id="subtitle"> RATING</span></a>
        <div class="account">
            <p>LOGIN OR SIGNUP</p>
            <img src="assets/images/default-profile.png" />
        </div>

    </header> --}}

    <!-- CONTENT -->
    <div id="rating" class="content">
        
        <h3>Rate our sellers to help us improve our service to you.</h3>

        <form {{-- method="post" --}} action="{{-- route('index') --}}">
            <table>
                <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Seller Name</th>
                    <th>Item Bought</th>
                    <th>Rating</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>sth</td>
                    <td>sth sth</td>
                    <td>more sth</td>
                    <td>
                        <input id="one" type="radio" value="1" name="rating"><label for="one">1</label>
                        <input id="two" type="radio" value="2" name="rating"><label for="two">2</label>
                        <input id="three" type="radio" value="3" name="rating"><label for="three">3</label>
                        <input id="four" type="radio" value="4" name="rating"><label for="four">4</label>
                        <input id="five" type="radio" value="5" name="rating"><label for="five">5</label>
                    </td>
                </tr>


            </table>
            
            <input type="submit" value="RATE THE SELLER(S)">
            
        </form>

    </div>


@endsection
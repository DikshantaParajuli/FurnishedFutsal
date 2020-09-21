<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookings</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    
   <link href="{{ asset('/css/adminview.css') }}" rel="stylesheet">
    
<style>
  body {
  background-image: linear-gradient(#D9E4F5, #D7E1EC);
}
    .navbar{
    margin-left: -30px;
    margin-right: -14.5px;
    
}

    </style> 
    </head>
<body>
     @include('layouts.app')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <h3 class="text-info d-flex justify-content-center">My Bookings</h3>
            </div>
            <div class="col-lg-12">
            <h3 class="text-info">Today's Booking</h3>
            </div>
            <div class="col-lg-12">
                <table class="table table-striped" id="mybook">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Ground_Name</th>
                          <th scope="col">Booking Time</th>     
                        </tr>
                    </thead>
                    <tbody class="font-weight-bold">
                        @foreach ($todays as $todays)
                        <tr>
                        <td> {{ $todays->ground_name }} </td>
                        <td> {{ $todays->booked_time }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <h3 class="text-info">Future Booking</h3>
            </div>
            <div class="col-lg-12">
                <table class="table table-striped" id="mybook">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Ground_Name</th>
                          <th scope="col">Booked Date</th>
                          <th scope="col">Booked Time</th>
                        </tr>
                    </thead>
                    <tbody class="font-weight-bold">
                        @foreach ($futures as $futures)
                        <tr>
                        <td> {{ $futures->ground_name }} </td>
                        <td> {{ $futures->booked_date}} </td>
                        <td> {{ $futures->booked_time }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
                <div class="row">
            <div class="col-lg-12">
            <h3 class="text-info">Past Bookings</h3>
            </div>
            <div class="col-lg-12">
                <table class="table table-striped" id="mybook">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Ground_Name</th>
                          <th scope="col">Booked Date</th>
                          <th scope="col">Booked Time</th>
                        </tr>
                    </thead>
                    <tbody class="font-weight-bold">
                        @foreach ($pasts as $pasts)
                        <tr>
                        <td> {{ $pasts->ground_name }} </td>
                        <td> {{ $pasts->booked_date}} </td>
                        <td> {{ $pasts->booked_time }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
    </body>
    
</html>
<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="{{ asset('/css/adminview.css') }}" rel="stylesheet">
     <script>
    
        
$(document).ready(function(){

    // code to read selected table row cell data (values).
    $("#mybook").on('click','#btnSelect',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         var col0=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
        document.getElementById("gettingGround").value = col0;
    });
});
    
    </script> 
    

    </head>
<body>
        @include('admin.navbar')
    <div class="container-fluid">
             <div class="row">
                <div class="col-md-12">
                       @if(Session::has('message'))
            <div class="alert alert-success">
            <p class="mes">
               <strong>Message:</strong>{{Session::get('message')}}
            </p>
            </div>@endif
             @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li class="err">{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
                  </div>
        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="col-lg-6">
            <h3 class="text-info" id="bookingTime">Today's Booking</h3>
            </div>
            <div class="col-lg-6">
                 <form class="form-control mr-5" method="post" action="viewSold">
                     @csrf
                     
                     <div class="form-group">
                         <input type="text" class="form-group" placeholder="Search by Name, Date, Ground..." name="searchValue">
                         <input type="submit" class="form-group" value="submit">
                     </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped" id="mybook">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" hidden>Ground_Name</th>
                          <th scope="col">Ground_Name</th>
                          <th scope="col">Player_Name</th>
                          <th scope="col">Player_Email</th>
                          <th scope="col">Player_Contact</th>
                          <th scope="col">Booked Date</th>
                          <th scope="col">Booking Time</th>     
                          <th scope="col">Amount</th>    
                        </tr>
                    </thead>
                    <tbody class="font-weight-bold">
                        @foreach ($sale as $sale)
                        <tr>
                        <td hidden> {{ $sale->id }} </td>
                        <td> {{ $sale->ground_name }} </td>
                        <td> {{ $sale->player_name }} </td>
                        <td> {{ $sale->player_email }} </td>
                        <td> {{ $sale->player_contact }} </td>
                        <td> {{ $sale->booked_date }} </td>
                        <td> {{ $sale->booked_time }} </td>
                        <td> {{ $sale->amount }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
    
</body>
  
</html>

    
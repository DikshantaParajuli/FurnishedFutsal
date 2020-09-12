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
    body{
        background-color: #f2f2f2;
        opacity: 1;
        
    }
    .navbar{
    margin-left: -30px;
    margin-right: -14.5px;
    
}
    </style>
        <script>
    
        
$(document).ready(function(){

    // code to read selected table row cell data (values).
    $("#mytable").on('click','#btnSelect',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
        document.getElementById("gettingGround").value = col1;
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
            <div class="col-lg-12">
            <h3 class="text-info d-flex justify-content-center">Available Grounds.</h3>
            </div>
            <div class="col-lg-12">
                <table class="table grndtable" id="mytable">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Ground_Type</th>
                          <th scope="col">Ground_Name</th>
                          <th scope="col">Size</th>
                          <th scope="col">Price</th>
                          <th scope="col">Extra</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-primary">
                        @foreach ($grounds as $grounds)
                        <tr>
                        <td id="groundId">{{ $grounds->id}}</td>
                        <td> {{ $grounds->ground_type }} </td>
                        <td> {{ $grounds->ground_name }} </td>
                        <td> {{ $grounds->size }} </td>
                        <td> {{ $grounds->price }} </td>
                        <td> {{ $grounds->extra }} </td>
                        <td><button type="button" class="btn btn-success"   id="btnSelect"  data-toggle="modal"
                                    data-target="#staticBackdrop">Book</button>
                            
<!--                         -->
                               
                            
                            </td>
                       
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
        <div class="row">
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-control infoformmodal mt-4" method="post" action="/booking">
                        @csrf
                            <h2 class="d-flex justify-content-center">Provide Date and Time</h2>
                            <div class="form-group mt-3">
                                <h5>Date of Playing</h5>
                                <input type="date" class="form-control bg-light" name="date" required>
                            </div>
                            <div class="form-group">       
                              <input type="time" class="form-control" id="inputTime" name="time" min="06:00" max="19:00" step="3600">
                                <input type="text" id="gettingGround" name="ground_id" hidden>
                            </div>
                            <p id="getID"></p>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn-info" id="sub_btn">
                            </div>
                        </form>
      </div>
   
    </div>
  </div>
</div>
            </div>
      
    </div>
</body>

</html>

<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Grounds</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    
   <link href="{{ asset('/css/new.css') }}" rel="stylesheet">
    
<style>

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
     @include('layouts.app')
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
                <div class="col">
                    <h2 class="text-info d-flex justify-content-center">Available Grounds</h2>
                </div>    
            </div>
            
            @foreach($ground as $ground)
            <div class="row py-2">
                 
                <div class="col">
                   
                    <div class="wrapper">
                        <img id="slide" src="images/{{$ground->groundImage}}" />
                    </div>
                </div>
                <div class="col fade-in" id="slideLeft">
                    <h2 class="mt-5">Ground Type: &nbsp;&nbsp; <strong>{{$ground->ground_type}}</strong></h2>
                    <h2>Ground Name: &nbsp;&nbsp; <strong>{{$ground->ground_name}}</strong></h2>
                    <h4>Size: &nbsp;&nbsp; <strong>{{$ground->size}}</strong></h4>
                    <h4>Price: &nbsp;&nbsp; <strong>{{$ground->price}}</strong></h4>
                    <h6>Extra: &nbsp;&nbsp; <strong>{{$ground->extra}}</strong></h6>
                    <button type="button" class="btn btn-success d-block"   id="btnSelect"  data-toggle="modal"
                                    data-target="#staticBackdrop">Book Ground</button>
                </div>
                
            </div>
             @endforeach
            
            
            
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
<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookings</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                    <form class="form-control infoform mt-4" method="post" action="/admin/ground">
                        @csrf
                            <h2 class="d-flex justify-content-center">Add Futsal/Cricsal Information</h2>
                             <div class="form-group">       
                                <h5 for="select">Select Ground Type</h5>
                                <select class="form-control bg-light" name="ground_type">
                                    <option value="Futsal">Futsal</option>
                                    <option value="Cricsal">Cricsal</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control bg-light" id="ground" name="ground_name" placeholder="Ground Name" required>
                            </div>
                            <div class="form-group">       
                                <h5 for="select">Select Ground Size</h5>
                                <select class="form-control bg-light" name="size">
                                    <option value="Larger">Larger</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Small">Small</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-light" id="ground" name="price" placeholder="Price" pattern="[0-9]{4}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-light" id="ground" name="extra" placeholder="Extra">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn-info" id="sub_btn">
                            </div>
                        </form>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
            <h3 class="text-info d-flex justify-content-center">Available Grounds.</h3>
            </div>
            <div class="col-lg-12">
                <table class="table grndtable">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">S.N.</th>
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
                        <td> {{ $grounds->id }} </td>
                        <td> {{ $grounds->ground_type }} </td>
                        <td> {{ $grounds->ground_name }} </td>
                        <td> {{ $grounds->size }} </td>
                        <td> {{ $grounds->price }} </td>
                        <td> {{ $grounds->extra }} </td>
                        <td><button class="btn btn-warning"><a href="" class="text-white">Update</a></button></td>
                        <td><button class="btn btn-danger"><a href="delground/{{$grounds->id}}" class="text-white">Delete</a></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

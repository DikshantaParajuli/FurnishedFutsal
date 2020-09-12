<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Packages</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    
   <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div class="container-fluid">
   
        <div class="row">
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
         </div><br>
         <div class="d-flex justify-content-center">
     
    <h4 class=" font-weight-bold">Enter Package</h4><br>
       <button class="btn btn-warning d-inline-flex"><a href="/admin/admindashboard">Get Back to Dashboard</a></button>
    </div>

     <div class=" row col-lg-12 d-flex justify-content-center">
  <form class=" col-lg-6 signupform" method="post" action="/enterpackage">
          @csrf
      <br>
          <div class="form-group">
        
      <label for="name" class="labelname  font-weight-bold">Package Name:</label>
             <input id="name" type="text" class="form-control col-lg-8" name="packagename"  required autocomplete="name" autofocus>

    </div>


                <div class="form-group">
        
      <label for="purpose" class="labelname  font-weight-bold">Price:</label>
  <input id="name" type="text" class="form-control col-lg-8" name="price"  required autocomplete="name" autofocus>

    </div>

    <div class="d-flex justify-content-center">
     
     <button type="submit" class="btn btn-success btn-lg" id="enterevent">Submit</button>
   
 
    </div>
   <br>
  </form>
     </div>
     
     <div class="row col-lg-12 d-flex justify-content-center">
     
     <table class="table table-hover">
    <thead>
      <tr class="text-success">
        
        <th>PackageName</th>
    
          <th>Price</th>
    
      </tr>
    </thead>
    <tbody class="text-warning">
@foreach ($pack as $packs)
         <tr class="text-success">
 
             <td> {{ $packs->name}} </td>
      
        <td> {{ $packs->price}} </td>
        <td> <a href="updatepack/{{$packs->id}}">Update</a> </td>
        <td> <a href='delpack/{{$packs->id}}'>Delete</a> </td>
        </tr>
             @endforeach
         </tbody>
  </table>
        </div>

     
           </div> 
    </body>
</html>
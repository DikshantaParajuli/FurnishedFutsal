<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Expenses</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="{{ asset('/css/adminview.css') }}" rel="stylesheet">
   
    
    
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
                <div class="col-lg">
                <h2 class="text-success d-flex justify-content-center">Maintain Your Expenses...</h2>
                <form method="post" action="enter">
                    @csrf
                    
                     <table class="table expenseentry d-flex justify-content-center" id="dynamicTable">
                         <tbody class="text-primary">
                            <tr>
                            <td> <input type="text" class="form-control bg-light" name="itemName[]" placeholder="Name" required> </td>
                                <td> <input type="text" class="form-control bg-light" name="itemRate[]" placeholder="Rate" id="rate" required> </td>
                                <td> <input type="text" class="form-control bg-light" name="itemQuantity[]" placeholder="Quantity"  id="quantity" required> </td>
                                <td><button class="btn btn-success" id="addbtn" onClick="addBox()">+Field</button></td>
                            </tr>
                            
                         </tbody>
                    </table>
                    <div class="form-group mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>    
            </div>
        </div>
    
     <script>
    function addBox() {
        $("#dynamicTable").append('<tr><td><input type="text" class="form-control bg-light" name="itemName[]" placeholder="Name" required/></td><td>' + 
                '<input type="text" class="form-control bg-light" name="itemRate[]" placeholder="Rate" required> </td><td>' + '<input type="text" class="form-control bg-light" name="itemQuantity[]" placeholder="Quantity" required> </td>' +  '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    }
         
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
    </script>
    </body>
</html>

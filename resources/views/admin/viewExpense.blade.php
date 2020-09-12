<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>View Expenses</title>
    
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
            
            <div class="row mt-4">
                <div class="col-lg-6">
                    <h2 class="text-warning ml-5">Expense History</h2>
                </div>
                <div class="col-lg-6">
                    <form method="post" action="searchExpense">
                    @csrf

                      <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Search by: Name, Date" id="searchBox" name="searchValue">
                        </div>
                        <div class="col">
                         <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <table class="table grndtable">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Item Name</th>
                          <th scope="col">Rate</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Total</th>
                          <th scope="col">Bookeeper</th>    
                        
                        </tr>
                    </thead>
                    <tbody class="text-primary">
                        @foreach ($expenses as $expenses)
                        <tr>
                        <td> {{ $expenses->expense_date }} </td>
                        <td> {{ $expenses->item_name }} </td>
                        <td> {{ $expenses->rate }} </td>
                        <td> {{ $expenses->quantity }} </td>
                        <td> {{ $expenses->quantity*$expenses->rate }} </td>
                        <td> {{ $expenses->user_email }}</td>    

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            </div>
            
            
        </div>
    </body>
</html>

            
<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
   
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link href="{{ asset('/css/adminview.css') }}" rel="stylesheet">
   
    <style>
        body {
            background-color: #1a0000;
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
              @foreach($events as $events)
                <div class="card ml-4 mt-2" style="width:20%">
                <img src="/images/{{$events->firstImage}}" class="card-img-top related">
                    <div class="card-body">
                      <h4 class="card-title">{{ $events->eventName }}</h4>
                        <a href="/admin/delevent/{{ $events->id }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                @endforeach
            </div>
            
        
        </div>
    </body>
</html>

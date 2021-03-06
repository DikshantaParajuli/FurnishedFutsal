<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link href="{{ asset('/css/adminview.css') }}" rel="stylesheet">
   
    <style>
        body {
           
        } 

    </style>
    
</head>
    <body>
        @include('layouts.app')
        <div class="container-fluid">
            <div class="row">
              @foreach($event as $event)
                <div class="card ml-4 mt-2" style="width:40%">
                <img src="/images/{{$event->firstImage}}" class="card-img-top related">
                    <div class="card-body">
                      <h4 class="card-title">{{ $event->eventName }}</h4>
                      <a href="/eventDetails/{{$event->id}}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>

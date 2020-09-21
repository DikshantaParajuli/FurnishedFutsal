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
         
        } 

    </style>
    
</head>
    <body>
         @include('layouts.app')
        <div class="container-fluid">
            <div class="row">
               
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      @foreach($event as $event)
                      <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}"></li>
                         
                      @endforeach
                    </ol>
                      <div class="carousel-inner" role="listbox">
                        @foreach( $gallery as $gallery )
                           <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="/images/{{ $gallery->imageName }}" alt="eventImages">
                                  <div class="carousel-caption d-none d-md-block">
                                   
                                  </div>
                           </div>
                        @endforeach
                      </div>
                </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
               
            </div>
               <div class="row mt-5 ml-5" id="slideLeft">
                   @foreach($events as $events)
                  <div class="col">
                        <h3 class=" ml-5">Event Name:&nbsp;&nbsp;<b> {{$events->eventName}}</b></h3>
                    
                    
                        <h4 class=" ml-5">Start Date:&nbsp;&nbsp;<b> {{$events->startDate}}</b></h4>
                        <h4 class="ml-5">End Date:&nbsp;&nbsp;<b> {{$events->endDate}}</b></h4>
                  
                  
                        <h5 class="ml-5">Description:&nbsp;&nbsp;<b> {{$events->description}}</b></h5>
                  </div>
                      @endforeach
                </div>  
        </div>
    </body>
</html>

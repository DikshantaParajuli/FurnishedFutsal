@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-warning">My Bookings!!!</h1>
    <div class="row">
        <div class="col-lg">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Booked Date</th>
                        <th scope="col">Booked Time</th>
                        <th scope="col">Booked Ground</th>
                        
                    </tr>
                </thead>
           
            </table>
        </div>
    </div>
</div>
@endsection

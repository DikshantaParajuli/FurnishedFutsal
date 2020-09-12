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
                <tbody>
                    @foreach ($bookings as $bookings)
                    <tr>
                        <td> {{ $bookings->booked_Date }} </td>
                        <td>{{ $bookings->booked_Time }}</td>
                        <td>{{ $bookings->booked_Ground }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

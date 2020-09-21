<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
use App\Event;
use App\Gallery;

class ClientController extends Controller
{
    protected function viewEvent(){
        $event =  DB::table('events')->orderByDesc('endDate')->get();
        return view('client.clientEvent')->with('event', $event);
    }
    
    protected function eventDetails($id){
        $event =  DB::table('events')->where('id', '=', $id)->get();
        $events =  DB::table('events')->where('id', '=', $id)->get();
        $gallery = DB::table('galleries')->where('eventId', '=', $id)->get();
        return view('client.detailEvent')->with('event', $event)->with('events', $events)->with('gallery', $gallery);
    }
    
    protected function viewGrounds(){
        $ground =  DB::table('grounds')->orderByDesc('price')->get();
        return view('client.viewGrounds')->with('ground', $ground);
    }
}

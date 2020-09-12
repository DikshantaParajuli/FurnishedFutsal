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
}

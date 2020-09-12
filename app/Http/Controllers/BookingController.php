<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
use App\Book;
use App\Ground;
use App\User;
use DB;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index()
    {
         $grounds = DB::table('grounds')->get();
        return view('client.book', ['grounds' => $grounds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $this->validate($request,[
                'date' => 'required|date',
                'time' => 'required'
            ]);
        
        $todaydate = Carbon::now();   //getiing today's date
        $t = $todaydate->format('Y-m-d');  //fomatting timestamp into Y-M-D 

        //getting Booking information
        $date = $request->input('date');
        $ground_id = $request->input('ground_id');
        $time = $request->input('time');
        
        //getting grounds information
        $ground_name = DB::table('grounds')->where('id', '=', $ground_id)->value('ground_name');
        
        //getting 15 days after time
        $newtime = Carbon::now()->addDays(15);
        $forwarddate = $newtime->format('Y-m-d');
        
        
        
        $both = DB::table('books')->where('ground_name', '=', $ground_name)->where('booked_date', '=', $date)->where('booked_time', '=', $time)->exists();
        
        
        if(!Auth::check()){
            return redirect('/login');            
        }
        else{
                 if ($date < $t) {
                     return back()->withErrors(['date' => 'Sorry... Date already Expired']);
                }
            elseif($both==1){
                return back()->withErrors(['sorry' => 'Ground has been already in this Period']);
            }
            elseif($date>$forwarddate){
                return back()->withErrors(['sorry' => 'Sorry You are obliged to Book within 15 days of today']);
            }
                else{

                    //getting data of authenticated User
                    $id = \Auth::user()->id;
                    $user = DB::table('users')->where('id', '=', $id)->get();
                    foreach($user as $users )
                        $username = $users->name;
                        $useremail = $users->email;
                        $usercontact = $users->contact;
                    
                        $booking = new Book;
                        $booking->ground_name = $ground_name;
                        $booking->player_name = $username;
                        $booking->player_email = $useremail;
                        $booking->player_contact = $usercontact;
                        $booking->booked_Date = $date;
                        $booking->booked_Time = $time;
                       
                     
                        $booking->save();
                        return redirect('/booking')->with('message', 'Booking Confirmed!');
                    
                }
        }
       
        
        
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $todaydate = Carbon::now();   //getiing today's date
        $t = $todaydate->format('Y-m-d');  //fomatting timestamp into Y-M-D 
        
        $email = \Auth::user()->email;
        
        $todays = DB::table('books')->where('booked_date', '=', $t)->where('player_email', '=', $email)->get();
        $pasts = DB::table('books')->where('booked_date', '<', $t)->where('player_email', '=', $email)->get();
        $futures = DB::table('books')->where('booked_date', '>', $t)->where('player_email', '=', $email)->get();
        
        
        return view('client.myBook')->with( 'todays', $todays)->with('pasts', $pasts)->with('futures', $futures);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

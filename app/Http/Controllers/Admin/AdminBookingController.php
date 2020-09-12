<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Carbon\Carbon;
use App\Book;
use App\Sale;
use App\Ground;


class AdminBookingController extends Controller
{
     use AuthenticatesUsers;
    
       public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    protected function index(){
            $grounds = DB::table('grounds')->get();
        return view('admin.manualBook', ['grounds' => $grounds]);
        
    }
    protected function store(Request $request){
         $this->validate($request,[
                'playerName' => 'required|string',
                'playerContact' => 'required|numeric',
                'playerEmail' => 'email:rfc,dns',
                'date' => 'required|date',
                'time' => 'required'
            ]);
        
        $todaydate = Carbon::now();   //getiing today's date
        $t = $todaydate->format('Y-m-d');  //fomatting timestamp into Y-M-D 

        //getting Booking information
        $name = $request->input('playerName');
        $contact = $request->input('playerContact');
        $email = $request->input('playerEmail');
        $date = $request->input('date');
        $ground_name = $request->input('ground_name');
        $time = $request->input('time');
        
        //getting 15 days after time
        $newtime = Carbon::now()->addDays(15);
        $forwarddate = $newtime->format('Y-m-d');
        
         $both = DB::table('books')->where('ground_name', '=', $ground_name)->where('booked_date', '=', $date)->where('booked_time', '=', $time)->exists();
        
        if ($date < $t) {
                     return back()->withErrors(['date' => 'Sorry... Date already Expired']);
                }
            elseif($both==1){
                return back()->withErrors(['sorry' => 'Ground has been already Booked in this Period']);
            }
        elseif($date>$forwarddate){
                return back()->withErrors(['sorry' => 'Sorry You are obliged to Book within 15 days of today']);
            }
        else{
            $booking = new Book;
                        $booking->ground_name = $ground_name;
                        $booking->player_name = $name;
                        $booking->player_email = $email;
                        $booking->player_contact = $contact;
                        $booking->booked_Date = $date;
                        $booking->booked_Time = $time;
            
            $booking->save();
                        return redirect('admin/booking')->with('message', 'Booking Confirmed!');
        }
        
        
    }
    
    protected function viewBooking(){
         $todaydate = Carbon::now();   //getiing today's date
         $t = $todaydate->format('Y-m-d');  //fomatting timestamp into Y-M-D 
//         $book = DB::table('books')->where('booked_date', '=', $t)->orderBy('booked_time', 'ASC')->get();
        $book = DB::table('books')->orderBy('booked_time', 'ASC')->paginate(5);
        return view('admin.booking', ['book' => $book]);
    }
        protected function searchBooking(Request $request){
         $search = $request->input('searchValue');
            $book = Book::where('ground_name','LIKE','%'.$search.'%')
                ->orWhere('player_name','LIKE','%'.$search.'%')
                ->orWhere('booked_date', 'LIKE', '%'.$search.'%')
                ->orderBy('booked_date', 'DESC')
                ->distinct()
                ->get();
        
        $rescount = $book->count();
        if($rescount >= 1){
       return view('admin.booking')->with('book', $book)->with('tableHeading', 'Specific Booking');
            
        }
        else{
            return back()->withErrors(['sorry' => 'No Data Found']);
        }
        
    }

    
    protected function moveSales(Request $request){
        
        $bookId =$request->input('book_id');
        $getBook = DB::table('books')->where('id', '=', $bookId)->get();
            foreach ($getBook as $getBooks)
                $ground_name = $getBooks->ground_name;
                $player_name = $getBooks->player_name;
                $player_contact = $getBooks->player_contact;
                $player_email = $getBooks->player_email;
                $booked_date = $getBooks->booked_date;
                $booked_time = $getBooks->booked_time;
        $getGroundPrice = DB::table('grounds')->where('ground_name', '=', $ground_name)->value('price');
        $discount = $request->input('discount');
        $extra = $request->input('extra');
        
        if($discount<0 || !is_numeric($discount) || $extra<0 || !is_numeric($extra)){
            return redirect('admin/viewBooking')->withErrors(['sorry' => 'Please Enter Correct Numeric Value']);
        }
        else{
            $netprice = $getGroundPrice+$extra - $discount;
            $sale = new Sale;
                $sale->ground_name = $ground_name;
                $sale->player_name = $player_name;
                $sale->player_email = $player_email;
                $sale->player_contact = $player_contact;
                $sale->booked_date = $booked_date;
                $sale->booked_time = $booked_time;
                $sale->amount = $netprice;

                $sale->save();
                DB::table('books')->where('id', '=', $bookId)->delete();
                return redirect('admin/viewBooking')->with('message', 'Moved to Sales');
        
        }
        
    }
    protected function viewSales(){
         $todaydate = Carbon::now();   //getiing today's date
         $t = $todaydate->format('Y-m-d');  //fomatting timestamp into Y-M-D 
        $sale = DB::table('sales')->where('booked_date', '=', $t)->orderBy('booked_time', 'ASC')->get();
//        $book = DB::table('books')->orderBy('booked_time', 'ASC')->paginate(5);
        return view('admin.sales', ['sale' => $sale]);
    }
        
    protected function displaySearch(Request $request){
         $search = $request->input('searchValue');
            $sale = Sale::where('ground_name','LIKE','%'.$search.'%')
                ->orWhere('player_name','LIKE','%'.$search.'%')
                ->orWhere('booked_date', 'LIKE', '%'.$search.'%')
                ->distinct()
                ->get();
        
        $rescount = $sale->count();
        if($rescount >= 1){
       return view('admin.sales')->with('sale', $sale)->with('tableHeading', 'Specific Booking');
            
        }
        else{
            return back()->withErrors(['sorry' => 'No Data Found']);
        }
        
    }
}

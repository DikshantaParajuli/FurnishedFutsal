<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Expense;
use DB;

class ExpenseController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    protected function index(){
        return view('admin.addExpense');
    }
    
    protected function enterExpense(Request $request){

            $todaydate = Carbon::now();   //getiing today's date
            $t = $todaydate->format('Y-m-d');  //fomatting timestamp into Y-M-D 
            $email = \Auth::user()->email;
        
            $itemName = $request->input('itemName');
            $itemRate = $request->input('itemRate');
            $itemQuantity = $request->input('itemQuantity');

            for($i = 0 ; $i < count($itemName) ; $i++)
             {
               $itemNam = $itemName[$i];
               $itemRat = $itemRate[$i];
               $itemQuan = $itemQuantity[$i];
  
                $data = Validator::make($request->all(),[
                        "itemName.*"  => "required|string|distinct",
                        "itemRate.*"  => "required|numeric|gt:0",
                        "itemQuantity.*"  => "required|numeric|gt:0",
                    ]);
                if ($data->fails()) {
                    return redirect('/addExpense')
                        ->withErrors($data)
                        ->withInput();
                }
                else{
                 $expense = new Expense;
                    $expense->user_email = $email;
                    $expense->item_name = $itemName[$i];
                    $expense->rate = $itemRate[$i];
                    $expense->quantity = $itemQuantity[$i];
                    $expense->expense_date = $t;
                    
                    $expense->save();
                   
                }
                 
             }
        return redirect('addExpense')->with('message', 'Expense Registered ');

    }
    

    protected function viewExpense(){
        $todaydate = Carbon::now();   //getiing today's date
        $t = $todaydate->format('Y-m-d');  //fomatting timestamp into Y-M-D
        
        $expenses = DB::table('expenses')->where('expense_date', '=', $t)->orderBy('expense_date', 'ASC')->get();
        
       return view('admin.viewExpense')->with('expenses' , $expenses);
    }
    
    protected function searchExpense(Request $request){
        $search = $request->input('searchValue');
            $expenses = Expense::where('user_email','LIKE','%'.$search.'%')
                ->orWhere('item_name','LIKE','%'.$search.'%')
                ->orWhere('expense_date', 'LIKE', '%'.$search.'%')
                ->distinct()
                ->get();
        $rescount = $expenses->count();
        if($rescount >= 1){
            return view('admin.viewExpense')->with('expenses', $expenses)->with('tableHeading', 'Specific Booking');
            
        }
        else{
            return back()->withErrors(['sorry' => 'No Data Found']);
        }
    }
}


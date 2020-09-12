<?php
namespace App\Http\Controllers\Admin;



use App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Hash;


class RegisterController extends Controller
{
    
      //use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('cp.register');
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
        'contact' => 'required|min:5',
         'address' => 'required|string|max:255',
             'dob' => 'required|date',
        'email' => 'required|string|email|max:255|unique:admins',
         'password' => 'required|same:password_confirmation|min:1'
      ]);
        
        
        
        $users= new Admin;
        $users->name = $request->input('name');
        $users->contact = $request->input('contact');
         $users->address = $request->input('address');
        
        $users->dob = $request->input("dob");
         $users->email = $request->input("email");
        

        $users->password = bcrypt($request->input("password"));
       // $users->confirm=Input::get(Hash::make("confirm"));
        $users->save();
          return view('admin.adminlogin');
        
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

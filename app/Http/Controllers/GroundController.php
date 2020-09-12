<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Ground;
use DB;

class GroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }
    public function index()
    {
        $grounds = DB::table('grounds')->get();
        return view('admin.ground', ['grounds' => $grounds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
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
                'ground_type' => 'required',
                'ground_name' => 'required|unique:grounds',
                'size' => 'required',
                'price' => 'required'
            ]);
        
        if(!Auth::check()){
            return redirect('/admin');
        }
        else{
            $ground = new Ground;
            
            $ground->ground_type = $request->input('ground_type');
            $ground->ground_name = $request->input('ground_name');
            $ground->size = $request->input('size');
            $ground->price = $request->input('price');
            $ground->extra = $request->input('extra');
            
            $ground->save();
            return redirect('admin/ground')->with('message', ' Ground Details Entered Successfully');
            
        }
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('grounds')->where('id', '=', $id)->delete();
       return redirect('admin/ground')->with('message', ' Ground Details Deleted Successfully');
    }
}

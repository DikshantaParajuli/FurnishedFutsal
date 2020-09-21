<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Gallery;

class EventController extends Controller
{
    
    protected function index(){
        return view('admin.addEvent');
    }
    
    protected function addEvent(Request $request){
        
         $this->validate($request,[
                'eventName' => 'required|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date',
                'description' => 'required',
                 'images.*'  => 'required|image'
            ]);
        
        
        $eventName = $request->input('eventName');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $description = $request->input('description');
        $image=$request->file('images');
        
         $exist = DB::table('events')->where('eventName', '=', $eventName)->where('startDate', '=', $startDate)->where('endDate', '=', $endDate)->exists();
        
        if($startDate > $endDate){
             return back()->withErrors(['sorry' => 'Start Date must be before End Date!']);
        }
        elseif($exist==1){
                return back()->withErrors(['sorry' => 'The Event Already Exists!']);
            }
        else{
            $imageNamfirst = $image[0];
            $originalNamefirst = $imageNamfirst->getClientOriginalName();
            $new_name_first = $eventName."_".$startDate."_".$endDate."_".$originalNamefirst;
            //$imageNamfirst->move(public_path("images"),$new_name_first);
            
            $event = new Event;
            $event->eventName = $eventName;
            $event->startDate = $startDate;
            $event->endDate = $endDate;
            $event->description = $description;
            $event->firstImage = $new_name_first;
            $event->save();
            $eventId = $event->id;
            
            for($i = 0 ; $i < count($image) ; $i++)
             {
               $imageNam = $image[$i];
                $originalName=$imageNam->getClientOriginalName();
                    $new_name = $eventName."_".$startDate."_".$endDate."_".$originalName;
                    $imageNam->move(public_path("images"),$new_name);
                
                    $gallery = new Gallery;
                    $gallery->imageName = $new_name;
                    $gallery->eventId = $eventId;
                    $gallery->save();
                   
             }
           return redirect('addEvent')->with('message', 'Event Uploaded Successfully'); 
        }

    }
    
    protected function showEvent(){
        $events = DB::table('events')->get();
        return view('admin.showEvent')->with('events', $events);
    }
    protected function delEvent($id){
         DB::table('galleries')->where('eventId' ,'=' , $id)->delete();
        DB::table('events')->where('id', '=', $id)->delete();
       
        return redirect('admin/showEvent')->with('message', 'Event Deleted Successfully'); 
    }
}

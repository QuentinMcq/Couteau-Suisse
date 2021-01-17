<?php


namespace App\Http\Controllers;


use App\Models\EventAppointment;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect,Response;


class FullCalendarEventAppointmentMasterController extends Controller

{

    public function index()

    {
        return view('ent/rendez_vous');

    }
    public function store(){
        $dataEvent=request()->except(['_token','_method']);
        EventAppointment::insert($dataEvent);
        print_r($dataEvent);
    }

    public function show(){

        //$data['events']=EventAppointment::all();
        //$data['events']=EventAppointment::select('id','start','end','display')->where('userId','=',Auth::id())->get();
        //array_push($data['events'],EventAppointment::select('id','start','end','display')->where('userId','!=',Auth::id())->get());

        $data['events']=EventAppointment::select('id','title','start','end','display','userId','appointmentUserId','status','color')->where('userId','!=',Auth::id())->where('appointmentUserId','=',null)->get();
        //print_r($data);
        return response()->json($data['events']);
    }
    public function showOwn(){

        //$data['events']=EventAppointment::all();
        $data['events']=EventAppointment::select('id','title','start','end','display','userId','appointmentUserId','status','color')->where('appointmentUserId','=',Auth::id())->get();
        //array_push($data['events'],EventAppointment::select('id','start','end','display')->where('userId','!=',Auth::id())->get());

        //$data['events']=EventAppointment::select('id','start','end','display')->where('userId','!=',Auth::id())->get();
        //print_r($data);
        return response()->json($data['events']);
    }
    public function showall(){

        $data['events']=EventAppointment::all();
        //print_r($data);
        return response()->json($data['events']);
    }
    public function create(Request $request)

    {
        $insertArr = [ 'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'userId'=>Auth::id(),
            "appointmentUserId"=>null,
            'status'=>1,
            'color'=>"gray",
            'display'=>$request->display
        ];
        $event = EventAppointment::insert($insertArr);
        return Response::json($event);
    }
    public function createDispo(Request $request)

    {
        $insertArr = [ 'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'userId'=>Auth::id(),
            'display'=>$request->display
        ];
        $event = EventAppointment::insert($insertArr);
        return Response::json($event);
    }
    public function update(Request $request,$id)

    {

        $dataEvent=request()->except(['_token','_method']);
        $modif=EventAppointment::where('id','=',$id)->update($dataEvent);
        return response()->json($modif);
    }





    public function destroy($id)
    {
        $event = EventAppointment::findOrFail($id);
        EventAppointment::destroy($id);
        return response()->json($id);
    }

}

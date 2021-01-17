<?php


namespace App\Http\Controllers;


use App\Models\Event;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect,Response;


class FullCalendarEventMasterController extends Controller

{

    public function index()

    {
        return view('ent/agenda');

    }
    public function store(){
        $dataEvent=request()->except(['_token','_method']);
        Event::insert($dataEvent);
        print_r($dataEvent);
    }

    public function show(){

        $data['events']=Event::where('userId','=',Auth::id())->get();
        //print_r($data);
        return response()->json($data['events']);
    }

    public function create(Request $request)

    {
        $insertArr = [ 'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'userId'=>Auth::id(),
        ];
        $event = Event::insert($insertArr);
        return Response::json($event);
    }
    public function update(Request $request,$id)

    {

        $dataEvent=request()->except(['_token','_method']);
        $modif=Event::where('id','=',$id)->update($dataEvent);
        return response()->json($modif);
    }





    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        Event::destroy($id);
        return response()->json($id);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;


use App\Models\User;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    public function index()
    {

        $events = Event::all();
        return view('welcome');
    } 
    public function view()
    {      
       // $events =DB::select('SELECT * FROM events');
        //dd($events);
        $events = Event::all();
        

        return view('view
        ')->with('events',$events);
    }


    public function create()
    {
        return view('events.create');
    }





    public function sumario()
    {
        return view('sumario.index');
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $request->image->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();

        return redirect('/')->with('msg', 'Tarefa  criada com sucesso');

    }

    public function show($id){
        $this->middleware('auth');
        $event=Event::byUser(Auth::id())->get();
        $user=User::all();
        $lineas = lineas::all();
        $event= Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show',['event' =>$event,'eventOwner'=> $eventOwner]);
    }

   
}


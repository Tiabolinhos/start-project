<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;


class EventController extends Controller
{
    public function index(){

        $events =Event ::all ();
        return view('welcome');
    }


    public function create(){
        return view('events.create');
    }

    

    public function sumario(){
        return view('sumario.index');
    }
    
    public function store(Request $request){
        $event = new Event;
        $event->title =$request->title;
        $event->description =$request->description;
        $event->date =$request->date;

        if($request->hasFile('image')&& $request->file('image')->isValid()){

            $requestImage =$request->image;

            $extension=$requestImage->extension();

            $imageName=md5($requestImage->getClientOriginalName().strtotime("now"). ".".$extension);
            $request->image->move(public_path('img/events'),$imageName);
            $event->image= $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();

        return redirect('/')->with('msg','Tarefa  criada com sucesso');

       


    }
}

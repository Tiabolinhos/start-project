@extends('layouts.main')

@section('title','Tarefas')

@section('content')

<link rel="stylesheet" href="/css/style.css">

<div id="search-container">
  <h1>Procurar Tarefa</h1>
  <form action="">
    <input type="text" id="search" name="search" class="form-control" placeholder="procurar">
  </form>
</div>
<div id="events-container" class="col-md-12">
  <div id="cards-container" class="row">
    @foreach($events as $event)
    <div class="card col-md-3">
      <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
      <div class="card-body">

        <h5 class="card-title">{{$event->title}}</h5>
        <p class="card-text">{{$event->description}}</p>
        <a href="#" class="btn btn-primary">Saiba mais</a>

      </div>
      @endforeach
    </div>
  </div>
</div>




@endsection
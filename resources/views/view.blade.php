@extends('layouts.main')

@section('title','Tarefas')

@section('content')

<link rel="stylesheet" href="/css/style.css">

<div id="search-container"  class="row">
  <h1>Procurar Tarefa</h1>
  <form action="">
    <input type="text" id="search" name="search" class="form-control" placeholder="procurar">
  </form>
</div>
<div id="events-container">
  <div id="cards-container" class="row d-flex flex-row justify-content-around mb-3">
    @foreach($events as $event)
    <div class="card col-md-4">
      <div class="card-img">
        <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
    </div>
      <div class="card-body">

        <h5 class="card-title">{{$event->title}}</h5>
        <p class="card-text">{{$event->description}}</p>
        <a href="#" class="btn btn-primary">Saiba mais</a>

      </div>
      </div>
    @endforeach
  </div>
</div>




@endsection
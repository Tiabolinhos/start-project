@extends('layouts.main')

@section('title','Tarefas')

@section('content')

@foreach($events as $event)
<p>{{$event ->title}}-- {{ $event ->descrição}}</p>
@endforeach
@endsection
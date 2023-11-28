@extends('layouts.main')

@section('title','Criar Tarefa')

@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie sua Tarefa</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem para Tarefa:</label>
            <input type="file"id=image name="image" class="from-control-file">
           
        </div>
        <div class="form-group">
            <label for="title">Tarefa:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome da Tarefa">
        </div>
        
        <div class="form-group">
            <label for="title">Descrição da Tarefa:</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Descrição Tarefa">
        </div>
        <div class="form-group">
            <label for="title">Data de entrega:</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Data da entrega">
        </div>
        <input type="submit" class="btn btm-primary" value="Criar Tarefa">
    </form>
</div>

@endsection
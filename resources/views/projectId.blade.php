@extends('layouts.main')
@section('content')
@vite('resources/css/app.css')
    <div class="h-screen">
        <h1>{{ $projects->titulo }}</h1>
        <button><a href="/delete/{{ $projects->id }}">deletar</a></button>
        <button><a href="/update/{{ $projects->id }}">editar</a></button>
    </div>


@endSection
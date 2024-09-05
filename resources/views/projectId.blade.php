@extends('layouts.main')
@section('content')
@vite('resources/css/app.css')
    <div class="h-screen">
        <h1>{{ $projects->titulo }}</h1>
    </div>

@endSection
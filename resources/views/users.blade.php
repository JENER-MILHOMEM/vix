@extends('layouts.main')
@section('content')
@vite('resources/css/app.css')
    <h1>{{$user->name}}</h1>
    {{-- @foreach ($user as $users)
        <div class="flex justify-center text-3xl m-10"><h1>{{$users->name}}</h1></div>
            
        
    @endforeach --}}
@endSection
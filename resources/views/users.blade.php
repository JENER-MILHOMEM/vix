@extends('layouts.main')
@section('content')
@vite('resources/css/app.css')
<div class=" flex justify-center mt-16">
    <div class="flex space-x-28">
        <div class="flex flex-col text-center gap-6 ">
            <img src="{{$user->img}}" alt="img-user" class="w-64 rounded-full h-64">
            <h1 class="text-3xl font-bold">{{$user->name}}</h1>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="/users/edit/{{ $user->id }}">Editar Perfil</a>
            </button>
        </div>
        <div class="mt-10 flex flex-col gap-4 px-40 rounded border border-black bg-slate-100 ">
            <div class="    ">
                <h1>Meus projetos</h1>
            </div>
          
               <div class="grid grid-rows-2 grid-flow-col gap-4">
                    @foreach ($projetos as $projects)
                       <a href="/projetos/{{ $projects->id }}"> <div class="border border-black rounded-lg bg-white pr-24 flex flex-col gap-5">
                        <div class="text-blue-700 text-lg font-semibold pl-1">
                            <h1 class=" ">{{$projects->titulo}}</h1>
                        </div>
                        <div class="pl-1 flex space-x-1">
                           <p class="font-semibold">Orçamento:</p> <p>{{$projects->orçamento}}</p>
                        </div>
                    </div></a>
                    @endforeach
               </div>
          
        </div>
        
    </div>
</div>

@endSection
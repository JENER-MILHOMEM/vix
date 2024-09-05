@extends('layouts.main')
@section('content')
@vite('resources/css/app.css')
    
<div class="h-screen">
    <div class="flex justify-center space-x-40 m-10">
        <div class="text-3xl font-bold">
            <h1>Meus Projetos</h1>
        </div>
        <div class="m-2">
            <form action="/projetosGet" method="GET">
                <input type="text" name="search" id="search" placeholder="Pesquisar projeto" value="{{ $search }}" class="px-1 w-64 bg-slate-200">
               
            </form>
        </div>
    </div>
    <div class="flex justify-center text-1xl">
        @if ($search)
            <h1>Resultados para: <span class="text-2xl ">"{{ $search }}"</span></h1>
        @endif
    </div>
    <div class="flex justify-center text-3xl m-10">
         @if ($projetos->count() == 0)
            <h1>Não existem projetos com o titulo "{{ $search }}"</h1>
        @endif
    </div>
   <div class="flex space-x-7 justify-center m-10">
       
        @foreach ($projetos as $projeto)
             
            <div class="flex flex-col gap-2 font-bold  border border-black px-4 py-5  rounded-lg t">
                <img src="{{ $projeto->img }}" alt="img" class="w-64 rounded-lg h-64">  
                <div class="bg-slate-300 text-black px-1 rounded-sm">
                    <p class="text-center">{{ $projeto->titulo }}</p>
                </div>
                <p>Descrição: {{ $projeto->descricao }}</p>
                <p>Orçamento: {{ $projeto->orçamento }}</p>
                <div class="flez text-center transition duration-300 hover:scale-105">
                    <button>
                        <a href="/projetos/{{ $projeto->id }}" class="border border-black rounded px-1 py-1 ">saber mais</a>
                    </button>
                </div>
            </div>
        
        @endforeach
   </div>
</div>
@endSection
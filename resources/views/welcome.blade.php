@extends('layouts.main')
@section('content')
@vite('resources/css/app.css')
    <div class="container flex h-screen justify-center py-28 space-x-40">
        <div class="flex flex-col gap-3 text-justify py-36 pl-96  ">
            <h1 class="text-3xl font-bold">Boa vindas ao <span class="text-blue-600">Vix</span></h1>
            <h1 class="">Gerencie seus projetos com facilidade, mantendo orçamentos,<br> planos e muito mais organizados em um só lugar. O Vix simplifica a administração e a coordenação,<br> garantindo que todas as informações essenciais estejam sempre ao seu alcance</h1>
            <div class=" transition duration-200  hover:scale-110 border w-28 text-center bg-blue-600 text-white rounded py-1">
                <a href="/dashboard"><button>Saiba mais</button></a>
            </div>
        </div>
        <div class="w-2/3 animate-fade-left animate-fade-right animate-once animate-duration-[5000ms] animate-delay-[400ms]">
            <img src="{{asset('img/post.png')}}" alt="">
        </div>
    </div>
@endSection

@extends('layouts.main')
@vite('resources/css/app.css')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 lg:px-8 h-screen">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Crie um projeto</h2>
  </div>

  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/projetos/create" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="border border-black text-center py-16 rounded-lg bg-slate-200"> 
        <input type="file" name="img" id="img" class="opacity-0 absolute p-10 w-max h-max">
        <h1>Upload</h1>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Titulo</label>
        <div class="mt-2">
          <input id="titulo" name="titulo" type="text"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Descriação</label>
        <div class="mt-2">
          <input id="descricao" name="descricao" type="text"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Orçamento</label>
          
        </div>
        <div class="mt-2 pb-2">
          <input id="orçamento" name="orçamento" type="number" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">criar</button>
      </div>
    </form>

   
  </div>
</div>
@endsection
@extends('layouts.main')
@section('content')
@vite('resources/css/app.css')

<h1>Editar Perfil</h1>

<!-- Exibindo mensagens de sucesso ou erro -->
<form action="/users/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Isso especifica que o método da requisição será PUT -->

    <div>
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
    </div>

    <div>
        <label for="profile_picture">Foto de Perfil:</label>
        <input type="file" name="img" id="img">
    </div>

    <button >Atualizar Perfil</button>
</form>



@endSection
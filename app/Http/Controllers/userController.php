<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\projects;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{

    public function getUsers()
    {
        $user = Auth::user();
        $projetos = Projects::where('user_id', auth()->id())->get();
        return view('users', compact('user'), compact('projetos'));
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('update', compact('user'));
    }
    public function update(Request $request)
    {
        // Encontrar o usuário pelo ID fornecido
        $user = User::findOrFail($request->id);
    
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Preparar os dados para atualização
        $data = $request->only('name'); // Somente o nome é obrigatório, outros campos podem ser opcionais
    
        // Processar a imagem, se fornecida
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imagens/projects'), $imageName);
    
            // Atualizar o caminho da imagem
            $data['img'] = 'imagens/projects/' . $imageName;
        } else {
            // Define um caminho para uma imagem padrão, se nenhuma nova imagem for fornecida
            $data['img'] = 'imagens/default/default.jpeg';
        }
    
        // Atualizar o usuário com os dados fornecidos
        $user->update($data);
    
        return redirect('/users')->with('success', 'Perfil atualizado com sucesso!');
    }

    

}

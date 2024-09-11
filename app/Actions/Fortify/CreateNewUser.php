<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Actions\Fortify\Storage;
use App\Models\Projects;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'img' => ['image', 'nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ])->validate();
    
        // Processamento da imagem
        if (request()->hasFile('img') && request()->file('img')->isValid()) {
            $image = request()->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imagens/users'), $imageName);
            $input['img'] = 'imagens/users/' . $imageName;
        } else {
            // Define um caminho para uma imagem padrão
            $input['img'] = 'imagens/default/default.jpeg';
        }
    
    
        // Criando o usuário e salvando no banco de dados
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'img' => $input['img'], 
        ]);
    }
    
    /* public function update(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Obter o usuário autenticado
        $user = Auth::user();

        // Atualizar o nome
        $user->name = $request->input('name');

        // Processar o upload da imagem
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imagens/projects'), $imageName);
    
            // Adicionando o caminho da imagem ao array de dados validados
            $validated['img'] = 'imagens/projects/' . $imageName;
        } else {
            // Define um caminho para uma imagem padrão
            $validated['img'] = 'imagens/default/default.jpeg';
        }

        // Salvar as alterações no banco de dados
        

        // Retornar uma resposta, por exemplo, redirecionar com sucesso
        return redirect()->back()->with('status', 'Perfil atualizado com sucesso!');
    } */
}


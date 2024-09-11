<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Database\Migrations\Migration;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class testsController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function login()
    {
       
    return view('login');
    }
    public function projetc(){
        return view('createProjeto');
    }
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required|max:255',
            'orçamento' => 'required|max:255',
            'img' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        // Processamento da imagem
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
    
        // Adicionando o user_id ao array de dados validados
        $validated['user_id'] = auth()->id();
    
        // Criar o projeto usando Projects::create e passando os dados validados
        $project = Projects::create($validated);
    
        return redirect('/projetosGet')->with('success', 'Projeto criado com sucesso!');
    }
    public function getProjects()
{
    // Obtém o termo de busca
    $search = request('search');   

    // Verifica se há uma busca
    if ($search) {
        // Busca pelos projetos com o título correspondente ao termo e vinculados ao usuário autenticado
        $projetos = Projects::where('user_id', auth()->id())
                    ->where('titulo', 'like', '%' . $search . '%')
                    ->get();
    } else {
        // Obtém todos os projetos do usuário autenticado
        $projetos = Projects::where('user_id', auth()->id())->get();
    }

    // Retorna a view 'project' passando os projetos e o termo de busca
    return view('project', ['projetos' => $projetos, 'search' => $search]);
}    public function showProjects($id)
    {
        $projects = Projects::findOrFail($id);

        return view('projectId', compact('projects'));
    }
    
    public function destroy($id)
    {
        projects::findOrFail($id)->delete();
        return redirect('/projetosGet')->with('success', 'Projeto excluído com sucesso!');
    }
}

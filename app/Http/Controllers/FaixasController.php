<?php

namespace App\Http\Controllers;

use App\Models\Faixa; // Certifique-se de importar o modelo Faixa

use Illuminate\Http\Request;

class FaixasController extends Controller
{

    
    public function create(){
        return view('faixas.create');
    }
    
    public function store(Request $request){
        // Validação dos dados recebidos do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'duracao' => 'required|string|max:10',
            'album_id' => 'required|exists:albums,id' // Certifique-se de que album_id é enviado e existe na tabela de álbuns
        ]);
    
        // Adicionando 'album_id' aos dados recebidos do formulário
        $data = $request->only(['titulo', 'duracao']); // Apenas obtemos os campos titulo e duracao
    
        // Adiciona manualmente 'album_id' aos dados
        $data['album_id'] = $request->album_id;
    
        // Cria uma nova faixa com os dados recebidos, incluindo 'album_id'
        Faixa::create($data);
    
        // Redireciona para a página de edição do álbum após a criação da faixa
        return redirect()->route('albums-edit', ['id' => $request->album_id])->with('success', 'Faixa adicionada com sucesso.');
    }
    
    
    

    public function edit($id){
        $album = Album::findOrFail($id);
        $search = request()->input('search'); // Obtém o termo de pesquisa
        $faixas = $album->faixas(); // Obtém as faixas do álbum
        if ($search) {
            $faixas = $faixas->where('titulo', 'like', "%$search%"); // Filtra as faixas com base na pesquisa
        }
        $faixas = $faixas->get(); // Obtém as faixas filtradas
        return view('albums.edit', compact('album', 'faixas', 'search'));
    }
    
    public function update(Request $request, $id){
        $data = [
            'titulo' => $request->titulo,
            'duracao' => $request->duracao,
            // Adicione outros campos que precisam ser atualizados
        ];
        Faixa::where('id', $id)->update($data);
        return redirect()->route('faixas-index');
    }
    
    public function destroy($id){
        Faixa::findOrFail($id)->delete(); // Use findOrFail para encontrar e excluir a faixa pelo ID
        return redirect()->route('albums-index');
    }
    
    public function search(Request $request, $id)
{
    // Obtenha o álbum pelo ID
    $album = Album::findOrFail($id);

    // Realize a pesquisa
    $searchTerm = $request->input('search');
    $faixas = $album->faixas()->where('titulo', 'like', '%'.$searchTerm.'%')->get();

    // Retorne a view com os resultados da pesquisa
    return view('faixas.search', compact('album', 'faixas'));
}

}


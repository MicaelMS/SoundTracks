<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::all(); // Busca todos os álbuns do banco de dados
        return view('albums.index', ['albums' => $albums]); // Passa os álbuns para a view
    }
    public function create(){
        return view('albums.create');
    }
public function store(Request $request){
    $request->validate([
        'titulo' => 'required|string|max:255',
        'artista' => 'required|string|max:255',
        'ano_criacao' => 'required|integer|min:1900|max:'.date('Y'),
    ]);

    Album::create($request->all());
    return redirect()->route('albums-index');
}

public function edit($id){
    $albums = Album::where('id',$id)->first();
    if(empty($albums)){
        $albums = []; // Define $albums como um array vazio
    }
    return view('albums.edit', ['albums' => $albums]);
}

    
    public function update(Request $request, $id){
        $data = [
            'titulo' => $request->titulo,
            'artista' => $request->artista,
            'ano_criacao' => $request->ano_criacao,
        ];
        Album::where('id',$id)->update($data);
        return redirect()->route('albums-index');
    }
    public function destroy($id){
        Album::where('id',$id)->delete();
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
        return view('albums.edit', compact('album', 'faixas'));
    }

    public function searchFaixas(Request $request, $id)
{
    $album = Album::findOrFail($id);

    $searchTerm = $request->input('search');
    $faixas = $album->faixas()->where('titulo', 'like', '%'.$searchTerm.'%')->get();

    return view('faixas.search_faixas', compact('album', 'faixas', 'searchTerm'));
}

public function searchAlbums(Request $request)
{
    $search = $request->get('search');
    $albums = Album::where('titulo', 'like', '%' . $search . '%')->get();

    return view('albums.search_albums', compact('albums'));
}

}

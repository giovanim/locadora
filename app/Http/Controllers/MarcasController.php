<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 protected $marcas;


  public function __construct(Marcas $marcas)
{
    $this->marcas = $marcas;
}


    public function index()
    {
         $marcas = $this->marcas::paginate(3);
            return response()->json([
                  'success' => true,
                   'message' => 'Marcas listadas com sucesso',
                   'data' => $marcas->items(),
                   'pagination' => [
                      'total' => $marcas->total(),
                      'per_page' => $marcas->perPage(),
                      'current_page' => $marcas->currentPage(),
                      'last_page' => $marcas->lastPage(),
                      'next_page_url' => $marcas->nextPageUrl(),
                      'prev_page_url' => $marcas->previousPageUrl(),
                ]
            ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         //


    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
   
{
 
    try {

        $regras = $this->marcas->rules();
        $feedback = $this->marcas->feedback();

        $request->validate($regras, $feedback);

        $caminho = $request->file('imagem')->store('marcas', 'public');

        $marca = $this->marcas::create([
            'nome' => $request->nome,
            'imagem' => $caminho
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Marca cadastrada com sucesso!',
            'data' => $marca
        ], 201);

    } catch (\Illuminate\Validation\ValidationException $e) {

        throw $e;

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Não foi possível cadastrar a marca.',
            'error' => $e->getMessage()
        ], 500);
    }
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

          $marcas = $this->marcas::find($id);

           if(!$marcas){
                return response()->json([
                    'success' => false,
                    'message' => 'Não foi encontrado.',
              ], 404);
           }

             return response()->json([
                'success' => true,
                'message' => 'Encontrado com sucesso!.',
                'data' => [

                'id' => $marcas->id,
                'nome' => $marcas->nome,
                'imagem' => $marcas->imagem,

                ]


             ],200);     
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marcas $marcas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // Busca a marca
        $marca = $this->marcas::find($id);

        if (!$marca) {
            return response()->json([
                'success' => false,
                'message' => 'Marca não encontrada'
            ], 404);
        }

        // Identifica o método HTTP
        $method = $request->isMethod('PATCH') ? 'PATCH' : 'PUT';

        // Validação
        $dados = $request->validate(
            $marca->rules($id, $method),
            $marca->feedback()
        );

        // Atualiza somente os campos validados
        $marca->update($dados);

        return response()->json([
            'success' => true,
            'message' => 'Marca atualizada com sucesso',
            'data' => $marca
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marcas = $this->marcas::find($id);

        if (!$marcas) {
            return response()->json([
                'success' => false,
                'message' => 'Marca não encontrada'
            ], 404);
        }

        $marcas->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Removido com sucesso'
        ], 200);
    }

}

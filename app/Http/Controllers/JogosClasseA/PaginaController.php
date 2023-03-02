<?php

namespace App\Http\Controllers\JogosClasseA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Esportes;

class PaginaController extends Controller
{
    /**
     * Página inicial.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return view home
     */
    public function home()
    {
        return view('jogosClasseA.home');
    }

    /**
     * Página galeria.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return view galeria
     */
    public function galeria()
    {
        return view('jogosClasseA.galeria');
    }

    /**
     * Página esportes.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return view esportes|object $esportes
     */
    public function esportes()
    {
        // Buscar todos os esportes ativos.
        $esportes = Esportes::where('status', 1)->get();

        return view('jogosClasseA.esportes', compact('esportes'));
    }

    /**
     * Página esporte.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return view esporte|object $esporte
     */
    public function esporte($id)
    {
        // Buscar esporte pelo id e suas categorias, times, times_pessoas e pessoas.
        $esporte = Esportes::with(array('categorias'=>function($query){
                        $query->with(array('times'=>function($query){
                            $query->with(array('times_pessoas'=>function($query){
                                $query->with(array('pessoas'=>function($query){
                                    $query->where('status', '1')
                                          ->select('id', 'nome', 'sobrenome', 'delegacoes_id', 'status');
                                }))->where('status', '1')
                                   ->select('id', 'times_id', 'pessoas_id', 'status');
                            }))->where('status', '1')
                               ->select('id', 'medalha', 'categorias_id', 'delegacoes_id', 'status');
                            $query->with(array('delegacoes'=>function($query){
                                $query->where('status', '1')
                                      ->select('id', 'nome', 'status');
                            }))->where('status', '1')
                               ->select('id', 'medalha', 'categorias_id', 'delegacoes_id', 'status');
                        }))->where('status', '1')
                           ->select('id', 'tipo', 'esportes_id', 'status');
                        $query->with(array('jogos'=>function($query){
                            $query->with(array('time_1'=>function($query){
                                $query->with(array('delegacoes'=>function($query){
                                    $query->where('status', '1')
                                          ->select('id', 'nome', 'status');
                                }))->where('status', '1')
                                   ->select('id', 'medalha', 'delegacoes_id', 'status');
                            }))->where('status', '1')
                               ->orderBy('fase')
                               ->select('id', 'fase', 'times_1', 'placar_1', 'times_2', 'placar_2', 'categorias_id', 'status');
                            $query->with(array('time_2'=>function($query){
                                $query->with(array('delegacoes'=>function($query){
                                    $query->where('status', '1')
                                          ->select('id', 'nome', 'status');
                                }))->where('status', '1')
                                   ->select('id', 'medalha', 'delegacoes_id', 'status');
                            }))->where('status', '1')
                               ->orderBy('fase')
                               ->select('id', 'fase', 'times_1', 'placar_1', 'times_2', 'placar_2', 'categorias_id', 'status');
                        }))->where('status', '1')
                           ->select('id', 'tipo', 'esportes_id', 'status');
                    }))->where('status', '1')
                       ->where('id', $id)
                       ->get();  
        dd($esporte);

        return view('jogosClasseA.esporte', compact('esporte'));
    }

    /**
     * Página cronograma.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return view cronograma
     */
    public function cronograma()
    {
        return view('jogosClasseA.cronograma');
    }

    /**
     * Página inscrições.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return view inscricoes
     */
    public function inscricoes()
    {
        return view('jogosClasseA.inscricoes');
    }
}

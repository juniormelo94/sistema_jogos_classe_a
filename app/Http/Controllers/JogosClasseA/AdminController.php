<?php

namespace App\Http\Controllers\JogosClasseA;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Categorias;
use App\Models\Delegacoes;
use App\Models\Esportes;
use App\Models\JogosCategorias;
use App\Models\Pessoas;
use App\Models\Times;
use App\Models\TimesPessoas;

use App\Domain\DomainPessoas;
use App\Domain\DomainJogos;

class AdminController extends Controller
{
    /**
     * Acesso admin.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return view esportes|object $esportes
     */
    public function acessoAdmin(Request $request)
    {
        try {
            // Validar dados.
            $validate = Validator::make(
                $request->all(), 
                [
                    'cpf' => 'required|min:14|max:14',
                    'senha' => 'required',
                ], 
                [
                    'cpf.required' => '*O campo <b>CPF</b> é obrigatório',
                    'cpf.min' => '*O <b>CPF</b> deve ter pelo menos 11 números',
                    'cpf.max' => '*O <b>CPF</b> não pode ter mais de 11 números',
                    'senha.required' => '*O campo <b>Senha</b> é obrigatório',
                ]
            );

            // Se existir problemas, retorne para o inicio com as mensagens de erros.
            if ($validate->fails()) {
                return (new Response([
                      'status' => 'error',
                      'title' => 'Ops',
                      'message' => 'Por favor, preencha os campos corretamente',
                      'errors' => $validate->errors(),
                    ], 500))->header('Content-Type', 'json');
            }

            // Buscar pessoas que possua esse cpf.
            $pessoa = Pessoas::where('cpf', $request->cpf)->first();
            // Remover pontos e traço do CPF.
            $senha = str_replace(['.', '-'], '', $pessoa->cpf);

            // Validar acesso.
            if ($request->cpf == $pessoa->cpf &&
                $request->senha == $senha &&
                $pessoa->funcao == 'Admin Delegação - Atleta' || 
                $pessoa->funcao == 'Admin Delegação - Torcedor') 
            {
                // Criar sessão.
                Session::put([
                    'id'            => $pessoa->id,
                    'nome_completo' => $pessoa->nome_completo,
                    'nome'          => $pessoa->nome,
                    'sobrenome'     => $pessoa->sobrenome,
                    'cpf'           => $pessoa->cpf,
                    'data_nasc'     => $pessoa->data_nasc,
                    'sexo'          => $pessoa->sexo,
                    'celular'       => $pessoa->celular,
                    'email'         => $pessoa->email,
                    'idade'         => $pessoa->idade,
                    'img'           => $pessoa->img,
                    'funcao'        => $pessoa->funcao,
                    'delegacoes_id' => $pessoa->delegacoes_id,
                    'status'        => $pessoa->status,
                ]);

                return (new Response([
                      'status' => 'success',
                      'title' => 'Feito',
                      'message' => 'Acesso validado com sucesso',
                      'url_redirect' => route('admindelegacao', $pessoa->delegacoes_id),
                    ], 200))->header('Content-Type', 'json');
            } elseif($request->cpf == $pessoa->cpf &&
                $request->senha == $senha &&
                $pessoa->funcao == 'Admin Geral - Atleta')
            {
                // Criar sessão.
                Session::put([
                    'id'            => $pessoa->id,
                    'nome_completo' => $pessoa->nome_completo,
                    'nome'          => $pessoa->nome,
                    'sobrenome'     => $pessoa->sobrenome,
                    'cpf'           => $pessoa->cpf,
                    'data_nasc'     => $pessoa->data_nasc,
                    'sexo'          => $pessoa->sexo,
                    'celular'       => $pessoa->celular,
                    'email'         => $pessoa->email,
                    'idade'         => $pessoa->idade,
                    'img'           => $pessoa->img,
                    'funcao'        => $pessoa->funcao,
                    'delegacoes_id' => $pessoa->delegacoes_id,
                    'status'        => $pessoa->status,
                ]);

                return (new Response([
                      'status' => 'success',
                      'title' => 'Feito',
                      'message' => 'Acesso validado com sucesso',
                      'url_redirect' => route('admindelegacao', $pessoa->delegacoes_id),
                    ], 200))->header('Content-Type', 'json');
            }

            return (new Response([
                  'status' => 'warning',
                  'title' => 'Aviso',
                  'message' => 'Acesso negado',
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema para validar o acesso',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Página admin delegação.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return view admin
     */
    public function adminDelegacao($id)
    {
        // Verificar sessão.
        if (!Session::has('nome_completo'))
        {
            return redirect()->route('/');
        }

        // Buscar todos os delegações ativas.
        $delegacoes = Delegacoes::where('status', 1)
                                ->orderBy('nome', 'asc')
                                ->pluck('nome','id');
        $delegacoes->prepend('DELEGAÇÃO', '');
        // Buscar todos os esportes ativos.
        $esportes = Esportes::select('id', 'nome', 'turno', 'qtd_pessoas_min', 'qtd_pessoas_max')
                           ->where('status', 1)
                           ->get();
        // Array com funções.
        if (Session::get('funcao') == 'Admin Geral - Atleta') {
          $funcoes = DomainPessoas::arrayTodasFuncoes();
        } else {
          $funcoes = DomainPessoas::arrayFuncoes();
        }

        return view('jogosClasseA.adminDelegacao', compact('delegacoes', 'esportes', 'funcoes', 'id'));
    }

    /**
     * Criar ou editar pessoa.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json sucesso|erro
     */
    public function criarEditarPessoa(Request $request)
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Validar dados.
            $validate = Validator::make(
                $request->all(), Pessoas::rules($request->id), Pessoas::messages()
            );

            // Se existir problemas, retorne para o inicio com as mensagens de erros.
            if ($validate->fails()) {
                return (new Response([
                      'status' => 'error',
                      'title' => 'Ops',
                      'message' => 'Por favor, preencha os campos corretamente',
                      'errors' => $validate->errors(),
                    ], 500))->header('Content-Type', 'json');
            }

            // Salvar dados no banco de dados.
            $atualizarOuCriarPessoa = Pessoas::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'nome_completo' => $request->nome_completo,
                    'nome'          => $request->nome,
                    'sobrenome'     => $request->sobrenome,
                    'cpf'           => $request->cpf,
                    'data_nasc'     => $request->data_nasc,
                    'sexo'          => $request->sexo,
                    'celular'       => $request->celular,
                    'email'         => $request->email,
                    'idade'         => $request->idade,
                    'img'           => '',
                    'funcao'        => $request->funcao,
                    'delegacoes_id' => $request->delegacoes_id,
                    'status'        => $request->status,
                ],
            );

            // Sucesso!
            DB::commit();

            // Verifique se a pessoa foi criada.
            if ($atualizarOuCriarPessoa->wasRecentlyCreated) {
                return (new Response([
                      'status' => 'success',
                      'title' => 'Feito',
                      'message' => 'Participante cadastrado com sucesso',
                    ], 200))->header('Content-Type', 'json');
            }

            return (new Response([
                  'status' => 'success',
                  'title' => 'Feito',
                  'message' => 'Participante atualizado com sucesso',
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema para concluir o processo',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Visualizar pessoa.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return json $pessoas
     */
    public function visualizarPessoa($id)
    {
        try {
            // Buscar pessoas com esse id.
            $pessoa = Pessoas::find($id);

            return (new Response([
                  'data' => $pessoa,
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Deletar pessoa.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return json $pessoas
     */
    public function deletarPessoa($id)
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Buscar pessoas com esse id.
            $pessoa = Pessoas::find($id);

            // Deletar colaborador no banco de dados.
            $pessoa->delete();

            // Sucesso!
            DB::commit();

            return (new Response([
                  'status' => 'success',
                  'title' => 'Feito',
                  'message' => 'Participante deletado com sucesso',
                ], 200))->header('Content-Type', 'json');


        } catch (\Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema para deletar o participante',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Listar pessoas.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json $pessoas
     */
    public function listarPessoasDelegacao()
    {
        try {
            // Buscar todos os pessoas ativas menos o admin.
            $pessoas = Pessoas::orderBy('nome_completo', 'asc')
                              // Verifique se é admin geral.
                              ->when(Session::get('funcao') != 'Admin Geral - Atleta', function ($query) {
                                  $query->where('delegacoes_id', Session::get('delegacoes_id'))
                                        ->whereNotIn('funcao', [
                                          'Admin Geral - Atleta',
                                          'Admin Delegação - Atleta',
                                          'Admin Delegação - Torcedor',
                                        ]);
                              })
                              ->get();

            return (new Response([
                  'data' => $pessoas,
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

        /**
     * Listar pessoas.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json $pessoas
     */
    public function listarPessoasSeguro()
    {
        try {
            // Buscar todos os pessoas ativas menos o admin.
            $pessoas = Pessoas::orderBy('nome_completo', 'asc')->get();

            foreach ($pessoas as $key => $pessoa) {
              print_r($pessoa->nome_completo);
              print_r(' - ');
              print_r($pessoa->data_nasc);
              print_r(' - ');
              print_r($pessoa->cpf);
              print_r('<br>');
            }

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Buscar categorias.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return json $categorias
     */
    public function getCategorias($id)
    {
        try {
            // Buscar categorias com esportes_id.
            $categorias = Categorias::where('esportes_id', $id)->pluck('tipo', 'id');

            return (new Response([
                  'data' => $categorias,
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Buscar pessoas.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return json $pessoas
     */
    public function getPessoas($categoria)
    {
        try {
            $sexo = [];
            // Tipos de categorias.
            switch ($categoria) {
                case 'Masculina':
                    $sexo = ['Masculino'];
                    break;
                case 'Feminina':
                    $sexo = ['Feminino'];
                    break;
                case 'Mista':
                    $sexo = ['Masculino', 'Feminino'];
                    break;
            }

            // Buscar pessoas com essa categoria.
            $pessoas = Pessoas::select('id', 'nome', 'sobrenome')
                              ->whereIn('funcao', [
                                'Admin Geral - Atleta',
                                'Admin Delegação - Atleta',
                                'Participante - Atleta',
                              ])
                              ->whereIn('sexo', $sexo)
                              // Verifique se é admin geral.
                              ->when(Session::get('funcao') != 'Admin Geral - Atleta', function ($query) {
                                  $query->where('delegacoes_id', Session::get('delegacoes_id'));
                              })
                              ->orderBy('nome', 'asc')
                              ->get();

            return (new Response([
                  'data' => $pessoas,
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Criar ou editar times.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json sucesso|erro
     */
    public function criarEditarTimes(Request $request)
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Inserindo o status.
            $request->merge([
                'status' => '1'
            ]);

            // Validar dados.
            $validate = Validator::make(
                $request->all(), Times::rules()
            );

            // Se existir problemas, retorne para o inicio com as mensagens de erros.
            if ($validate->fails()) {
                return (new Response([
                      'status' => 'error',
                      'title' => 'Ops',
                      'message' => 'Por favor, preencha os campos corretamente',
                      'errors' => $validate->errors(),
                    ], 500))->header('Content-Type', 'json');
            }

            $pessoas_id = [];
            foreach ($request->pessoas_id as $pessoa_id) {
                // Verificar se todos os campos possuem valor.
                if ($pessoa_id) {
                    // Inserir no array.
                    $pessoas_id[] = $pessoa_id;
                }
            }

            // Verificar a quantidade mínima de atletas.
            if (count($pessoas_id) < $request->qtd_pessoas_min) {
                return (new Response([
                      'status' => 'error',
                      'title' => 'Ops',
                      'message' => 'A quantidade mínima para esse esporte é de <b>'. $request->qtd_pessoas_min . '</b> atletas',
                      'errors' => $validate->errors(),
                    ], 500))->header('Content-Type', 'json');
            }

            // Buscar todas as pessoas e seus times_pessoas, times, categorias e esportes.
            $pessoas = Pessoas::with(array('times_pessoas'=>function($query){
                            $query->with(array('times'=>function($query){
                                $query->with(array('categorias'=>function($query){
                                    $query->with(array('esportes'=>function($query){
                                        $query->where('status', '1')
                                              ->select('id', 'nome', 'turno');
                                    }))->where('status', '1')
                                       ->select('id', 'tipo', 'esportes_id', 'status');
                                }))->where('status', '1')
                                   ->select('id', 'categorias_id', 'status');
                            }))->where('status', '1')
                               ->select('id', 'times_id', 'pessoas_id', 'status');
                        }))->where('status', '1')
                           ->whereIn('id', $pessoas_id)
                           ->select('id', 'nome', 'sobrenome', 'delegacoes_id', 'status')
                           ->get();

            // Buscar o esporte pelo id.
            $esporte = Esportes::where('status', '1')
                                ->select('id', 'nome', 'turno')
                                ->find($request->esportes_id);


            foreach ($pessoas as $key => $pessoa) {
                foreach ($pessoa->times_pessoas as $key => $time_pessoas) {
                    // Verifique se a pessoa já está em algum esporte nesse turno.
                    if ($esporte->turno == $time_pessoas->times->categorias->esportes->turno) {
                        return (new Response([
                              'status' => 'error',
                              'title' => 'Ops',
                              'message' => 'Desculpe, o(a) atleta <b>'. $pessoa->nome .' '. $pessoa->sobrenome .'</b> já está cadastrada em um esporte no '. $esporte->turno .' turno de jogos',
                            ], 500))->header('Content-Type', 'json');
                    }
                }
            }

            // Salvar dados no banco de dados.
            $criarTimes = Times::create([
                'medalha'       => '',
                'categorias_id' => $request->categorias_id,
                'delegacoes_id' => $request->delegacoes_id,
                'status'        => $request->status,
            ]);

            foreach ($pessoas_id as $pessoa_id) {
                // Salvar dados no banco de dados.
                $criarTimesPessoas = TimesPessoas::create([
                    'capitao'    => '',
                    'lider'      => '',
                    'goleiro'    => '',
                    'times_id'   => $criarTimes->id,
                    'pessoas_id' => $pessoa_id,
                    'status'     => $request->status,
                ]);
            }

            // Sucesso!
            DB::commit();

            return (new Response([
                  'status' => 'success',
                  'title' => 'Feito',
                  'message' => 'Cadastrado com sucesso',
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema para concluir o cadastrado',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Listar pessoas.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json $pessoas
     */
    public function listarTimesDelegacao()
    {
        try {
            // Buscar todos os esportes e suas categorias, times, times_pessoas e pessoas.
            $esportes = Esportes::with(array('categorias'=>function($query){
                            $query->with(array('times'=>function($query){
                                $query->with(array('times_pessoas'=>function($query){
                                    $query->with(array('pessoas'=>function($query){
                                        $query->where('status', '1')
                                              ->select('id', 'nome', 'sobrenome', 'delegacoes_id', 'status');
                                    }))->where('status', '1')
                                       ->select('id', 'times_id', 'pessoas_id', 'status');
                                }))->where('status', '1')
                                   // Verifique se é admin geral.
                                   ->when(Session::get('funcao') != 'Admin Geral - Atleta', function ($query) {
                                        $query->where('delegacoes_id', Session::get('delegacoes_id'));
                                    })
                                   ->select('id', 'medalha', 'categorias_id', 'delegacoes_id', 'status');
                            }))->where('status', '1')
                               ->select('id', 'tipo', 'esportes_id', 'status');
                        }))->where('status', '1')
                           ->select('id', 'nome', 'turno')
                           ->get();      

            return (new Response([
                  'data' => $esportes,
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Deletar times.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return json
     */
    public function deletarTime($id)
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Buscar time com esse id.
            $time = Times::find($id);

            // Deletar time no banco de dados.
            $time->delete();

            // Sucesso!
            DB::commit();

            return (new Response([
                  'status' => 'success',
                  'title' => 'Feito',
                  'message' => 'Participação deletada com sucesso',
                ], 200))->header('Content-Type', 'json');


        } catch (\Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema para deletar a participação',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Buscar jogos e times.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json $pessoas
     */
    public function buscarJogosTimes($categoria)
    {
        try {
            // Array com todas as fases.
            $fases = DomainJogos::arrayFases();
            // Array com todos os placares.
            $placares = DomainJogos::arrayPlacares();
            // Buscar todos os times pela categorias_id.
            $times = Times::where('categorias_id', $categoria)->get();

            return (new Response([
                  'data' => [
                    'fases'    => $fases,
                    'placares' => $placares,
                    'times'    => $times,
                  ],
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Criar ou editar jogos.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json sucesso|erro
     */
    public function criarEditarJogos(Request $request)
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Validar dados.
            $validate = Validator::make(
                $request->all(), JogosCategorias::rules($request->id), JogosCategorias::messages()
            );

            // Se existir problemas, retorne para o inicio com as mensagens de erros.
            if ($validate->fails()) {
                return (new Response([
                      'status' => 'error',
                      'title' => 'Ops',
                      'message' => 'Por favor, preencha os campos corretamente',
                      'errors' => $validate->errors(),
                    ], 500))->header('Content-Type', 'json');
            }

            // Salvar dados no banco de dados.
            $atualizarOuCriarJogos = JogosCategorias::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'times_1'       => $request->times_1,
                    'placar_1'      => $request->placar_1,
                    'times_2'       => $request->times_2,
                    'placar_2'      => $request->placar_2,
                    'fase'          => $request->fase,
                    'categorias_id' => $request->categorias_id,
                    'status'        => $request->status,
                ],
            );

            // Sucesso!
            DB::commit();

            // Verifique se a pessoa foi criada.
            if ($atualizarOuCriarJogos->wasRecentlyCreated) {
                return (new Response([
                      'status' => 'success',
                      'title' => 'Feito',
                      'message' => 'Jogo cadastrado com sucesso',
                    ], 200))->header('Content-Type', 'json');
            }

            return (new Response([
                  'status' => 'success',
                  'title' => 'Feito',
                  'message' => 'Jogo atualizado com sucesso',
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema para concluir o processo',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Buscar jogos por categoria.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json $pessoas
     */
    public function buscarJogosCategoria($categoria)
    {
        try {
            // Buscar todos os jogos pela categorias_id. 
            $jogos = JogosCategorias::with(array(
              'time_1'=>function($query){
                $query->with(array('delegacoes'=>function($query){
                    $query->where('status', '1')
                          ->select('id', 'nome', 'status');
                }))->where('status', '1')
                   ->select('id', 'medalha', 'delegacoes_id', 'status');
              },
              'time_2'=>function($query){
                $query->with(array('delegacoes'=>function($query){
                    $query->where('status', '1')
                          ->select('id', 'nome', 'status');
                }))->where('status', '1')
                   ->select('id', 'medalha', 'delegacoes_id', 'status');
              }
            ))->where('categorias_id', $categoria)
              ->orderBy('fase')
              ->select('id', 'fase', 'placar_1', 'placar_2', 'times_1', 'times_2', 'categorias_id', 'status')
              ->get();  


            return (new Response([
                  'data' => $jogos,
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Visualizar jogo.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return json $jogo
     */
    public function visualizarJogo($id)
    {
        try {
            // Buscar jogos com esse id.
            $jogo = JogosCategorias::find($id);

            return (new Response([
                  'data' => $jogo,
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Deletar jogo.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return json
     */
    public function deletarJogo($id)
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Buscar jogo com esse id.
            $jogo = JogosCategorias::find($id);

            // Deletar jogo no banco de dados.
            $jogo->delete();

            // Sucesso!
            DB::commit();

            return (new Response([
                  'status' => 'success',
                  'title' => 'Feito',
                  'message' => 'Jogo deletado com sucesso',
                ], 200))->header('Content-Type', 'json');


        } catch (\Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema para deletar a participação',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Buscar medalha time.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @param  int  $id
     * @return json $time
     */
    public function buscarMedalhaTime($id)
    {
        try {
            // Buscar time com esse id.
            $time = Times::where('id', $id)->pluck('medalha');

            return (new Response([
                  'data' => $time,
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }

    /**
     * Criar ou editar medalha time.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return json sucesso|erro
     */
    public function criarEditarMedalhaTime(Request $request)
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Salvar dados no banco de dados.
            Times::where('id', $request->id)->update($request->except(['_token']));

            // Sucesso!
            DB::commit();

            return (new Response([
                  'status' => 'success',
                  'title' => 'Feito',
                  'message' => 'Cadastrado com sucesso',
                ], 200))->header('Content-Type', 'json');

        } catch (\Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            return (new Response([
                  'status' => 'error',
                  'title' => 'Ops',
                  'message' => 'Tivemos um problema para concluir o cadastrado',
                  'e_message' => $e->getMessage(),
                  'e_file' => $e->getFile(),
                  'e_line' => $e->getLine(),
                ], 500))->header('Content-Type', 'json');
        }
    }
}
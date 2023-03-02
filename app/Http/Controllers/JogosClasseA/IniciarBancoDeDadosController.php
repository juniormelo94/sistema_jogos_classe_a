<?php

namespace App\Http\Controllers\JogosClasseA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Domain\DomainCategorias;
use App\Domain\DomainDelegacoes;
use App\Domain\DomainEsportes;
use App\Domain\DomainPessoas;

class IniciarBancoDeDadosController extends Controller
{
    /**
     * Inicial informações no banco de dados.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return view
     */
    public function iniciar()
    {
        try {
          // Criar delegações no banco de dados.
          DomainDelegacoes::CriarDelegacoes();
          // Criar esportes no banco de dados.
          DomainEsportes::CriarEsportes();
          // Criar categorias no banco de dados.
          DomainCategorias::CriarCategorias();
          // Criar pessoa no banco de dados.
          DomainPessoas::CriarPessoa();

          return 'Sucesso!';
        } catch (\Exception $e) {
          return [
                  'Mensagem: ' => $e->getMessage(),
                  'Arquivo: ' => $e->getFile(),
                  'Linha: ' => $e->getLine(),
                ];
        }
    }
}

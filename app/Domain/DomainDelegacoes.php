<?php

namespace App\Domain;

use Illuminate\Support\Facades\DB;

use App\Models\Delegacoes;

class DomainDelegacoes
{
    /**
     * Object com delegações.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return object $objectDelegacoes
     *
     */
    static function objectDelegacoes()
    {
        $arrayDelegacoes = [
            [
                'nome'   => 'Dormentes',
                'cor_1'  => '',
                'cor_2'  => '',
                'status' => '1',
            ],
            [
                'nome'   => 'Rajada 1',
                'cor_1'  => '',
                'cor_2'  => '',
                'status' => '1',
            ],
            [
                'nome'   => 'Rajada 2',
                'cor_1'  => '',
                'cor_2'  => '',
                'status' => '1',
            ],
            [
                'nome'   => 'Assentamento Nova Esperança',
                'cor_1'  => '',
                'cor_2'  => '',
                'status' => '1',
            ],
            [
                'nome'   => 'Malhada da Pedra',
                'cor_1'  => '',
                'cor_2'  => '',
                'status' => '1',
            ],
            [
                'nome'   => 'Cabaceira',
                'cor_1'  => '',
                'cor_2'  => '',
                'status' => '1',
            ],
            [
                'nome'   => 'Picos',
                'cor_1'  => '',
                'cor_2'  => '',
                'status' => '1',
            ],
            [
                'nome'   => 'Paulistana',
                'cor_1'  => '',
                'cor_2'  => '',
                'status' => '0',
            ],
        ];

        // Transforme o array em object.
        $objectDelegacoes = json_decode(json_encode($arrayDelegacoes), FALSE);

        return $objectDelegacoes;
    }

    /**
     * Criar delegações no banco de dados.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return string|throw $e
     *
     */
    static function CriarDelegacoes()
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Object com esportes.
            $objectDelegacoes = static::objectDelegacoes();

            foreach ($objectDelegacoes as $delegacao) {
                // Salvar delegação no banco de dados.
                Delegacoes::updateOrCreate(
                    [
                        'nome'   => $delegacao->nome,
                    ],
                    [
                        'cor_1'  => $delegacao->cor_1,
                        'cor_2'  => $delegacao->cor_2,
                        'status' => $delegacao->status,
                    ],
                );
            }

            // Sucesso!
            DB::commit();

            return;
        } catch (\Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            throw $e;
        }
    }
}

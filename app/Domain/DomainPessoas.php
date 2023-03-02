<?php

namespace App\Domain;

use Illuminate\Support\Facades\DB;

use App\Models\Pessoas;

class DomainPessoas
{
    /**
     * Object com pessoa.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return object $objectPessoa
     *
     */
    static function objectPessoa()
    {
        $arrayPessoa = [
            [
                'nome_completo' => 'Eraldo Luiz de Melo Junior',
                'nome'          => 'Junior',
                'sobrenome'     => 'Melo',
                'cpf'           => '113.375.274-83',
                'data_nasc'     => '17/10/1996',
                'sexo'          => 'Masculino',
                'celular'       => '(87)99677-2667',
                'email'         => null,
                'idade'         => '25',
                'img'           => null,
                'funcao'        => 'Admin Geral - Atleta',
                'delegacoes_id' => '1',
                'status'        => '1',
            ],
        ];

        // Transforme o array em object.
        $objectPessoa = json_decode(json_encode($arrayPessoa), FALSE);

        return $objectPessoa;
    }

    /**
     * Criar pessoa no banco de dados.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return string|throw $e
     *
     */
    static function CriarPessoa()
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Object com pessoa.
            $objectPessoa = static::objectPessoa();

            foreach ($objectPessoa as $pessoa) {
                // Salvar esporte no banco de dados.
                Pessoas::updateOrCreate(
                    [
                        'cpf'           => $pessoa->cpf,
                    ],
                    [
                        'nome_completo' => $pessoa->nome_completo,
                        'nome'          => $pessoa->nome,
                        'sobrenome'     => $pessoa->sobrenome,
                        'data_nasc'     => $pessoa->data_nasc,
                        'sexo'          => $pessoa->sexo,
                        'celular'       => $pessoa->celular,
                        'email'         => $pessoa->email,
                        'idade'         => $pessoa->idade,
                        'img'           => $pessoa->img,
                        'funcao'        => $pessoa->funcao,
                        'delegacoes_id' => $pessoa->delegacoes_id,
                        'status'        => $pessoa->status,
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

    /**
     * Array com todas as funções.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return array $arrayFuncoes
     *
     */
    static function arrayTodasFuncoes()
    {
        $arrayTodasFuncoes = [
            '' => 'TIPO INSCRIÇÃO',
            'Admin Geral - Atleta'       => 'Admin Geral - Atleta',
            'Admin Delegação - Atleta'   => 'Admin Delegação - Atleta',
            'Admin Delegação - Torcedor' => 'Admin Delegação - Torcedor',
            'Participante - Atleta'      => 'Participante - Atleta',
            'Participante - Torcedor'    => 'Participante - Torcedor',
            'Participante - Criança'     => 'Participante - Criança',
        ];

        return $arrayTodasFuncoes;
    }

    /**
     * Array com funções.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return array $arrayFuncoes
     *
     */
    static function arrayFuncoes()
    {
        $arrayFuncoes = [
            '' => 'TIPO INSCRIÇÃO',
            'Participante - Atleta'   => 'Participante - Atleta',
            'Participante - Torcedor' => 'Participante - Torcedor',
            'Participante - Criança'  => 'Participante - Criança',
        ];

        return $arrayFuncoes;
    }
}

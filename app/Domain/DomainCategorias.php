<?php

namespace App\Domain;

use Illuminate\Support\Facades\DB;

use App\Models\Categorias;
use App\Models\Esportes;

class DomainCategorias
{
    /**
     * Array com categorias.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return object $arrayCategorias
     *
     */
    static function arrayCategorias()
    {
        $arrayCategorias = [
            'Futsal' => [
                [
                    'tipo'         => 'Masculina',
                    'status'       => '1',
                ],
                [
                    'tipo'         => 'Feminina',
                    'status'       => '1',
                ],
            ],
            'Sinuca' => [
                [
                    'tipo'         => 'Masculina',
                    'status'       => '1',
                ],
                [
                    'tipo'         => 'Feminina',
                    'status'       => '1',
                ],
            ],
            'Dama' => [
                [
                    'tipo'         => 'Mista',
                    'status'       => '1',
                ],
            ],
            'Vôlei de Praia' => [
                [
                    'tipo'         => 'Masculina',
                    'status'       => '1',
                ],
                [
                    'tipo'         => 'Feminina',
                    'status'       => '1',
                ],
            ],
            'Tênis de Mesa' => [
                [
                    'tipo'         => 'Masculina',
                    'status'       => '1',
                ],
                [
                    'tipo'         => 'Feminina',
                    'status'       => '1',
                ],
            ],
            'Xadrez' => [
                [
                    'tipo'         => 'Mista',
                    'status'       => '1',
                ],
            ],
            'Polo Aquático' => [
                [
                    'tipo'         => 'Masculina',
                    'status'       => '1',
                ],
                [
                    'tipo'         => 'Feminina',
                    'status'       => '1',
                ],
            ],
            'Pebolim' => [
                [
                    'tipo'         => 'Masculina',
                    'status'       => '1',
                ],
                [
                    'tipo'         => 'Feminina',
                    'status'       => '1',
                ],
            ],
            'Dominó' => [
                [
                    'tipo'         => 'Mista',
                    'status'       => '1',
                ],
            ],
        ];

        return $arrayCategorias;
    }

    /**
     * Criar categorias no banco de dados.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return string|throw $e
     *
     */
    static function CriarCategorias()
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Array com categorias.
            $arrayCategorias = static::arrayCategorias();

            // Buscar todos os esportes.
            $esportes = Esportes::get();

            foreach ($esportes as $esporte) {
                foreach ($arrayCategorias[$esporte->nome] as $categoria) {
                    // Salvar categoria no banco de dados.
                    Categorias::updateOrCreate(
                        [
                            'tipo'         => $categoria['tipo'],
                            'esportes_id'  => $esporte->id,
                        ],
                        [
                            'status'       => $categoria['status'],
                        ],
                    );
                }
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

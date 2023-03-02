<?php

namespace App\Domain;

use Illuminate\Support\Facades\DB;

use App\Models\Esportes;

class DomainEsportes
{
    /**
     * Object com esportes.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return object $objectEsportes
     *
     */
    static function objectEsportes()
    {
        $arrayEsportes = [
            [
                'nome'                  => 'Futsal',
                'img'                   => 'assets/image/esportes/futsal.jpg',
                'regras'                => '',
                'turno'                 => '1º',
                'qtd_pessoas_min'       => '5',
                'qtd_pessoas_max'       => '10',
                'responsavel'           => 'Junior Melo',
                'img_responsavel'       => 'assets/image/responsaveis/junior.jpg',
                'celular_responsavel'   => '(87)99677-2667',
                'url_whats_responsavel' => 'https://wa.me/qr/4DRCH4SCP7U6F1',
                'url_insta_responsavel' => 'https://www.instagram.com/junior_melo.7/',
                'status'                => '1',
            ],
            [
                'nome'                  => 'Sinuca',
                'img'                   => 'assets/image/esportes/sinuca.jpg',
                'regras'                => '',
                'turno'                 => '1º',
                'qtd_pessoas_min'       => '2',
                'qtd_pessoas_max'       => '2',
                'responsavel'           => 'André Lucas',
                'img_responsavel'       => 'assets/image/responsaveis/andre_lucas.jpg',
                'celular_responsavel'   => '(87)9988-9037',
                'url_whats_responsavel' => 'https://wa.me/message/ZJ3PCLHIIZF6O1',
                'url_insta_responsavel' => 'https://www.instagram.com/andrelucasgs/',
                'status'                => '1',
            ], 
                        [
                'nome'                  => 'Dama',
                'img'                   => 'assets/image/esportes/dama.jpg',
                'regras'                => '',
                'turno'                 => '1º',
                'qtd_pessoas_min'       => '1',
                'qtd_pessoas_max'       => '1',
                'responsavel'           => 'Alexandre Wallace',
                'img_responsavel'       => 'assets/image/responsaveis/alexandre.jpg',
                'celular_responsavel'   => '(87)99952-4071',
                'url_whats_responsavel' => 'https://wa.me/qr/3C6QK4EKXMDNM1',
                'url_insta_responsavel' => 'https://www.instagram.com/alexandrewallace_/',
                'status'                => '1',
            ],
            [
                'nome'                  => 'Vôlei de Praia',
                'img'                   => 'assets/image/esportes/volei_de_praia.jpg',
                'regras'                => '',
                'turno'                 => '2º',
                'qtd_pessoas_min'       => '3',
                'qtd_pessoas_max'       => '3',
                'responsavel'           => 'Cristiano Novais',
                'img_responsavel'       => 'assets/image/responsaveis/cristiano.jpg',
                'celular_responsavel'   => '(87)99967-8462',
                'url_whats_responsavel' => 'https://wa.me/qr/J6Q2UXLWHPYSI1',
                'url_insta_responsavel' => 'https://www.instagram.com/cristiano.novaisgranja/',
                'status'                => '1',
            ], 
                        [
                'nome'                  => 'Tênis de Mesa',
                'img'                   => 'assets/image/esportes/tenis_de_mesa.jpg',
                'regras'                => '',
                'turno'                 => '2º',
                'qtd_pessoas_min'       => '2',
                'qtd_pessoas_max'       => '2',
                'responsavel'           => 'Robério Novais',
                'img_responsavel'       => 'assets/image/responsaveis/roberio.jpg',
                'celular_responsavel'   => '(87)99651-9266',
                'url_whats_responsavel' => 'https://wa.me/qr/5WZCGMAXAGHGN1',
                'url_insta_responsavel' => 'https://www.instagram.com/roberionovais77/',
                'status'                => '1',
            ],
            [
                'nome'                  => 'Xadrez',
                'img'                   => 'assets/image/esportes/xadrez.jpg',
                'regras'                => '',
                'turno'                 => '2º',
                'qtd_pessoas_min'       => '1',
                'qtd_pessoas_max'       => '1',
                'responsavel'           => 'Kelvin Matheus',
                'img_responsavel'       => 'assets/image/responsaveis/kelvin.jpg',
                'celular_responsavel'   => '(87)98172-8578',
                'url_whats_responsavel' => 'https://wa.me/qr/3FPUP3WKTMVBN1',
                'url_insta_responsavel' => 'https://www.instagram.com/kelvin_matheus_/',
                'status'                => '1',
            ], 
                        [
                'nome'                  => 'Polo Aquático',
                'img'                   => 'assets/image/esportes/polo_aquatico.jpg',
                'regras'                => '',
                'turno'                 => '3º',
                'qtd_pessoas_min'       => '5',
                'qtd_pessoas_max'       => '5',
                'responsavel'           => 'Thawan Lima',
                'img_responsavel'       => 'assets/image/responsaveis/thawan.jpg',
                'celular_responsavel'   => '(87)99954-5722',
                'url_whats_responsavel' => 'https://wa.me/qr/27BPQ3QY4WGCH1',
                'url_insta_responsavel' => 'https://www.instagram.com/_thawanlima/',
                'status'                => '1',
            ],
            [
                'nome'                  => 'Pebolim',
                'img'                   => 'assets/image/esportes/pebolim.jpg',
                'regras'                => '',
                'turno'                 => '3º',
                'qtd_pessoas_min'       => '2',
                'qtd_pessoas_max'       => '2',
                'responsavel'           => 'Eduarda freire',
                'img_responsavel'       => 'assets/image/responsaveis/eduarda.jpg',
                'celular_responsavel'   => '(87)99816-7276',
                'url_whats_responsavel' => '',
                'url_insta_responsavel' => 'https://www.instagram.com/eduarda_freire17/',
                'status'                => '1',
            ], 
            [
                'nome'                  => 'Dominó',
                'img'                   => 'assets/image/esportes/domino.jpg',
                'regras'                => '',
                'turno'                 => '3º',
                'qtd_pessoas_min'       => '2',
                'qtd_pessoas_max'       => '2',
                'responsavel'           => 'Samuel Augusto',
                'img_responsavel'       => 'assets/image/responsaveis/samuel.jpg',
                'celular_responsavel'   => '(87)98121-3597',
                'url_whats_responsavel' => 'https://wa.me/qr/NRPG54LVITLMM1',
                'url_insta_responsavel' => 'https://www.instagram.com/samuel_augusto18/',
                'status'                => '1',
            ], 
        ];

        // Transforme o array em object.
        $objectEsportes = json_decode(json_encode($arrayEsportes), FALSE);

        return $objectEsportes;
    }

    /**
     * Criar esportes no banco de dados.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return string|throw $e
     *
     */
    static function CriarEsportes()
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Object com esportes.
            $objectEsportes = static::objectEsportes();

            foreach ($objectEsportes as $esporte) {
                // Salvar esporte no banco de dados.
                Esportes::updateOrCreate(
                    [
                        'nome'            => $esporte->nome,
                    ],
                    [
                        'img'                   => $esporte->img,
                        'regras'                => $esporte->regras,
                        'turno'                 => $esporte->turno,
                        'qtd_pessoas_min'       => $esporte->qtd_pessoas_min,
                        'qtd_pessoas_max'       => $esporte->qtd_pessoas_max,
                        'responsavel'           => $esporte->responsavel,
                        'img_responsavel'       => $esporte->img_responsavel,
                        'celular_responsavel'   => $esporte->celular_responsavel,
                        'url_whats_responsavel' => $esporte->url_whats_responsavel,
                        'url_insta_responsavel' => $esporte->url_insta_responsavel,
                        'status'                => $esporte->status,
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

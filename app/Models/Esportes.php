<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Esportes extends Model
{
    public $table = 'esportes';

	/**
     * fillable fields
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @var array
     */
    public $fillable = [
        'nome',
        'img',
        'regras',
        'turno',
        'qtd_pessoas_min',
        'qtd_pessoas_max',
        'responsavel',
        'img_responsavel',
        'celular_responsavel',
        'url_whats_responsavel',
        'url_insta_responsavel',
        'status',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return array
     */
    static function rules()
    {
        return [
            'nome'                  => 'required|min:3|max:50',
            'img'          	        => 'nullable|mimes:jpeg,png|max:1024',
            'regras'                => 'nullable|min:3|max:50',
            'turno'                 => 'nullable',
            'qtd_pessoas_min'       => 'required|min:1|max:2',
            'qtd_pessoas_max'       => 'required|min:1|max:2',
            'responsavel'           => 'nullable',
            'img_responsavel'       => 'nullable',
            'celular_responsavel'   => 'nullable',
            'url_whats_responsavel' => 'nullable',
            'url_insta_responsavel' => 'nullable',
            'status'                => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return array
     */
    static function messages()
    {
        return [
            'nome.required' => '*O campo <b>Nome</b> é obrigatório',
            'nome.min' => '*O <b>nome</b> deve ter pelo menos 3 caracteres',
            'nome.max' => '*O <b>nome</b> não pode ter mais de 50 caracteres',
            'img.mimes' => '*A <b>Imagem</b> deve ser um arquivo do tipo: jpeg, png.',
            'img.max' => '*A <b>Imagem</b> não pode ser maior que 1 MB.',
            'qtd_pessoas_min.required' => '*O campo <b>QTD MIN PESSOAS</b> é obrigatório',
            'qtd_pessoas_min.min' => '*O <b>QTD MIN PESSOAS</b> deve ter pelo menos 1 números',
            'qtd_pessoas_min.max' => '*O <b>QTD MIN PESSOAS</b> não pode ter mais de 2 números',
            'qtd_pessoas_max.required' => '*O campo <b>QTD MAX PESSOAS</b> é obrigatório',
            'qtd_pessoas_max.min' => '*O <b>QTD MAX PESSOAS</b> deve ter pelo menos 1 números',
            'qtd_pessoas_max.max' => '*O <b>QTD MAX PESSOAS</b> não pode ter mais de 2 números',
            'status.required' => '*O campo <b>Status</b> é obrigatório',
        ];
    }

    /**
     * Get the record associated with the Categorias.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return Categorias::class
     */
    public function categorias()
    {
        return $this->hasMany('App\Models\Categorias', 'esportes_id');
    }
}

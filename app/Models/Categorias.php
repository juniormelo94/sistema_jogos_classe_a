<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public $table = 'categorias';

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
        'tipo',
        'esportes_id',
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
            'tipo'   	   => 'required|min:3|max:50',
            'esportes_id'  => 'required',
            'status' 	   => 'required',
        ];
    }

    /**
     * Get the record associated with the Times.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return Times::class
     */
    public function times()
    {
        return $this->hasMany('App\Models\Times', 'categorias_id');
    }

    /**
     * Get the record associated with the Esportes.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return Esportes::class
     */
    public function esportes()
    {
        return $this->hasOne('App\Models\Esportes', 'id', 'esportes_id');
    }

    /**
     * Get the record associated with the JogosCategorias.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return JogosCategorias::class
     */
    public function jogos()
    {
        return $this->hasMany('App\Models\JogosCategorias', 'categorias_id');
    }
}

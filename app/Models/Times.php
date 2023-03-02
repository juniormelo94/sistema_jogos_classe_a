<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    public $table = 'times';

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
        'medalha',
        'categorias_id',
        'delegacoes_id',
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
            'medalha'       => 'nullable|min:1|max:50',
            'categorias_id' => 'required',
            'delegacoes_id' => 'required',
            'status'        => 'required',
        ];
    }

    /**
     * Get the record associated with the TimesPessoas.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return TimesPessoas::class
     */
    public function times_pessoas()
    {
        return $this->hasMany('App\Models\TimesPessoas', 'times_id');
    }

    /**
     * Get the record associated with the Categorias.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return Delegacoes::class
     */
    public function delegacoes()
    {
        return $this->hasOne('App\Models\Delegacoes', 'id', 'delegacoes_id');
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
        return $this->hasOne('App\Models\Categorias', 'id', 'categorias_id');
    }
}

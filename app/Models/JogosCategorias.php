<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JogosCategorias extends Model
{
    public $table = 'jogos_categorias';

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
        'times_1',
        'placar_1',
        'times_2',
        'placar_2',
        'fase',
        'categorias_id',
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
            'times_1'   	=> 'required',
            'placar_1'      => 'nullable',
            'times_2' 	    => 'required',
            'placar_2'   	=> 'nullable',
            'fase' 		    => 'required',
            'categorias_id' => 'required',
            'status' 	    => 'required',
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
            'times_1.required' => '*O campo <b>1º Time</b> é obrigatório',
            'times_2.required' => '*O campo <b>2º Time</b> é obrigatório',
            'fase.required' => '*O campo <b>Fase</b> é obrigatório',
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
    public function time_1()
    {
        return $this->belongsTo('App\Models\Times', 'times_1');
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
    public function time_2()
    {
        return $this->belongsTo('App\Models\Times', 'times_2');
    }
}

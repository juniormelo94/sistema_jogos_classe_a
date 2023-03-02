<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delegacoes extends Model
{
    public $table = 'delegacoes';

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
        'cor_1',
        'cor_2',
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
            'nome'   => 'required|min:3|max:50',
            'cor_1'  => 'min:7|max:7|nullable',
            'cor_2'  => 'min:7|max:7|nullable',
            'status' => 'required',
        ];
    }
}

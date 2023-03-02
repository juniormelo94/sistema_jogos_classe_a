<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimesPessoas extends Model
{
    public $table = 'times_pessoas';

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
        'capitao',
        'lider',
        'goleiro',
        'times_id',
        'pessoas_id',
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
            'capitao'    => 'nullable|min:1|max:50',
            'lider'      => 'nullable|min:1|max:50',
            'goleiro'    => 'nullable|min:1|max:50',
            'times_id'   => 'required',
            'pessoas_id' => 'required',
            'status'     => 'required',
        ];
    }

    /**
     * Get the record associated with the Pessoas.
     *
     * @version 1.0.0
     * @author Junior Melo
     * @author 
     *
     * @return Pessoas::class
     */
    public function pessoas()
    {
        return $this->belongsTo('App\Models\Pessoas', 'pessoas_id');
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
        return $this->belongsTo('App\Models\Times', 'times_id');
    }
}

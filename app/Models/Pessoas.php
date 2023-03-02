<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    public $table = 'pessoas';

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
        'nome_completo',
        'nome',
        'sobrenome',
        'cpf',
        'data_nasc',
        'sexo',
        'celular',
        'email',
        'idade',
        'img',
        'funcao',
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
     * @param  int  $id
     * @return array
     */
    static function rules($id = null)
    {
        return [
            'nome_completo' => 'required|min:3|max:50',
            'nome'          => 'required|min:3|max:20',
            'sobrenome'     => 'required|min:3|max:20',
            'cpf'           => 'required|min:14|max:14|unique:pessoas,cpf,'. $id,
            'data_nasc'     => 'required|min:10|max:10',
            'sexo'     		=> 'required',
            'celular'       => 'required|min:15|max:15',
            'email'         => 'nullable|min:3|max:50|email',
            'idade'         => 'required|min:1|max:2',
            'img'   		=> 'nullable|mimes:jpeg,png|max:1024',
            'funcao' 	    => 'required',
            'delegacoes_id' => 'required',
            'status'        => 'required',
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
            'nome_completo.required' => '*O campo <b>Nome Completo</b> é obrigatório',
            'nome_completo.min' => '*O <b>Nome Completo</b> deve ter pelo menos 3 caracteres',
            'nome_completo.max' => '*O <b>Nome Completo</b> não pode ter mais de 50 caracteres',
            'nome.required' => '*O campo <b>Nome</b> é obrigatório',
            'nome.min' => '*O <b>Nome</b> deve ter pelo menos 3 caracteres',
            'nome.max' => '*O <b>Nome</b> não pode ter mais de 20 caracteres',
            'sobrenome.required' => '*O campo <b>Sobrenome</b> é obrigatório',
            'sobrenome.min' => '*O <b>Sobrenome</b> deve ter pelo menos 3 caracteres',
            'sobrenome.max' => '*O <b>Sobrenome</b> não pode ter mais de 20 caracteres',
            'cpf.required' => '*O campo <b>CPF</b> é obrigatório',
            'cpf.min' => '*O <b>CPF</b> deve ter pelo menos 11 números',
            'cpf.max' => '*O <b>CPF</b> não pode ter mais de 11 números',
            'cpf.unique' => '*Já existe um cadastro com esse <b>CPF</b>',
            'data_nasc.required' => '*O campo <b>Data de Nascimento</b> é obrigatório',
            'data_nasc.min' => '*A <b>Data de Nascimento</b> deve ter pelo menos 8 números',
            'data_nasc.max' => '*A <b>Data de Nascimento</b> não pode ter mais de 8 números',
            'sexo.required' => '*O campo <b>Sexo</b> é obrigatório',
            'celular.required' => '*O campo <b>Celular</b> é obrigatório',
            'celular.min' => '*O <b>Celular</b> deve ter pelo menos 11 números',
            'celular.max' => '*O <b>Celular</b> não pode ter mais de 11 números',
            'email.min' => '*O <b>E-mail Pessoal</b> deve ter pelo menos 3 caracteres',
            'email.max' => '*O <b>E-mail Pessoal</b> não pode ter mais de 50 caracteres',
            'email.email' => '*O <b>E-mail Pessoal</b> deve ser um endereço de e-mail válido',
            'idade.required' => '*O campo <b>Idade</b> é obrigatório',
            'idade.min' => '*A <b>Idade</b> não pode ter mais de 1 número',
            'idade.max' => '*A <b>Idade</b> não pode ter mais de 2 números',
            'img.mimes' => '*A <b>Imagem</b> deve ser um arquivo do tipo: jpeg, png.',
            'img.max' => '*A <b>Imagem</b> não pode ser maior que 1 MB.',
            'funcao.required' => '*O campo <b>Função</b> é obrigatório',
            'status.required' => '*O campo <b>Status</b> é obrigatório',
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
        return $this->hasMany('App\Models\TimesPessoas', 'pessoas_id');
    }
}

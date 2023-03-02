<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\DadosUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Mensagens de erro.
        $messages = [
            'name.min' => 'Quantidade minima de 3 caracteres!',
            'name.max' => 'Quantidade maxima de 50 caracteres!',  
            'email.unique' => 'Já existe alguém com esse e-mail!', 
            'email.max' => 'Quantidade maxima de 50 caracteres!', 
            'password.confirmed' => 'Ops, senhas diferentes. Confirme a senha escolhida abaixo!', 
            'password.min' => 'Quantidade minima de 6 caracteres!', 
            'password.max' => 'Quantidade maxima de 20 caracteres!', 
            'celular.min' => 'Quantidade minima de 11 números!',  
        ];

        // Validation rules.
        $rules = [
            'name'     => ['required', 'string', 'min:3','max:50'],
            'email'    => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:20', 'confirmed'],
            'celular'  => ['required', 'string', 'min:15', 'max:15'],
        ];

        return Validator::make($data,  $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            //Inicia o Database Transaction.
            DB::beginTransaction();

            // Criar user.
            $user = User::create([
                'name'              => $data['name'],
                'email'             => $data['email'],
                'password'          => Hash::make($data['password']),
                'data_visualizacao' => date("H:i d/m/Y"),
                'status'            => 1,
            ]);

            // Criar dados relacionados a esse user. 
            $dadosUsers = DadosUsers::create([
                'users_id' => $user->id,
                'celular'  => $data['celular'],
                'status'   => 1,
            ]);

            // Sucesso!
            DB::commit();

            return $user;

        } catch (Exception $e) {
            // Erro, desfaz as alterações no banco de dados.
            DB::rollBack();

            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        } 
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function admin()
    {
        // Pegue o usuário com name 'Admin'.
        $user = User::where('name', 'Admin')->get();

        // Se existir mostrar mensagem.
        if (count($user)) {
            dd("Usuário 'Admin' já existe na base de dados.");
        }

        return User::create([
            'name'              => 'Admin',
            'email'             => 'admin@hotmail.com',
            'password'          => Hash::make('123456789'), 
            'data_visualizacao' => date("H:i d/m/Y"),        
            'status'            =>  1,         
        ]);
    }
}

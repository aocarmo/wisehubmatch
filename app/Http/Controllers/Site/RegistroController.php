<?php

namespace App\Http\Controllers\Site;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Technology;
class RegistroController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        $tecnologias = Technology::all();     
        return view('registro.index',compact('tecnologias'));
    }

    public function salvar(Request $req){

        
        
        $dados = $req->all();
        
        $validate = validator( $dados, $this->user->rules, $this->user->messages);
        if($validate->fails()){
            return redirect()
                    ->route('site.registro')
                    ->withErrors($validate)
                    ->withInput();
        }


        if($req->hasFile('photo')){          
            $imagem = $req->file('photo');
            $num = rand(1111,9999);
            $dir = "img/users/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "avatar_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['photo']= $dir."/".$nomeImagem;
        }
        
        $dados['password'] = bcrypt( $dados['password']);
        $newUser = User::create($dados);

        if($newUser->type == 'dev'){
            $newUser->technologies()->attach($dados['technologies']);
        }


        return redirect()->route('site.login');


    }
}

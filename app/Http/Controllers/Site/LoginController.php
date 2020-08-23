<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Auth;


class LoginController extends Controller
{
    //

    public function index(){
        return view('login.index');
    }

    public function entrar(Request $req){

        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required'
        );

        $messages = array(
            'email.required' => 'Por favor, informe o e-mail.',
            'password.required' =>'Por favor, informe a senha.'
        );


        $validate = validator($req->all(),   $rules,$messages);
        if($validate->fails()){
            return redirect()
            ->route('site.login')
            ->withErrors($validate)
            ->withInput();
        }

       
        
        $dados = $req->all();
    
            if(Auth::attempt(['email'=> $dados['email'], 'password'=>$dados['password']])){
              
                if(Auth::User()->type =="dev"){
                    return redirect()->route('auth.desenvolvedor');
                }else{
                    
                    return redirect()->route('auth.empresa',Auth::id());
                }
             
            }else{
                $errors = new MessageBag(['password' => ['E-mail e senha inválidos.']]);
                return redirect()
                ->route('site.login')
                ->withErrors($errors)
                ->withInput();
            }
 
        
      return redirect()->route('site.login');
    }


    public function sair(Request $req){

       Auth::logout();
      return redirect()->route('site.login');
    }
}

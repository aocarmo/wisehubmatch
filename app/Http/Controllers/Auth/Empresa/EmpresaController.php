<?php

namespace App\Http\Controllers\Auth\Empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\Technology;
use Auth;
use Image;
use App\User;
class EmpresaController extends Controller
{
    private $job;
    public function __construct(Job $job){
        $this->job = $job;
    }
    public function index($id){
       
        $vagas = Job::where('user_id', $id)->get();

        foreach ($vagas as $vaga){
            foreach( $vaga->technologies  as $tech){

                $vaga->techs .= $tech->name .' , ';
            }
            
        }
      
        return view('auth.empresa.index',compact('vagas'));
    }

    public function criar(Request $req){
        
        $tecnologias = Technology::all();     
        $idTecnologias = array();
        return view('auth.empresa.criar_vaga',compact('tecnologias','idTecnologias'));
    }
    public function salvar(Request $req){
        
        $validate = validator($req->all(), $this->job->rules, $this->job->messages);
        if($validate->fails()){
            return redirect()
            ->route('auth.empresa.criar')
            ->withErrors($validate)
            ->withInput();
        }
        
        $id = Auth::user()->id;
        $dados = $req->all();
      

        $vaga = new Job;
        $vaga->office =$dados['office'];
        $vaga->description =$dados['description'];
        $vaga->user_id =$id;

        if($req->hasFile('imagem')){     
            
            $image = $req->file('imagem');

            $image_name = time() . '.' . $image->getClientOriginalExtension();
       
            $destinationPath = 'img/vagas';
       
            $resize_image = Image::make($image->getRealPath());
       
            $resize_image->resize(150, 150, function($constraint){
             $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);       
     
       
            $image->move($destinationPath, $image_name);
            $vaga->image = $destinationPath."/".$image_name;
         
        }else{
            $vaga->image ='img/vagas/vaga_default.jpg';
        }

        $vaga->save();
        $vaga->technologies()->attach($dados['technologies']);
        return  redirect()->route('auth.empresa', $id);
    }

    public function editarvaga($id){

        $tecnologias = Technology::all();     
        $vaga = Job::find($id);
        $tecnologiasVinculadas = $vaga->technologies;
        $idTecnologias = array();
        
        foreach ($tecnologiasVinculadas as $tecnologiaVinculada){
            array_push($idTecnologias,$tecnologiaVinculada->id);
        }

        return view('auth.empresa.editar_vaga', compact('vaga','tecnologias','idTecnologias','id'));
    }
    public function atualizarvaga(Request $req,$id){


        $validate = validator($req->all(), $this->job->rules, $this->job->messages);
        if($validate->fails()){
            return redirect()
            ->route('auth.empresa.editar',$id)
            ->withErrors($validate)
            ->withInput();
        }

        $dados = $req->all();
      

        $vaga = Job::find($id);
        $vaga->office =$dados['office'];
        $vaga->description =$dados['description'];
     
        if($req->hasFile('imagem')){     
            
            $image = $req->file('imagem');

            $image_name = time() . '.' . $image->getClientOriginalExtension();
       
            $destinationPath = 'img/vagas';
       
            $resize_image = Image::make($image->getRealPath());
       
            $resize_image->resize(150, 150, function($constraint){
             $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);      
       
       
            $image->move($destinationPath, $image_name);
            $vaga->image = $destinationPath."/".$image_name;
         
        }

        $vaga->save();
        $vaga->technologies()->sync($dados['technologies']);
        return  redirect()->route('auth.empresa',Auth::user()->id);

    }

    public function excluirVaga($id){

        $vaga = Job::find($id);
        $vaga->delete();

        return  redirect()->route('auth.empresa',Auth::user()->id);

    }

    public function exibircandidatos($id){
       
        $candidatos = User::whereIn('id',
        function($query) use ($id){
            $query->select('user_id')
            ->from('job_user')                     
            ->where('job_id', $id);
        }
    )->get();      
       

        return  view('auth.empresa.lista_candidatos',compact('candidatos'));

    }
}

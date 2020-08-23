<?php

namespace App\Http\Controllers\Auth\Desenvolvedor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use Auth;
class DesenvolvedorController extends Controller
{
    public function index(){

        $vagas = Job::whereNotIn('id',
            function($query){
                $query->select('job_id')
                ->from('job_user')                     
                ->where('user_id', Auth::User()->id);
            }
        )->get();      
        return view('auth.desenvolvedor.index',compact('vagas'));
    }


    public function candidatar($jobId){
        
    
        $job = Job::find($jobId);
        $job->users()->attach(Auth::User()->id);        
        return  redirect()->route('auth.desenvolvedor');
    }
}

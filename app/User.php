<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Job;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo','phone', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public $rules = [
        'name'=> 'required',
        'email'=> 'required',
        'password'=> 'required',
        'type'=> 'required',
        'phone'=> 'required',
        'email' => 'unique:users,email',
        'photo' => 'mimes:jpeg,png'
  
    ];
    public $messages = [
        'name.required'=> 'O campo nome é obrogatório!',
        'email.required'=> 'O campo email é obrogatório!',       
        'password.required'=> 'O campo senha é obrogatório!',
        'phone.required'=> 'O campo telefone é obrogatório!',            
        'type.required'=> 'O campo perfil é obrigatorio!',
        'email.unique' => 'O email informado ja existe!',
        'photo.mimes' => 'Tipo de arquivo não permitido!'
        
    ];

    public function jobs(){
        return $this->belongsToMany(Job::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}

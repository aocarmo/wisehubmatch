<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'office', 'description', 'image'
    ];

    public $rules = [
        'office'=> 'required',
        'description'=> 'required',
        'technologies'  => 'required|array|min:1',
        'imagem' => 'mimes:jpeg,png'
       
    ];
    public $messages = [
        'office.required'=> 'O campo cargo é obrigatório!',
        'description.required'=> 'O campo descricão é obrigatório!',       
        'technologies.required'=> 'Selecione ao menos uma tecnologia!',       
        'imagem.mimes' => 'Tipo de arquivo não permitido!'
      
    ];

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
}

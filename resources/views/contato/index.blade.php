
@extends('layout.site')

@section('titulo','Contatos')
    
@section('conteudo')
    

@foreach($contatos as $contato)
    <p>{{$contato->nome}}</p>
    <p>{{$contato->tel}}</p>
@endforeach

@endsection
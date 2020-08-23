
@extends('layout.site')

@section('titulo','Editar')
    
@section('conteudo')
    <div class="container">
        <h3 class="center">Criar vaga</h3>
        <div class="row center-align">
            <form action="{{route('auth.empresa.vaga.atualizar',$id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                @if (isset($errors) && count($errors) > 0)

                @foreach ($errors->all() as $error)
                <div class="">
                 
                  <p class="z-depth-3 red lighten-2">{{$error}}</p>
                </div>                               
                @endforeach                    

                @endif
                @include('auth.empresa._form')

                <button class="btn indigo">Salvar</button>
            </form>
        </div>
    
    </div>
</div>

@endsection
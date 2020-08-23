
@extends('layout.site')

@section('titulo','Home')
    
@section('conteudo')
    <div class="container">
        <h3 class="header">Vagas</h3>
        <div class="row">
            <table class="striped responsive-table">
                <thead>
                    <tr>                       
                        <th>Cargo</th>
                        <th>Descrição</th>  
                        <th>Tecnologias</th>  
                        <th>Imagem</th>                      
                        <th></th>
                    </tr>
                </thead>
                <tbody>                    
                    @foreach($vagas as $vaga)
                    <tr>                        
                        <td>{{$vaga->office}}</td>
                        <td>{{$vaga->description}}</td>
                        <td>
                        @foreach ($vaga->technologies  as $tech)                    
                            <div class="chip">                   
                            {{$tech->name}}
                            </div>
                        @endforeach
                     </td>
                        <td>
                            @if(isset($vaga->image))
                                <img height="60" src="{{asset($vaga->image)}}" alt="{{$vaga->office}}"/>
                            @endif
                        </td>
                        <td>
                            <a class="btn-floating btn-large waves-effect waves-light indigo" href="{{route('auth.empresa.vaga.candidatos',$vaga->id)}}"><i class="material-icons">people</i></a>
                            <a class="btn-floating btn-large waves-effect waves-light deep-orange" href="{{route('auth.empresa.editar',$vaga->id)}}"><i class="material-icons">create</i></a>
                            <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('auth.empresa.vaga.excluir',$vaga->id)}}"><i class="material-icons">delete</i></a>
                          
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>          
        </div>
        <div class="row">
        <a class="btn indigo" href="{{route('auth.empresa.criar')}}">Nova Vaga</a>
        </div>
    </div>
</div>

@endsection
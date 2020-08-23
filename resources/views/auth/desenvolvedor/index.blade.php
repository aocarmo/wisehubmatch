
@extends('layout.site')

@section('titulo','Home')
    
@section('conteudo')
    <div class="container">

      <div class="row">
        @foreach ($vagas as $vaga)
        <div class="col s4 ">
          <div  style="width:90%;" class="card" >
            <div class="card-image">
              <img class="activator" style="height:250px;width:100%;" src="{{asset($vaga->image)}}">                  
              <a  href="{{route('auth.desenvolvedor.candidatar', $vaga->id)}}" class="btn-floating halfway-fab waves-effect waves-light indigo"><i class="material-icons">favorite</i></a>
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">{{$vaga->office}}<i class="material-icons right">more_vert</i></span>          
            </div>  
            
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i><strong>{{$vaga->office}}</strong></span>
              <p>{{$vaga->description}}</p>
       
              <p>Requisitos:</p>
              @foreach ($vaga->technologies  as $tech)                        
              <div class="chip">                   
                 {{$tech->name}}
              </div>
              @endforeach
          </div>
          </div>
        </div>
        @endforeach
      </div>
     
    </div>

@endsection
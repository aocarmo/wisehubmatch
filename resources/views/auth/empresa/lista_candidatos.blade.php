
@extends('layout.site')

@section('titulo','Candidatos')
    
@section('conteudo')
    <div class="container">

      <div class="row">
        @foreach ($candidatos as $candidato)
        <div class="col s4 ">
          <div  style="width:90%;" class="card" >
            <div class="card-image">
              <img class="activator" style="height:250px;width:100%;" src="{{asset($candidato->photo)}}">                  
             <!--  <a  href="{{route('auth.desenvolvedor.candidatar', $candidato->id)}}" class="btn-floating halfway-fab waves-effect waves-light indigo"><i class="material-icons">email</i></a>-->
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">{{$candidato->name}}<i class="material-icons right">more_vert</i></span>          
            </div>  
            
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i><strong>{{$candidato->name}}</strong></span>
              <p><b>Contato:</b></p>
                <p>{{$candidato->phone}}</p>
                <p>{{$candidato->email}}</p>
       
              <p>Skills:</p>
              @foreach ($candidato->technologies  as $tech)                        
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
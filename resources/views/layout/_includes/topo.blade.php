<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('titulo')</title>
  </head>

  <body>

    <nav>
        <div class="nav-wrapper indigo">
          @if (Auth::User()->type == 'dev')
          <a style="padding-left: 10px;" href="#!" class="brand-logo">WiseHub</a>          
          @else
          <a style="padding-left: 10px;" href="{{route('auth.empresa',Auth::User()->id)}}" class="brand-logo">WiseHub</a>
          @endif
          <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
          <li style="display: inline block;text-align;"><img style="width: 40px;height: 40px; border-radius: 100%; vertical-align:middle;" src="{{asset(Auth::User()->photo)}}" alt=""></li>  
          <li><a href="#">Olá, {{Auth::User()->name}}</a></li>    
            <li><a href="{{route('site.login.sair')}}"><i class="material-icons left">exit_to_app</i>Sair</a></li>    
          </ul>
          <ul class="side-nav" id="mobile">           
            
            <li><a href="{{route('site.login.sair')}}"><i class="material-icons left">exit_to_app</i>Sair</a></li>    
          </ul>
        </div>
      </nav>
  

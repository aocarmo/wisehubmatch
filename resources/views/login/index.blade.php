


<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

  </style>

</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <div class="section"></div>     
      <div class="section"></div>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          
          <img class="responsive-img" style="width: 250px;" src="{{asset('img/logo-lettering-black.png')}}" />
          <form class="col s12" action="{{route('site.login.entrar')}}" method="post">
            @if (isset($errors) && count($errors) > 0)
  
            @foreach ($errors->all() as $error)
            <div class="">
             
              <p class="red lighten-2 center-align">{{$error}}</p>
            </div>                               
            @endforeach            
            @endif
            {{csrf_field()}}
      
                  
            <div class='row'>
              <div class='input-field col s12'>
              <input class='validate' type='email' value="{{old('email')}}" name='email' id='email' />
                <label for='email'>E-mail</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Senha</label>
              </div>
        
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Entrar</button>
              </div>
            </center>
            <a class="pink-text" href="{{route('site.registro')}}">Cadastre-se</a>
          </form>
          
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
  </script>

</body>

</html>
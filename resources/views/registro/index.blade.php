


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
    
              <form class="col s12" action="{{route('site.registro.salvar')}}" method="post" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class='row'>
                  <div class='col s12'>
                     
                      @if (isset($errors) && count($errors) > 0)

                            @foreach ($errors->all() as $error)
                            <div class="">
                             
                              <p class="z-depth-3 red lighten-2">{{$error}}</p>
                            </div>                               
                            @endforeach                    

                      @endif
                  </div>
                </div>
    
                <div class='row'>
                  <div class='input-field col s12'>
                    <input class='validate' type='text' name='name' id='name'  />
                    <label for='name'>Nome</label>
                  </div>
                  <div class='input-field col s12'>
                    <input class='validate' type='email' name='email' id='email' />
                    <label for='email'>E-mail</label>
                  </div>
                  <div class='input-field col s12'>
                    <input class='validate' type='text' name='phone' id='phone' />
                    <label for='phone'>Telefone</label>
                  </div>

                  <div class="file-field input-field col s12">
                    <div class="btn indigo">
                        <span>Foto</span>
                        <input type="file" name="photo">
                    </div>     
                    <div class="file-path-wrapper">        
                        <input class="file-path validate" type="text">
                    </div>     
                </div>

                    <div class="input-field col s12">
                        <select  name="type" id="type">
                            <option value="" disabled selected>Perfil</option>
                            <option value="dev">Desenvolvedor</option>
                            <option value="emp">Empresa</option>                    
                        </select>                   
                    </div>
                    <div id="tecnologias" class="input-field col s12">
                      <select multiple name="technologies[]" id="technologies">
                          <option value="" disabled selected>Tecnologias</option>
                          @foreach($tecnologias as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                                    
                      </select>                   
                  </div>
                  <div class='input-field col s12'>
                    <input class='validate' type='password' name='password' id='password' />
                    <label for='password'>Senha</label>
                  </div>
                </div>
                <br />
                <center>
                  <div class='row'>
                    <div class='input-field col s12'>                        
                        <button type='submit' name='btn_login' class='btn btn-large waves-effect indigo'>Cadastrar</button>                     
                    <div>
                  </div>
                </center>
              </form>
            </div>
          </div>
         
        </center>
    
        <div class="section"></div>
        <div class="section"></div>
      </main>
    
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
        $('select').material_select();
        $('#tecnologias').hide(); 
        $('#type').change(function(){
        if($('#type').val() == 'dev') {
            $('#tecnologias').show(); 
        } else {
            $('#tecnologias').hide(); 
        } 
       });
       $('#phone').mask('(00) 0000-00000');
       
    });
      </script>
    </body>
    
    </html>
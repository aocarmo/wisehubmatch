<div class="input-field">
    <input type="text" name="office" value="{{isset($vaga->office) ? $vaga->office : '' }}">
    <label for="">Cargo</label>
</div>

<div class="input-field">
    <input type="text" name="description" value="{{isset($vaga->description) ? $vaga->description : '' }}">
    <label for="">Descrição</label>    
</div>

<div class="file-field input-field">
    <div class="btn indigo">
        <span>Imagem</span>
        <input type="file" name="imagem">
    </div>     
    <div class="file-path-wrapper">        
        <input class="file-path validate" type="text">
    </div>     
</div>
@if(isset($vaga->image))
<div class="input-field">
<img width="150" src="{{asset($vaga->image)}}" alt="">
</div>
@endif
<div class="input-field col s12">
    <select multiple name="technologies[]" id="technologies">
        <option value="" disabled selected>Tecnologias</option>
        @foreach($tecnologias as $item)
        <option {{in_array($item->id,$idTecnologias) ? "selected" : ""}} value="{{$item->id}}">{{$item->name}}</option>
      @endforeach
                  
    </select>                   
</div>
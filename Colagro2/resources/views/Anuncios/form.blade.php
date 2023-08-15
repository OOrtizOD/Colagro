 <!-- /*multipart/form-data para poder enviar la imagen en el formulario*/ action="{{ url('/Anuncios')}}" -->

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
     <link rel="icon" type="image/png" href="{{asset('img/logiun.png')}}">

     <link href="https://fonts.googleapis.com/css?family=Mirza&display=swap" rel="stylesheet">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>Crear anuncio</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/script.js') }}" defer></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script type="text/javascript" src="{{ asset('js/bootstrap.js')}}">
     </script>
     <script type="text/javascript" href="script.js"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
     <script src="js/jquery.numeric.js" type="text/javascript"></script>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

 </head>


 <div class="Formulario">

     <div class="form-group">
         <label for="Nproducto">{{'Producto'}}</label>
         <input type="text"  class="form-control {{$errors->has('Nproducto')?'is-invalid':''}}" name="Nproducto" id="Nproducto" value="{{isset($anuncios->Nproducto)?$anuncios->Nproducto:old('Nproducto') }}" require>
         {!! $errors->first('Nproducto','<div class="invalid-feedback">El nombre del producto es requerido</div>')!!}
     </div>

     <div class="form-group">
         <label for="Precio">{{'Precio'}}</label>
         <input type="number" placeholder="Ingrese solo numeros"    class="form-control  {{$errors->has('Precio')?'is-invalid':''}}" name="Precio" id="Precio" value="{{isset($anuncios->Precio)?$anuncios->Precio:old('Precio') }}" require>
         {!! $errors->first('Precio','<div class="invalid-feedback">El Precio es requerido</div>')!!}
     </div>

     <div class="form-group" id="opcionC">
         <label for="my-select">Categorias</label>
         <select id="my-select" class="form-control {{$errors->has('Cat_nombre')?'is-invalid':''}}" name="Cat_nombre">
             <option value="{{isset($anuncios->Cat_nombre)?$anuncios->Cat_nombre:old('Cat_nombre')}}">{{isset($anuncios->Cat_nombre)?$anuncios->Cat_nombre:old('Cat_nombre')}}</option>
             <option>---Categorias---</option>
             @foreach($Categorias as $categoria)
             <option value="{{isset($categoria->Cat_nombre)?$categoria->Cat_nombre:old('Cat_nombre')}}">{{isset($categoria->Cat_nombre)?$categoria->Cat_nombre:old('Cat_nombre')}}</option>
             @endforeach
         </select>
         {!! $errors->first('Cat_nombre','<div class="invalid-feedback">la categoria es requerida</div>')!!}
     </div>

     <div class="form-group">
         <label for="Direccion">{{'Direccion'}}</label>
         <input type="text"  class="form-control {{$errors->has('Direccion')?'is-invalid':''}}" name="Direccion" id="Direccion" value="{{isset($anuncios->Direccion)?$anuncios->Direccion:old('Direccion') }}" require>
         {!! $errors->first('Direccion','<div class="invalid-feedback">la Direccion es requerida</div>')!!}
     </div>

     <div class="form-group">
         <label for="telefono">{{'Telefono'}}</label>
         <input type="text" class="form-control {{$errors->has('telefono')?'is-invalid':''}}" name="telefono" id="telefono" value="{{isset($anuncios->telefono)?$anuncios->telefono:old('telefono')}}" require>
         {!! $errors->first('telefono','<div class="invalid-feedback">el telefono es requerido</div>')!!}
     </div>

     <div class="form-group" id="ttarea">
         <label for="Descripcion">{{'Descripcion'}}</label>
         <textarea type="text" pattern="[a-zA-Z ]{1,500}" class="form-control {{$errors->has('Descripcion')?'is-invalid':''}}" name="Descripcion" rows="3" id="Descripcion" value="" require>{{isset($anuncios->Descripcion)?$anuncios->Descripcion:old('Descripcion') }}</textarea>
         {!! $errors->first('Descripcion','<div class="invalid-feedback">la Descripcion es requerida</div>')!!}
     </div>

     <label for="Imagen">Subir imagenes</label>
     </br>
     <div id="cont">
         <div class="form-group" id="imgfor">
             @if(isset($anuncios->Imagen))
             <img id="imag1" onclick="cam1()" src="{{asset('storage').'/'.$anuncios->Imagen}}">
             @endif
         </div>
         <div class="form-group" id="imgfor">
             <input type="file" name="Imagen" id="Imagen" class="form-control {{$errors->has('Imagen')?'is-invalid':''}}" value="" require>
             {!! $errors->first('Imagen','<div class="invalid-feedback">la imagen es requerida</div>')!!}
             <a type="button" value="" id="subirA" onclick="document.getElementById('Imagen').click()"><img id="imag1" onclick="cam1()" src="{{asset('img/icono_imagen.png')}}" require></a>
         </div>

         <div class="form-group" id="imgfor">
             @if(isset($anuncios->Imagen2))
             <img id="imag2" onclick="cam2()" src="{{asset('storage').'/'.$anuncios->Imagen2}}">
             @endif
         </div>
         <div class="form-group" id="imgfor">
             <input type="file" name="Imagen2" class="form-control {{$errors->has('Imagen2')?'is-invalid':''}}" id="Imagen2" value="" require>
             {!! $errors->first('Imagen2','<div class="invalid-feedback">la imagen es requerida</div>')!!}
             <a type="button" value="" id="subirA" onclick="document.getElementById('Imagen2').click()"><img id="imag2" onclick="cam2()" src="{{asset('img/icono_imagen.png')}}" require></a>
         </div>

         <div class="form-group" id="imgfor">
             @if(isset($anuncios->Imagen3))
             <img id="imag3" onclick="cam3()" src="{{asset('storage').'/'.$anuncios->Imagen3}}">
             @endif
         </div>
         <div class="form-group" id="imgfor">
             <input type="file" name="Imagen3" id="Imagen3" class="form-control {{$errors->has('Imagen3')?'is-invalid':''}}" value="" require>
             {!! $errors->first('Imagen3','<div class="invalid-feedback">la imagen es requerida</div>')!!}
             <a type="button" value="" id="subirA" onclick="document.getElementById('Imagen3').click()"><img id="imag3" onclick="cam3()" src="{{asset('img/icono_imagen.png')}}" require></a>
         </div>
     </div>
     <input type="submit" id="button1" class="btn btn-success" value="{{$Modo=='crear'?'Agregar ':'Modificar '}}">

     <a href="{{ url('/Anuncios/Perfil')}}" id="button1" class="btn btn-primary">Regresar</a>
 </div>

 </div>
 </form>


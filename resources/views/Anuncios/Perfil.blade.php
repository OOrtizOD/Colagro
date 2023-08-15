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

<title>Perfil</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.js')}}">
</script>
<script type="text/javascript" href="script.js"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
  {{ Session::get('Mensaje')}}
</div>

@endif


<div class="container">
  <div class="Perfil">
    <div class="Cperfil">
      <a href=""><img src="{{asset('img/perfil-sin-foto.png')}}" width="120" height="120" class="imgPerfil"></a>
      </br>
      <p id="Nperfil">Bienvenido, {{ Auth::user()->name }} Administra y gestiona tus anuncios</p></br>
      <a href="{{ url('Anuncios/create')}}" id="button" class="btn btn-primary">Crear Anuncio</a>

      <a href=" {{ route('Anuncios.editarperfil')}}" id="button" class="btn btn-success">Editar Perfil</a>

    </div>


    <div id="Tanuncios">
      <h2>Anuncios publicados</h2></br>
      <table class="table table-light">
        <thead class="thead-light">
          <tr>
            <th>Imagen</th>
            <th>#</th>
            <th>Nproducto</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Direccion</th>
            <th>telefono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($anuncios as $anuncio)
          <tr>
            <td><img id="imganuncio" src="{{asset('storage').'/'.$anuncio->Imagen}}"></td>
            <td>{{$loop->iteration}}</td>
            <td>{{$anuncio->Nproducto}}</td>
            <td>{{$anuncio->Cat_nombre}}</td>
            <td id="TDescripcion">{{$anuncio->Descripcion}}</td>
            <td>${{$anuncio->Precio}}</td>
            <td>{{$anuncio->Direccion}}</td>
            <td>{{$anuncio->telefono}}</td>
            <td>
              <script type="text/javascript">
                function confirmarEliminar() {
                  var respuesta = confirm("estas seguro de eliminar el anuncio");
                  if (respuesta == true) {
                    return true;
                  } else {
                    return false;
                  }
                }
              </script>

              <form method="post" action="{{route('anuncio.eliminar',$anuncio->id)}}">
                {{csrf_field() }}
                {{ method_field('DELETE')}}
                <button type="submit" class="btn btn-danger" id="button" onclick="return confirmarEliminar()">borrar</button>
              </form>
              <a href="{{ route('anuncios.editar',$anuncio->id)}}" id="button" class="btn btn-primary">
                Editar
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div id="paginacion" class="pagination justify-content-center">
        {{ $anuncios->links() }}
      </div>

    </div>
  </div>
</div>

<div id="footer3" class="footer2">
  <br>
  <br>
  <div id="Fot">
    <div id="autores">
      <p>© 2020 Copyright:</br> Omar Daniel ortiz Delgado - Juan Felipe Garcia Peña</p>
    </div>
    <div id="redes">
      <h1>SÍGUENOS EN</h1>
      <a href="https://www.facebook.com/colagro.colagro" target="blank"><img src="{{asset('img/facebook.png')}}" width="20" height="20"></a>
      <a href="https://twitter.com/colagro1" target="blank"><img src="{{asset('img/twitter.png')}}" width="20" height="20"></a>
      <a href="https://www.youtube.com/channel/UCX3ZMMQf7MlUTgbyBDpEkPw/?guided_help_flow=5" target="blank"><img src="{{asset('img/youtube.png')}}" width="20" height="20"></a>
      <a href="https://www.linkedin.com/in/colagro-colagro-584696197/" target="blank"><img src="{{asset('img/linked.png')}}" width="20" height="20"></a>
    </div>
  </div>
</div>
@endsection
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="icon" type="image/png" href="img-proyecto/logiun.png">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Mirza&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Anuncios</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap.js">
    </script>
    <script type="text/javascript" href="script.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')

    <div class="container">
        <div class="Perfil">
            <div class="Cperfil">
                <a href=""><img src="{{asset('img/perfil-sin-foto.png')}}" width="120" height="120" class="imgPerfil"></a>
                </br>
                <p id="Nperfil">Bienvenido, {{ Auth::user()->name }} Administra y gestiona tus anuncios </p>
            </div>


            <div id="Tanuncios">
                <h2>Anuncios publicados</h2></br>
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Imagen</th>
                            <th>#</th>
                            <th>Nproducto</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Direccion</th>
                            <th>telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anuncios as $anuncios)
                        <tr>
                            <td><img id="imganuncio" src="{{asset('storage').'/'.$anuncios->Imagen}}"></td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$anuncios->Nproducto}}</td>
                            <td>{{$anuncios->Descripcion}}</td>
                            <td>{{$anuncios->Precio}}</td>
                            <td>{{$anuncios->Direccion}}</td>
                            <td>{{$anuncios->telefono}}</td>
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

                                <form method="post" action="{{route('anuncio.eliminar',$anuncios->id)}}">
                                    {{csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-primary" id="button" onclick="return confirmarEliminar()">borrar</button>
                                </form>
                                <a href="{{ route('anuncios.editar',$anuncios->id)}}" id="button" class="btn btn-primary">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
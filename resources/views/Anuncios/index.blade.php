<!DOCTYPE html>
<html>

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

  <title>COLAGRO</title>

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


</head>

<body>

  @extends('layouts.app')

  @section('content')
  <section id="baner">
    <img src="{{asset('img/banner2.jpg')}}">
  </section>


  <h2 id="titulo">Anuncios</h2>

  <div id="Cfiltros">
    <nav class="navbar navbar-light float-right">
      <div class="container-fluid" id="Cbuscar">
        <form class="d-flex">
          <input class="form-control me-2" id="buscar" name="buscarpor" type="search" placeholder="Buscar por producto" aria-label="Search">
          <button class="btn btn-outline-success" id="buscarbutton" type="submit">Buscar</button>
        </form>
    </nav>
    <nav class="navbar navbar-light float-left">
      <div class="container-fluid " id="Copcion">
        <form class="d-flex" method="GET">
          <select id="my-select" class="form-control" name="Copcion">
            <option>---Categorias---</option>
            @foreach($Categorias as $categoria)
            <option value="{{$categoria->Cat_nombre}}" name="" id="opcion">{{$categoria->Cat_nombre}}</option>
            @endforeach
          </select>
          <button class="btn btn-outline-success" id="buscarbutton" action="route{{route ('Anuncios.index') }}" type="submit">Filtrar</button>
        </form>
      </div>
    </nav>
  </div>



  <section id="seccion1">

    @foreach($anuncios as $anuncio)

    <div id="Anuncios"><img src="{{asset('storage').'/'.$anuncio->Imagen}}">
      <div>
        <h6>Contacto:{{$anuncio->Nusuario}}</h6><br>
        <h6>Producto:{{$anuncio->Nproducto}}</h6><br>
        <h6>Direccion:{{$anuncio->Direccion}}</h6><br>
        <button type="button" id="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$anuncio->id}}">
          Conocer mas
        </button>
        <!-- Modal -->
        <div id="modal">
          <div class="modal fade" id="exampleModal_{{$anuncio->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="model" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Descripcion del producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="DescripcionP">
                    <img id="img1" src="{{asset('storage').'/'.$anuncio->Imagen}}">
                    <img id="img2" src="{{asset('storage').'/'.$anuncio->Imagen2}}">
                    <img id="img2" src="{{asset('storage').'/'.$anuncio->Imagen3}}">
                    <h4>Categoria:</h4>
                    <p>{{$anuncio->Cat_nombre}}</p>
                    <h4>Descripcion:</h4>
                    <p id="TDescripcion">{{$anuncio->Descripcion}}</p><br>
                    <h4>Precio:</h4>
                    <p>${{$anuncio->Precio}}</p>
                    <h4>Contacto:</h4>
                    <p>{{$anuncio->telefono}}</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endforeach

  </section>
  <div id="paginacion" class="pagination justify-content-center">
    {{ $anuncios->links() }}
  </div>

  <hr width="500">
  </br>
  <section id="seccion4" class="capa_a_ocultar">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('img/slider7.jpg')}}" width="1250" height="720" hialt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('img/COL2.png')}}" width="1250" height="720" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('img/slider9.jpg')}}" width="1250" height="720" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </section>
  </br>
  <hr width="500">

  <div id="footer2" class="footer2">
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

</body>

</html>
<?php

namespace App\Http\Controllers;

use App\Anuncios;
use App\User;
use App\categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //public function Nanuncios()
    //{
    //
    //return view('Anuncios.Nanuncios');
    //}

    public function index(Request $request)
    {
        //

        $Cnombre = categorias::all();
        $Categorias = array("Categorias" => $Cnombre);
        $Nombrep = $request->get('buscarpor');
        $opcion = $request->get('Copcion');

        $datos['anuncios'] = Anuncios::where('Cat_nombre', 'like', "%$opcion%")->where('Nproducto', 'like', "%$Nombrep%")->paginate(12);
        return view('Anuncios.index', $datos, $Categorias);
    }


    //public function filtrar(request $request ,$Cat_nombre){      
    //$datos['anuncios']=Anuncios::where('Cat_nombre','like',"%$Cat_nombre%")->paginate(12);
    // return view('Anuncios.index',$datos );  
    //  }

    // public function Nanuncios()
    // {
    //     $datos['anuncios']=Anuncios::paginate(20);
    //     return view('Anuncios.Nanuncios',$datos);
    // }

    public function Perfil(Request $request)
    {


        $usuarioid = auth()->user()->id;
        $datos['anuncios'] = Anuncios::where('idusuario', 'like', "%$usuarioid%")->paginate(5);
        return view('Anuncios.Perfil', $datos);
    }

    public function editarperfil(Request $request)
    {


        return view('Anuncios.editarperfil');
    }

    public function updateUsuario(Request $request)
    {


        $usuarioid = auth()->user()->id;
        $Cactual = auth()->user()->password;
        $datosusuario = request()->except(['_token', '_method']);
        $Cnueva = ($request->get('password'));
        $datosAnuncio['password'] = Hash::make($request->get('password'));
        $Cantigua = ($request->get('Apassword'));


        if (Hash::check($Cantigua, $Cactual)) {
            if (!Hash::check($Cnueva, $Cactual)) {
                $usuario = User::findOrFail($usuarioid);
                User::where('id', '=', $usuarioid)->update($datosAnuncio);
                return redirect('/Anuncios/Perfil')->with('Mensaje', 'Usuario Modificado con éxito');
            } else {
                return redirect('/Anuncios/editarperfil')->with('Mensaje', 'la contraseña actual y la nueva son iguales');
            }
        } else {
            return redirect('/Anuncios/editarperfil')->with('Mensaje', 'la contraseña actual no coincide');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Cnombre = categorias::all();
        $Categorias = array("Categorias" => $Cnombre);
        return view('Anuncios.create', $Categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos = [
            'Nproducto' => 'required|string|max:190',
            'Precio' => 'required|string|max:190',
            'Cat_nombre' => 'required|string|max:190',
            'Direccion' => 'required|string|max:190',
            'telefono' => 'required|string|max:190',
            'Descripcion' => 'required|string|max:500',
            'Imagen' => 'required|mimes:jpeg,png,jpg',
            'Imagen2' => 'required|mimes:jpeg,png,jpg',
            'Imagen3' => 'required|mimes:jpeg,png,jpg',
        ];

        $Mensaje = ["required" => 'El :attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);

        //$datosAnuncio=request()->all();

        $datosAnuncio = request()->except('_token');

        //el if es para guarda la imagen en una carpeta llamada img
        if ($request->hasFile('Imagen', 'Imagen2', 'Imagen3')) {
            $datosAnuncio['Imagen'] = $request->file('Imagen')->store('img', 'public');
            $datosAnuncio['Imagen2'] = $request->file('Imagen2')->store('img', 'public');
            $datosAnuncio['Imagen3'] = $request->file('Imagen3')->store('img', 'public');
            $datosAnuncio['idusuario'] = auth()->user()->id;
            $datosAnuncio['Nusuario'] = auth()->user()->name;
        }

        Anuncios::insert($datosAnuncio);
        // eturn response()->json($datosAnuncio);
        return redirect('/Anuncios/Perfil')->with('Mensaje', 'Anuncio creado con éxito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncios $anuncios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $anuncios = Anuncios::findOrFail($id);
        $Cnombre = categorias::all();
        $Categorias = array("Categorias" => $Cnombre);

        return view('anuncios.edit', $Categorias, compact('anuncios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos = [
            'Nproducto' => 'required|string|max:190',
            'Precio' => 'required|string|max:190',
            'Cat_nombre' => 'required|string|max:190',
            'Direccion' => 'required|string|max:190',
            'telefono' => 'required|string|max:190',
            'Descripcion' => 'required|string|max:500',

        ];


        if ($request->hasFile('Imagen')) {

            $campos += ['Imagen' => 'mimes:jpeg,png,jpg'];
            $campos += ['Imagen2' => 'mimes:jpeg,png,jpg'];
            $campos += ['Imagen3' => 'mimes:jpeg,png,jpg'];
        }

        $Mensaje = ["required" => 'El :attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);


        $datosAnuncio = request()->except(['_token', '_method']);

        if ($request->hasFile('Imagen')) {

            $anuncios = Anuncios::findOrFail($id);

            Storage::delete('public/' . $anuncios->Imagen);

            $datosAnuncio['Imagen'] = $request->file('Imagen')->store('img', 'public');
        } elseif ($request->hasFile('Imagen2')) {

            $anuncios = Anuncios::findOrFail($id);

            Storage::delete('public/' . $anuncios->Imagen2);

            $datosAnuncio['Imagen2'] = $request->file('Imagen2')->store('img', 'public');
        } elseif ($request->hasFile('Imagen3')) {

            $anuncios = Anuncios::findOrFail($id);

            Storage::delete('public/' . $anuncios->Imagen3);

            $datosAnuncio['Imagen3'] = $request->file('Imagen3')->store('img', 'public');
        }

        if ($request->hasFile('Imagen')) {
            if ($request->hasFile('Imagen2')) {
                if ($request->hasFile('Imagen3')) {

                    $anuncios = Anuncios::findOrFail($id);

                    Storage::delete('public/' . $anuncios->Imagen);
                    Storage::delete('public/' . $anuncios->Imagen2);
                    Storage::delete('public/' . $anuncios->Imagen3);

                    $datosAnuncio['Imagen'] = $request->file('Imagen')->store('img', 'public');
                    $datosAnuncio['Imagen2'] = $request->file('Imagen2')->store('img', 'public');
                    $datosAnuncio['Imagen3'] = $request->file('Imagen3')->store('img', 'public');
                }
            }
        }


        if ($request->hasFile('Imagen')) {
            if ($request->hasFile('Imagen2')) {
                Storage::delete('public/' . $anuncios->Imagen);
                Storage::delete('public/' . $anuncios->Imagen2);

                $datosAnuncio['Imagen'] = $request->file('Imagen')->store('img', 'public');
                $datosAnuncio['Imagen2'] = $request->file('Imagen2')->store('img', 'public');
            }
        }

        if($request->hasFile('Imagen2')) {
            if ($request->hasFile('Imagen3')) {
                Storage::delete('public/' . $anuncios->Imagen2);
                Storage::delete('public/' . $anuncios->Imagen3);
               
                $datosAnuncio['Imagen2'] = $request->file('Imagen2')->store('img', 'public');
                $datosAnuncio['Imagen3'] = $request->file('Imagen3')->store('img', 'public');
            }
        }
        
        if($request->hasFile('Imagen')) {
            if ($request->hasFile('Imagen3')) {
                Storage::delete('public/' . $anuncios->Imagen);
                Storage::delete('public/' . $anuncios->Imagen3);
               
                $datosAnuncio['Imagen'] = $request->file('Imagen')->store('img', 'public');
                $datosAnuncio['Imagen3'] = $request->file('Imagen3')->store('img', 'public');
            }
        } 
        




        Anuncios::where('id', '=', $id)->update($datosAnuncio);

        $anuncios = Anuncios::findOrFail($id);
        return redirect('/Anuncios/Perfil')->with('Mensaje', 'Anuncio Modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $anuncios = Anuncios::findOrFail($id);

        if (Storage::delete('public/' . $anuncios->Imagen)) {
            if (Storage::delete('public/' . $anuncios->Imagen2)) {
                if (Storage::delete('public/' . $anuncios->Imagen3)) {
                    Anuncios::destroy($id);
                }
            }
        }


        return back()->with('Mensaje', 'Anuncio Elminado con éxito');
    }
}

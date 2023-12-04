<?php

namespace App\Http\Controllers;
use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function registrar(Request $request){
        $libro = new Libro();
        $libro->titulo=$request->titulo;
        $libro->year=$request->year;
        $libro->autor_id=$request->autor_id;
        $libro->save();
        return back()->with('success', 'Libro registrado exitosamente');
    }

    public function index(){
        $autores = Autor::where('estado', 1)->get();
        return view('persona.libro', compact('autores'));
    }
    
    public function indexl(){
        $libreria = Libro::where('estado', 1)->get();
        return view('persona.libro',compact('libreria'));
   
   }

   public function mostrar(){
    $autores = Autor::where('estado', 1)->get();
    $libreria = Libro::join('autors', 'autor_id', '=', 'autors.id')
        ->where('libros.estado', 1)
        ->select('libros.*', 'autors.nombre')
        ->get();

    return view('persona.tabla', compact('libreria', 'autores'));
}


public function filtrarlibro(Request $request){
    $autores = Autor::where('estado', 1)->get();
    $libreria = Libro::join('autors', 'autor_id', '=', 'autors.id')
        ->where('libros.estado', 1)
        ->where('autors.id', '=', $request->datoFiltrado)
        ->select('libros.*', 'autors.nombre')
        ->get();

    return view('persona.tabla', compact('libreria', 'autores'));
}


    public function eliminar($id){
        $libro = Libro::find($id);
        if ($libro) {
            $libro->estado = false;
            $libro->save();
            return back();
        }
    }

    public function actualizar($id){
        $autor = Autor::where('estado', 1)->get();
        $libro = Libro::find($id);
        if($id){
            return view('persona.libroedit', compact('libro', 'autor'));
        }
       
    }
    
    public function updateLibro(Request $request, $id){
        $datoNuevo = Libro::find($id);
        if ($datoNuevo) {
            $datoNuevo->update([
                "titulo" => $request->input("titulo"),
                "year" => $request->input("year"),
                "autor_id" => $request->input("id_autor")
            ]);
        } 
        return redirect('datos');
    //    return view('libro.libro',  compact('autor'));
    // return back();
    }
}

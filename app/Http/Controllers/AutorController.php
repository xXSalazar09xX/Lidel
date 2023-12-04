<?php

namespace App\Http\Controllers;
use App\Models\Autor;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function registrar(Request $request){
        $autor = new Autor();
        $autor->nombre = $request->nombre;
        $autor->save();
        return back();
    }
    public function editara($id){
        $autor= Autor::findOrFail($id);
        return view('persona.personaedit',compact('autor'));
    }

    public function index(){
        $autores= Autor::where('estado', 1)->get();
        return view("persona.autor", compact('autores'));
    }

    public function eliminar($id){
        $autor = Autor::find($id);
        if ($autor) {
            $autor->estado = false;
            $autor->save();
            return back();
        }
    }

    public function actualizar(Request $request, $id){
        $autor = Autor::find($id);
        if ($autor) {
            $autor->nombre = $request->nombre;
            $autor->save();
            return redirect('/');

        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propiedades = Propiedad::all();
        return view('propiedad.index', compact('propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Abre el formulario de captura de registros
        return view('propiedad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validación de campos requeridos
        $this->validate($request, [
            'direccion' => 'required',
            'id_usuario' => 'required',
            'estado' => 'required',
            'precio_propiedad' => 'required'
        ]);
        
        $propiedad = new Propiedad();
        $propiedad->id_propiedad = rand(1, 10000);
        $propiedad->estado = $request->input('estado');
        $propiedad->area = $request->input('area');
        $propiedad->direccion = $request->input('direccion');
        $propiedad->precio_propiedad = $request->input('precio_propiedad');
        $propiedad->id_usuario = $request->input('id_usuario');
        $propiedad->descripcion = $request->input('descripcion');
        $propiedad->updated_at = now();
        $propiedad->created_at =  now();
        $propiedad->save();
        return redirect()->route('propiedad.index')->with(array(
            'message' => 'La Propiedad se ha guardado correctamente'
        )); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_propiedad)
    {
        //Abre el formulario que permita editar un registro
        $propiedad = Propiedad::where('id_propiedad', $id_propiedad)->first();
        return view('propiedad.edit', array(
       'propiedad'=>$propiedad
   ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_propiedad)
    {
        //Guarda la información del formulario de edición
        $this->validate($request, [
            'direccion' => 'required',
            'id_usuario' => 'required',
            'estado' => 'required',
            'precio_propiedad' => 'required'
        ]);

        $propiedad = Propiedad::where('id_propiedad', $id_propiedad)->first();
        $propiedad->id_propiedad = $propiedad->id_propiedad;
        $propiedad->estado = $request->input('estado');
        $propiedad->area = $request->input('area');
        $propiedad->direccion = $request->input('direccion');
        $propiedad->precio_propiedad = $request->input('precio_propiedad');
        $propiedad->id_usuario = $request->input('id_usuario');
        $propiedad->descripcion = $request->input('descripcion');
        $propiedad->updated_at = now();
        $propiedad->created_at = $propiedad->created_at;
        
        $propiedad->save();
        return redirect()->route('propiedad.index')->with([
            'message' => 'La editorial se ha actualizado correctamente'
        ]);
    }

    public function deletePropiedad($id_propiedad)
    {
        $id_propiedad = Propiedad::find($id_propiedad);
        if ($id_propiedad) {
            $editorial->estatus = 0;
            $editorial->update();
            return redirect()->route('editoriales.index')->with("message", "La editorial se ha eliminado correctamente");
        } else {
            return redirect()->route('editoriales.index')->with("message", "La editorial que trata de eliminar no existe");
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

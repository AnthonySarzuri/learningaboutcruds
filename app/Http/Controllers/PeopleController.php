<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagina inicio
        $busqueda=trim($request->get('busqueda'));
        $datos=DB::table('people')
                ->where('apPat','LIKE','%'.$busqueda.'%')
                ->orwhere('nombre','LIKE','%'.$busqueda.'%')
                ->orderBy('apPat','asc')
                ->paginate(10);
        return view ('index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('agregar');
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
        $people=new People();
        $people->apPat=$request->post('apPat');
        $people->apMat=$request->post('apMat');
        $people->nombre=$request->post('nombre');
        $people->fecNac=$request->post('fecNac');
        $people->save();

        return redirect()->route('people.index')->with("success","Agregado exitosamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $people=People::find($id);
        return view ('eliminar', compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $people=People::find($id);
        return view ('actualizar', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $people=People::find($id);
        $people->apPat=$request->post('apPat');
        $people->apMat=$request->post('apMat');
        $people->nombre=$request->post('nombre');
        $people->fecNac=$request->post('fecNac');
        $people->save();

        return redirect()->route('people.index')->with("success","Datos editados !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $people=People::find($id);
        $people->delete();
        return redirect()->route('people.index')->with("success","Se ha eliminado");
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documentos;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentosController extends Controller
{
    use HasFactory;
/**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $documentos = Documentos::all();
            view::make('documentos.index', compact('documentos'));
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            return view::make('documentos.create');
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(request $request)
        {
            $request->validate([
                'nombre' => 'required',
                'descripcion' => 'required',
                'fecha' => 'required',
                'tipo_id' => 'required',
                'area_id' => 'required',
                'pdf' => 'required',
            ]);
            $documento = new Docuemtos;
            $documento->nombre = $request->nombre;
            $documento->descripcion = $request->descripcion;
            $documento->fecha = $request->fecha;
            $documento->tipo_id = $request->tipo_id;
            $documento->area_id = $request->area_id;
            
            if( $request->hasfile('pdf') )
            {   
                $documento->url = $request->pdf->store('pdf', 'public');
                
            }

            $documento->save();
            return redirect()->routes('documentos.index');

        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show($id)
        {
            $documento = documento::find($id);

            // show the view and pass the documento to it
            return View::make('documentos.show')
                ->with('documento', $documento);        }
    
        /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function edit($id)
        {
            return view::make('documentos.edit');
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update(Request $request)
        {
            $request->validate([
                'fecha' => 'required',
                'pdf' => 'nullable',
            ]);

           $documento = Documentos::find($request->id);
           if( $request->hasfile('pdf') )
           {   
               $documento->estado = 'inactivo';
           }

            $documento->save();
            $documentoNuevo = new Documentos;
            $documentoNuevo->nombre = $documento->nombre;
            $documentoNuevo->descripcion = $documento->descripcion;
            $documentoNuevo->fecha = $request->fecha;
            $documentoNuevo->tipo_id = $documento->tipo_id;
            $documentoNuevo->area_id = $documento->area_id;
            $documentoNuevo->url = $documento->url;
            $documentoNuevo->estado = 'activo';
            $documentoNuevo->save();

        }
    
        /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function destroy($id)
        {
            //
        }
}

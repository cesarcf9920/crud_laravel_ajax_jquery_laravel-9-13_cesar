<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TrabajadorController;
use App\Http\Requests\TrabajadorRequest;
use App\Models\Trabajador;
use App\Models\Cargo;
use App\Models\Proyecto;
use App\Models\TipoCambio;
use App\Models\TipoPago;

use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{

    public function __construct()
    {        
    }

    public function index()
    {   
        $cargos = Cargo::all();

        return view('trabajador.index', compact('cargos'));
    }

    public function load(Request $request)
    {
        /*
        $usuarios = file_get_contents('https://jsonplaceholder.typicode.com/users');
        $usuarios= json_decode($usuarios);
        $array = [];
        $cont = 0;

        if(Usuario::all()->count() == 0){

            foreach ($usuarios as $key => $value) {
                $array = [
                    'name' => $value->name,
                    'username' => $value->username,
                    'phone' => $value->phone,
                    'email' => $value->email,
                    'compañia' => $value->company ? $value->company->name : '',
                    'street' => $value->address ? $value->address->street : '',
                    'lat' => $value->address ? ($value->address->geo ? $value->address->geo->lat : '') : '',
                    'lng' => $value->address ? ($value->address->geo ? $value->address->geo->lng : '') : ''
                ];
                Usuario::create($array); 
            }
        }
        */
     
        $trabajadores = Trabajador::with(['cargo', 'proyecto'])
            ->activo()
            ->search($request->search)
            ->cargo($request->cargo_id)
            ->estado($request->estado)
            ->orderByDesc('id')
            ->whereNull('deleted_at')
            ->paginate(5);
        /*$query->when($request->filled('cargo_id'), function ($q) use ($request) {
            $q->where('cargo_id', $request->cargo_id);
        });
        $query->when($request->filled('estado'), function ($q) use ($request) {
                $q->where('activo', $request->estado);
            }); */
                    
        return view('trabajador.partials.load', compact('trabajadores'));
    }

    public function tiposPagos()
    {   //dd('sssss',response()->json(TipoPago::all()));
        return response()->json(TipoPago::all());
    }

    public function tiposCambios( TipoPago $tipo_pago)
    //public function tiposCambios(Request $request) //2da opcion
    {    
        return response()->json(TipoCambio::all());
    }
    public function create()
    {        
        $proyectos = Proyecto::all();
        $cargos = Cargo::all();
        $tipos_pagos = TipoPago::all();
        return view('trabajador.modals.create', compact('cargos', 'proyectos', 'tipos_pagos'));
    }

    public function store(TrabajadorRequest $request)
    {
        Trabajador::create($request->validated());

        return response()->json(true);

       /*DB::transaction(function () use ($request) {

            $trabajador = Cargo::create($request->validated());

            $trabajador->detalle()->create([
                'info' => 'algo'
            ]);

        });*/
    }

    public function edit(Trabajador $trabajador)
    {
        $cargos = Cargo::all();
        $proyectos = Proyecto::all();
        $tipos_pagos = TipoPago::all();
        $tipos_cambios = TipoCambio::all();
        return view('trabajador.modals.edit', compact('trabajador', 'cargos', 'proyectos', 'tipos_pagos', 'tipos_cambios'));
    }
   
    public function update(TrabajadorRequest $request, Trabajador $trabajador)
    {
        $trabajador->update($request->validated());
        
        return response()->json(true);

         /*DB::transaction(function () use ($request, $trabajador) {

            $trabajador->update($request->validated());

            // otra tabla
            $trabajador->logs()->create([
                'accion' => 'ACTUALIZADO'
            ]);

        });*/
    }

    /*Con manejo de errores */
    /*public function update(Request $request, Trabajador $trabajador)
    {
        try {
            $trabajador->update($request->validated());

            return response()->json(true);

        } catch (\Exception $e) {
            \Log::error($e);

            return response()->json([
                'error' => 'No se pudo actualizar'
            ], 500);
        }
    }*/


    /*Con manejo de errores */
    /*public function update(Request $request, Cargo $cargo)
    {
        try {
            $cargo->update($request->validated());

            return response()->json(true);

        } catch (\Exception $e) {
            \Log::error($e);

            return response()->json([
                'error' => 'No se pudo actualizar'
            ], 500);
        }
    }*/

    public function show(Trabajador $trabajador)
    {
        return view('trabajador.modals.show', compact('trabajador'));
    }

    public function destroy(Trabajador $trabajador)
    {
        $trabajador->delete();

        return response()->json(true);
    }
}

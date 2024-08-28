<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Http\Requests\UserRequest;
use App\Entities\Usuario;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {        
    }

    public function index()
    {
        return view('usuario.index');
    }

    public function load()
    {
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
        $usuarios = Usuario::all();
            
        return view('usuario.partials.load', compact('usuarios'));
    }

    public function create()
    {
        return view('usuario.modals.create');
    }

    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            Usuario::create($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            abort(500);
        }

        $post_route = route('usuario.index');
        session()->flash('message', 'El usuario se guardó satisfactoriamente.');

        return response()->json(['route' => $post_route]);
    }

    public function edit(Usuario $usuario)
    {
        return view('usuario.modals.edit', compact('usuario'));
    }

    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        try {
            DB::beginTransaction();
            $usuario->update($request->all());

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            abort(500);
        }

        return redirect()->route('usuario.edit', ['usuario' => $usuario->id])->with('message', "El usuario: $usuario->nombre se actualizó satisfactoriamente");
    }

    public function show(Usuario $usuario)
    {
        return view('usuario.modals.show', compact('usuario'));
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return response()->json(true);
    }
}

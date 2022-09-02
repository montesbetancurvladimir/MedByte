<?php

namespace App\Http\Controllers\User;

//Validadores
use App\Http\Requests\Usuario\StoreRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

use App\Models\UserTeam;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserEmpresa;
use App\Models\TeamEmpresa;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::select('*')->orderBy('id','desc')->paginate(15);
        $equipos = TeamEmpresa::select('*')->orderBy('id','desc')->get();
        return view('auth.usuarios',compact('users','equipos'));
    }

    public function create(){
        $equipos = TeamEmpresa::select('*')
        ->where([
            ['id_empresa','=','1'],
        ])->pluck('id','description');
        return view('auth.crear-usuarios',compact('equipos'));
    }

    public function create_equipos(){
        return view('auth.crear-equipos');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $userEmpresa = UserEmpresa::where('user_id', $user_id)->first();
        /*
        $request->validate([
            'nombre1' => ['required', 'string', 'max:255'],
            'nombre2' => ['required', 'string', 'max:255'],
            'apellido1' => ['required', 'string', 'max:255'],
            'apellido2' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]); 

        return [
            'nombre1.required' => 'Es requerido el nombre 1.',
            'nombre2.required' => 'Es requerido el nombre 2.',
            'apellido1.required' => "Es requerido el apellido 1.",
            'apellido1.required' => 'Es requerido el apellido 2.',
            'celular.required' => "Es requerido el número de celular.",
            'email.integer' => 'Es requerido el email.',
            'password.required' => "Es requerido el password.",
        ];
        */
        $user = User::create([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //Trae el último registro del usuario.
        $ultimo_registro = User::select('id')->orderBy('id', 'desc')->first();
        UserTeam::create([
            'id_user' =>$ultimo_registro->id,
            'id_team' =>implode(",", $request->ramo),
        ]);

        $empresa = UserEmpresa::create([
            'user_id' => $user_id,
            'empresa_id' => $userEmpresa->empresa_id,
        ]);

        $request->session()->flash('status','Registro creado correctamente.');
        return redirect("User/index");

    }

    public function store_equipos(Request $request)
    {
        $user_id = auth()->user()->id;
        $userEmpresa = UserEmpresa::where('user_id', $user_id)->first();

        $data = array_merge($request->all(),['id_empresa' => $userEmpresa->empresa_id]);

        TeamEmpresa::create($data);

        $request->session()->flash('status','Registro creado correctamente.');
        return redirect("User/index");
    }

    public function show($id)
    {
        //
    }
    
    public function edit(Request $request, User $User)
    {
        return view('auth.crear-usuarios',compact('User'));
    }

    public function update(Request $request, User $User)
    {
    }

    public function update_refused(Request $request, User $User)
    {

    }

    public function destroy($id)
    {
        //
    }
}

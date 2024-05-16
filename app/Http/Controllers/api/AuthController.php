<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        try {
            $data = ["success" => false, "message" => "Usuario no registrado"];

            $request->validate(
                [
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'string', 'min:8'],
                ],
                [
                    'email' => 'El campo Email es requerido',
                    'password' => 'El campo de Contraseña debe terner minimo 8 caracteres'
                ]
            );

            $user = User::whereEmail($request->email)->first();
            if (!empty($user)) {
                $data = ["success" => false, "mensaje" => "Contrasña incorrecta"];
                if (Hash::check($request->password, $user->password)) {
                    //$accessToken = $user->createToken("auth_token")->plainTextToken;
                    if($user->usertype == "3"){
                        $a = DB::table('alumnos')->where('CI',$user->ci)->first();
                        $data = [
                            "success" => true,
                            "mensaje" => "Usuario Autenticado",
                            "user"=> $user,
                            "alumnoid"=>  $a->id,
                            //"access_token" => $accessToken
                        ];
                    }
                    $data = [
                        "success" => true,
                        "mensaje" => "Usuario Autenticado",
                        "user"=> $user,
                        "alumnoid"=>  1,
                        //"access_token" => $accessToken
                    ];
                    

                }
            }
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage()], 404);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Cerraste Session Tokens borrados',
            'usuario' => $user,
        ]);
    }

    public function token(Request $request)
    {
        $user = $request->user();
        return response()->json([
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "tipo" => $user->tipo
        ], 200);
    }
}

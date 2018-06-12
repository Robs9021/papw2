<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Empresa;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    //inicio sesion de instructor
    public function login(Request $request)
    {
        try 
        {
            if($request->has('email'))
            {
                $email = Input::get('email');
            }
            else
            {
                return "Problema con el email";
            }
            if($request->has('password'))
            {
                $password = Input::get('password');
            }
            else
            {
                return "Problema con el password";
            }

            $user = Usuario::where('email', $email)
                            ->where('type', 2)
                            ->get(['id', 'password']);

            
            //return $user;
            $id = $user[0]->id;

            if(Hash::check($password, $user[0]->password))
            {
                $user = Usuario::where('id', $id)
                                ->get(['id', 'name', 'image', 'empresa_id']);
            }
            else
            {
                return "usuario o password incorrectos";
            }
            

        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            return " Terminó con error";
        }
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

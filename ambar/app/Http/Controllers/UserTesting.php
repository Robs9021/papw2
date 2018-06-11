<?php
namespace App\Http\Controllers;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use Illuminate\Http\Request;
use App\Usuario;
use App\Empresa;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Exception;



class UserTesting extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("declareUser");
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
        //json_decode($JSONrequest, true);
        $user = new Usuario;
        $user->name = Input::get('name');
        $user->lastName = Input::get('lastName');
        $user->email = Input::get('email');
        try
        {
            $password = Input::get('password');
            $user->password = Hash::make($password);
        }
        catch (\Exception $e) 
        {
            return $e;
        }
        $user->type = Input::get('type');
        $user->empresa_id = Input::get('company');
        $user->usuario_id = Input::get('creator');
        $user->image = Input::get('image');
        

        try
        {
           $user->save();
            
        }
        catch (\Exception $e) 
        {
            //$error_code = $e->getMessage[1];
            return $e;
        }
        return "OK";
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$empresas = App\Empresa::all();
        return "fun";
    }

    public function showE()
    {
        
        //$empresas = App\Empresa::all();
        try 
        {
            //echo "inicio";
            $empresas = 0;
            $empresas = Empresa::orderBy('name', 'asc')->get(['id', 'name']);
            //echo $empresas;
            //$empresas = App\Empresa::all();
            
        }
        catch(\Illuminate\Database\QueryException $e) {
          echo $e->getMessage();
        }
        return $empresas;
    }

    public function addCompany(Request $request)
    {
        $company = new Empresa;
        $company->name = Input::get('name');
        try
        {
           $company->save();
           return $company;            
        }
        catch (\Illuminate\Database\QueryException $e) 
        {
            //$error_code = $e->getMessage[1];
            return $e;
        }
        return "Empresa agregada";
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

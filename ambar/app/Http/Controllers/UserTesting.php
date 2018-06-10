<?php
namespace App\Http\Controllers;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use Illuminate\Http\Request;
use App\Usuario;
use App\Empresa;
use Illuminate\Support\Facades\Input;
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
        $user = new Usuario;
        $user->name = Input::get('name');
        $user->lastName = Input::get('lastName');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->image = Input::get('image');
        //$user->save();
        return "hello";
        
        

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
            $empresas = Empresa::get(['id', 'name']);
            //echo $empresas;
            //$empresas = App\Empresa::all();
            
        }
        catch(\Illuminate\Database\QueryException $e) {
          echo $e->getMessage();
        }
        return $empresas;
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

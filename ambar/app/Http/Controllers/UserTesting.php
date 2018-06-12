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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
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


            // $encrypted = Crypt::encryptString($password);

            // $user = Usuario::where('email', $email)
            //                  ->where('type', 1)
            //                  ->where('password', $encrypted)
            //                  ->get(['id', 'name', 'image', 'empresa_id']);

            $user = Usuario::where('email', $email)
                            ->where('type', 1)
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

    public function searchUser(Request $request)
    {
        try
        {
            if($request->has('searchText'))
            {
                
                $searchText = Input::get('searchText');
                $id = Input::get('lastId');
                
                $users = Usuario::rightJoin('empresas', 'empresas.id', '=', 'usuarios.empresa_id')
                                ->where(function($q) use ($searchText)
                                {
                                    $q->where('usuarios.name', 'LIKE', '%' . $searchText . '%')
                                    ->orWhere('usuarios.lastName', 'LIKE', '%' . $searchText . '%')
                                    ->orWhere('usuarios.email', 'LIKE', '%' . $searchText . '%')
                                    ->orWhere('empresas.companyName', 'LIKE', '%' . $searchText . '%');
                                })
                                ->where('usuarios.id', '>', $id)
                                ->get(['usuarios.id', 'usuarios.name', 'usuarios.lastName', 'usuarios.image', 'empresas.companyName'])
                                ->first();
                            /*    $users = Usuario::rightJoin('empresas', 'empresas.id', '=', 'usuarios.empresa_id')->where(function($q) use ($searchText){$q->where('usuarios.name', 'LIKE', '%' . $searchText . '%')->orWhere('usuarios.lastName', 'LIKE', '%' . $searchText . '%')->orWhere('usuarios.email', 'LIKE', '%' . $searchText . '%')->orWhere('empresas.companyName', 'LIKE', '%' . $searchText . '%');})->where('usuarios.id', '>', $id)->get(['usuarios.id', 'usuarios.name', 'usuarios.lastName', 'usuarios.image', 'empresas.companyName'])->first();      */
                return $users;
            }
            else
            {
                return "No hubo busqueda";
            }
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            return "termino con error";
        }
        return 'ok';
    }

    public function searchUserById(Request $request)
    {
        //return "hola";
        try
        {
            if($request->has('searchById'))
            {
                $id = Input::get('searchById');
                //return "adios";
                $user = Usuario::where('id', '=', $id)
                                ->get(['id', 'type', 'name', 'lastName', 'email', 'image', 'empresa_id']);
                return $user;
            }
            else
            {
                return "No hubo busqueda";
            }
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            return "termino con error";
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
            $empresas = Empresa::orderBy('companyName', 'asc')->get(['id', 'companyName']);
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
        $company->companyName = Input::get('name');
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
        try
        {
            $user = Usuario::where('id', '=', $id)
                            ->get();
            //return $user;
            $user[0]->name = Input::get('name');
            $user[0]->lastName = Input::get('lastName');
            $user[0]->email = Input::get('email');
            $password = Input::get('password');
            //return $password;
            $user[0]->password = Hash::make($password);
            $user[0]->type = Input::get('type');
            $user[0]->empresa_id = Input::get('company');
            $user[0]->image = Input::get('image');
            $user[0]->save();
            return $user;
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            return " Termina Error";
        }


        
        return "Final";
    }

    public function massUpdate(Request $request)
    {
        try
        {
            //return "Entra";
            $password = Input::get('password');
            $hash = Hash::make($password);
            //return "Lee y hashea";
            Usuario::where('usuario_id', 1)
              ->update(['password' => $hash]); 
            //echo $update;
            return " hace el query";
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            return " Termina Error";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
        try
        {
            $user = Usuario::where('id', $id)->get();
            $user[0]->delete();  
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            return " Termina Error";
        }
        return "eliminado";
    }
}

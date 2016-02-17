<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use App\User;
use App\usr_login_role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class usuarioController extends Controller
{
    public function index()
	{	
		$users = User::paginate(20);
		return view('usuario.index',compact('users'));
	}

   

    public function create()
    {
    	return view('usuario.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('usuario/create')->with('user',$user);
    }
    
    /***guardar usuario***/
    public function store(Request $request)
    {
        var_dump($request['id_login']);        
    	User::create([
    		'name'=>$request['name'],
            'lastName'=>$request['lastName'],
    		$data['email']='email'=>$request['email'],
    		'password'=>bcrypt($request['password']),
    	]);
 
        if($request['id_login']=="0")
        {
              $id_login = DB::table('users')->where('email', $request['email'])->value('id');
            
                usr_login_role::create([
                            'id_login'=>$id_login,
                            'id_role'=>$request['id'],
                            'active'=>'1',
                        ]);
        }      

    	return Redirect::to("/admin/userNew");
    }

    public function register(Request $request)
    {
        User::create([
            'name'=>$request['name'],
            'lastName'=>$request['lastName'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password']),
        ]);

        return Redirect::to("login");
    }

    public function update($id,Request $request){
        $user = User::find($id);
        $user->fill($request->all());      
        $user->save();

        $idRole = $request['id'];
        $usrRole= new usr_login_role;
        $usrRole->where('id_login', '=', $id)
        ->update(['id_role' => $idRole]);

        return "actualizado";
            
        return Redirect::to("usuario");
    }

    public function delete($id)
    {
        $query=User::destroy($id);

        return view('usuario.index');
    }

}

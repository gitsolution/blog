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

        else{
           
            $id_login=$request['id_login'];
            DB::table('usr_login_roler')
            ->where('id_login', $id_login)
            ->update(['id_role' => $request['id']]);
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
            
        return Redirect::to("usuario");
    }

}

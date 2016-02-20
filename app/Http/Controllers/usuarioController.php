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
        $flag="1";
		
       
        $users = DB::table('usr_profiles')
            ->leftJoin('users', 'usr_profiles.id', '=', 'users.id')   
            ->leftJoin('usr_login_roles', 'usr_login_roles.id_login', '=', 'users.id') 
            ->leftJoin('usr_roles', 'usr_login_roles.id_login', '=', 'usr_roles.id')        
            ->select('usr_profiles.*', 'usr_roles.title as roles','users.email as email')
            ->where('users.active','=', $flag)    
             ->groupBy('users.id')        
            ->orderBy('usr_profiles.name','DESC')->paginate(20);
            
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
            'active'=>'1',
    	]);
 
       

    	return Redirect::to("/admin/userNew");
    }

    public function register(Request $request)
    {
        User::create([
            'name'=>$request['name'],
            'lastName'=>$request['lastName'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password']),
            'active'=>'1',
        ]);

        return Redirect::to("login");
    }

    public function update($id,Request $request){
       
        var_dump($id);
        return ;
        $user = User::find($id);
        $user->fill($request->all());      
        $user->save();

        $idRole = $request['id'];
        $usrRole= new usr_login_role;
        $usrRole->where('id_login', '=', $id)
        ->update(['id_role' => $idRole]);
            
        return Redirect::to("usuario");
    }

    public function delete($id)
    {
        $query=User::destroy($id);

        return view('usuario.index');
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use usr_role_action;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class roleActionController extends Controller
{
    public function store(Request $request)
    {

    	echo $request['idRole']."<br>";
    	echo $request['idModulo']."<br>";

         
        echo json_encode($request['menuIndex']);
        echo json_encode($request['index']);
        return ;

    	$dato = $request['menuIndex'];
    	$num=count($dato);

    	$chkJson='[{';    	

    	for($i=0;$i<$num;$i++)
    	{
    		$chkJson.= '"'.$dato[$i].'":"1",';
    	}

    	$chkJson=substr($chkJson,0,-1);
    	$chkJson.='}]';

    	echo "Json: ".$chkJson;
    	
        $ura = new \App\usr_role_action;
        $ura=$chkJson->toJson();
      
        $ura->save();
        


    	$ura = new \App\usr_role_action;
    	$ura->id_role=$request['idRole'];
	    $ura->id_access=$request['idModulo'];
	    $ura->action=json_encode(array($chkJson[0],true));
	    $ura->allowed='1';
	    $ura->access='0';
	    $ura->active='0';

	    $ura->save();

		return "<br><br>guardados";

















    	\App\usr_role_action::create([
	    		'id_role'=>$request['idRole'],
	            'id_access'=>$request['idModulo'],
	    		'action'=>json_encode(array($chkJson=> [0]) ),
	    		'allowed'=>json_encode(array('valor'=>$chkJson[0]) ),
	            'access'=>'0',
	            'active'=>'0',
	    	]);
    	

    	for($i=0;$i<$num;$i++)
    	{
    		$action=$dato[$i];
	    	\App\usr_role_action::create([
	    		'id_role'=>$request['idRole'],
	            'id_access'=>$request['idModulo'],
	    		'action'=>$action,
	    		'allowed'=>'1',
	            'access'=>'0',
	            'active'=>'0',
	    	]);
    	}

    	return "Datos guardados";

    	
    }
}

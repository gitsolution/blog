<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use DB;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */

   
    public function boot(GateContract $gate)
    {
        /******************obtener roles*********************/
        

        /****************** Reglas para acceso de usuarios con roles ******************************/
        $gate->define('verificar-rol',function($User)
        {            
            $b=False;
            $roles=DB::table('usr_login_roles')->whereid_login($User->id)->whereactive(1)->get();

            if($roles!=null)
            {
                $b=True;
            }

            if($User->email=="admin@admin")
                {$b=True;}    

         return $b;
        });

        /****************Reglas para admin**********************/
        $gate->define('nuevos-comentarios',function($User)
        {   
            $b=True;
            return $b;
        });

        $gate->define('nuevos-usuario',function($User)
        {            
            /*$permisos='admin.nuevo';
            $json = DB::table('cms_categories')     
            ->select('cms_categories.title', 'cms_categories.hits')    
            ->where('cms_categories.active', '=', 1)->get();*/

            $b=True;
            return $b;
        });

        $gate->define('total-albums',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('graficas',function($User)
        {            
            $b=True;
            return $b;
        });

        /****************Reglas para menu**********************/
        $gate->define('menu',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('menu.Crear',function($User)
        {           
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            $ca='admin.Menú.Crear:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}            
            
            return $b;
        });

        $gate->define('menu.editar',function($User)
        { 
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Menú.Editar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}            
            return $b;
        });

        $gate->define('menu.eliminar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Menú.Eliminar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('menu.elementos',function($User)
        {    
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Menú.Elementos:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('menu.ordenar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Menú.Ordenar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        /****************Reglas para publicaciones**********************/

        $gate->define('publicaciones',function($User)
        {            
            $b=true;
            return $b;
        });

        /****************Reglas para tipos**********************/
        $gate->define('tipos',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('admin.Tipos.Crear',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
           
            $ca='admin.Tipos.Crear:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('tipos-editar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
           
            $ca='admin.Tipos.Editar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('tipos-eliminar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
           
            $ca='admin.Tipos.Eliminar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        /****************Reglas para secciones**********************/
        $gate->define('secciones',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('Secciones.Crear',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            echo $p;
            $ca='admin.Secciones.Crear:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Secciones.editar',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
           
            $ca=',admin.Secciones.Editar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Secciones.eliminar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);

            $ca='admin.Secciones.Eliminar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Secciones.ordenar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);

            $ca='admin.Secciones.ordenar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Secciones.acceso',function($User)
        {    
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);

            $ca='admin.Secciones.acceso:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Secciones.publicar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);

            $ca='admin.Secciones.Publicar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        /****************Reglas para categorias**********************/
        $gate->define('categorias',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('Categorias.Crear',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            echo $p;
            $ca='admin.Categorias.Crear:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Categorias.Editar',function($User)
        {            
           $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            $ca=',admin.Categorias.Editar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Categorias.Eliminar',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);

            $ca=',admin.Categorias.Eliminar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Categorias.ordenar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Categorias.ordenar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Categorias.acceso',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Categorias.acceso:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Categorias.Publicar',function($User)
        {            
          $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Categorias.Publicar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        /****************Reglas para documentos**********************/
        $gate->define('documentos',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('Documentos.Crear',function($User)
        {            
           $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            echo $p;
            $ca='admin.Documentos.Crear:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Documentos.Editar',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Documentos.Editar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Documentos.Eliminar',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Documentos.Eliminar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Documentos.ordenar',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Documentos.ordenar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Documentos.acceso',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Documentos.acceso:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Documentos.Publicar',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Documentos.Publicar:true';
            $resultado = strpos($p, $ca);
           

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        /****************Reglas para comentarios**********************/
        $gate->define('comentarios',function($User)
        {            
          
        });

        $gate->define('Comentarios.Publicar',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Comentarios.Publicar:true';
            $resultado = strpos($p, $ca);
           echo $p;

            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        $gate->define('Comentarios.Eliminar',function($User)
        {            
            $permisoC="";
          $roles=DB::table('usr_login_roles')
            ->select('id_role')
            ->whereid_login($User->id)
            ->whereactive(1)->get();
            foreach ($roles as $r) {
                         $join=DB::table('user_module_rol')
                        ->select('access_granted')
                        ->whereid_role($r->id_role)
                        ->whereactive(1)->get();
                        if($join!=null){
                            foreach ($join as $j) {
                                $permisoC .=$j->access_granted;
                            }
                        }
                    }

            $permisoEspeciales=DB::table('special_permissions')
            ->select('access')
            ->whereid_user(3)
            ->whereactive(1)->get();
            
            $p=str_replace ('"', " ", $permisoC);
            $p=str_replace (' ', "", $p);
            
            $ca='admin.Comentarios.Eliminar:true';
            $resultado = strpos($p, $ca);
            if($resultado==null){$b=False;}
            else{$b=True;}if($User->email=="admin@admin"){$b=true;}  
            return $b;
        });

        /****************Reglas para archivos**********************/
        $gate->define('archivos',function($User)
        {            
            $b=True;
            return $b;
        });

        /****************Reglas para albums**********************/
        $gate->define('albums',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-nuevo',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-editar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-eliminar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-inicio',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-publicado',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-ordenar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-visualizar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-imagenes',function($User)
        {            
            $b=True;
            return $b;
        });

         /****************Reglas para directorio**********************/
        $gate->define('directorio',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('directorio-nuevo',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('directorio-editar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('directorio-eliminar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('directorio-inicio',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('directorio-publicado',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('directorio-orden',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('directorio-archivo',function($User)
        {            
            $b=True;
            return $b;
        });

        /****************Reglas para usuario**********************/
        $gate->define('usuarios',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('usuario',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('usuarios-nuevo',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('usuarios-editar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('usuarios-roles',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('usuarios-especial-permisos',function($User)
        {            
            $b=True;
            return $b;
        });

        /****************Reglas para roles**********************/
        $gate->define('roles',function($User)
        {            
            $b=True;
            return $b;
        });

         $gate->define('roles-nuevo',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('roles-editar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('roles-eliminar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('roles-activo',function($User)
        {            
            $b=True;
            return $b;
        });

        /****************Reglas para modulos**********************/
        $gate->define('modulos',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('modulos-nuevo',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('modulos-editar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('modulos-eliminar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('modulos-especiales',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('modulos-submenus',function($User)
        {            
            $b=True;
            return $b;
        });

        /****************Reglas para configuracion permisos**********************/
        $gate->define('configuracion-permisos',function($User)
        {            
            $b=True;
            return $b;
        });
        
        /****************Reglas para configuracion**********************/
        $gate->define('configuracion',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('configuracion-nuevo',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('configuracion-editar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('configuracion-eliminar',function($User)
        {            
            $b=True;
            return $b;
        });
    }
}

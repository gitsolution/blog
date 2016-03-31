<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use DB;

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
        $this->registerPolicies($gate);

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
         /*return ($User->email=="admin@admin") || ($User->id == $usr_login_roles->id_login && $usr_login_roles->active == '1');*/
        });

        /****************Reglas para admin**********************/
        $gate->define('nuevos-comentarios',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('nuevos-usuario',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('total-albums',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('graficas',function($User)
        {            
            $b=False;
            return $b;
        });

        /****************Reglas para menu**********************/
        $gate->define('menu',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('menu-nuevo',function($User)
        {            
            $b=False;
            return $b;
        });

         $gate->define('menu-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('menu-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('menu-elementos',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('menu-ordenar',function($User)
        {            
            $b=False;
            return $b;
        });

        /****************Reglas para publicaciones**********************/

        $gate->define('publicaciones',function($User)
        {            
            $b=True;
            return $b;
        });

        /****************Reglas para tipos**********************/
        $gate->define('tipos',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('tipos-nuevo',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('tipos-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('tipos-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        /****************Reglas para secciones**********************/
        $gate->define('secciones',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('secciones-nuevo',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('secciones-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('secciones-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('secciones-ordenar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('secciones-acceso',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('secciones-publicado',function($User)
        {            
            $b=False;
            return $b;
        });

        /****************Reglas para categorias**********************/
        $gate->define('categorias',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('categorias-nuevo',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('categorias-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('categorias-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('categorias-ordenar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('categorias-acceso',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('categorias-publicado',function($User)
        {            
            $b=False;
            return $b;
        });

        /****************Reglas para documentos**********************/
        $gate->define('documentos',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('documentos-nuevo',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('documentos-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('documentos-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('documentos-ordenar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('documentos-acceso',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('documentos-publicado',function($User)
        {            
            $b=False;
            return $b;
        });

        /****************Reglas para comentarios**********************/
        $gate->define('comentarios',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('comentarios-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('comentarios-publicado',function($User)
        {            
            $b=False;
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
            $b=False;
            return $b;
        });

        $gate->define('albums-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('albums-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('albums-inicio',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('albums-publicado',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('albums-ordenar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('albums-visualizar',function($User)
        {            
            $b=True;
            return $b;
        });

        $gate->define('albums-imagenes',function($User)
        {            
            $b=False;
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
            $b=False;
            return $b;
        });

        $gate->define('directorio-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('directorio-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('directorio-inicio',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('directorio-publicado',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('directorio-orden',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('directorio-archivo',function($User)
        {            
            $b=False;
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
            $b=False;
            return $b;
        });

        $gate->define('usuarios-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('usuarios-roles',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('usuarios-especial-permisos',function($User)
        {            
            $b=False;
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
            $b=False;
            return $b;
        });

        $gate->define('roles-editar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('roles-eliminar',function($User)
        {            
            $b=False;
            return $b;
        });

        $gate->define('roles-activo',function($User)
        {            
            $b=False;
            return $b;
        });

        /****************Reglas para modulos**********************/
        $gate->define('modulos',function($User)
        {            
            $b=False;
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
            $b=False;
            return $b;
        });

        $gate->define('configuracion-permisos-nuevo',function($User)
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

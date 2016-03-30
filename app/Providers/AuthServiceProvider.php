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

        //
    }
}

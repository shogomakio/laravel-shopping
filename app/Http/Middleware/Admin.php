<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Log;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin
{
    use Notifiable;
    protected $primaryKey = 'admin_id';
    protected $guard = 'admin';
    protected $table = 'administrators';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Log::info("Authenticting User.....");
        // if(Auth::guard($guard)->guest()){
        //     if($request->ajax() || $request->wantsJson()){
        //         Log::info("Unauthorized ajax request.");
        //         return response('Unauthorized.', 401);
        //     }
        //     else{
        //         Log::info("Redirecting to login page.");
        //         return redirect()->guest('/auth/github');
        //     }
        // }
        if(Auth::guard('admin')->check()){
            return $next($request);
        }
        return redirect('admin.list');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id', 'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function isAdmin()
    {
        return $this->admin; // this looks for an admin column in your users table
    }

}

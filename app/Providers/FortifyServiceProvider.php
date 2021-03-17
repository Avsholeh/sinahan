<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
//use App\Actions\Fortify\ResetUserPassword;
//use App\Actions\Fortify\UpdateUserPassword;
//use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Pengguna;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
//        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
//        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
//        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = Pengguna::where('username', $request->username)->first();

            if ($user &&
                Hash::check($request->password, $user->password)) {
                session()->flash('message', 'Username/Password anda salah!');
                return $user;
            }

            return false;
        });

        // redirect user to http://127.0.0.1:8000/biodata/edit after register.

        Fortify::loginView(function () {
            return view('pages.auth.login');
        });

        Fortify::registerView(function () {
            return view('pages.auth.register');
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

//        RateLimiter::for('two-factor', function (Request $request) {
//            return Limit::perMinute(5)->by($request->session()->get('login.id'));
//        });
    }
}

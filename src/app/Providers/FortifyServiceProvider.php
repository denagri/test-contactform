<?php
namespace App\Providers;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;
use App\Http\Requests\LoginRequest;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        /*新規登録でCreateNewUserを使う指示*/
        Fortify::createUsersUsing(CreateNewUser::class);
        /*/registerにアクセスしたらauth/registerを表示*/
        Fortify::registerView(function(){
            return view('auth.register');
        });
        Fortify::loginView(function(){
            return view('auth.login');
        });
        /*同じipアドレスから同じメールアドレスを使ってログインを試みた場合、失敗すると1分間ブロックされる*/
        RateLimiter::for('login',function(Request $request){
            $email=(string)$request->email;
            return Limit::perMinute(10)->by($email .$request->ip());
        });
        /*ログイン時のバリデーションをfortifyのデフォルトから自分で作成したLoginRequestに差し替える*/
        $this->app->bind(FortifyLoginRequest::class, LoginRequest::class);
    }
}

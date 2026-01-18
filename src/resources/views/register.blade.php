<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>
<body>
   <header class="header">
       <div class="header__inner">
           <a class="header__logo">
            FashionablyLate
           </a>
           <form class="login-form" action="/login" method="post" >
            @csrf
                <div class="login-form__button">
                    <button class="login-form__button-submit" type="submit">login</button>
                </div>
            </form>
       </div>
   </header>
   <main>
    <div class="contact">
      <!--<div class="contact_register"> -->
        <div class="contact__form">
            <a class="contact__form-title" href="/register">
             Register
            </a>
        </div>

        <form class="form" action="/admin" method="post">
         @csrf
          <div class="register">
            <div class="register__form">
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <input type="text" name="name" placeholder="例:山田 太郎" class="textbox" value="{{old('name') }}"/>
                        </div>
                        <div class="form__error">
                         @error('name')
                         {{ $message }}
                         @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <input type="email" name="email" placeholder="例:test@example.com" class="textbox" value="{{old('email') }}"/>
                        </div>
                        <div class="form__error">
                         @error('email')
                         {{ $message }}
                         @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">パスワード</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <input type="text" name="password" placeholder="例:coachtech1306" class="textbox" value="{{old('password') }}"/>
                        </div>
                        <div class="form__error">
                         @error('password')
                         {{ $message }}
                         @enderror
                        </div>
                    </div>
                </div>
                <div class="form__button">
                   <button class="form__button-submit" type="submit">登録</button>
                </div>
            </div>
          </div>
        </form>
      <!--</div>-->
     </div>
   </main>
</body>
</html>
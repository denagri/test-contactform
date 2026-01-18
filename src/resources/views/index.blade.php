<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
   <header class="header">
       <div class="header__inner">
           <a class="header__logo">
            FashionablyLate
           </a>
       </div>
   </header>
   <main>
       <div class="contact__title">
            <a class="contact__form-title" href="/">
             <h2>Contact</h2>
            </a>
       </div>
       <form class="form" action="/confirm" method="post">
         @csrf
            <div class="contact__form">
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <input type="text" name="name" placeholder="例:山田" class="textbox" value="{{old('name') }}"/>
                            <input type="text" name="name" placeholder="例:太郎" class="textbox" value="{{old('name') }}"/>
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
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <div class="form__input-gender--item">
                              <input type="radio" id="man" name="gender" value="man" checked>
                              <label for="man">男性</label>
                            </div>
                            <div class="form__input-gender--item">
                              <input type="radio" id="woman" name="gender" value="woman">
                              <label for="woman">女性</label>
                            </div>
                            <div class="form__input-gender--item">
                              <input type="radio" id="other" name="gender" value="other">
                              <label for="other">その他</label>
                            </div>
                        </div>
                        <div class="form__error">
                         @error('gender')
                         {{ $message }}
                         @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <input type="email" name="email" placeholder="例:test@example.com" class="textbox" value="{{old('email') }}"/>
                        </div>
                        <div class="form__error">
                         @error('email')
                         {{ $message}}
                         @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <input type="tel" id="tel1" name="tel1" maxlength="3" placeholder="080" class="textbox" value="{{old('tel1') }}"/> -
                            <input type="tel" id="tel2" name="tel2" maxlength="4" placeholder="1234" class="textbox" value="{{old('tel2') }}"/> -
                            <input type="tel" id="tel3" name="tel3" maxlength="4" placeholder="5678" class="textbox" value="{{old('tel3') }}"/>
                        </div>
                        <div class="form__error">
                         @error('tel1')
                         {{ $message }}
                         @enderror
                         @error('tel2')
                         {{ $message }}
                         @enderror
                         @error('tel3')
                         {{ $message }}
                         @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" class="textbox" value="{{old('address') }}"/>
                        </div>
                        <div class="form__error">
                         @error('address')
                         {{ $message }}
                         @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" class="textbox" />
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <select id="kinds" name="kinds" class="textbox" required >
                                <option value="" disabled selected>選択してください</option>
                                <option value="商品のお届けについて">商品のお届けについて</option>
                                <option value="商品の交換について">商品の交換について</option>
                                <option value="商品トラブル">商品トラブル</option>
                                <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                        <div class="form__error">
                         @error('kinds')
                         {{ $message }}
                         @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" class="textbox" cols="30" rows="3">{{ old('detail') }}</textarea>
                        </div>
                        <div class="form__error">
                         @error('detail')
                         {{ $message }}
                         @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form__button">
                   <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </div>     
       </form>
   </main>
</body>
</html>
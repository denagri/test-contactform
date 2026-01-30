<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>
<body>
   <header class="header">
       <div class="header__inner">
           <a class="header__logo">
            FashionablyLate
           </a>
           <form class="logout-form" action="/logout" method="post" >
            @csrf
                <div class="logout-form__button">
                    <button class="logout-form__button-submit" type="submit">logout</button>
                </div>
            </form>
       </div>
   </header>
    <main>
        <div class="contact">
            <div class="contact_admin">
                <div class="contact__title">
                    <a class="contact__form-title" href="/">
                      Admin
                    </a>
                </div>
                <form class="form" action="/search" method="get">
                 @csrf
                    <div class="contact__form">
                        <div class="form__group">
                            <div class="form__group-contact">
                                <div class="form__input">
                                    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" class="textbox" />
                                </div>
                                <div class="form__error">
                                <!--バリデーション機能を実装したら記述します。-->
                                </div>
                            </div>
                            <div class="form__group-contact">
                                <div class="form__input">
                                    <select id="gender" name="gender" class="textbox" >
                                        <option value="" selected disabled>性別</option>
                                        <option value="man">男性</option>
                                        <option value="woman">女性</option>
                                        <option value="other">その他</option>
                                    </select>
                                </div>
                                <div class="form__error">
                                <!--バリデーション機能を実装したら記述します。-->
                                </div>
                            </div>
                            <div class="form__group-contact">
                                <div class="form__input">
                                    <select id="kinds" name="kinds" class="textbox" >
                                        <option value="" selected disabled>お問い合わせの種類</option>
                                        <option value="商品のお届けについて">商品のお届けについて</option>
                                        <option value="商品の交換について">商品の交換について</option>
                                        <option value="商品トラブル">商品トラブル</option>
                                        <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
                                        <option value="その他">その他</option>
                                    </select>
                                </div>
                                <div class="form__error">
                                <!--バリデーション機能を実装したら記述します。-->
                                </div>
                            </div>
                            <div class="form__group-contact">
                                <div class="form__input">
                                    <input type="date" name="date" placeholder="年/月/日" class="textbox" />
                                </div>
                                <div class="form__error">
                                <!--バリデーション機能を実装したら記述します。-->
                                </div>
                            </div>
                            <form class="search-form" action="/search" method="get" >
                                @csrf
                                <div class="search-form__button">
                                    <button class="search-form__button-submit" type="submit">検索</button>
                                </div>
                            </form>
                            <form class="reset-form" action="/reset" method="get" >
                                @csrf
                                <div class="reset-form__button">
                                    <button class="reset-form__button-submit" type="submit">リセット</button>
                                </div>
                            </form>
                        </div>
                        <div class="form--group">
                            <div class="form__group-item">
                                <form class="export-form" action="/export" method="post" >
                                    <div class="export-form__button">
                                        <button class="export-form__button-submit" type="submit" action="/export">エクスポート</button>
                                    </div>
                                </form>
                            </div>
                            <div class="form__group-jump">
                                <form class="jump-form" action="" method="post" >
                                    <div class="jump-form__button">
                                        <button class="jump-form__button-submit" type="submit"><</button>
                                    </div>
                                </form>
                                <form class="jump-form" action="" method="post" >
                                    <div class="jump-form__button">
                                        <button class="jump-form__button-submit" type="submit">1</button>
                                    </div>
                                </form>
                                <form class="jump-form" action="" method="post" >
                                    <div class="jump-form__button">
                                        <button class="jump-form__button-submit" type="submit">2</button>
                                    </div>
                                </form>
                                <form class="jump-form" action="" method="post" >
                                    <div class="jump-form__button">
                                        <button class="jump-form__button-submit" type="submit">3</button>
                                    </div>
                                </form>
                                <form class="jump-form" action="" method="post" >
                                    <div class="jump-form__button">
                                        <button class="jump-form__button-submit" type="submit">4</button>
                                    </div>
                                </form>
                                <form class="jump-form" action="" method="post" >
                                    <div class="jump-form__button">
                                        <button class="jump-form__button-submit" type="submit">5</button>
                                    </div>
                                </form>
                                <form class="jump-form" action="" method="post" >
                                    <div class="jump-form__button">
                                        <button class="jump-form__button-submit" type="submit">></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="admin__table">
                    <tr>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                            <th></th>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>text@example.com</td>
                        <td>商品の交換について</td>
                        <td>
                            <div class="table__group-item">
                                <form class="table-form" action="" method="post" >
                                    <div class="table-form__button">
                                        <button class="table-form__button-submit" type="submit">詳細</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>text@example.com</td>
                        <td>商品の交換について</td>
                        <td>
                            <div class="table__group-item">
                                <form class="table-form" action="" method="post" >
                                    <div class="table-form__button">
                                        <button class="table-form__button-submit" type="submit">詳細</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>text@example.com</td>
                        <td>商品の交換について</td>
                        <td>
                            <div class="table__group-item">
                                <form class="table-form" action="" method="post" >
                                    <div class="table-form__button">
                                        <button class="table-form__button-submit" type="submit">詳細</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>text@example.com</td>
                        <td>商品の交換について</td>
                        <td>
                            <div class="table__group-item">
                                <form class="table-form" action="" method="post" >
                                    <div class="table-form__button">
                                        <button class="table-form__button-submit" type="submit">詳細</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
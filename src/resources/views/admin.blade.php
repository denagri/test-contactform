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
                            </div>
                            <div class="form__group-contact">
                                <div class="form__input">
                                    <select id="category_id" name="category_id" class="textbox" >
                                        <option value="" selected disabled>お問い合わせの種類</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id}}">@if(request('category_id')==$category->id)selected @endif
                                        {{ $category->content }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form__group-contact">
                                <div class="form__input">
                                    <input type="date" name="date" placeholder="年/月/日" class="textbox" />
                                </div>
                            </div>
                            <form class="search-form" action="/search" method="get" >
                                @csrf
                                <div class="search-form__button">
                                    <input type="text" name="keyword" value="{{request('keyword') }}">
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
                        <th colspan="2">お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$contact->last_name}}</td>
                        <td>{{$contact->first_name}}</td>
                        <td>{{$contact->gender_text }}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->category_id_text}}</td>
                        <td>
                            <div class="table__group-item">
                                <!--<form class="table-form" action="" method="post" >-->
                                <button class="table__group-submit" type="submit">詳細</button>
                                <!--</form>-->
                            </div>
                        </td>
                    </tr>
                @endforeach
                </table>
            </div>
        </div>
    </main>
<!--<div class="table-form__button">-->
<!--<button class="table-form__button-submit" type="submit">詳細</button>-->
@if($showModal)
<dialog id ="my-dialog">
    <div class="modal-header">
        <button wire:click="$set('showModal', false)">✕</button>
    </div>
    <div class="modal-body">
        <table class="modal_table">
            <tr>
                <th>お名前</th>
                <td>{{$contact['last_name']}}
                    {{$contact['first_name']}}
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <input type="hidden" value="{{$contact['gender']}}" />
                    <?php
                    if($contact['gender'] =='1'){
                        echo '男性';
                    }elseif($contact['gender'] =='2'){
                        echo '女性';
                    }elseif($contact['gender'] =='3'){
                        echo 'その他';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{$contact['email']}}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{$contact['tel']}}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{$contact['address']}}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{$contact['building']}}</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{$contact['category']['content']}}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{{$contact['detail']}}</td>
            </tr>
        </table>
    <div class="modal-footer justify-content-end">
        <div class="modal__button">
            <a class="modal__button-submit" href="/delete">削除</a>
        </div>
    </div>
</dialog>
@endif                                   <!--</div>-->
</body>
</html>
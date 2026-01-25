<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
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
             Confirm
            </a>
       </div>

       <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly/>
                <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly/>
              </td>
            </tr>
             <tr class="confirm-table__row">
              <th class="confirm-table__header">性別</th>
              <td class="confirm-table__text">
                <div class="confirm-table__gender">
                  <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                </div>
                <div class="confirm-table__text-gender">
                  <?php
                  if($contact['gender']=='1'){
                    echo '男性';
                  }else if ($contact['gender']=='2'){
                    echo '女性';
                  }else if ($contact['gender']=='3'){
                    echo 'その他';
                  }
                  ?>
                </div>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <input type="email" name="email" value="{{ $contact['email'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                <input type="tel" name="tel1" value="{{ $contact['tel1'] }}" readonly/>
                <input type="tel" name="tel2" value="{{ $contact['tel2'] }}" readonly/>
                <input type="tel" name="tel3" value="{{ $contact['tel3'] }}" readonly/>
              </td>
              </td>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
                <input type="text" name="address" value="{{ $contact['address'] }}" readonly/>
              </td>
            </tr><tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              <td class="confirm-table__text">
                <input type="text" name="building" value="{{ $contact['building'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせの種類</th>
              <td class="confirm-table__text">
                <input type="text" name="kinds" value="{{ $contact['kinds'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                <input type="textarea" name="detail" value="{{ $contact['detail'] }}" readonly/>
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
            <div class="form__button-submit">
                <input class="form__button--submit" type="submit"value="送信" name="send">
                <input class="form__button--correction" type="submit" value="修正" name="back">
            </div>
        </div>
        </form>
   </main>
</body>
</html>
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
              <input type="text" name="last_name" value="{{ $contacts['last_name'] }}" readonly/>
              <input type="text" name="first_name" value="{{ $contacts['first_name'] }}" readonly/>
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">性別</th>
            <td class="confirm-table__text">
              <div class="confirm-table__gender">
                <input type="hidden" name="gender" value="{{ $contacts['gender'] }}" />
              </div>
              <div class="confirm-table__text-gender">
                <?php
                if($contacts['gender']=='1'){
                  echo '男性';
                }else if ($contacts['gender']=='2'){
                  echo '女性';
                }else if ($contacts['gender']=='3'){
                  echo 'その他';
                }
                ?>
              </div>
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">メールアドレス</th>
            <td class="confirm-table__text">
              <input type="email" name="email" value="{{ $contacts['email'] }}" readonly/>
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">電話番号</th>
            <td class="confirm-table__text">
              <input type="tel" name="tel1" value="{{ $contacts['tel1'] }}" readonly/>
              <input type="tel" name="tel2" value="{{ $contacts['tel2'] }}" readonly/>
              <input type="tel" name="tel3" value="{{ $contacts['tel3'] }}" readonly/>
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">住所</th>
            <td class="confirm-table__text">
              <input type="text" name="address" value="{{ $contacts['address'] }}" readonly/>
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">建物名</th>
            <td class="confirm-table__text">
              <input type="text" name="building" value="{{ $contacts['building'] }}" readonly/>
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">お問い合わせの種類</th>
            <td class="confirm-table__text">
              <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}" readonly/>
              <div class="confirm-table__text-category">
              <?php
                if($contacts['category_id']=='1'){
                  echo '商品のお届けについて';
                }else if ($contacts['category_id']=='2'){
                  echo '商品の交換について';
                }else if ($contacts['category_id']=='3'){
                  echo '商品トラブル';
                }else if ($contacts['category_id']=='4'){
                  echo 'ショップへのお問い合わせ';
                }else if ($contacts['category_id']=='5'){
                  echo 'その他';
                }
                ?>
              </div>
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">お問い合わせ内容</th>
            <td class="confirm-table__text">
              <input type="textarea" name="detail" value="{{ $contacts['detail'] }}" readonly/>
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
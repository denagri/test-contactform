<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
</head>
<body>
   <main>
    <div class="thanks__content">
      <div class="thanks__title">
        <h2>お問い合わせありがとうございました</h2>
      </div>
      <div class="form__button">
        <a href="{{route('home')}}" class="form__button-home" method="get" >
          <button class="form__button-home--submit" type="submit" >HOME</button>
        </a>
      </div>
    </div>
   </main>
</body>
</html>
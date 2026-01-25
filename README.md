# laravel-docker-template
# 環境構築
Dockerビルド
* git clone git@github.com:denagri/test-contactform.git
* docker-compose up -d --build
laravel環境構築
* docker-compose exec php bash
* composer install
* cp .env.example.env, 環境変数を適宜変更
* php artisan key:generate
* php artisan migrate
* php artisan db:seed

# 使用技術(実行環境)
* php 8.4.14
* laravel 8.83.8

# ER図
![alt text](<スクリーンショット 2026-01-25 163940-1.png>)


# URL
* お問い合わせフォーム入力ページhttp://localhost/
* お問い合わせフォーム確認ページhttp://localhost/comfirm
* サンクスページ
http://localhost/thanks
* 管理画面
http://localhost/admin
* ユーザー登録
http://localhost/register
* ログイン
http://localhost/login

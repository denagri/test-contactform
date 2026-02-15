# laravel-docker-template
# 環境構築
Dockerビルド
* git clone git@github.com:denagri/test-contactform.git
* docker-compose up -d --build
laravel環境構築
* docker-compose exec php bash
* composer install
* cp .env.example.env
* 環境変数を追加
DB_CONNECTION=mysql  
DB_HOST=mysql  
DB_PORT=3306  
DB_DATABASE=laravel_db  
DB_USERNAME=laravel_user  
DB_PASSWORD=laravel_pass  

* php artisan key:generate
* php artisan migrate
* php artisan db:seed

# 使用技術(実行環境)
* php 8.4.14
* laravel 8.83.8
* mysql 8.0.45

# ER図
![alt text](<スクリーンショット 2026-02-11 082601.png>)

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

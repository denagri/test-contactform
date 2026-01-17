# laravel-docker-template
#環境構築
Dockerビルド
・git clone git@github.com:denagri/test-contactform.git
・docker-compose up -d --build
laravel環境構築
・docker-compose exec php bash
・composer install
・cp .env.example.env, 環境変数を適宜変更
・php artisan key:generate
・php artisan migrate
・php artisan db:seed

#使用技術(実行環境)
・php 8.4.14
・laravel 8.83.8

#ER図
<img width="981" height="659" alt="スクリーンショット 2026-01-12 165001" src="https://github.com/user-attachments/assets/0084c462-29a4-4fbf-831b-795cea668898" />


#URL
・お問い合わせフォーム入力ページ　http://localhost/
・お問い合わせフォーム確認ページ　http://localhost/comfirm
・サンクスページ　http://localhost/thanks
・管理画面　http://localhost/admin

・ユーザー登録　http://localhost/register
・ログイン　http://localhost/login

　

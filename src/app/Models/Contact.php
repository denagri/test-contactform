<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=[
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];
    public function getGenderTextAttribute()
    {
      return[
         1=>'男性',
         2=>'女性',
         3=>'その他',
      ][$this->gender]??'未設定';
    }
    public function getCategoryIdTextAttribute()
    {
      return[
         1=>'商品のお届けについて',
         2=>'商品の交換について',
         3=>'商品トラブル',
         4=>'ショップへのお問い合わせ',
         5=>'その他',
      ][$this->category_id]??'未設定';
    }
}
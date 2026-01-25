<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name','last_name'=>['required','string','max:8'],
            'gender'=>['required'],
            'email'=>['required','email'],
            'tel1','tel2','tel3'=>['required','numeric','digits_between:2,5'],
            'address'=>['required'],
            'kinds'=>['required'],
            'detail'=>['required','max:120'],
        ];
    }
    public function messages()
    {
        return[
            'first_name.required'=>'名字を入力してください',
            'first_name.string'=>'名字を文字列で入力してください',
            'first_name.max'=>'名字を8文字以下で入力してください',
            'last_name.required'=>'名前を入力してください',
            'last_name.string'=>'名前を文字列で入力してください',
            'last_name.max'=>'名前を8文字以下で入力してください',
            'gender.required'=>'性別を選択してください',
            'email.required'=>'メールアドレスを入力してください',
            'email.email'=>'メールアドレスはメール形式で入力してください',
            'tel1.required'=>'電話番号を入力してください',
            'tel1.numeric'=>'電話番号を半角数字で入力してください',
            'tel1.digits_between'=>'電話番号を5桁まで数字で入力してください',
            'tel2.required'=>'電話番号を入力してください',
            'tel2.numeric'=>'電話番号を半角数字で入力してください',
            'tel2.digits_between'=>'電話番号を5桁まで数字で入力してください',
            'tel3.required'=>'電話番号を入力してください',
            'tel3.numeric'=>'電話番号を半角数字で入力してください',
            'tel3.digits_between'=>'電話番号を5桁まで数字で入力してください',
            'address.required'=>'住所を入力してください',
            'kinds.required'=>'お問い合わせの種類を選択してください',
            'detail.required'=>'お問い合わせ内容を入力してください',
            'detail.max'=>'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}

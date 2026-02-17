<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Models\Contact;
use App\Models\Category;


class TestContactController extends Controller
{
    public function index()
    {
        $categories =Category::all();
        return view('index',compact('categories'));
    }
    /*指定されたidのデータを取得し、詳細画面を表示する*/
    public function show($id)
    {
        $categories = Category::find($id);
        return view('index', compact('categories'));
    }

    public function confirm(IndexRequest $request)
    {
        $contacts= $request->all();
        $category=Contact::find($request->category_id);
        return view('confirm',compact('contacts','category'));
    }
    public function store(IndexRequest $request)
    {
        if ($request->has('back')) {
            /*入力したフォームの内容をセッションに一時保存し、前の画面に返却する */
            return redirect('/')->withInput();
        }
        $request['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        Contact::create(
            $request->only([
            'category_id',
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail'
            ])
        );
       return view('thanks');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Models\Contact;


class TestContactController extends Controller
{
    public function index()
    {
        $categories =Category::all();
        return view('index',compact('categories'));
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
            return redirect('/')->withInput();
        }
        $request['tell'] = $request->tel1 . $request->tel2 . $request->tel3;
        Contact::create(
            $request->only([
            'category_id',
            'last_name',
            'first_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'category_id',
            'detail'
            ])
        );
       
       return view('thanks');
    }
}

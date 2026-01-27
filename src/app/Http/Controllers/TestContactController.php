<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Models\Contact;


class TestContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function confirm(IndexRequest $request)
    {
        $contact= $request->only(['first_name','last_name','gender','email','tel1','tel2','tel3','address','building','kinds','detail']);
        return view('confirm',['contact'=> $contact]);
    }
    public function store(IndexRequest $request)
    {
        if ($request->has('back')) {
            return redirect('/')->withInput();
        }
        $request['tell'] = $request->tel_1 . $request->tel_2 . $request->tel_3;
        $contact= $request->only(['first_name','last_name','gender','email','tell','address','building','kinds','detail']);
        Contact::create($contact);
        return view('thanks');
    }
}

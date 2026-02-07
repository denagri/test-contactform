<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
   public function index()
   {
      /*$contacts =Contact::all();*/
      $contacts = Contact::with('category')->Paginate(7);
      $categories =Category::all();
      return view('admin',compact('contacts','categories'));
   }
   public function search(Request $request)
   {
      if($request->has('reset')){
         return redirect('/admin')->withInput();
      }
      $query = Contact::query();
      $query=$this->getSearchQuery($request,$query);

      $contacts=$query->paginate(7);
      $categories=Category::all();
      return view('admin',compact('contacts','categories'));
   }
   public function destroy(Request $request)
   {
      Contact::find($request->id)->delete();
      return redirect('/admin');
   }
}

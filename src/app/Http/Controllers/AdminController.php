<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
   public function index()
   {
      $categories = Category::simplePaginate(4);
      return view('admin',['categories'=> $categories]);
   }
   public function destroy(Request $request)
   {
      Contact::find($request->id)->delete();
      return redirect('/delete');
   }
   public function search(Request $request)
   {
      $keyword = $request->input('');
      $query = Product::query();
      if(!empty($keyword)){
         $query->where('name','LIKE',"%{keyword}%");
      }
      $products = $query->paginate(7);
      return view('admin',compact('contacts','keyword'));
   }
   public function reset()
   {
      return redirect('/reset')->route('admin');
   }
}

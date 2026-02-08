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
      $csvData =Contact::all();
      return view('admin',compact('contacts','categories','csvData'));
   }
   public function search(Request $request)
   {
      if($request->has('reset')){
         return redirect('/admin')->withInput();
      }
      $query = Contact::query();
      $query=$this->getSearchQuery($request,$query);
      $csvData=$query->get();
      $contacts=$query->paginate(7);
      $categories=Category::all();
      return view('admin',compact('contacts','categories','csvData'));
   }
   public function destroy(Request $request)
   {
      Contact::find($request->id)->delete();
      return redirect('/admin');
   }
   private function getSearchQuery($request,$query)
   {
      if(!empty($request->keyword)){
         $query->where(function($q)use($request){
            $q->where('first_name','like','%'.$request->keyword .'%')
            ->orWhere('last_name','like','%'.$request->keyword.'%')
            ->orWhere('email','like','%'.$request->keyword.'%');
         });
      }
      if(!empty($request->gender)){
         $query->where('gender','=',$request->gender);
      }
      if(!empty($request->category_id)){
         $query->where('category_id','=',$request->category_id);
      }
      if(!empty($request->date)){
         $query->whereDate('create_at','=',$request->date);
      }
      return $query;
   }
}

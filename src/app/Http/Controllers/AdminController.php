<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Http\RedirectResponse;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
   public function index()
   {
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
      /*リクエストデータに値がはいっているなら*/
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
         $query->whereDate('created_at','=',$request->date);
      }
      return $query;
   }
   public function export(Request $request)
   {
      /*contactモデルでクエリを取得する準備*/
      $query=Contact::query();
      /*getSearchQueryで入力された検索条件を処理して$queryに戻して*/
      $query=$this->getSearchQuery($request,$query);
      /*データベースから取得した$queryをcsv作成に向いてる純粋な配列（Array）に変換して*/
      $csvData=$query->get()->toArray();
      /*csvファイルの各列のタイトルはこれ*/
      $csvHeader=[
         'id','category_id','first_name','last_name','gender','email','tel','address','building','detail','created_at','updated_at'
      ];
      /*データをメモリ節約しながら段階的にブラウザへ出力して*/
      $response=new StreamedResponse(function()use($csvHeader,$csvData){
         /*ブラウザで直接ダウンロードするためのoutputという書き込み用のファイルを開いて*/
         $createCsvFile=fopen('php://output','w');
         /*$csvHEADerの中身をUTF-8からSJISに変更*/
         mb_convert_variables('SJIS-win','UTF-8',$csvHeader);
         /*$createCsvFileで開いたファイルに$csvHEADerを書き込む*/
         fputcsv($createCsvFile,$csvHeader);
         /*データ全体から1行分のデータを$csvに代入*/
         foreach($csvData as $csv){
            /*日時を世界標準から日本時間に変更して、見やすい形式に成形して上書き*/
            $csv['created_at']=Date::make($csv['created_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
            $csv['updated_at']=Date::make($csv['updated_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
            fputcsv($createCsvFile,$csv);
         }
         fclose($createCsvFile);
      /*CSVファイルをダウンロードさせる動作を指示
      200はHTTPコードで「正常に処理された」を意味する*/
         },200,[
         /*送信するデータがCSV形式*/
         'Content-Type'=>'text/csv',
         /*ダウンロードを強制する部分。attachmentでブラウザ内に表示せずファイルとして保存する。
         filenameをcontact.csvにする。*/
         'Content-Disposition'=>'attachment;filename="contacts.csv',
      ]);
      return $response;
   }
}
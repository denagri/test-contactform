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
      $query=Contact::query();
      $query=$this->getSearchQuery($request,$query);
      $csvData=$query->get()->toArray();
      $csvHeader=[
         'id','category_id','first_name','last_name','gender','email','tel','address','building','detail','created_at','updated_at'
      ];
      $response=new StreamedResponse(function()use($csvHeader,$csvData){
         $createCsvFile=fopen('php://output','w');
         mb_convert_variables('SJIS-win','UYF-8',$csvHeader);
         fputcsv($createCsvFile,$csvHeader);
         foreach($csvData as $csv){
            $csv['created_at']=Data::make($csv['created_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
            $csv['updated_at']=Date::make($csv['updated_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
            fputcsv($createCsvFile,$csv);
         }
         fclose($createCsvFile);
      },200,[
         'Content-Type'=>'text/csv',
         'Content-Disposition'=>'attachment;filename="contacts.csv',
      ]);
      return $response;
   }

   /*public function putCsv($csvData){
      try{
         //CSV形式で情報をファイルに出力のための準備
        $csvFileName = '/tmp/' . time() . rand() . '.csv';
        $fileName = time() . rand() . '.csv';
        $res = fopen($csvFileName, 'w');
        if ($res === FALSE) {
            throw new Exception('ファイルの書き込みに失敗しました。');
        }

        // 項目名先に出力
        $header = ["id", "name", "email", "gender","category_id"];
        fputcsv($res, $header);

        // ループしながら出力
        foreach($csvData as $dataInfo) {
            // 文字コード変換。エクセルで開けるようにする
            mb_convert_variables('SJIS', 'UTF-8', $dataInfo);

            // ファイルに書き出しをする
            fputcsv($res, $dataInfo);
        }

        // ファイルを閉じる
        fclose($res);

        // ダウンロード開始

        // ファイルタイプ（csv）
        header('Content-Type: application/octet-stream');

        // ファイル名
        header('Content-Disposition: attachment; filename=' . $fileName); 
        // ファイルのサイズダウンロードの進捗状況が表示
        header('Content-Length: ' . filesize($csvFileName)); 
        header('Content-Transfer-Encoding: binary');
         // ファイルを出力する
        readfile($csvFileName);

    } catch(Exception $e) {

        // 例外処理をここに書きます
        echo $e->getMessage();

    }
   }*/
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Bookモデルを使えるようにする
use App\Book;
//バリデーション機能を使えるようにする
use Validator;

class BooksController extends Controller
{
    //コンストラクタは、このクラスがよばらたら最初に必ず処理する箇所
    public function __construct()
    {
        //認証していたら表示するを制御
        $this->middleware('auth');
    }


    //Index method
    public function index(){

        //TOPページは、引数はなくDBにあるリストを取得してい表示する
 //       $books=Book::orderBy('created_at','asc')->get();
           $books=Book::orderBy('created_at','asc')->paginate(3);    
        return view('books',['books'=>$books]);
    
    }



    //Update method
    public function update(Request $request){
    //validation
    $validator = Validator::make($request->all(), [

        //min/Max値の設定|(パイプ)で条件追加
        'id' =>'required',
        'item_name' => 'required|min:3|max:255',
        'item_amount' => 'required|min:1|max:55',

        //必須入力設定
        'item_number' => 'required',

    ]);
    
    //validation error
    if($validator ->fails()){
        
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }

        //Eloquent model
        //Book tableの1行を生成
        //$books = new Book;
        
        //IDに該当するBookを取得
        //この一行で、テーブルからレコード検索して変数に入れている。。これがEroquentモデルの凄さ。
        $books = Book::find($request->id);
        
        //入力値からItem_nameを取り出す
        $books->item_name = $request-> item_name;
        $books->item_number = $request-> item_number;
        $books->item_amount = $request-> item_amount;
        
        //$books->item_number = '1';
        //$books->item_amount = '1000';
        $books->published = '2017-03-07 00:00:00';
        $books->save();
        
        return redirect('/');
    
    //end of update    
    }
    
    public function store(Request $request){
            //validation
            $validator = Validator::make($request->all(), [
        
                //min/Max値の設定|(パイプ)で条件追加
                'item_name' => 'required|min:3|max:255',
                'item_amount' => 'required|min:1|max:55',
        
                //必須入力設定
                'item_number' => 'required',
        
            ]);
            
            //validation error
            if($validator ->fails()){
                
                return redirect('/')
                ->withInput()
                ->withErrors($validator);
            }
        
        //Eloquent model
        //Book tableの1行を生成
        $books = new Book;
        
        //入力値からItem_nameを取り出す
        $books->item_name = $request-> item_name;
        
        $books->item_number = $request-> item_number;
        $books->item_amount = $request-> item_amount;
        
        //$books->item_number = '1';
        //$books->item_amount = '1000';
        $books->published = '2017-03-07 00:00:00';
        $books->save();
        
        return redirect('/');

    //end of store    
    }

    //Show method
    public function show(Book $book){
        return view('booksedit',['book'=>$book]);

    //End of show
    }




    //Delete method
    public function delete(Book $book){
        $book-> delete();
        return redirect('/');
    //End of delete
    }
    
    
    
//end of controller    
}

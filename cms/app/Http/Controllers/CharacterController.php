<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PictureBook;

class CharacterController extends Controller
{
    public function index()
    {
        return view('character'); // create.blade.php を指定する
    }


    public function show(string $id)
    {
        
        $pictureBook = PictureBook::findOrFail($id); // 例として最初のレコードを取得する
        $babyName = $pictureBook ? $pictureBook->baby_name : '赤ちゃんの名前'; // 万が一レコードが存在しない場合のデフォルト値を設定
        
        return view('character.show', compact('babyName'));
         
        //  return view('character.show', [
            //  'user' => User::findOrFail($id)
      //    ]);
    //  }

//  return view('character.show');
}


public function new()
    {
        
        //  return view('character.show', [
            //  'user' => User::findOrFail($id)
      //    ]);
    //  }

return view('character.new');
}


    public function save(Request $request)
    {
        // ログイン中のユーザーのIDを取得
        $userId = auth()->id();

        // フォームデータをバリデーションする
        $validatedData = $request->validate([
            'baby_name' => 'required|string|max:255',
            'baby_birthday' => 'required|date',
    ]);
        
        // PictureBookモデルを使用してデータを更新または作成する
        $pictureBook=PictureBook::updateOrCreate(
            ['user_id' => $userId], // user_idが一致するレコードを更新または作成する条件
            [
                'baby_name' => $validatedData['baby_name'], // フォームから送信された赤ちゃんの名前を保存
                'baby_birthday' => $validatedData['baby_birthday'], // フォームから送信された赤ちゃんの誕生日を保存
            ]
        );

        // リダイレクトまたはメッセージの表示など、適切な処理を行う
        // return redirect()->back()->with('message', '赤ちゃんの情報が保存されました');
        return redirect()->route('character.show',['id'=>$pictureBook->id]);
    }
}
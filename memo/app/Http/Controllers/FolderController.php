<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }
    
    public function create(CreateFolder $request)
    {
        //フォルダモデルのインスタンスを作成する
        $folder = new Folder();

        //タイトルに入力値を代入する
        $folder->title = $request->title;

        //インスタンスの状態をデータベースに書き込む
        $folder->save();

        //リダイレクト。フォルダ作成出来たらフォルダに対応するタスク一覧画面に遷都
        return redirect()->route('tasks.index',['id' => $folder->id,]);
    }
}

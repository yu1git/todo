<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        //すべてのフォルダを取得する
        $folders = Folder::all();
        
        //選ばれたフォルダを取得する
        //find メソッドは、プライマリキーのカラムを条件として一行分のデータを取得
        $current_folder = Folder::find($id);

        //選ばれたフォルダに紐づくタスクを取得する
        //クエリビルダのwhere(カラム名,'=',比較する値)
        //以下は「＝」を省略している。第二引数を変えると、イコール以外の比較も可能
        //Tasks::where('folder_id', '=', $current_folder->id)->get();
        $tasks =  $current_folder->tasks()->get();
        
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }

    /**
     * GET /folders/{id}/tasks/create
     */
    public function showCreateForm(int $id)
    {
        return view('tasks/create',[
            'folder_id' => $id
        ]);
    }
}

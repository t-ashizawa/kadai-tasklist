<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //GETでTasks/にアクセスされたときの「タスク一覧画面の表示」
    public function index()
    {
        //Tasksテーブルのレコード全てを$tasksに代入する
        $tasks = Task::all();
        
        //$tasks（＝全てのレコード）をtaskdataというView側で使うために用意した変数にセットしてtasks.indexに渡す
        return view('tasks.index', ['taskdata' => $tasks] );
        // return view('tasks.index', compact('tasks') );
        // return view('tasks.index', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //POSTでTasks/createにアクセスされたときの「新規タスク作成画面の表示」
    public function create()
    {
        //$taskという変数にTask（＝tasksテーブル）のインスタンスを生成し代入（空のレコードを渡すイメージ）
        $task = new Task;

        //tasks.create（新規タスク作成ページ）へ$taskにtasksdataの添え字を設定して渡す
        return view('tasks.create', ['taskdata' => $task]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //POSTでtasks/にアクセスされた時の「新規タスクの登録処理」
    public function store(Request $request)
    {
        $task = new Task;
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //GETでtasks/idにアクセスされた時の「タスク詳細表示処理」
    public function show($id)
    {
        //$taskにifndした（＝探した）特定のidのレコードを代入する
        $task = Task::find($id);

        //View側で使うための変数taskdataに、探したレコード（=$task）を入れてtask.showに渡す
        return view('tasks.show',['taskdata' => $task, ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //GETでtasks/id/editにアクセスされた時の「編集画面表示処理」
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', ['taskdata' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //PUTでtasks/idにアクセスされた時の「タスク更新処理」
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //DELETEでtasksk/idにアクセスされた時の「タスク削除処理」
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
}

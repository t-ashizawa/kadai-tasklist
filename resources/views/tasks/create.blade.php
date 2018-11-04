@extends('layouts.app')

@section('content')

	<h1>新規タスク作成ページ</h1>

	<!-- $tasksdata(=空のレコード)を設定し、このあとタスク作成処理を行うルーティングのstoreアクションをFormタグのaction属性に設定する -->
	{!! Form::model($taskdata, ['route' => 'tasks.store']) !!}
		{!! Form::label('content', 'タスク:') !!}
    {!! Form::text('content') !!}
    {!! Form::submit('作成') !!}
	{!! Form::close() !!}

@endsection
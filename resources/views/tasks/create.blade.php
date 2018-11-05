@extends('layouts.app')

@section('content')

	<h1>新規タスク作成ページ</h1>

	{!! Form::model($taskdata, ['route' => 'tasks.store']) !!}
		{!! Form::label('status', 'ステータス') !!}
		{!! Form::select('status',[
			'Working' => '対応中',
			'Pending' => '保留',
			'Completed' => '完了'
			]) !!}

		{!! Form::label('content', 'タスク:') !!}
    {!! Form::text('content') !!}
    {!! Form::submit('作成') !!}
	{!! Form::close() !!}

@endsection
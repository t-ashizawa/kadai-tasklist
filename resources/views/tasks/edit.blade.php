@extends('layouts.app')

@section('content')

<h1>id: {{ $taskdata->id }} のメッセージ編集ページ</h1>

{!! Form::model($taskdata, ['route' => ['tasks.update', $taskdata->id], 'method' => 'put']) !!}
	{!! Form::label('content', 'タスク：') !!}
	{!! Form::text('content') !!}
	{!! Form::submit('更新') !!}
{!! Form::close() !!}

@endsection
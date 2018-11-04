@extends('layouts.app')

@section('content')

<h1>id={{ $taskdata->id }}のタスク詳細</h1>

<p>{{ $taskdata->content }}</p>

{!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $taskdata->id]) !!}

{!! Form::model($taskdata, ['route' => ['tasks.destroy', $taskdata->id], 'method' => 'delete']) !!}
	{!! Form::submit('削除') !!}
{!! Form::close() !!}

@endsection
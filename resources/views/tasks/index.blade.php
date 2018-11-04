@extends('layouts.app')

@section('content')

	<h1>タスク一覧</h1>

	<!-- controllerから受け取ったデータの数が0より大きい場合以下のforeachを実行 -->
	@if (count($taskdata) > 0)
		<ul>
			<!-- $taskdataの数だけ処理を繰り返す。その際の値は$taskにセットする -->
			@foreach ($taskdata as $task)
				<!-- $taskのcontentを表示する -->

				<!-- tasks.showへのリンクを作成。$task->idをリンクテキストに指定。routeの指定に合わせ、tasks/{id}にidというクラスで$task->idをセット。 -->
				<li>{!! link_to_route('tasks.show', $task->id, ['text' => $task->id]) !!} : {{ $task->content }}</li>
			@endforeach
		</ul>
	@endif

	{{ '<p style="color: red;">htmlentities 関数に通した場合</p>' }}
	{!! '<p style="color: red;">htmlentities 関数に通さなかった場合</p>' !!}

	{!! link_to_route('tasks.create', '新規タスクの作成') !!}
@endsection
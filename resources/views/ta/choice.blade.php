@extends('layouts.app')

@section('title','選擇題管理')

@section('content')
<div class="content-head">
	@yield('title')
	<div class="content-head-btn">
		<a href="{{ url('choice/create') }}" class="std-button-upload">新增</a>
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif

<hr style="color:#eee;" />
<table class="std_table" width="100%">
	<tbody>
		<th width="16%">操作</th>
		<th width="10%">章節</th>
		<th width="10%">大題</th>
		<th width="6%">答案</th>
		<th width="">題目</th>
	</tbody>
@if (count($choices) > 0)
	@foreach($choices as $ch)
	<tr>
		<td style="align-items: center;">
		<form action="{{ url('choice/delete') }}/{{ $ch->id }}" method="POST">
		<a href="{{ url('choice/edit') }}/{{ $ch->id }}" class="std-button-warning">修改</a>
		&nbsp;
		{{ csrf_field() }}
        {{ method_field('DELETE') }}
		<input type="submit" value="刪除" class="std-button-error">
		</form>
		</td>
		<td>第{{ $chName[$ch->chapter] }}章</td>
		<td>第{{ $chName[$ch->topic] }}大題</td>
		<td>{{ $chAns[$ch->ans] }}</td>
		<td style="text-align: left;">{{ $ch->question }}</td>
	</tr>
	@endforeach
@endif
</table>


@endsection

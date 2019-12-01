<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>掲示板</title>
</head>
<body>
	<h1>掲示板</h1>

	{{-- エラーメッセージ --}}
	@if ($errors->any())
		<h2>エラーメッセージ</h2>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{{-- 直前投稿エリア --}}
	@isset($name, $comment)
	<h2>{{ $name }}さんの直前の投稿</h2>
	{{$comment}}
	<br><hr>
	@endisset

	{{-- フォームエリア --}}
	<h2>入力フォーム</h2>
	<form method="POST" action="/bbs">
		名前:<br/>
		<input type="text" name="name">
		<br>
		
		コメント:<br>
		<textarea name="comment" cols="40" rows="4"></textarea>
		<br>

		{{ csrf_field() }}
		<button class="btn btn-success">送信</button>
	</form>
</body>
</html>
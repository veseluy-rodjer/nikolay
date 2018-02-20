@extends('layouts/template')
@section('content')

<br>
<br>
<br>
<br>
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<form action="" method="post">
{{ csrf_field() }}
<p>Имя: <textarea rows="3" cols="45" wrap="hard" name="name" required></textarea></p>
<p>Текст: <textarea rows="10" cols="45" wrap="hard" name="comment" required></textarea></p>
<p><input type="submit"></p>
</form>

@endsection('content')

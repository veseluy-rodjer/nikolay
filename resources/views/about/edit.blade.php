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
<img src={{ $edit->picture }} width="30%" alt="">
<p><a href="/about/delPicture/{{  $edit->id  }}"><input type="submit" value="Удалить фото"></a></p>
<form enctype="multipart/form-data" action="/about/{{ $edit->id }}" method="post">
{{ csrf_field() }}
{{ method_field('PATCH') }}
<p><input type="hidden" name="MAX_FILE_SIZE" value="9024000"></p>
<p>Загрузить фото: <input name="picture" type="file" accept="image/*"></p>

<p>ФИО: <textarea rows="3" cols="45" wrap="soft" name="name" required>{{ $edit->name }}</textarea></p>
<p>Должность: <textarea rows="10" cols="45" wrap="soft" name="profession" required>{{ $edit->profession }}</textarea></p>
<p><input type="submit"></p>
</form>

@endsection('content')

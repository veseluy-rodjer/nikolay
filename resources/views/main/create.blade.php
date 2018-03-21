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
<form enctype="multipart/form-data" action="{{  route('store')  }}" method="post">
{{ csrf_field() }}
<p><input type="hidden" name="MAX_FILE_SIZE" value="9024000"></p>
<p>Загрузить фото: <input name="picture" type="file" accept="image/*"></p>
<p>Загогловок: <textarea rows="3" cols="45" wrap="soft" name="title" required></textarea></p>
<p>Новость: <textarea rows="10" cols="45" wrap="soft" name="news" required></textarea></p>
<p><input type="submit"></p>
</form>

@endsection('content')

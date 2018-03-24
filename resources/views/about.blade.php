@extends('layouts/template')
@section('content')

  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>About Us</li>
      </div>
    </div>
  </div>

  <div class="aboutus">
    <div class="container">
      <h3>Приветствую вас на моей страничке</h3>
      <hr>
      <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <img src="{{ asset('images/7.jpg') }}" class="img-responsive">
        <h4>Создание сайтов-визиток для вашего бизнеса</h4>
        <p>Меня зовут Николай. Программированием занимаюсь два года. При создании сайтов использую язык программирования PHP, а также самые современные технологии (Laravel, шаблоны Bootstrap, AJAX). </p>
        <p>Имея сайт, созданный с использованием этих технологий, у вас будет возможность в любой момент дополнить свой сайт новыми функциями и доработать его в зависимости от возрвстающих требований вашего бизнеса. </p>
      </div>
    </div>
  </div>

  <div class="our-team">
    <div class="container">
      <h3>Наша команда))
@can('before', App\Models\TeamModel::class)      
      <a href="/about/create">&#160;Добавить</a>
@endcan      
      </h3>
      <div class="text-center">
      
@foreach ($listing as $i)
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
          <img src="{{ $i->picture }}" width="100%" alt="">
          <h4>{{ $i->name }}</h4>
          <p>{{ $i->profession }}</p>
@can('before', App\Models\TeamModel::class)          
          <a href="/about/{{ $i->id }}/edit"><input type="submit" value="Редактировать"></a>
<form action="/about/{{ $i->id }}" method="post">
{{ csrf_field() }}
{{ method_field('DELETE') }}
<p><input type="submit" value="Удалить"></p>
</form>
@endcan
        </div>
@endforeach        

      </div>
    </div>
  </div>

@endsection('content')

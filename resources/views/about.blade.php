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
      <h3>Наша команда))<a href="/about/create">&#160;Добавить</a></h3>
      <div class="text-center">
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
          <img src="{{ asset('images/services/1.jpg') }}" alt="">
          <h4>John Doe</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
        </div>
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <img src="{{ asset('images/services/2.jpg') }}" alt="">
          <h4>John Doe</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
        </div>
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
          <img src="{{ asset('images/services/3.jpg') }}" alt="">
          <h4>John Doe</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
        </div>
      </div>
    </div>
  </div>

@endsection('content')

@extends('layouts/template')
@section('content')

  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url({{ asset('images/slider/bg1.jpg') }})">
          <div class="container">
            <div class="row slide-margin">
              <div class="col-sm-6">
                <div class="carousel-content">
                  <h2 class="animation animated-item-1">Добро <span>пожаловать!</span></h2>
                  <p class="animation animated-item-2">Разработка сайтов-визиток для ваших компаний</p>
                  <a class="btn-slide animation animated-item-3" href="/services">Узнать боьлше</a>
                </div>
              </div>

              <div class="col-sm-6 hidden-xs animation animated-item-4">
                <div class="slider-img">
                  <img src="{{ asset('images/slider/img3.png') }}" class="img-responsive">
                </div>
              </div>

            </div>
          </div>
        </div>
        <!--/.item-->
      </div>
      <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
  </section>
  <!--/#main-slider-->

  <div class="about">
    <div class="container">
      <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h2>о нас</h2>
        <img src="{{ asset('images/6.jpg') }}" class="img-responsive" />
        <p>Мы - молодая, амбициозная и развивающаяся команда, которая стремится к новым вершинам, к самопознанию и совершенству. Уряяяяяяяяяяяяяяяяяяяяяяяя!
        </p>
      </div>

      <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <h2>Заявите о себе с помощью своего собственного сайта!</h2>
        <p>Всем извествно, что сегодня ни одна коммерческая структура не может развиваться без использования интернета. У вас есть великолепная возможность приобрести сайт-визитку вашей компании и тем самым заявить о себе миллионам людей! Благодаря своему сайту, вы сможете профессионально и качественно презентовать свою продукцию, а также найти новых деловых партнеров. Ведь вполне возможно, что именно сейчас кто-то нуждается в вашей продукции и ищет ее в интренете. </p>
          <p>Имея свой собственный сайт-визитку вашей компании, вы сможете разместить на нем прайс вашей продукции, условия доставки, рекомендации ваших клиентов и деловых партнеров, ваши контакты. Также вы сможете размещать на своем сайте ваши новости, акции и рекомендации по использованию вашей продукции. </p>
          <p>Иметь сайт-визитку полезно также некоммерческим структурам и просто частным лицам, которые хотят заявить о себе и своих идеях на просторах интренета! </p>
      </div>
    </div>
  </div>

  <div class="lates">
    <div class="container">
      <div class="text-center">
        <h2>Важные мировые новости<a href="{{  route('create')  }}">&#160;Добавить</a></h2>
      </div>
      
@foreach ($listing as $i)      
      <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <img src="{{ $i->picture }}" class="img-responsive" />
        <h3>{{ $i->title }}</h3>
        <p>{{ $i->news }} </p>
        <a href="{{ route('edit', [$i->id]) }}"><input type="submit" value="Редактировать"></a>
<form action="{{ route('destroy', [$i->id]) }}" method="post">
{{ csrf_field() }}
{{ method_field('DELETE') }}
<p><input type="submit" value="Удалить"></p>
</form>        
      </div>
@endforeach

    </div>
  </div>

  <section id="partner">
    <div class="container">
      <div class="center wow fadeInDown">
        <h2>Наши партнеры</h2>
        <p>Партнеров пока нет... <br> но скоро они появятся!</p>
      </div>

      <div class="partners">
        <ul>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="{{ asset('images/partners/partner1.png') }}"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="{{ asset('images/partners/partner2.png') }}"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="{{ asset('images/partners/partner3.png') }}"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="{{ asset('images/partners/partner4.png') }}"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="{{ asset('images/partners/partner5.png') }}"></a></li>
        </ul>
      </div>
    </div>
    <!--/.container-->
  </section>
  <!--/#partner-->

  <section id="conatcat-info">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="pull-left">
              <i class="fa fa-phone"></i>
            </div>
            <div class="media-body">
              <h2>У вас есть вопросы или предложения?</h2>
              <p>Звоните нам в любое время! Только днем. А если утром - то не сильно рано. И вечером тоже не надо звонить...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.container-->
  </section>
  <!--/#conatcat-info-->

@endsection('content')

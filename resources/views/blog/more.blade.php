@extends('layouts/template')
@section('content')

  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Blog <a href="/blog/adding">&#160;Добавить запись</a></li>
      </div>
    </div>
  </div>

  <section id="blog" class="container">
    <div class="blog">
      <div class="row">

        <div class="col-md-8">
          <div class="blog-item">
            <div class="row">
              <div class="col-xs-12 col-sm-2">
                <div class="entry-meta">
                  <span id="publish_date">{{ $more->created_at }}</span>
                  <span><i class="fa fa-user"></i> <a href="/blog/edit/{{ $more->id }}">Изменить</a></span>
                  <span><i class="fa fa-user"></i> <a href="/blog/del/{{ $more->id }}">Удалить</a></span>
                  <span><i class="fa fa-user"></i> <a href="#">Николай</a></span>
                  <span><i class="fa fa-comment"></i> <a href="#">{{ $more->comments()->count() }} Комментарии</a></span>
                  <span><i class="fa fa-heart"></i><a href="#">56 Понравилось</a></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-10 blog-content">
                <a href="#"><img class="img-responsive img-blog" src={{ $more->picture }} width="100%" alt="" /></a>
@yield('more')
@if(Request::is('blog/more/*'))                
                <h4>{{ $more->topic }}</h4>
                <p>{{ $more->tell }}</p>
                <a class="btn btn-primary readmore" href="/blog/edit/{{ $more->id }}">Редактировать <i class="fa fa-angle-right"></i></a>
              </div>
@endif              
              <div class="col-xs-12 col-sm-10 blog-content">
                <h3>Комментарии</h3>

@foreach($comments as $comment)
                <h4>{{ $comment->name }}</h4>
                <p>{{ $comment->comment }}</p>
                <a class="btn btn-primary readmore" href="/blog/delComment/{{ $comment->id }}">Удалить комментарий <i class="fa fa-angle-right"></i></a>
                <p>___________________</p>
@endforeach
                
                <a class="btn btn-primary readmore" href="/blog/addComment/{{ $more->id }}">Добавить комментарий <i class="fa fa-angle-right"></i></a>
              </div>
              
            </div>
          </div>
          {{-- /.blog-item --}}
        </div>
        {{-- /.col-md-8 --}}

        <aside class="col-md-4">
          <div class="widget search">
            <form role="form">
              <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
            </form>
          </div>
          <!--/.search-->

          <div class="widget categories">
            <h3>Recent Comments</h3>
            <div class="row">
              <div class="col-sm-12">
                <div class="single_comments">
                  <img src="{{ asset('images/blog/avatar3.png') }}" alt="" />
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                  <div class="entry-meta small muted">
                    <span>By <a href="#">Alex</a></span>
                  </div>
                </div>
                <div class="single_comments">
                  <img src="{{ asset('images/blog/avatar3.png') }}" alt="" />
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                  <div class="entry-meta small muted">
                    <span>By <a href="#">Alex</a></span>
                  </div>
                </div>
                <div class="single_comments">
                  <img src="{{ asset('images/blog/avatar3.png') }}" alt="" />
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                  <div class="entry-meta small muted">
                    <span>By <a href="#">Alex</a></span>
                  </div>
                </div>

              </div>
            </div>
          </div>
          {{-- /.recent comments --}}

        </aside>
      </div>
      <!--/.row-->
    </div>
  </section>
  <!--/#blog-->

@endsection('content')

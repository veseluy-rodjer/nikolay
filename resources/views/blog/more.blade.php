@extends('layouts/template')
@section('content')

  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Blog
@can('before', App\Models\BlogModel::class)
        <a href="/blog/adding">&#160;Добавить запись</a>
@endcan
</li>
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
@can('before', App\Models\BlogModel::class)                  
                  <span><i class="fa fa-user"></i> <a id="edit1" href="/blog/edit/{{ $more->id }}">Изменить</a></span>
                  <span><i class="fa fa-user"></i> <a href="/blog/del/{{ $more->id }}">Удалить</a></span>
@endcan                  
                  <span><i class="fa fa-user"></i> <a href="#">Николай</a></span>
                  <span><i class="fa fa-comment"></i> <a>{{ $more->comments()->count() }} Комментарии</a></span>
                  <span><i class="fa-fa-heart"></i><a class="fa-heart" href="/blog/like/{{ $more->id }}">{{ $more->like }} Понравилось</a></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-10 blog-content">
                <a href="#"><img class="img-responsive img-blog" src={{ $more->picture }} width="100%" alt="" /></a>
@yield('more')
@if(Request::is('blog/more/*'))                
                <h4>{{ $more->topic }}</h4>
                <p>{{ $more->tell }}</p>
@can('before', App\Models\BlogModel::class)                
                <a class="btn btn-primary readmore" id="edit2" href="/blog/edit/{{ $more->id }}">Редактировать <i class="fa fa-angle-right"></i></a>
@endcan                
@endif

<div class="edit">
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<p><a href="/blog/delPicture/{{  $more->id  }}"><input type="submit" value="Удалить фото"></a></p>
<form enctype="multipart/form-data" action="/blog/edit/{{ $more->id }}" method="post">
{{ csrf_field() }}
<p><input type="hidden" name="MAX_FILE_SIZE" value="9024000"></p>
<p>Загрузить фото: <input name="picture" type="file" accept="image/*"></p>
<p>Тема: <textarea rows="3" cols="45" wrap="soft" name="topic" required>{{ $more->topic }}</textarea></p>
<p>Текст: <textarea rows="10" cols="45" wrap="soft" name="tell" required>{{ $more->tell }}</textarea></p>
<p><input type="submit"></p>
</form>
</div>
              </div>
              <div class="col-xs-12 col-sm-10 blog-content">
                <h3>Комментарии</h3>

@foreach($comments as $comment)
                <h4>{{ $comment->name }}</h4>
                <p>{{ $comment->comment }}</p>
@can('before', App\Models\BlogModel::class)                
                <a class="btn btn-primary readmore" href="/blog/delComment/{{ $comment->id }}">Удалить комментарий <i class="fa fa-angle-right"></i></a>
@endcan                
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

<script>
$('.edit').hide();
$(document).ready(function(){
    $('#edit1, #edit2').click(function() {
        $('.edit').show();
        return false;
    })

});
    
</script>

<script>
$(document).ready(function(){
    $('.fa-heart').click(function(){
        var a = $(this);         
        $.ajax({
            type: 'GET',
            url: a.attr('href'),
            context: a,
            success: function(data){
                $(this).text(data.like + ' Понравилось');
            },
            error: function(){
                alert('Sorry!');
            }
        });
        return false;
    });
});
</script>

@endsection('content')

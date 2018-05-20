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
          
@foreach ($listing as $i)
          
          <div class="blog-item">
            <div class="row">
              <div class="col-xs-12 col-sm-2">
                <div class="entry-meta">
                  <span id="publish_date">{{ $i->created_at }}</span>
@can('before', App\Models\BlogModel::class)
                  <span><i class="fa fa-user"></i> <a href="/blog/edit/{{ $i->id }}">Изменить</a></span>
                  <span><i class="fa fa-user"></i> <a href="/blog/del/{{ $i->id }}">Удалить</a></span>
@endcan                  
                  <span><i class="fa fa-user"></i> <a href="#">Николай</a></span>
                  <span><i class="fa fa-comment"></i> <a>{{ $i->comments()->count() }} Комментарии</a></span>
                  <span><i class="fa fa-heart"></i><a class="fa-heart" href="/blog/like/{{ $i->id }}">{{ $i->like }} Понравилось</a></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-10 blog-content">
                <a ><img class="img-responsive img-blog" src={{ $i->picture }} width="100%" alt="" /></a>
                <h4>{{ $i->topic }}</h4>
                <p>{{ substr($i->tell, 0, 300) }}</p>
                <a class="btn btn-primary readmore" href="/blog/more/{{ $i->id }}">Подробнее <i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
          <!--/.blog-item-->

@endforeach

@if (Request::is('/blog/*'))
          <ul class="pagination pagination-lg">
            {{ $listing->links() }}
          </ul>
          <!--/.pagination-->
@endif
          
        </div>
        <!--/.col-md-8-->

        <aside class="col-md-4">
          <div class="widget search">
            <form action="{{  route('search')  }}" method="post">
              {{ csrf_field() }}
              <input type="text" class="form-control search_box" name="search" autocomplete="off" placeholder="Search Here">
            </form>
          </div>
          <!--/.search-->

          <div class="widget blog_gallery">
            <h3>Our Gallery</h3>
            <ul class="sidebar-gallery">
              <li><a href="#"><img src="{{ asset('images/blog/gallery1.png') }}" alt="" /></a></li>
              <li><a href="#"><img src="{{ asset('images/blog/gallery2.png') }}" alt="" /></a></li>
              <li><a href="#"><img src="{{ asset('images/blog/gallery3.png') }}" alt="" /></a></li>
              <li><a href="#"><img src="{{ asset('images/blog/gallery4.png') }}" alt="" /></a></li>
              <li><a href="#"><img src="{{ asset('images/blog/gallery5.png') }}" alt="" /></a></li>
              <li><a href="#"><img src="{{ asset('images/blog/gallery6.png') }}" alt="" /></a></li>
            </ul>
          </div>
          <!--/.blog_gallery-->
        </aside>
      </div>
      <!--/.row-->
    </div>
  </section>
  <!--/#blog-->

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

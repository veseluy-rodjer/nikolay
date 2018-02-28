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
          
@foreach ($listing as $i)
          
          <div class="blog-item">
            <div class="row">
              <div class="col-xs-12 col-sm-2">
                <div class="entry-meta">
                  <span id="publish_date">{{ $i->created_at }}</span>
                  <span><i class="fa fa-user"></i> <a href="/blog/edit/{{ $i->id }}">Изменить</a></span>
                  <span><i class="fa fa-user"></i> <a href="/blog/del/{{ $i->id }}">Удалить</a></span>
                  <span><i class="fa fa-user"></i> <a href="#">Николай</a></span>
                  <span><i class="fa fa-comment"></i> <a>{{ $i->comments()->count() }} Комментарии</a></span>
                  <span><i class="fa fa-heart"></i><a href="/blog/like/{{ $i->id }}">{{ $i->like }} Понравилось</a></span>
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

          <ul class="pagination pagination-lg">
            <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>
          </ul>
          <!--/.pagination-->
        </div>
        <!--/.col-md-8-->

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
          <!--/.recent comments-->


          <div class="widget categories">
            <h3>Categories</h3>
            <div class="row">
              <div class="col-sm-6">
                <ul class="blog_category">
                  <li><a href="#">Computers <span class="badge">04</span></a></li>
                  <li><a href="#">Smartphone <span class="badge">10</span></a></li>
                  <li><a href="#">Gedgets <span class="badge">06</span></a></li>
                  <li><a href="#">Technology <span class="badge">25</span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <!--/.categories-->

          <div class="widget archieve">
            <h3>Archieve</h3>
            <div class="row">
              <div class="col-sm-12">
                <ul class="blog_archieve">
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2015 <span class="pull-right">(97)</span></a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2015 <span class="pull-right">(32)</span></a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2015 <span class="pull-right">(19)</span></a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2015 <span class="pull-right">(08)</span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <!--/.archieve-->

          <div class="widget tags">
            <h3>Tag Cloud</h3>
            <ul class="tag-cloud">
              <li><a class="btn btn-xs btn-primary" href="#">Apple</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Barcelona</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Office</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Ipod</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Stock</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Race</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">London</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Football</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Porche</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Gadgets</a></li>
            </ul>
          </div>
          <!--/.tags-->

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

@endsection('content')

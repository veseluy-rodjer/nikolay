<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Bootstrap -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- =======================================================
    Theme Name: Company
    Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
            <div class="navbar-brand">
              <a href="/"><h1><span>Com</span>pany</h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="/" @php if (isset(explode('/', $_SERVER['REQUEST_URI'])[1]) && explode('/', $_SERVER['REQUEST_URI'])[1] == '') echo 'class="active"'; @endphp>Главная</a></li>
                <li role="presentation"><a href="/about" @php if (isset(explode('/', $_SERVER['REQUEST_URI'])[1]) && explode('/', $_SERVER['REQUEST_URI'])[1] == 'about') echo 'class="active"'; @endphp>Обо мне</a></li>
                <li role="presentation"><a href="/services" @php if (isset(explode('/', $_SERVER['REQUEST_URI'])[1]) && explode('/', $_SERVER['REQUEST_URI'])[1] == 'services') echo 'class="active"'; @endphp>Сервис</a></li>
                <li role="presentation"><a href="/portfol" @php if (isset(explode('/', $_SERVER['REQUEST_URI'])[1]) && explode('/', $_SERVER['REQUEST_URI'])[1] == 'portfol') echo 'class="active"'; @endphp>Портфолио</a></li>
                <li role="presentation"><a href="/blog" @php if (isset(explode('/', $_SERVER['REQUEST_URI'])[1]) && explode('/', $_SERVER['REQUEST_URI'])[1] == 'blog') echo 'class="active"'; @endphp>Блог</a></li>
                <li role="presentation"><a href="/contact" @php if (isset(explode('/', $_SERVER['REQUEST_URI'])[1]) && explode('/', $_SERVER['REQUEST_URI'])[1] == 'contact') echo 'class="active"'; @endphp>Контакты</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

@yield('content')

  <footer>
    <div class="footer">
      <div class="container">
        <div class="social-icon">
          <div class="col-md-4">
            <ul class="social-network">
              <li><a href="https://www.facebook.com" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.google.com/" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://ua.linkedin.com" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="https://www.youtube.com" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-4 col-md-offset-4">
          <div class="copyright">
            &copy; Company Theme. All Rights Reserved.
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
              -->
              <a href="https://bootstrapmade.com/bootstrap-business-templates/">Bootstrap Business Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>

      <div class="pull-right">
        <a href="/" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.js') }}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
  <script src="{{ asset('js/wow.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY">
  </script>
  <script src="{{ asset('js/functions.js') }}"></script>

</body>

</html>

@extends('layouts/template')
@section('content')

  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Contact</li>
      </div>
    </div>
  </div>

  <div class="map">
    <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>
  </div>

  <section id="contact-page">
    <div class="container">
      <div class="center">
        <h2>Drop Your Message</h2>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="row contact-wrap">
        <div class="status alert alert-success" style="display: none"></div>
        <div class="col-md-6 col-md-offset-3">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
<form id="contactform" method="POST" class="validateform">
    {{ csrf_field() }}
 
    <div id="sendmessage">
        Ваше сообщение отправлено!
    </div>
    <div id="senderror">
        При отправке сообщения произошла ошибка. Продублируйте его, пожалуйста, на почту администратора <span>{{ env('MAIL_ADMIN_EMAIL') }}</span>
    </div>
    <div class="row">
        <div class="col-lg-4 field">
            <input type="text" name="name" placeholder="* Введите ваше имя" required />
        </div>
        <div class="col-lg-4 field">
            <input type="email" name="email" placeholder="* Введите ваш email" required />
        </div>
        <div class="col-lg-4 field">
            <input type="text" name="subject" placeholder="* Введите тему сообщения" required />
        </div>
        <div class="col-lg-12 margintop10 field">
            <textarea rows="12" name="message" class="input-block-level" placeholder="* Ваше сообщение..." required></textarea>
            <p>
                <button class="btn btn-theme margintop10 pull-left" type="submit">Отправить</button>
                <span class="pull-right margintop20">* Заполните, пожалуйста, все обязательные поля!</span>
            </p>
        </div>
    </div>
</form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>
  <!--/#contact-page-->

@endsection('content')

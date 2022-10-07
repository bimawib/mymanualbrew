<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myManualBrew | Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,500;1,500&family=Lexend:wght@500&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/trix.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/trix.js') }}"></script>
    <link rel="icon" type="image/png" href="{{ URL::asset('img/mmbicon.png') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>
    <script>
      $('document').ready(function(){

      $(".menu-toggle input").click(function(){
          $('nav ul').toggleClass('slide');
          $('#navbar').toggleClass('navbar-color');
          $('.login-button').css('margin-bottom','20px');
          $('ul.slide').css('padding','0px');
      });

      });

      window.addEventListener("scroll",function(){
          var navbar = document.querySelector('#navbar');
          navbar.classList.toggle('invis-nav', window.scrollY > 0);
          var tombolLogin = document.querySelector('.login-button');
          tombolLogin.classList.toggle('whitebg', window.scrollY > 96);
      });

  </script>
  @cloudinaryJS
  </head>
  
<body>    
@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color:ghostwhite; height:100vh">
      @yield('container')
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

<script src="{{ URL::asset('js/dashboard.js') }}"></script>
<script src="{{ URL::asset('js/jquery.js') }}"></script>

</body>
</html>

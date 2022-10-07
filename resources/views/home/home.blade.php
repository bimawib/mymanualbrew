<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,500;1,500&family=Lexend:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/mmbicon.png">
    <script src="js/jquery.js"></script>
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
    <title>my Manual Brew</title>
</head>
<body>

    {{-- navbar --}}

    <nav id="navbar">
        
        <a href="#" class="logo"><img src="img/mmblogo.png" alt="My Manual Brew"></a>
        
        <ul>
            <li><a href="#" class="first-list">HOME</a></li>
            <li><a href="/#about">ABOUT</a></li>
            <li><a href="/blogs">BLOGS</a></li>
            <li><a href="/guides">GUIDES</a></li>
            <li><a href="/ratio" class="last-list">RATIO-CALCULATOR</a></li>
            @auth
            <li>
                <a href="/dashboard" style="margin: 0px 10px; margin-left: 2vw"><img src="{{ URL::asset('img/profile-icon.png') }}" class="login-logo" alt="dash"></a>
            </li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" style="border: 0; background-color: rgba(0,0,0,0)">
                        <img src="{{ URL::asset('img/logout-icon.png') }}" class="login-logo" alt="logout">
                    </button>
                </form>
            </li>
                
                {{-- <a href="/logout" style="margin: 0px 10px; margin-left: 1.5vw;"></a> --}}
            
            @else
            <li>
                <a href="/login" class="login-button"><img src="{{ URL::asset('img/login-icon.png') }}" alt="login" class="login-logo"> LOGIN</a>
            </li>
            @endauth
            {{-- loginbtn and home login remove after logged --}}
        </ul>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <div class="gradient-atas"></div>

    {{-- CONTENT --}}

    <div class="masthead" style="background-image: url(img/nomersatu1.jpg);">
        <div class="color-overlay d-flex justify-content-center align-items-center">
            {{-- hero image by annie spratt --}}
            <h1>Enhance your coffee brewing experience!</h1>
        </div>
        @auth
        @else
        <div id="linku" class="color-overlay d-flex justify-content-center align-items-center">
            <a href="/login" class="is-login login-home">LOGIN</a>
            <a href="/register" class="is-login register-home">SIGN-UP</a>
        </div>
        @endauth
    </div>
    <div class="gradient-bawah"></div>

    {{-- about --}}
    
    <section class="about" id="about">
        <div class="container2">
            <div class="box-about">
                <div class="box">
                    <img src="img/pic-about.jpg" alt="coffee-grinder by joshua davis">
                </div>
                <div class="box">
                    <h1>myManualBrew</h1>
                    <p>myManualBrew is a web application that provides tools such as Manual Brew Guides, Coffee Ratio Calculator, and Blogs to help you make manually brewed coffee!</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    
    <h1 class="features">FEATURES</h1>
    {{-- feature --}}
    <section class="famous">
        <div class="container">
            <div class="box-famous">
                <div class="boxfam">
                <a href="/ratio">
                    <img src="img/famous1.jpg" alt="by nathan dumlao on unsplash">
                    <h1>Ratio Calculator</h1>
                </a>
                </div>

                <div class="boxfam">
                <a href="/guides">
                    <img src="img/famous2.jpg" alt="by tyler nix on unsplash">
                    <h1>Manual Brew Guides</h1>
                </a>
                </div>

                <div class="boxfam">
                <a href="/blogs">
                    <img src="img/famous3.jpg" alt="by kaleidico on unsplash">
                    <h1>my Coffee Blogs</h1>
                </a>
                </div>
                
            </div>
        </div>
    </section>

    <div class="height-filler"></div>
    <br>
    <footer class="footer">
        <div class="filler-foot"></div>
        <div class="logologo">
            <a target="blank" href="https://www.linkedin.com/in/bimawib/">
                <img src="img/linkedinlogo.png" alt="linkedin">
            </a>
            <a target="blank" href="http://bimawib.space/">
                <img src="img/weblogo.png" alt="web">
            </a>
            <a target="blank" href="https://www.instagram.com/bimawib/">
                <img src="img/iglogo.jpg" alt="instagram">
            </a>
        </div>
        <h2>Copyright © 2022 | <a href="http://bimawib.space/" class="bimawib">bimawib.space</a></h2>
    </footer>


    {{-- footer--}}

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
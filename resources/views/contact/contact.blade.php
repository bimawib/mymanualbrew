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
    <title>my Manual Brew | Contact</title>
</head>
<body>

    {{-- navbar --}}

    <nav id="navbar">
        
        <a href="#" class="logo"><img src="img/mmblogo.png" alt="My Manual Brew"></a>
        
        <ul>
            <li><a href="#" class="first-list">HOME</a></li>
            <li><a href="/#about">ABOUT</a></li>
            <li><a href="/blogs">BLOGS</a></li>
            <li><a href="/guide">V60-GUIDE</a></li>
            <li><a href="/ratio" class="last-list">RATIO-CALCULATOR</a></li>
            <li>
                <a href="#" class="login-button"><img src="img/login-icon.png" alt="login" class="login-logo"> LOGIN</a>
            </li>
            {{-- loginbtn and home login remove after logged --}}
        </ul>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <div class="gradient-atas-nonhome"></div>


    {{-- content --}}
    


    {{-- footer--}}

    {{-- <div class="height-filler"></div>
    <br> --}}
    <footer class="footer">
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
        <h2>Copyright © 2023 <a href="http://bimawib.space/" class="bimawib">bimawib.</a></h2>
    </footer>
    
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
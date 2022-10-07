<nav id="navbar">
        
    <a href="/" class="logo"><img src="{{ URL::asset('img/mmblogo.png') }}" alt="My Manual Brew"></a>
    
    <ul>
        <li><a href="/" class="first-list">HOME</a></li>
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
<div class="gradient-atas-nonhome"></div>
{{-- <hr class="hrbawah"> --}}
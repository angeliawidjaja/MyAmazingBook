<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container-fluid py-2">
        <div class="d-flex navbar-collapse justify-content-center position-fixed" style="width: 98.5vw">
            <a class="navbar-brand fw-bold" href="/"><h3>@lang('messages.brand_name')</h3></a>
        </div>
        <div class="collapse navbar-collapse d-flex justify-content-end" style="z-index: 1" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @if (Auth::check() == false)
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-center text-white mx-1" href="{{ route('register') }}">@lang('messages.sign_up')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-center text-white mx-1" href="{{ route('login') }}">@lang('messages.login')</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-center text-white mx-1" href="{{ route('logout') }}">@lang('messages.logout')</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

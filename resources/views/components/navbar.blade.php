<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid d-flex justify-content-center mx-5">
        <a href="{{route('home')}}" class="text-white mx-5">@lang('messages.home')</a>
        <a href="{{route('cart')}}" class="text-white mx-5">@lang('messages.cart')</a>
        <a href="{{route('profile')}}" class="text-white mx-5">@lang('messages.profile')</a>
        @if (Auth::user()->role_id == 2)
            <a href="{{route('account')}}" class="text-white mx-5">@lang('messages.account_maintenance')</a>
        @endif
    </div>
</nav>
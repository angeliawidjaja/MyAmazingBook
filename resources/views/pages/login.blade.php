@extends('baselayout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">@lang('messages.login')</h2>
        @if($errors->any())
            <h5 class="card text-white bg-danger p-2 text-center mb-3">{{$errors->first()}}</h5>
        @endif
        <form action="/post/login" method="post" class="mx-5 mt-5">
            @csrf
            <div class="d-flex flex-row justify-content-center">
                <div class="left mx-4">
                    <div class="mt-3">
                        <label for="email">@lang('messages.email')<span class="tab"></span>: </label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="mt-3">
                        <label for="password">@lang('messages.password')<span class="tab"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="mt-3">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">@lang('messages.remember_me')</label>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column">
                <button type="submit" class="btn btn-primary mx-5 mt-5 mb-3">@lang('messages.submit')</button>
                <a href="{{ route('register') }}" class="text-center">@lang('messages.no_account')</a>
            </div>
        </form>
    </div>
@endsection
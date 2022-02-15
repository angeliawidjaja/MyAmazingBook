@extends('baselayout')

@section('content')
    <div class="container my-2">
        <div class="border border-5 border-primary rounded-circle container d-flex flex-column justify-content-center align-items-center" style="height: 80vh; width: 80vh;">
            <h2>@lang('messages.saved')!</h2>
            @if ($linkToHome == true)
                <br><br>
                <a href="{{route('home')}}">@lang('messages.click_home')</a>
            @endif
        </div>
    </div>
@endsection
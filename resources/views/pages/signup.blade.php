@extends('baselayout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">@lang('messages.sign_up')</h2>
        @if($errors->any())
            <h5 class="card text-white bg-danger p-2 text-center mb-3">{{$errors->first()}}</h5>
        @endif
        <form action="/post/signup" method="post" class="mx-5 mt-5" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-row justify-content-center">
                <div class="left mx-4">
                    <div class="mt-3">
                        <label for="first_name">@lang('messages.first_name')<span class="tab"></span>: </label>
                        <input type="text" name="first_name" id="first_name">
                    </div>
                    <div class="mt-3">
                        <label for="last_name">@lang('messages.last_name')<span class="tab"></span>: </label>
                        <input type="text" name="last_name" id="last_name">
                    </div>
                    <div class="mt-3">
                        @lang('messages.gender')<span class="tab"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        <input type="radio" name="gender" id="male" value="Male"><label for="male">@lang('messages.male')</label>
                        <input type="radio" name="gender" id="female" value="Female"><label for="female">@lang('messages.female')</label>
                    </div>
                    <div class="mt-3">
                        <label for="password">@lang('messages.password')<span class="tab"></span>&nbsp;&nbsp;: </label>
                        <input type="password" name="password" id="password">
                    </div>
                </div>
                <div class="right mx-4">
                    <div class="mt-3">
                        <label for="middle_name">@lang('messages.middle_name')<span class="tab"></span>: </label>
                        <input type="text" name="middle_name" id="middle_name">
                    </div>
                    <div class="mt-3">
                        <label for="email">@lang('messages.email')<span class="tab"></span>: </label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="mt-3">
                        @lang('messages.role')<span class="tab"></span><span class="tab"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        <select name="role" id="role">
                            <option value="">@lang('messages.select')</option>
                            <option value="User">@lang('messages.user')</option>
                            <option value="Admin">@lang('messages.admin')</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="display_picture_link">@lang('messages.display_picture_link')<span class="tab"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                        <input type="file" name="display_picture_link" id="display_picture_link">
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column">
                <button type="submit" class="btn btn-primary mx-5 mt-5 mb-3">@lang('messages.submit')</button>
                <a href="{{ route('login') }}" class="text-center">@lang('messages.already_sign_up')</a>
            </div>
        </form>
    </div>
@endsection
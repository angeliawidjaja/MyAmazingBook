@extends('baselayout')

@section('content')
    <div class="container mt-5">
        @if($errors->any())
            <h5 class="card text-white bg-danger p-2 text-center mb-3">{{$errors->first()}}</h5>
        @endif
        <form action="/post/profile" method="post" class="mx-5 mt-5" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-row justify-content-center">
                <div class="left mx-4">
                    <div>
                        <img class="card-img border border-2" src="{{ Storage::url($user->display_picture_link) }}" alt="User Profile Picture"
                            width="280" height="220">
                    </div>
                </div>
                <div class="center mx-4 my-2">
                    <div class="mt-3">
                        <label for="first_name">@lang('messages.first_name')<span class="tab"></span>: </label>
                        <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}">
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="last_name">@lang('messages.last_name')<span class="tab"></span>: </label>
                        <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}">
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        @lang('messages.gender')<span class="tab"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        <input type="radio" name="gender" id="male" value="Male" @if($gender->id == 1) checked @endif><label for="male">@lang('messages.male')</label>
                        <input type="radio" name="gender" id="female" value="Female" @if($gender->id == 2) checked @endif><label for="female">@lang('messages.female')</label>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="password">@lang('messages.password')<span class="tab"></span>&nbsp;&nbsp;: </label>
                        <input type="password" name="password" id="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="right mx-4 my-2">
                    <div class="mt-3">
                        <label for="middle_name">@lang('messages.middle_name')<span class="tab"></span>: </label>
                        <input type="text" name="middle_name" id="middle_name" value="{{$user->middle_name}}">
                        @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="email">@lang('messages.email')<span class="tab"></span>: </label>
                        <input type="text" name="email" id="email" value="{{$user->email}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        @lang('messages.role')<span class="tab"></span><span class="tab"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{$role->role_desc}}
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="display_picture_link">@lang('messages.display_picture_link')<span class="tab"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                        <input type="file" name="display_picture_link" id="display_picture_link">
                        @error('display_picture_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary mx-5 mt-5 mb-3">@lang('messages.save')</button>
            </center>
        </form>
    </div>
@endsection
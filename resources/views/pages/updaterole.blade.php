@extends('baselayout')

@section('content')
    <div class="container mt-5">
        @if($errors->any())
            <h5 class="card text-white bg-danger p-2 text-center mb-3">{{$errors->first()}}</h5>
        @endif
        <h4>{{$user->first_name}} &nbsp; {{$user->middle_name}} &nbsp; {{$user->last_name}}</h4>
        <form action="/post/updateAccount/{{$user->id}}" method="post" class="mx-5 mt-5">
            @csrf
            @lang('messages.role')<span class="tab"></span><span class="tab"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            <select name="role" id="role">
                <option value="">@lang('messages.select')</option>
                <option value="User">@lang('messages.user')</option>
                <option value="Admin">@lang('messages.admin')</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary mx-5 mt-5 mb-3">@lang('messages.submit')</button>
        </form>
    </div>
@endsection
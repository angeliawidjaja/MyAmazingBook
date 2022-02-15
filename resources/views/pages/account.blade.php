@extends('baselayout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h5 class="text-center">@lang('messages.account')</h5>
            </div>
            <div class="col">
                <h5 class="text-center">@lang('messages.action')</h5>
            </div>
        </div>
        <hr style="height: 1px; margin-top: 0vw; margin-bottom: 1vw;">
        @if(!$users->isEmpty())
            @foreach ($users as $u)
                <div class="row">
                    <div class="col">
                        {{ $u->first_name }}{{ $u->middle_name }}{{ $u->last_name }} - {{ $u->role->role_desc }}
                    </div>
                    <center class="col">
                        @if (Auth::user()->id != $u->id)
                            <a href="{{route('update_account', ['id'=>$u->id])}}">@lang('messages.update_role')</a>
                            <a href="{{route('delete_account', ['id'=>$u->id])}}">@lang('messages.delete')</a>
                        @else
                            <span class="text-primary fw-bold">@lang('messages.this_account')</span>
                        @endif
                    </center>
                </div>
                <hr style="height: 1px; margin-top: 1vw; margin-bottom: 1vw;">
            @endforeach
        @else
            <h5 style="background-color: aquamarine; padding: 8px; text-align: center">@lang('messages.no_data')</h5>
        @endif
    </div>
@endsection
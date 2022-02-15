@extends('baselayout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h5 class="text-center">@lang('messages.title')</h5>
            </div>
            <div class="col">

            </div>
        </div>
        <hr style="height: 1px; margin-top: 0vw; margin-bottom: 1vw;">
        @if(!$orders->isEmpty())
            @foreach ($orders as $o)
                <div class="row">
                    <div class="col">
                        <p class="text-primary">{{ $o->ebook->title }}</p>
                    </div>
                    <div class="col">
                        <a href="{{route('remove_from_cart', ['id'=>$o->id])}}">@lang('messages.delete')</a>
                    </div>
                </div>
                <hr style="height: 1px; margin-top: 1vw; margin-bottom: 1vw;">
            @endforeach
            <center>
                <button class="btn btn-primary my-5">
                    <a href="{{route('submit_cart')}}" class="text-white text-decoration-none">
                        @lang('messages.submit')
                    </a>
                </button>
            </center>
        @else
            <h5 style="background-color: aquamarine; padding: 8px; text-align: center">@lang('messages.no_order')</h5>
        @endif
    </div>

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
@endsection
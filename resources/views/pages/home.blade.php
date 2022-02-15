@extends('baselayout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h5 class="text-center">@lang('messages.author')</h5>
            </div>
            <div class="col">
                <h5 class="text-center">@lang('messages.title')</h5>
            </div>
        </div>
        <hr style="height: 1px; margin-top: 0vw; margin-bottom: 1vw;">
        @if(!$books->isEmpty())
            @foreach ($books as $b)
                <div class="row">
                    <div class="col">
                        {{ $b->author }}
                    </div>
                    <div class="col">
                        <a href="{{route('detail_route', ['book_id'=>$b->id])}}">{{ $b->title }}</a>
                    </div>
                </div>
                <hr style="height: 1px; margin-top: 1vw; margin-bottom: 1vw;">
            @endforeach
        @else
            <h5 style="background-color: aquamarine; padding: 8px; text-align: center">@lang('messages.no_data')</h5>
        @endif
    </div>
@endsection
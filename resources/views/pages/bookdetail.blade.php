@extends('baselayout')

@section('content')
    <div class="container m-5">
        <h4 class="mb-4">@lang('messages.ebook_detail')</h4>
        <p>@lang('messages.title'): {{$book->title}} </p>
        <p>@lang('messages.author'): {{$book->author}} </p>
        @lang('messages.description'):
        <p>{{$book->description}}</p>
        <button class="btn btn-primary">
            <a href="{{route('addToCart', ['book_id'=>$book->id])}}" class="text-white text-decoration-none">
                @lang('messages.rent')
            </a>
        </button>
    </div>

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
@endsection
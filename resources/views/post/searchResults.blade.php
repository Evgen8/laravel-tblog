@extends('post.index')

@section('content')
    <div class="container main_content">
        <div class="row margin_top">
            <div class="title">
                <button type="button" class="btn btn-default" onclick="history.back()">&larr; Вернуться</button>
                <h3>По запросу: «<b>{{ $keyword }}</b>» найдено {{ $count }} совпадений.</h3><hr>
            </div>

            <section>
                @if( count($result) )
                    @foreach($result as $key => $item)
                        <li><h3><a href="{{ url('/post', $item->slug) }}"> {{ $item->title }} </a></h3></li>
                    @endforeach
                @else
                    <p>По вашему запросу ничего не найдено</p>
                @endif
            </section>
        </div>
    </div>

    <div id="up"><img src="{{ asset('img/arrow-up-01-128.png') }}"></div>


@endsection
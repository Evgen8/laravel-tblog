@extends('post.index')

@section('content')
    <div class="center">
        <div class="title">
            <input id="back" type="button" onclick="history.back()" value="&larr; Вернуться">
            <h3>По запросу: «<b>{{ $keyword }}</b>» найдено совпадений: {{ $count }} </h3><hr>
        </div>

        <section>
            @if( count($result) )
                @foreach($result as $key => $item)
                    <li><h3><a href="/post/{{ $item->slug }}"> {{ $item->title }} </a></h3></li>
                @endforeach
            @else
                <p>По вашему запросу ничего не найдено</p>
            @endif
        </section>
    </div>

    <div id="up"><img src="{{ asset('img/arrow-up-01-128.png') }}"></div>


@endsection
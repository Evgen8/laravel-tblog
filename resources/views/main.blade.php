@extends('index')

@section('content')
    <div class="center">
        <section>
            <div id="ajaxSection">
                @foreach($post as $item)
                    <div class="post">
                        <h2><a href='/post/{{ $item->slug }}'>{{ $item->title }}</a></h2>
                        <a href='/post/{{ $item->slug }}'>{!! $item->image !!}</a>
                    </div>
                @endforeach
                @if(!count($post))
                    <h3>В данном разделе еще нет статей</h3>
                @endif
            </div>

            <div id="more">
                {!! $post->render() !!}
                <ul>

                </ul>
            </div>
        </section>
    </div>
@endsection
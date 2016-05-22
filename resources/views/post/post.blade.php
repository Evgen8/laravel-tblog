@extends('post.index')

@section('content')
        <!--Тело-->
<div class="center">
    <div class="title">
        <input id="back" type="button" onclick="history.back()" value="&larr; Вернуться">
        <i style='font-size: 18px; padding-left: 20px;padding-top: 8px; margin: 0;'>{{ $post->created_at }}</i>
        <h2>{{ $post->title }}</h2>
    </div>

    <section>
        {!! $post->content !!}


        <script type="text/javascript">(function() {
                if (window.pluso)if (typeof window.pluso.start == "function") return;
                if (window.ifpluso==undefined) { window.ifpluso = 1;
                    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                    var h=d[g]('body')[0];
                    h.appendChild(s);
                }})();</script>
        <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,nocounter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print">
        </div>

        <hr>
        <div>
               {{--{!! link_to_route('post.create', 'new') !!}--}}
            </div>
        <h3>Комментарии</h3>
        <form id="addComment" action="{{ url('post/comment')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" id="post_id" name="post_id" value="{{ $id }}"/>
            <p>Ваше имя: <input type="text" id="nameC" name="name" required/></p>
            <p>Ваш e-mail: <input type="email" id="emailC" name="email"/></p>
            <textarea  id="messageC" name="message" cols='40' rows='10' placeholder="Введите текст" required></textarea>
            <p><input type="submit" name="publish" value="Отправить"/></p>
        </form>
        <hr>

        <div id="ajaxComment">
            @foreach($comment as $comment)
                <h3 id='h3_name'>{{ $comment->name }}</h3>
                <p id='date'>{{ $comment->created_at }}</p>
                <p id='p'>{{ $comment->text }}</p>
            @endforeach
        </div>

    </section>

    <div class="advertising">
        <a href="http://www.microsoft.com/uk-ua/windows/windows-10-upgrade" target="_blank"><img src="{{ asset('img/snow_mountains_windows_10-wide.jpg') }}"></a>
        <a href="http://www.microsoft.com/uk-ua/windows/windows-10-upgrade" target="_blank"><img id="above" src="{{ asset('img/Windows_10_Logo.svg.png') }}"></a>
    </div>
</div>

<div id="up"><img src="{{ asset('img/arrow-up-01-128.png') }}"></div>


@endsection
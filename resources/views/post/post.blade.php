@extends('post.index')

@section('content')
        <!--Тело-->
<div class="container main_content">
    <div class="blog-header">
        <h1 class="blog-title">{{ $post->title }}</h1>
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-12 col-md-8 blog-main">
            <div class="blog-post">
                <button type="button" class="btn btn-default" onclick="history.back()">&larr; Вернуться</button>
                <p class="blog-post-meta right_inline">{{ $post->created_at }}</p><br/><br/>
                {!! $post->content !!}

                {{--<blockquote>
                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>--}}
            </div><!-- /.blog-post -->
            <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,nocounter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print">
            </div>

            <h3>Комментарии</h3>
            <form role="form" id="commentForm" action="{{ url('post/comment')}}" method="POST">
                <input type="hidden" id="post_id" name="post_id" value="{{ $id }}"/>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="name" class="h4">Имя</label>
                        <input type="text" class="form-control" id="nameC" placeholder="Введите имя" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email" class="h4">Email</label>
                        <input type="email" class="form-control" id="emailC" placeholder="Введите email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="h4 ">Сообщение</label>
                    <textarea id="messageC" class="form-control" rows="5" placeholder="Введите ваше сообщение" required></textarea>
                </div>
                <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Отправить</button>
            </form>

            <hr/>
            <div id="ajaxComment">
                @foreach($comment as $comment)
                    <h3 class="inline">{{ $comment->name }}</h3>
                    <p class="right_inline">{{ $comment->created_at }}</p>
                    <p>{{ $comment->text }}</p>
                    <hr/>
                @endforeach
            </div>
            <nav>
                <ul class="pager">
                    <li><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </nav>
        </div><!-- /.blog-main -->

        <div class="col-sm-12 col-md-offset-1 col-md-3 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                    fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="sidebar-module sidebar-module-inset">
                <a href="http://www.microsoft.com/uk-ua/windows/windows-10-upgrade" target="_blank"><img class="img-responsive" src="{{ asset('img/snow_mountains_windows_10-wide.jpg') }}"></a>
                <a href="http://www.microsoft.com/uk-ua/windows/windows-10-upgrade" target="_blank"><img id="above" class="img-responsive" src="{{ asset('img/Windows_10_Logo.svg.png') }}"></a>
            </div>
        </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->
</div>
<div id="up"><img src="{{ asset('img/arrow-up-01-128.png') }}"></div>

</div> <!-- /container -->
@endsection
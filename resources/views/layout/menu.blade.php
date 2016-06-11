<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#responsive-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="logo" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
            <a class="navbar-brand" href="{{ url('/') }}">Tech Blog</a>
        </div>
        <div class="collapse navbar-collapse" id="responsive-menu">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="menu">
                        <div id="logined">
                            <h3 style="display:inline;"><b>{{ Auth::user()->name }}</b></h3>
                            <a href="{{ url('/logout') }}" id="loginBtn" class="btn logout">Выйти </a>
                        </div>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Войти <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <form class="navbar-form" id="entry" action="{{ url('/login') }}" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <input autofocus type="email" name="email" id="email" placeholder="email" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="Пароль" required class="form-control">
                                </div>
                                <span id="wrongMessage"></span>
                                <label><input type="checkbox" name="remember"> Запомнить меня</label>
                                <button type="button" id="loginAjax" class="btn">Войти</button>
                                <a id="aForgot" href="{{ url('/password/reset') }}">Забыли пароль?</a>
                                <a class="btn btn-default btn-block" href="{{ url('/register') }}" id="registrationBtn">Регистрация</a>
                            </form>
                        </ul>
                    </li>
                    <li class="menu"><a href="{{ url('/register') }}" id="regBtn">Регистрация</a></li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-search"></i></a>
                    <ul class="dropdown-menu">
                        <form class="navbar-form" id="search" method="POST" action="{{ url('/search') }}">
                            {!! csrf_field() !!}
                            <div class="input-group">
                                <input class="form-control" type="text" name="keyword" required>
                                <span class="input-group-btn">
                                    <button  id="search_btn" class="btn  btn-success" type="submit">Найти</button>
                                </span>
                            </div>
                        </form>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                @foreach($category as $key => $item)
                    @if( isset($post->category_id) && $post->category_id == $item->id || isset($categoryId) && $categoryId == $item->id )
                        <li class="menu active"><a href="/category/{{ $item->slug }}">{{ $item->name }}</a></li>
                    @else
                        <li class="menu"><a href="/category/{{ $item->slug }}">{{ $item->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
<header>
    <h1><a href="{{ url('/') }}">Техно<span>Blog</span></a></h1>
    <form id="search" role="form" method="POST" action="{{ url('/search') }}">
        {!! csrf_field() !!}
        <input type="search" name="keyword" required>
        <input id="search_btn" type="submit" name="sick" value="Поиск">
    </form>
    <ul>
        @foreach($category as $key => $item)
            @if( isset($post->category_id) && $post->category_id == $item->id || isset($categoryId) && $categoryId == $item->id )
                <li class="menu active"><a href="/category/{{ $item->slug }}">{{ $item->name }}</a></li>
            @else
                <li class="menu"><a href="/category/{{ $item->slug }}">{{ $item->name }}</a></li>
            @endif
        @endforeach
    </ul>

    @if (Auth::check())
        <div id="entry">
            <h3 style='padding: 0; margin: 0; display:inline;'><b>{{ Auth::user()->name }}</b></h3>
            <a href="{{ url('/logout') }}" id="loginBtn" class="logout">Выйти</a>
        </div>
    @else
        <form id="entry" action="{{ url('/login') }}" method="post">
            <input id="loginBtn" type="button" name="log-in" value="Войти" onclick="javascript:showElement('log-in')">
            <a href="{{ url('/register') }}" id="registrationBtn"  >Регистрация</a>
            {!! csrf_field() !!}
            <div id="log-in" style="display:none;">
                <input autofocus type="text" name="email" id="email" placeholder="email" required>
                <input type="password" name="password" id="password" placeholder="Пароль" required>
                <span class="help-block" id="wrongMessage"></span>
                <label><input type="checkbox" name="remember"> Запомнить меня</label>
                <input type="button" id="loginAjax" value="Войти"><br>
                <a id="aForgot" href="{{ url('/password/reset') }}">Забыли пароль?</a>
            </div>
        </form>
    @endif

</header>

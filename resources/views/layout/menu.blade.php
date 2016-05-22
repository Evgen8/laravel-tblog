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
                <li class="menu active"><a href="/{{ $item->slug }}/{{ $item->id }}">{{ $item->name }}</a></li>
            @else
                <li class="menu"><a href="/{{ $item->slug }}/{{ $item->id }}">{{ $item->name }}</a></li>
            @endif
        @endforeach
    </ul>

    @if (Auth::check())
        <div id="entry">
            <h3 style='padding: 0; margin: 0; display:inline;'><b>{{ Auth::user()->name }}</b></h3>
            <a href="{{ url('/logout') }}" id="loginBtn" class="logout">Выйти</a>
        </div>
    @else
        <form id="entry">
            <input id="loginBtn" type="button" name="log-in" value="Войти" onclick="javascript:showElement('log-in')">
            <input id="registrationBtn" type="button" name="registration" value="Регистрация" onclick="show('block')">

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

            <!-- Задний прозрачный фон-->
    <div id="wrap" onclick="show('none')"></div>

    <div id="window">
        <img class="close" onclick="show('none')" src="{{ asset('img/close.png') }}" width="42px">
        <h3>Регистрация</h3>
        <div class="wrapper">

            <form id="registration" role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}
                <div id="main">
                    <div class="field">
                        <label for="fullname">Имя</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="fullname" pattern="[А-Яа-яЁёA-Za-z" required><span></span>
                    </div>
                    <div class="field">
                        <label for="fi2">Фамилия</label>
                        <input type="text" name="surname" value="{{ old('surname') }}" id="fi2" pattern="[А-Яа-яЁёA-Za-z" required><span></span>
                    </div>
                    <div class="field">
                        <label for="fi3">Город</label>
                        <input type="text" name="city" value="{{ old('city') }}" id="fi4" pattern="[А-Яа-яЁёA-Za-z" required><span></span>
                    </div>
                    <div class="field">
                        <label for="fi4">E-mail</label>
                        <input type="email" name="email" value="{{ old('email') }}" id="fi4" required><span></span>
                    </div>
                    <div class="field">
                        <label for="fi5">Пароль</label>
                        <input type="password" name="password" id="fi5"  required>
                    </div>
                    <div class="field">
                        <label for="fi6">Повторите</label>
                        <input type="password" name="password_confirmation" id="fi6"  required><br>
                    </div>
                    <div class="capcha">
                        <p>Введите число с картинки</p>
                        <label><img src="{{ asset('img/capcha.png') }}"></label>
                        <input type="number" name="capcha" pattern="55102" required><br>
                    </div>
                </div>

                <input type="submit" id="submit" name="send" value="Готово"/>
            </form>
        </div><!-- end wrapper -->
    </div>
</header>

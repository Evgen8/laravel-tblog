@extends('index')

@section('content')
    <div class="center">
        <section>
            <div class="wrapper">
                <form id="registration" role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}
                    <h3>Регистрация</h3>
                    <div id="main">
                        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="fullname">Имя</label>
                            <input type="text" name="name" value="{{ old('name') }}" id="fullname" pattern="[А-Яа-яЁёA-Za-z" required><span></span>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="fi4">E-mail</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="fi4" required><span></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="field">
                            <label for="phone">Телефон</label>
                            <input type="tel" name="tel" value="{{ old('tel') }}" id="phone"  required><span></span>
                        </div>
                        <div id="pass">
                            <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="fi5">Пароль</label>
                            <input type="password" name="password" id="fi5"  required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            </div>
                            <div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="fi6">Повторите пароль</label>
                                <input type="password" name="password_confirmation" id="fi6"  required><br>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <input type="submit" id="submit" name="send" value="Готово"/>
                </form>
            </div><!-- end wrapper -->
        </section>
    </div>
@endsection
@section('script')
@parent
    <script type="text/javascript" src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script>
        var inputmask_phone = {"autoUnmask": true, "mask": "+38 099 999 99 99"};
        $("#phone").inputmask(inputmask_phone);
    </script>
@endsection
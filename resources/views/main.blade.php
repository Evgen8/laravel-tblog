@extends('index')

@section('content')
    <div class="container main_content">
        <div class="row">
            @foreach($post as $item)
                <div class="col-xs-6 col-md-4 article">
                    <a href="{{ url('/post', $item->slug) }}" style="background: transparent url('{{ asset('img') }}/{{ $item->image }}') no-repeat 100% 100%;">
                        {{--<img alt="" src="{{ asset('img') }}/{{ $item->image }}" class="img-responsive">--}}
                        <div class="post">
                            <h4>{{ $item->title }}</h4>
                            <span class="category">{{ $item->category->name }}</span>
                            <span class="date">{{ $item->created_at->format('d.m.Y') }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
            @if(!count($post))
                <h3>В данном разделе еще нет статей</h3>
            @endif
        </div>

        <hr>
        <nav class="center-block">
            <div class="text-center">
                {!! $post->render() !!}
            </div>
        </nav>
    </div> <!-- /container -->
@endsection
@section('script')
    @parent
    <script>
        $('.article > a').mouseover(function() {
            $(this).css('border', '1px solid #50c28c');
        });
        $('.article > a').mouseout(function() {
            $(this).css('border', '1px solid rgba(0, 0, 0, 0.1)');
        });
    </script>
@endsection
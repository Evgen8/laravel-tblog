@foreach($post as $item)
    <div class="post">
        <h2><a href='/post/{{ $item->id }}'>{{ $item->title }}</a></h2>
        <a href='/post/{{ $item->id }}'>{!! $item->image !!}</a>
    </div>
@endforeach
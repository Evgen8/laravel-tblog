@foreach($comment as $comment)
    <h3 id='h3_name'>{{ $comment->name }}</h3>
    <p id='date'>{{ $comment->created_at }}</p>
    <p id='p'>{{ $comment->text }}</p>
@endforeach
@foreach( $posts as $index => $post)
    <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->category->name }}</td>
        <td>@if($post->status == 0) Скрыта @else Активна @endif</td>
        <td>{{ count($post->comments)}}</td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->updated_at }}</td>
        {{--<th><a href="{{ Request::url() }}/{{ $post->id }}">подробнее</a></th>--}}
        <td>
            <div class="btn-group">
                <button type="button" value="{{ $post->id }}" class="btn edit_post" title="Редактировать" disabled><i class='fa fa-edit'></i></button>
                <button type="button" value="{{ $post->category->id }}" class="btn btn-info change_category" title="Изменить категорию"><i class='fa fa-tag'></i></button>
                @if($post->status == 0)
                    <button type="button" value="{{ $post->id }}" class="btn btn-success status_post" title="Опубликовать"><i class='fa fa-unlock-alt'></i></button>
                @else
                    <button type="button" value="{{ $post->id }}" class="btn btn-warning status_post" title="Снять с публикации"><i class='fa fa-lock'></i></button>
                @endif
                <button type="button" value="{{ $post->id }}" class="btn btn-danger delete_post" title="Удалить"><i class='fa fa-close'></i></button>
            </div>
        </td>
    </tr>
@endforeach
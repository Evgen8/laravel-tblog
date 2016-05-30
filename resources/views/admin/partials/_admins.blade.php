@foreach( $admin as $index => $admin)
    <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $admin->name }}</td>
        <td>{{ $admin->email }}</td>
        <td>+38 0{{ $admin->tel }}</td>
        <td>{{ $admin->created_at }}</td>
        <td>
            <div class="btn-group">
                <button type="button" value="{{ $admin->id }}" data-toggle="modal" data-target="#sendModal" class="btn" title="Написать"><i class='fa fa-envelope'></i></button>
                <button type="button" value="{{ $admin->id }}" class="btn btn-info edit_admin" title="Редактировать"><i class='fa fa-edit'></i></button>
                <button type="button" value="{{ $admin->id }}" class="btn btn-warning lock_admin" title="Заблокировать"><i class='fa fa-lock'></i></button>
                <button type="button" value="{{ $admin->id }}" class="btn btn-danger delete_admin" title="Удалить"><i class='fa fa-close'></i></button>
            </div>
        </td>
    </tr>
@endforeach
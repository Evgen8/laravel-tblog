@extends('admin.index')
@section('scripts')
    @parent
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('htmlheader_title', 'Статьи')
@section('contentheader_title', 'Статьи')

@section('main-content')
    <div class="row">
        <div class="col-xs-4">
            <p><button class="btn btn-success" id="btn-add" data-toggle="modal" data-target="#Modal" disabled>Создать статью</button></p>
        </div>
        <div class="col-xs-8 col-lg-4 col-lg-offset-4">
            <div id="alert"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Заголовок</th>
                            <th>Категория</th>
                            <th>Статус</th>
                            <th>Комментариев</th>
                            <th>Дата создания</th>
                            <th>Дата изменения</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="ajaxPosts">
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
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>№</th>
                            <th>Заголовок</th>
                            <th>Категория</th>
                            <th>Статус</th>
                            <th>Комментариев</th>
                            <th>Дата создания</th>
                            <th>Дата изменения</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="modal fade" id="change_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Изменить категорию</h4>
                </div>
                <div class="modal-body">
                    <form id="changeCategory" action="#" method="post">
                        <div class="form-group">
                            <label for="category">Категория </label>
                            <select name="category" id="category">
                                @foreach( $category as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <!-- /#category -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" form="changeCategory" class="btn btn-primary">Изменить</button>
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('scripts')
    @parent
    <!-- page script -->
    <script src="{{ asset('js/ajaxPost.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection
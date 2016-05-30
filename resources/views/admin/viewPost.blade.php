@extends('admin.index')
@section('scripts')
@parent
        <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('htmlheader_title', 'Статьи')
@section('contentheader_title', $post->title )

@section('main-content')
    <div class="row">
        <div class="col-xs-7">
            <form>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
            </form>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Информация</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Категория</td>
                            <td>{{ $post->category->name }}</td>
                            <td><button class="btn btn-default">изменить</button></td>
                        </tr>
                        <tr>
                            <td>Статус</td>
                            <td>{{ $post->status }}</td>
                            <td><button class="btn btn-default">изменить</button></td>
                        </tr>
                        <tr>
                            <td>Просмотров</td>
                            <td>10</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-xs-7">
            <h3>Комментарии: {{ count($comments) }}</h3>
            <div class="box-footer box-comments">
                @foreach( $comments as $comment)
                    <div class="box-comment">
                        <!-- User image -->
                        {{--<img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">--}}

                        <div class="comment-text">
                              <span class="username">
                                {{ $comment->name }}
                                <span class="text-muted pull-right">{{ $comment->created_at }}</span>
                              </span><!-- /.username -->
                            {{ $comment->text }}
                        </div>
                        <!-- /.comment-text -->
                    </div>
                    <!-- /.box-comment -->
                @endforeach
            </div>
        </div>
        <!-- /.row -->
    @endsection

    @section('scripts')
    @parent
            <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
        });
    </script>
@endsection
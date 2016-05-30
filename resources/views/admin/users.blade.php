@extends('admin.index')
@section('htmlheader')
@parent
        <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('htmlheader_title', 'Пользователи')
@section('contentheader_title', 'Пользователи')

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>Моб. номер</th>
                            <th>Дата регистрации</th>
                            <th>Последнее посещение</th>
                            {{--<th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $users as $index => $user)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>+38 0{{ $user->tel }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->last_visit }}</td>
                            </tr>                                {{--<th><a href="{{ Request::url() }}/{{ $user->id }}">подробнее</a></th>--}}

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
@parent
        <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection
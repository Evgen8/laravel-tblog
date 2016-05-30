@extends('admin.index')
@section('htmlheader')
@parent
        <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('htmlheader_title', 'Администраторы')
@section('contentheader_title', 'Администраторы')

@section('main-content')
    <div class="row">
        <div class="col-xs-4">
            <p><button class="btn btn-success" id="btn-add" {{--data-toggle="modal" data-target="#Modal"--}}>Добавить администратора</button></p>
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
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>Моб. номер</th>
                            <th>Дата регистрации</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="ajaxAdmins">
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

    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавить администратора</h4>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'regForm'))}}
                        {{Form::label('name', 'Имя', array('class'=>'control-label'))}}
                        {{Form::text('name', null, array('class'=>'form-control','placeholder'=>'Введите Имя', 'required'))}}
                        <div class="errors" id ="name_error"></div>
                        {{Form::label('email', 'Email', array('class'=>'control-label'))}}
                        {{Form::email('email', null, array('class'=>'form-control','placeholder'=>'Введите Email', 'required'))}}
                        <div class="errors" id ="email_error"></div>
                        {{Form::label('tel', 'Телефон', array('class'=>'control-label'))}}
                        {{Form::tel('tel', null, array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Введите Телефон', 'required'))}}
                        <div class="errors" id ="phone_error"></div>
                        <div id="pass">{{Form::label('password', 'Пароль', array('class'=>'control-label'))}}
                        {{Form::password('password', array('class'=>'form-control', 'placeholder'=>'Пароль', 'required'))}}
                        <div class="errors" id ="password_error"></div>
                        {{Form::label('password_confirmation', 'Повторите пароль',array('class'=>'control-label'))}}
                        {{Form::password('password_confirmation', array('class'=>'form-control','placeholder'=>'Повторите пароль', 'required'))}}</div>
                    {{Form::close()}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    {{Form::submit('Добавить', array('class'=>'btn btn-primary', 'id'=>'btn-save', 'form'=>'regForm'))}}

                    {{--<input type="submit" form="modalForm" id="btn-save" class="btn btn-primary" value='Добавить'>--}}
                    <input type="hidden" id="admin_id" value="id">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Письмо администратору</h4>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'emailForm'))}}
                        {{Form::label('email', 'Email', array('class'=>'control-label'))}}
                        {{Form::email('email', null, array('class'=>'form-control','placeholder'=>'Введите Email'))}}
                        {{Form::label('subject', 'Тема', array('class'=>'control-label'))}}
                        {{Form::text('subject', null, array('class'=>'form-control','placeholder'=>'Введите Тему'))}}
                        {{Form::label('message', 'Телефон', array('class'=>'control-label'))}}
                        {{Form::textarea('message', null, array('class'=>'form-control', 'id'=>'message', 'placeholder'=>'Введите сообщение'))}}
                    {{Form::close()}}
                   {{-- <form id="emailForm" action="#" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" id="emailto" name="emailto" placeholder="Email to:" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                        </div>
                        <div>
                            <textarea class="textarea" name="message" id="message" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    </form>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" form="emailForm" id="send_mail" class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@parent
    <!-- page script -->
    <script type="text/javascript" src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script>
    $(function () {
    $("#example1").DataTable();
    });
    var inputmask_phone = {"autoUnmask": true, "mask": "+38 099 999 99 99"};
    $("#phone").inputmask(inputmask_phone);
    </script>
    <script src="{{ asset('js/ajaxAdmin.js') }}"></script>
    {{--<script language="JavaScript" src="../../plugins/columnFilters/jquery.columnfilters.js"></script>
    <script>
        $(document).ready(function() {
            $('table#example2').columnFilters({alternateRowClassNames:['rowa','rowb'], excludeColumns:[3,9]});
        });
    </script>--}}
@endsection
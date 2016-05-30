@extends('admin.index')
@section('htmlheader_title', 'Главная')
@section('contentheader_title', 'Главная')

@section('main-content')
        <!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $posts }}</h3>

                <p>Всего статей</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-paper-outline"></i>
            </div>
            <a href="{{ url('/admin/posts') }}" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $comments }}</h3>

                <p>Всего комментариев</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-list-outline"></i>
            </div>
            <a href="{{ url('/admin/posts') }}" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $admin }}</h3>

                <p>Администраторов</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="{{ url('/admin/administrators') }}" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $users }}</h3>

                <p>Пользователей</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            <a href="{{ url('/admin/users') }}" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
    @endsection


<?php $title = 'Добавить категорию'; ?>
@extends('admin.layout.layout')

@section('content')

    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8" style="padding-left: 0px">
                    <div class="box box-primary">
                        @if (isset($error))
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endif
                        <div class="box-body">
                            {{ Form::open(['action' => ['Admin\CategoryController@store'], 'method' => 'POST']) }}
                            {{ Form::token() }}
                            <div class="form-group">
                                {{ Form::label('Название категорий', null, ['class' => 'control-label']) }}
                                {{ Form::text('name',null, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Описание категорий', null, ['class' => 'control-label']) }}
                                {{ Form::textarea('description',null, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{ Form::checkbox('is_show')}}
                                {{ Form::label('Показывать на главной странице', null, ['class' => 'control-label']) }}
                            </div>
                            {{ Form::submit('Создать', ['class'=> 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
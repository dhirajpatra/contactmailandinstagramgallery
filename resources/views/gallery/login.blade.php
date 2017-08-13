<?php

?>
@extends('layouts.default')
@section('content')

<h1>Login To Instagram</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

    @if(Session::has('message'))
        <div class="alert alert-info">
            {{Session::get('message')}}
        </div>
    @endif
</ul>

{!! Form::open(array('route' => 'success', 'class' => 'form')) !!}
    {!! csrf_field() !!}
    <div id="inner-container" style="width:40%; margin-left: 50px;">
        <div class="form-group">
            {!! Form::label('Your User Name') !!}
            {!! Form::text('username', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Your username')) !!}
        </div>

        {{--<div class="form-group">
            {!! Form::label('Your Password') !!}
            {!! Form::password('password', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Your password')) !!}
        </div>--}}

        <div class="form-group">
            {!! Form::submit('Get My Photos',
              array('class'=>'btn btn-primary')) !!}
        </div>
    </div>
{!! Form::close() !!}

@stop
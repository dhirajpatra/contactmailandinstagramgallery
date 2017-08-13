<?php

?>
@extends('layouts.default')
@section('content')

<h1>Contact Us</h1>
<h4>If you didn't find you answer on our FAQ pages, then you should send us your question</h4>
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

{!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}
    {!! csrf_field() !!}

<div class="form-group">
    {!! Form::label('Your Name') !!}
    {!! Form::text('name', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Your name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::email('email', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Your e-mail address')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Your message')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Ask Your Question',
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>

@stop
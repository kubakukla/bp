@extends('layout')

@section('content')
{!! Form::open(array('url' => 'upload', 'files' => true, 'id' => 'form')) !!}
    {!! Form::text('imie', null,  array('placeholder' => 'imie')) !!}
    {!! Form::text('nazwisko', null, array('placeholder' => 'nazwisko')) !!}
    {!! Form::file('plik') !!}
    {!! Form::submit('wyślij') !!}
{!! Form::close() !!}
@endsection

<div class="status">

</div>
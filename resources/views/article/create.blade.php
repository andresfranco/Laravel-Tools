@extends('layouts.article')

@section('main')

<h1>Create Article</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
         <li class="error">{{$error}}</li>
        @endforeach
    </ul>
@endif
{{ Form::open(array('route' => 'articles.store')) }}
    <ul>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>
         <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
            {{ link_to_route('articles.index', 'Cancelar',[] ,array('class' => 'btn btn-default'))}}
        </li>
    </ul>
{{ Form::close() }}



@stop
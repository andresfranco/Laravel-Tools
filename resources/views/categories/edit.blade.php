@extends('layout')

@section('header')

	<ol class="breadcrumb">
	    <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	    <li><a href="{{ route('categories.index') }}">Category</a></li>
	    <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
	    <li class="active">編集</li>
	</ol>

    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Category / Edit #{{$category->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($category, array('route' => array('categories.update', $category->id),'method' => 'put')) !!}

@include('categories._form')

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
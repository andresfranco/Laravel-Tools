@extends('layout')
@section('header')

<ol class="breadcrumb">
	<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
    <li><a href="{{ route('categories.index') }}">Category</a></li>
    <li class="active">{{ $category->name }}</li>
</ol>

<div class="page-header">
        <h1>Category / Show #{{$category->id}}

            {!! Form::model($category, array('route' => array('categories.destroy', $category->id),'method' => 'delete', 'style' => 'display: inline;', 'onsubmit'=> "if(confirm('Delete? Are you sure?')) { return true } else {return false };")) !!}
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <a class="btn btn-primary btn-group" role="group" href="{{ route('categories.duplicate', $category->id) }}"><i class="glyphicon glyphicon-duplicate"></i> Duplicate</a>
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('categories.edit', $category->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
                </div>
            {!! Form::close() !!}

        </h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$category->id}}</p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$category->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
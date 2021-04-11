@extends('master')
<div>
@include('header')
<div>
<h3>create</h3>
</div>
@section('content')

    <h3>Add Category</h3>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'category.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

            <div class="form-group">
                {{ Form::label('category_name', 'Name') }}
                {{ Form::text('category_name',null, array('class' => 'form-control','required'=>'','minlength'=>'3')) }}
            </div>
            {{ Form::submit('Create', array('class' => 'btn btn-default')) }}
            {!! Form::close() !!}

        </div>
    </div>

@extends('layout.master')
@section('container')

	<h3>Shorten Your Url Here</h3>
	{{Form::open(array('url'=>' '))}}
		{{Form::text("url")}}
		{{Form::submit("Shorten")}}
	{{Form::close()}}

	{{$errors->first('url','<p class=errors>:message</p>')}}

@stop
@extends('layout.master')
@section('container')

	<h3>Here is your link</h3>
	{{ HTML::link($result,"http://localhost:8081/ShortenUrl/public/$result") }}

@stop

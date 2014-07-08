<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	{{Form::open(array('url'=>' '))}}
		{{Form::text("url")}}
		{{Form::submit("Shorten")}}
	{{Form::close()}}

	{{$errors->first('url','<p class=errors>:message</p>')}}
</body>
</html>
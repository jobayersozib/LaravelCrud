<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>Register page</title>
</head>
<body>
	@if (isset($msg))
		 {{$msg}}
	@endif
	<fieldset>
		<legend>Registration form</legend>
		<form action="{{url ('users')}}" method="POST">
		{{csrf_field()}}
			<div>
				<label>Name</label>
				<input type="text" required="" name="name">
			</div>
			<div>
				<label>Email</label>
				<input type="email" required="" name="mail">
			</div>
			<div>
				<label>Password</label>
				<input type="password" required="" name="pass">
			</div>
			<div>
				<label>Confirm pass</label>
				<input type="password" required="" name="cpass">
			</div>
			<div>
				<input type="submit" name="register" value="register">
			</div>
		</form>
		
	</fieldset>
</body>
</html>
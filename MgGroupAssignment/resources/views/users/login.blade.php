<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<fieldset>
		<legend>Log in</legend>
		<form action="{{url ('auth')}}" method="POST">

			{{csrf_field()}}
			<div>
				<label>Username</label>
				<input type="email" name="mail">
			</div>
			<div>
				<label>Password</label>
				<input type="Password" name="pass">
			</div>
			<div>
				<input type="submit" name="login" value="login">
			</div>
		</form>
		<a href="/users/create">Register</a>
	</fieldset>
</body>
</html>
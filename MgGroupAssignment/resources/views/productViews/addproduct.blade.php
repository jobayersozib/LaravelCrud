<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>Add product</title>
</head>
<body>
	<div>
		@if(count($errors)>0)
			<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
		
	</div>
	<fieldset>
		<legend>Add product form</legend>
		<form action="{{ url('products/add') }}" method="POST">
			{{ csrf_field() }}

			<div>
				<label for="pname">Product Name:</label>
				<input type="text" name="pname" id="pname" />
			</div>
			<div>
				<label for="pprice">Product Price:</label>
				<input type="number" name="pprice" id="pprice" />
			</div>
			<div>
				<label for="pstock">Product in stock:</label>
				<input type="number" name="pstock" id="pstock" />
			</div>
			<div>
				<label for="ptype">Product Type:</label>
				<select name="ptype" id="ptype">
					<option value="book">Book</option>
					<option value="dress">Dress</option>
					<option value="other">Other</option>
				</select>
			</div>
			<div>
				<input type="submit" name="psubmit" id="psubmit" />
			</div>
			
		</form>
	</fieldset>
</body>
</html>
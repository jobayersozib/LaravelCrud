<!DOCTYPE>

<!DOCTYPE html>
<html>
<head>
	<title>Edit-{{$product->name}}</title>
</head>
<body>
	<fieldset>
		<legend>Edit-{{$product->name}}</legend>
		<form action="{{ url('products/'.$product->id) }}" method="POST">
			{{csrf_field()}}
			{{ method_field('PUT') }}
			<div>
				<label for="name">Product name</label>
				<input type=" text" name="pname" id="name" value="{{$product->name}}">
			</div>
			<div>
				<label for="price">Product price</label>
				<input type="number" name="pprice" id="price" value="{{$product->price}}">
			</div>
			<div>
				<label for="stock">Product stock</label>
				<input type="number" name="pstock" id="stock" value="{{$product->stock}}">
			</div>
			<div>
				<input type="submit" name="update" value="update">
			</div>
		</form>
			
	</fieldset>
</body>
</html>
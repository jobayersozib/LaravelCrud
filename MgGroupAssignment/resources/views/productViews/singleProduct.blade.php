<!DOCTYPE>

<!DOCTYPE html>
<html>
<head>
	<title>{{$product->name}}</title>
</head>
<body>
<fieldset>
	<legend><h3>{{$product->name}}-Details</h3></legend>
	<h4>Product price:{{$product->price}}</h4>
	<h4>Product stock:{{$product->stock}}</h4>
	<h4>Product type:{{$product->type}}</h4>
	<a href="/products">Back</a>
</fieldset>
	
	
</body>
</html>
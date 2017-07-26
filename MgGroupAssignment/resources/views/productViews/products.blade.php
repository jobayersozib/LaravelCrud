<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
</head>
<body>
@if(count($products)>0)
	<table>
		<tr>
			<th>Product Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach ($products as $product)
			<tr>
				<td><a href="/products/{{$product->id}}">{{ $product->name }}</a></td>
				<td><a href="/products/{{$product->id}}/edit">Edit</a></td>
				<td>
					<form action="{{ url('products/'.$product->id) }}" method="POST">
		            {{ csrf_field() }}
		            {{ method_field('DELETE') }}

		            <input type="submit" name="s" value="delete">
				</td>
			</tr>
		@endforeach
	</table>
@endif	

    <a href="/products/create">Add new product</a>
    <a href="/logout">Logout</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            font-size: 2em;
        }

        .btn-black {
            color: #fff;
            background-color: #000;
            border: none;
            padding: 10px;
            border-radius: 5px;
            position: fixed;
            top: 10px;
            right: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <a href="{{ route('product.create') }}" class="btn-black">Create Product</a>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>

            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->Name}}</td>
                    <td>{{$product->Quantity}}</td>
                    <td>{{$product->Price}}</td>
                    <td>{{$product->Description}}</td>
                    <td><a href="{{route('product.edit', $product)}}" >Edit</a></td>
                    <td>
                        <form method="POST" action="{{route('product.destroy', ['product' => $product])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>

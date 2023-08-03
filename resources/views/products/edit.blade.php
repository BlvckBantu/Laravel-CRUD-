<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <style>
        body {
            background-color: #f5f5f5;
        }

        h1 {
            color: #000;
            font-size: 24px;
            text-align: center;
        }

        form {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            background-size: cover;
        }

      
        label {
            font-size: 16px;
            color: #000;
            padding-right: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #fff;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            color: #fff;
            background-color: #000;
            font-size: 18px;
            cursor: pointer;
        }
        .btn-back {
          color: #fff;
          background-color: #000;
          border: none;
          padding: 10px;
          border-radius: 5px;
          position: fixed;
          top: 10px;
          right: 10px;
        }
    </style>
</head>
<body>
    <h1>Edit a product</h1>
    <a href="{{ route('product.index') }}" class="btn-back">Back to products</a>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors-all() as $error)
            <li>{($error)}</li>
                
            @endforeach
        </ul>
            
        @endif
    </div>
    <form method="post" action="{{ route('product.update', ['product' => $product->id]) }}">
        @csrf 
        @method('put')
        <div>
            <label for="Name">Product Name</label>
            <input type ="text" name = "Name" placeholder="Product Name"  value="{{$product->Name}}"/>
        </div>

        <div>
            <label for="Quantity">Quantity</label>
            <input type ="number" name = "Quantity" placeholder="Quantity" value="{{$product->Quantity}}"/>
        </div>

        <div>
            <label for="Price">Price</label>
            <input type ="number" name = "Price" placeholder="Price" value="{{$product->Price}}"/>
        </div>

        <div>
            <label for="Description">Description</label>
            <input type ="text" name = "Description" placeholder="Description" value="{{$product->Description}}"/>
        </div>

        <div>
            <input type="submit" value="Update"/>
        </div>
    </form>
</body>
</html>

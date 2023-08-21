<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid black;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #656765;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">

    <h2 >Product Order Details</h2>
    <table class="mt-4">
        <tr>
            <th>User Name</th>
            <td>{{$order->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$order->email}}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{$order->phone}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$order->address}}</td>
        </tr>
        <tr>
            <th>Product Name</th>
            <td>{{$order->product_title}}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{$order->quantity}}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>${{$order->price}}</td>
        </tr>
        <tr>
            <th>Product Image</th>
            <td><img src="{{'product/'.$order->image}}" alt="Product Image" width="100"></td>
        </tr>
        <tr>
            <th>Payment Status</th>
            <td>{{$order->payment_status}}</td>
        </tr>
        <tr>
            <th>Delivery Status</th>
            <td>{{$order->delivery_status}}</td>
        </tr>
    </table>
</div>
</body>
</html>

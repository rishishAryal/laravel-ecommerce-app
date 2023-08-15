<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        table, th, td {
            border: 1px solid white;
        }
table tr th{
    background-color: #49a0ec;
    color:black;
}
        th, td {
            padding: 10px;

        }

        .center {
            margin: auto;
            width: 100%;
            border: 2px solid #fff;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.header')
    <!-- partial -->
    <div class="main-panel">

        <div class="content-wrapper">
            @if(session()->has('message'))

                <div class=" p-1 div_center alert alert-success container text-align-center ">
                    <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">X</button>
                    <p class=" alert_message">{{session()->get('message')}}</p>
                </div>
            @endif
            <h2 class="text-center">All Products</h2>
            <table class="center">

                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Product Image</th>
                    <th>Discounted Price</th>
                    <th>Edit</th>
                    <th>Delete</th>



                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>${{$product->price}}</td>
                        <td>{{'$'.($product->discount_price?  : '0')}}</td>
                        <td><img src="{{'product/'.$product->image}}" style="width: 350px; height: 280px; border-radius: 10px"
                                 alt="product-img" loading="lazy"></td>
                        <td>${{$product->price-$product->discount_price}}</td>
                        <td><a href="{{url('update_product',$product->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete??')"
                               href="{{url('delete_product',$product->id)}}"
                               class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach

            </table>


        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
</div>
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')

    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        label {
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
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
            <div class="div_center">

                <h1 class="font_size">Update Product</h1>
                <form action="{{url('/update_product_confirm',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label for="title">Product Title:</label>
                        <input type="text" name="title" placeholder="Write a title.." required value="{{$product->title}}">
                    </div>
                    <div class="div_design">
                        <label for="description">Product Description:</label>
                        <input type="text" name="description" placeholder="Write a Description.." required value="{{$product->description}}">
                    </div>
                    <div class="div_design">
                        <label for="price">Product Price:</label>
                        <input type="number" name="price" placeholder="write the price" required value="{{$product->price}}">
                    </div>
                    <div class="div_design">
                        <label for="discount_price">Discount Price:</label>
                        <input type="number" name="discount_price" placeholder="discount price" value="{{$product->discount_price}}">
                    </div>
                    <div class="div_design">
                        <label for="quantity">Product Quantity:</label>
                        <input type="number" name="quantity" min="0" placeholder="product quantity" required value="{{$product->quantity}}">
                    </div>
                    <div class="div_design">
                        <label for="category">Product Category:</label>
                        <select name="category" required>
                            <option value="{{$product->category}}" selected>{{$product->category}}</option>

                            @foreach($categories as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <label for="image"> Current Product Image:</label>
                        <img src="/product/{{$product->image}}" height="300" width="380" alt="" class="rounded">
                    </div>

                    <div class="div_design">
                        <label for="image"> Change Product Image:</label>
                        <input type="file" name="image" placeholder="Write a title.."  value="{{$product->image}}">
                    </div>
                    <div>

                        <input type="submit" class="btn btn-primary" value="Update Product">
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
</div>
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>

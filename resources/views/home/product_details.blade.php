<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />


    <style>
        .product-card {

           border-top-right-radius: 70px;
            border-bottom-left-radius: 70px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 14px -6px 10px -11px rgba(0,0,0,.1);
            background-color: #d8e9fc;
        }



        .product-description {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        #add-to-cart-button {
            background-color: #229bf1;
            border: none;
           color: whitesmoke;

            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
font-weight: 600;
            /*cursor: pointer;*/
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        #add-to-cart-button:hover {
            background-color:black;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

    <!-- end header section -->
    <!-- slider section -->


    <div class="container mt-5">
        <div class="row" style="margin-left:100px " >
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <img src="{{url('/product',$product->image)}}" width="300" height="400"  class="col-md-12 " alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"> {{$product->title}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">Quantity: {{$product->quantity}}</p>

                    @if($product->discount_price)
                            <p class="card-text"> Price: <strong class="text-danger" style="text-decoration: line-through">{{'$'.($product->price)}}</strong></p>
                            <p class="card-text">Discount Price: <strong class="text-success" >{{'$'.($product->discount_price)}}</strong></p>
                            <p class="card-text">Discounted Price: <strong class="text-primary" >{{'$'.($product->price-$product->discount_price)}}</strong></p>


                        @else
                            <p class="card-text"> Price: <strong class="text-danger" >{{'$'.($product->price)}}</strong></p>

                        @endif

                        <p class="card-text">Category:<strong> {{$product->category}}</strong></p>
                        <div>
                            <form action="{{url('add_cart',$product->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}" style="width: 100px">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Add To Cart">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end slider section -->
</div>
<!-- why section -->

<!-- end why section -->

<!-- arrival section -->

<!-- footer start -->
@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>

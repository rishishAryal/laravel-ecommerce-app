<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
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
        .border-deg{

            display: flex;
         justify-content: right;
            gap: 10px;


        }
        .shop-now {
            color: #dc3545;
            font-weight: bold;
        }
        .shop-now:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    <!-- end slider section -->
    <div style="margin-top:100px ">
        @if(session()->has('message'))

            <div class=" p-1 div_center alert alert-success container text-align-center ">
                <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">X</button>
                <p class=" alert_message">{{session()->get('message')}}</p>
            </div>
        @endif
        @if(count($carts)>0)
    <div class="container">

        <div class="row ">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                       <h5> Your  Cart</h5>
                    </div>
                    <?php $totalPrice = 0; $totalQuantity=0 ?>
                    @foreach($carts as $cart)
                    <div class="card-body border-bottom">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{url('product',$cart->image)}}" alt="Item 1" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">{{$cart->product_title}}</h5>
                                <p class="card-text">Price: <span style="color: red">${{$cart->price}}</span></p>
                               <p class="card-text">Quantity: {{$cart->quantity}} </p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-end">
                                <a onclick="return confirm('Are you sure to delete??')" href="{{url('delete_cart',$cart->id)}}" class="btn btn-danger">Remove</a>
                            </div>
                        </div>

                    </div>
                            <?php $totalPrice = $totalPrice + $cart->price ; $totalQuantity=$totalQuantity+$cart->quantity?>
                    @endforeach
                </div>
                    <div class="text-right border-deg">
                        <p style="font-weight: 500;font-size: 20px; color: green">Total Quantity : <?=  $totalQuantity  ?></p>
                        <p style="font-weight: 500;font-size: 20px; color: red">Total Price : $<?=  $totalPrice  ?></p>
                    </div>
                <div class="text-center">
                    <h3>Proceed To Order :</h3>
                    <div class="d-flex justify-content-center " style="gap: 15px">
                        <a class="btn btn-danger " style="font-size: 17px;font-weight: bold" href="{{url('cash_order ')}}">Payment Via Cash</a>
                        <a class="btn btn-dark  "  style="font-size: 17px;font-weight: bold" href="">Payment Via Card</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
            @else

                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="alert alert-info text-center">
                                <h4 class="alert-heading">No Product Added to Cart</h4>
                                <p>Your cart is currently empty. Start shopping and add some products to your cart!</p>
                                <p><a href="{{url('/')}}" class="shop-now">Shop Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

    </div>

</div>



<!-- why section -->

<!-- end why section -->

<!-- arrival section -->

<!-- end arrival section -->

<!-- product section -->

<!-- end product section -->

<!-- subscribe section -->

<!-- end subscribe section -->
<!-- client section -->

<!-- end client section -->
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

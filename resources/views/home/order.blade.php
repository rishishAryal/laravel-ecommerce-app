<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    <div class="container mt-5">
        @foreach($orders as $order)
        <div class="card mt-4">
            <div class="card-header">
                <h5>Order Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="product/{{$order->image}}" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <h4>{{$order->product_title}}</h4>
                        <p>Product Quantity: <strong> {{$order->quantity}}</strong></p>
                        <p>Product Price: <strong> ${{$order->price}} </strong></p>
                        <p>Payment Status: <strong class="text-success">{{$order->payment_status}}</strong></p>
                        <p>Delivery Status: <strong class="text-info">{{$order->delivery_status}}</strong></p>
                        @if($order->delivery_status==='processing')
                        <a href="{{url('cancel_order',$order->id)}}" onclick="return confirm('Are you sure to cancel this order? ')" class="btn btn-danger">Cancel Order</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
<script>

</script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
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

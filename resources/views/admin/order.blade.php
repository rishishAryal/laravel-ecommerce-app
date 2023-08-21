<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')


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
            <h1 class="text-center"> All Orders</h1>
            <div style="height: 2px; color: white; padding: 1px;width: 100%; background-color: white; margin-top: 20px"></div>
@foreach($orders as $order)
                <div class="container mt-4">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>User Information</h4>
                            <ul class="list-group text-black" >
                                <li class="list-group-item">User Name: {{$order->name}}</li>
                                <li class="list-group-item">Email: {{$order->email}}</li>
                                <li class="list-group-item">Phone Number: {{$order->phone}}</li>
                                <li class="list-group-item">Address: {{$order->address}}</li>
                            </ul>
                           <div class="d-flex  align-items-center mt-4 " style="gap: 10px">
                               <a href="{{url('print_pdf',$order->id)}}" class="btn btn-primary">Print PDF</a>
                            @if($order->delivery_status==='processing')
                            <a onclick="return confirm('are you sure this product is delivered??')" class="btn btn-danger " href="{{url('delivered',$order->id)}}">Change delivery status to Delivered </a>



                            @endif
                           </div>
                            <div class="mt-4">
                                <h4>Order Status</h4>
                                <span class="status-badge badge badge-success  " style="font-size: 20px">Payment Status: {{$order->payment_status}}</span>
                                <span class="status-badge badge badge-info mt-3" style="font-size: 20px">Delivery Status: {{$order->delivery_status}}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4>Product Details</h4>
                            <div class="card">
                                <img src="{{'product/'.$order->image}}" class="card-img-top product-image " height="400px" width="400px" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title">Product Name: {{$order->product_title}}</h5>
                                    <p class="card-text">Quantity: {{$order->quantity}} </p>
                                    <p class="card-text"> Total Price: ${{$order->price}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
{{--                    <div class="mt-4">--}}
{{--                        <h4>Order Status</h4>--}}
{{--                        <span class="status-badge badge badge-success  " style="font-size: 20px">Payment Status: {{$order->payment_status}}</span>--}}
{{--                        <span class="status-badge badge badge-info mt-3" style="font-size: 20px">Delivery Status: {{$order->delivery_status}}</span>--}}
{{--                    </div>--}}

                </div>
                <div style="height: 2px; color: white; padding: 1px;width: 100%; background-color: white; margin-top: 20px"></div>
            @endforeach
        </div>

    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
</div>
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>

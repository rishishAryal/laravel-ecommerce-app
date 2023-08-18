<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_details',$product->id)}}" class="option1">
                                Product Details
                            </a>
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
                    <div class="img-box">
                        <img src="{{url('/product',$product->image)}}" alt="">
                    </div>
                    <div class="detail-box">

                        <h5 style="display: block">
                           {{$product->title}}
                        </h5>

                        @if($product->discount_price)
                            <h6>
                                Price: <span style="text-decoration: line-through; color: red">{{'$'.($product->price)}}</span>
                            </h6>
                        @else
                            <h6>
                                Price: <span>{{'$'.($product->price)}}</span>
                            </h6>
                        @endif

                        @if($product->discount_price)
                        <h6>
                           Discount Price: <span style="color: green"> {{'$'.($product->discount_price)}}</span>
                        </h6>

                        @else
                            <h6>
                            Discount Price: <span>-</span>
                            </h6>
                        @endif

                        <h6>
                           Final Price: <span style="color: blue">{{'$'.($product->price-$product->discount_price)}}</span>
                        </h6>

                    </div>
                </div>
            </div>
            @endforeach
            <span style="padding-top: 20px">
            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
        </div>


    </div>
</section>

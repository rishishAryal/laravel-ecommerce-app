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
                            <a href="" class="option1">
                                {{$product->title}}
                            </a>
                            <a href="" class="option2">
                                Buy Now
                            </a>
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
                              -
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

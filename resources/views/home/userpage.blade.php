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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<div class="hero_area">
    <!-- header section strats -->
  @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
@include('home.slider')
    <!-- end slider section -->
</div>
<!-- why section -->
@include('home.why')
<!-- end why section -->

<!-- arrival section -->
@include('home.new_arrival')
<!-- end arrival section -->

<!-- product section -->
@include('home.product')
<!-- end product section -->



{{--Comment and Reply System starts here--}}

<div class="text-center mb-4" >
    <h1 style="font-size: 30px; text-align: center; padding-top: 20px;padding-bottom: 20px">Comments</h1>
    @if(Auth::id())
        <form action="{{ url('add_comment') }}" method="post">
            @csrf
            <textarea style="height: 150px;width: 600px" name="comment"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="comment">
        </form>
    @else
        <h1 class="text-danger">Login Or Register To leave a Comment</h1>
        <a class="btn btn-primary " href="{{ route('login') }}">Log in</a>
        <a class="btn btn-primary " href="{{ route('register') }}">Register</a>
    @endif

</div>
<div style="padding-left: 20%" class="mb-4">
    <h1 style="font-size: 20px; padding-bottom: 20px;">All Comments</h1>


   @foreach($comments as $comment)
    <div class=" mt-4" style="width: 500px">
        <div class="alert alert-primary">
            <b>{{ $comment->name }}</b>
            <p>{{ $comment->comment }}</p>
            @if(Auth::id())
                <a onclick="reply(this)" href="javascript:void(0);"  data-Commentid="{{ $comment->id }}"   >reply</a>


            @else
                <span class="text-danger">Login to Reply</span>
            @endif
            @foreach($replys as $reply)
                @if($reply->comment_id==$comment->id)
            <div style="padding-left:8%;padding-top:5px;  ">

                <b>{{ $reply->name }}</b>
                <p>{{ $reply->reply }}</p>
                <a style="color: green" onclick="reply(this)" href="javascript:void(0);"  data-Commentid="{{ $comment->id }}"   >reply</a>

            </div>


                @endif

            @endforeach
        </div>
    </div>
    @endforeach

    <div style="display: none" class="replyDiv m-4">

           <form action="{{ url('add_reply') }}" method="post">
               @csrf
               <input type="text" id="commentId" name="commentId" hidden="">
               <textarea placeholder="yor Reply" style="height: 100px; width: 400px" name="reply"></textarea>
               <br>
               <div style="display: flex; justify-content: center; align-items: center; gap: 10px">
               <button type="submit"  class="btn btn-primary m-0" value="Reply">Reply</button>
               <a onclick="reply_close(this)" href="javascript:void(0);" class="btn  btn-danger" >Cancel</a>
               </div>

           </form>

    </div>

</div>


{{--Comment and Reply System ends here--}}

<!-- subscribe section -->
@include('home.subscribe')
<!-- end subscribe section -->
<!-- client section -->
@include('home.client')
<!-- end client section -->
<!-- footer start -->
@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>

<script>
    function  reply(caller){
        document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
    }

    function  reply_close(caller){

        $('.replyDiv').hide();
    }
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

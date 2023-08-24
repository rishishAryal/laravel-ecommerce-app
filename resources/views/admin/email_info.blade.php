<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="/public">
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
            <div class="text-center">
                 <h4>Send Email to</h4>  <h1 > {{$order->email}}</h1>
            </div>
            <div style="margin-left: 45%">
                <form action="{{ url('send_user_email',$order->id) }}" method="post" >
                    @csrf
                 <div class="mt-4">
                     <label style="display: block">Email Greeting </label>
                    <input type="text" name="greeting">
                </div>
                 <div class="mt-4">
                      <label style="display: block">Email FirstLine </label>
                     <input type="text" name="firstline">
                 </div>
            <div class="mt-4">
                <label style="display: block">Email Body </label>
                <input type="text" name="body">
            </div>
            <div class="mt-4">
                <label style="display: block">Email Button name: </label>
                <input type="text" name="button">
            </div>
            <div class="mt-4">
                <label style="display: block">Email Url </label>
                <input type="text" name="url">
            </div>
                <div class="mt-4">

                    <input type="submit" value="Send Email" class="btn btn-primary">
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

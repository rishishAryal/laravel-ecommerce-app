<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        table, th, td {
            border: 1px solid white;
        }
        th, td {
            padding: 10px;
        }
        .div_center{
            text-align: center;
            padding: 40px;
        }
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color{
            color: black;
        }
        .alert_message{
            font-size: 25px;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            border: 3px solid #7bbbf6;
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
                <h1 class="h2_font">Add Category</h1>

                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input class="input_color" type="text" id="category" name="category" placeholder="Write category name">

                    <input type="submit"  class="btn btn-primary" name="Submit" value="Add Category">
                    @error('category')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </form>
            </div>
            <table class="center">
                <tr>
                      <td>Category Name</td>
                    <td>Action</td>
                </tr>
                @foreach($categories->reverse() as $category )
                <tr>
                    <td>{{$category->category_name}}</td>
                    <td><a  onclick="return confirm('Are you sure to delete??')" href="{{url('delete_category',$category->id)}}" class="btn btn-danger">Delete</a></td>
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

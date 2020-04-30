@extends('layouts.master')
@section('title') Add Product @endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h1 class="my-4">Add Product</h1>
            </div>

            <!-- /.col-lg-3 -->

            <div class="col-lg-12">

                <div class="row">
                    <form method="POST" action="{{url('product')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name.">
                            </div>
                            <div class="col-sm-10">
                                <label for="description" class="col-sm-4 col-form-label">Description</label>
                                    <input type="textarea" class="form-control" id="description" name="description" placeholder="Product Description.">
                            </div>
                            <div class="col-sm-10">
                                <label for="category_id" class="col-sm-4 col-form-label">Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
                <!-- /.row -->

            </div>

            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection




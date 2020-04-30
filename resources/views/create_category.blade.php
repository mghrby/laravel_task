@extends('layouts.master')
@section('title') Add Category @endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h1 class="my-4">Add Category</h1>
            </div>

            <!-- /.col-lg-3 -->

            <div class="col-lg-12">

                <div class="row">
                    <form method="POST" action="{{url('category')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Category Name.">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
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




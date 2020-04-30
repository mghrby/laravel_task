@extends('layouts.master')
@section('title') Homepage @endsection
@section('content')
        <div class="row">

            <div class="col-md-12">
                <h1 class="my-4">Shop Name</h1>
            </div>

            <div class="col-lg-3">

                <div class="list-group">
                    <a href="{{url('/')}}" class="{{ !Request::segment(1) ? "active" : ""}} list-group-item">All</a>
                    @foreach($categories as $category)
                    <a href="{{url('category', ['id' => $category->id])}}" class="{{$category->id == Request::segment(2) ? "active" : ""}} list-group-item" style="position: relative">{{$category->name}}
                        <form method="POST" style="position: absolute; top:5px; right: 5px;" action="{{url('category', ['id' => $category->id])}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="form-group">
                                <button type="submit" class="btn btn-sm " title="Delete category">
                                    <i class="fa fa-trash" aria-hidden="true" style="font-size: 16px"></i>
                                </button>
                            </div>
                        </form>
                    </a>
                    @endforeach
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="row">

                    @if($products->count() > 0)
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 mb-4">

                                <div class="card h-100" style="position: relative">
                                    <form method="POST" style="position: absolute; top:5px; right: 5px;" action="{{url('product', ['id' => $product->id])}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete product">
                                                <i class="fa fa-trash" aria-hidden="true" ></i>
                                            </button>
                                        </div>
                                    </form>
                                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="#">{{$product->name}}</a>
                                        </h5>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 80, $end='...') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $products->links() }}
                    @else
                        <p>No products... <a style="font-size: 12px" href="{{url('product/create')}}">Add new product</a></p>
                    @endIf

                </div>
                <!-- /.row -->

            </div>

            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->


@endsection




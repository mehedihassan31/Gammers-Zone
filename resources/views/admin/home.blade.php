@extends('admin.layout.app')

@section('title','Dashboard')

@section('content')

<div class="container">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="count-card-title text-center">{{$totalproduct}}</h3>
                        <h3 class="count-card-title">Total Products</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="count-card-title text-center">{{$totalorder}}</h3>
                        <h3 class="count-card-title">Total Order</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="count-card-title text-center">{{$totalusers}}</h3>
                        <h3 class="count-card-title">Total Users</h3>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$totalcourse}}</h3>
                        <h3 class="count-card-title">Total Courses</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$totalcontact}}</h3>
                        <h3 class="count-card-title">Total Contact</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$totalreview}}</h3>
                        <h3 class="count-card-title">Total Reviews</h3>
                    </div>
                </div>
            </div> --}}

        </div>
    
    
    </div>


</div>
    
@endsection
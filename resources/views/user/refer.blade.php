@extends('user.layouts.app')

@section('content')
<div class="container mt-5">

<div class="row">
@include('user.layouts.usersidebar')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-center text-warning">
                REFER MORE TO EARN MORE !
            </div>
            <div class="card-body">
                <p>Invite your friends on Apps using your promo code to earn 10tk when they join first paid match. Your friends also get 5tk as signup bonous</p>

                <div class="inline-block mt-3 mb-3">
                    <h2>Refer Code:</h2> <h2 class="text-center bg-warning"><code>{{$userdata->username}}</code></h2> 

                </div>
                
                <h1 class="text-center text-primary ">How does it work ?</h1>
                <div>

                    <img src="{{asset('assets/user/images/8 dec.svg')}}" alt="">
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-info"> REFER NOW</button>
                </div>

                
            </div>
        </div>
    </div>


@endsection